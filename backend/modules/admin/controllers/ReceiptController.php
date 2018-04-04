<?php

namespace backend\modules\admin\controllers;

use Yii;
use common\models\Sms;
use common\models\SmsSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\filters\AccessControl;
use kartik\mpdf\Pdf;

//use mPdf;

/**
 * ReceiptController implements the CRUD actions for Sms model.
 */
class ReceiptController extends Controller {

    /**
     * @inheritdoc
     */
    public function behaviors() {
        return [
            'access' => [
                'class' => AccessControl::className(),
                'rules' => [
                        [
                        'actions' => ['index', 'create', 'update', 'view', 'delete', 'receipt', 'gen-pdf', 'mPDF', 'ajaxreceipt'],
                        'allow' => true,
                        'roles' => ['@'],
                    ],
                ],
            ],
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'delete' => ['POST'],
                ],
            ],
        ];
    }

    /**
     * Lists all Sms models.
     * @return mixed
     */
    public function actionIndex() {
        $searchModel = new SmsSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);
        $modal = Sms::find()->where(['created_at' => 0])->all();
        //$modal->receipt_data = [];
        // echo '<pre>'; print_r($modal->receipt_data); exit;
        // $ser =  $modal->receipt_data; //= serialize($temp_data);
        // $unser = unserialize($ser);
        return $this->render('index', [
                    'searchModel' => $searchModel,
                    'dataProvider' => $dataProvider,
                    'modal' => $modal,
        ]);
    }

    /**
     * Displays a single Sms model.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView($id) {
        $model = $this->findModel($id);
        return $this->render('view', [
                    'model' => $model,
                        //'creditno' => $creditno,
        ]);
    }

    public function actionGenPdf($id) {
        $model = $this->findModel($id);
        $pdf_content = $this->renderPartial('view-pdf', [
            'model' => $this->findModel($id),
        ]);
        $sender_mail = $model->email;
        $service = $model->type_service;
        $username = $model->name;

        $pdf = new Pdf([
            // set to use core fonts only
            'mode' => Pdf::MODE_BLANK,
            'filename' => 'receipt',
            // A4 paper format
            'format' => Pdf::FORMAT_A4,
            // portrait orientation
            'orientation' => Pdf::ORIENT_PORTRAIT,
            // stream to browser inline
            'destination' => Pdf::DEST_BROWSER,
//         'marginTop' => 5,
//         'marginLeft' => 5,
            // your html content input
            'content' => $pdf_content,
            // format content from your own css file if needed or use the
            // enhanced bootstrap css built by Krajee for mPDF formatting 
            'cssFile' => '@vendor/kartik-v/yii2-mpdf/assets/kv-mpdf-bootstrap.min.css',
            // any css to be embedded if required
            'cssInline' => '.kv-heading-1{font-size:18px}',
            // set mPDF properties on the fly
            'options' => ['title' => 'Krajee Report Title'],
            // call mPDF methods on the fly
            'methods' => [
                'SetHeader' => ['Wall Dressup'],
                'SetFooter' => ['{PAGENO}'],
            ]
        ]);

        $mpdf = $pdf->api;
        $mpdf->WriteHTML($pdf_content);
        $quotation = rand(1000, 9999);
        $filenames = 'Invoice_' . time();
        $path = $mpdf->Output(Yii::getAlias('@backend') . '/web/uploads/pdf/' . $filenames . '.pdf', 'F');
        $mail_sub1 = 'Wall Dressup-Receipt for service' . $filenames . '';
        $mail_sub2 = 'Wall Dressup-Receipt for service "' . $service . '" with file name "' . $filenames . '.pdf"';
        $mail_body1 = '<p>Hi Admin,</p>';
        $mail_body1 .= "A new receipt is created from Wall Dressup at backend. <br><br>";
        $mail_body1 .= "Here with attached the pdf. <br><br>";
        $mail_body1 .= "<strong>Thanks, </strong>";
        $mail_body1 .= "<strong>Wall Dressup </strong><br><br>";

        $mail_body2 = "<p>Hi " . $username . ",</p>";
        $mail_body2 .= "A pdf receipt is generated for the payment of your requested service " . $service . " .<br><br>";
        $mail_body2 .= "Here with attached the pdf. <br><br>";
        $mail_body2 .= "<strong>Thanks, </strong>";
        $mail_body2 .= "<strong>Wall Dressup </strong><br><br>";


        $emailSend1 = Yii::$app->mailer->compose()
                ->setFrom(['sumanasdev@gmail.com'])
                ->setTo('banushree@arkinfotec.com')
                ->setSubject($mail_sub1)
                ->setHtmlBody($mail_body1)
                ->attach(Yii::getAlias('@backend') . '/web/uploads/pdf/' . $filenames . '.pdf');
        $emailSend1->send();

        $emailSend2 = Yii::$app->mailer->compose()
                ->setFrom(['sumanasdev@gmail.com'])
                ->setTo('banushree@arkinfotec.com')
                ->setSubject($mail_sub2)
                ->setHtmlBody($mail_body2)
                ->attach(Yii::getAlias('@backend') . '/web/uploads/pdf/' . $filenames . '.pdf');
        $emailSend2->send();

        if ($emailSend1 && $emailSend2) {
            Yii::$app->getSession()->setFlash('success', 'Receipt generated successfully!!');
            return $this->redirect(['create']);
        } else {

            return $this->redirect(['view']);
        }
    }

    /**
     * Creates a new Sms model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate() {



        $model = new Sms();
        $session = Yii::$app->session;
        $session->open();
        $session_otp = '';

        return $this->render('create', [
                    'model' => $model,
                    'session_otp' => $session_otp,
        ]);
    }

    /**
     * Updates an existing Sms model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($id) {
        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id]);
        }

        return $this->render('update', [
                    'model' => $model,
        ]);
    }

    /**
     * Deletes an existing Sms model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($id) {
        $this->findModel($id)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the Sms model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Sms the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id) {
        if (($model = Sms::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }

    public function actionAjaxreceipt() {

        if (Yii::$app->request->isAjax) {
            $session = Yii::$app->session;
            $json = array();
            $data = Yii::$app->request->post();
            if ($data['form'] == 'phone') {
               // $token = 'rGdiHxtdXw';
               $token = 'ZVDzjxMguN';
                $mobile = $data['req_val'];
                $rndno = rand(1000, 9999);
                $message = urlencode("Your otp number is " . $rndno);
                $site = 'FSTSMS';
                $url = "http://api.fast2sms.com/sms.php?token=" . $token . "&mob=" . $mobile . "&mess=" . $message . "&sender=" . $site . "&route=0";
                $homepage = file_get_contents($url);

                $session['Sms'] = [
                    'otp' => $rndno,
//                    'otp' => '11',
                    'phone' => $data['req_val'],
                ];
                $json["mgs"] = "success";
                $json["otp"] = $rndno;
//                $json["otp"] = '11';
                echo json_encode($json);
                exit;
            }
            if ($data['form'] == 'otp') {
                if ($data['req_val'] == $session['Sms']['otp']) {
                    $json["mgs"] = "success";
                    echo json_encode($json);
                    exit;
                } else {
                    $json["mgs"] = "Entered wrong OTP number. Please try it again..";
                    echo json_encode($json);
                    exit;
                }
            }
        } else {
            $json["mgs"] = "error";
            echo json_encode($json);
            exit;
        }
        exit;
    }

    public function actionReceipt() {

        $model = new Sms();
        $session = Yii::$app->session;
        $session->open();
        $session_otp = '';
        $newphone = $session['Sms']['phone'];
        if ($newphone) {

            if ($model->load(Yii::$app->request->post())) {

                $post = Yii::$app->request->post();
                $cc = $post['Sms']['credit_no'];
                // $var = substr_replace($var, str_repeat("X", 8), 4, 8);
                $credit_no = 'XXXX-XXXX-XXXX-' . $cc;
                $session['Sms'] = [
                    'creditno' => $credit_no,
                ];

                $model->invoice_no = 'OR' . time();
                $temp_data = array();
                $temp_data['name'] = $model->name;
                $temp_data['email'] = $model->email;
                $temp_data['phone'] = $model->phone;
                $temp_data['address'] = $model->address;
                $temp_data['type_service'] = $model->type_service;
                $temp_data['issued_by'] = $model->issued_by;
                $temp_data['issued_date'] = $model->issued_date;
                $temp_data['credit_no'] = $model->credit_no;
                $temp_data['cheque_no'] = $model->cheque_no;
                $temp_data['amount'] = $model->amount;
                $model->receipt_data = serialize($temp_data);


                if ($model->save(false)) {

                    $unser = unserialize($model->receipt_data);

                    $na = $unser['name'];
                    $em = $unser['email'];
                    $ph = $unser['phone'];
                    $ad = $unser['address'];
                    $ty = $unser['type_service'];
                    $isby = $unser['issued_by'];
                    $ison = $unser['issued_date'];
                    $cr = $unser['credit_no'];
                    $ch = $unser['cheque_no'];
                    $am = $unser['amount'];
                    // print_r($na); exit;
                    //$modal->email = $unser['email'];

                    $send_mail = $model->email;
                    $service = $model->type_service;
                    $username = $model->name;
                    $phone = $model->phone;
                    $issuedby = $model->issued_by;

                    $pdf_content = $this->renderPartial('view-pdf', [
                        'model' => $model,
                    ]);
                    //echo $pdf_content; exit;
                    $pdf = new Pdf([
                        // set to use core fonts only
                        'mode' => Pdf::MODE_BLANK,
                        'filename' => 'receipt',
                        // A4 paper format
                        'format' => Pdf::FORMAT_A4,
                        // portrait orientation
                        'orientation' => Pdf::ORIENT_PORTRAIT,
                        // stream to browser inline
                        'destination' => Pdf::DEST_BROWSER,
                       // 'marginTop' => 5,
                        //'marginRight' => 5,
                        // your html content input
                        'content' => $pdf_content,
                        // format content from your own css file if needed or use the
                        // enhanced bootstrap css built by Krajee for mPDF formatting 
                        'cssFile' => '@vendor/kartik-v/yii2-mpdf/assets/kv-mpdf-bootstrap.min.css',
                        // any css to be embedded if required
                        'cssInline' => '.kv-heading-1{font-size:18px}',
                        // set mPDF properties on the fly
                        'options' => ['title' => 'Krajee Report Title'],
                        // call mPDF methods on the fly
                        'methods' => [
                            'SetHeader' => ['Wall Dressup'],
                            'SetFooter' => ['{PAGENO}'],
                        ]
                    ]);

                    $mpdf = $pdf->api;
                    $css_file = 'themes/admin/css/custom.css';
                    $stylesheet = file_get_contents($css_file);
                    $html = '
                        <div style=" width: 100%;
                            height: 100%;
                            border:1px groove; 
                             padding: 15px; ">
                       <table width="100%">
                        <tr>
                             <td align="right"><img src="/backend/web/themes/admin/img/logo.png" alt="logo" align="right"  height="60px" width="150px"></td>
                        
                        </tr>
                        <tr>
                            <td> </td><td> </td>
                        </tr>
                         <tr>
                            <td> </td><td> </td>
                        </tr>
                         <tr>
                            <td> </td><td> </td>
                        </tr>
                         <tr>
                            <td> </td><td> </td>
                        </tr>
                        <tr>
                            <td> </td><td> </td>
                         </tr>
                          <tr>
                            <td> </td><td> </td>
                         </tr>
                          <tr>
                            <td> </td><td> </td>
                         </tr><tr>
                            <td> </td><td> </td>
                         </tr><tr>
                            <td> </td><td> </td>
                         </tr>
                         
                        <tr>
                            <td align="center"><h2><strong>RECEIPT OF SERVICE</strong></h2><hr></td>
                         </tr>
                          
                         
                         <table align="left" width="100%" >
                         
                         <tr align="left"> <td> </td><td> </td></tr>
                         <tr align="left"> <td> </td><td> </td></tr>
                          <tr align="left"> <td> </td><td> </td></tr>
                         <tr align="left"> <td> </td><td> </td></tr>
                          <tr align="left"> <td> </td><td> </td></tr>
                         <tr align="left"> <td> </td><td> </td></tr>
                            <tr align="left">
                                <th align="left" width="30%"> <h4><strong>Name</strong></h4></th>
                                <td align="left" width="70%">'.$na.'</td>
                             </tr>
                             <tr align="left"> <td> </td><td> </td></tr>
                             <tr align="left">
                                <th align="left" width="30%"> <h4><strong>Email</strong></h4></th>
                                <td align="left" width="70%">'.$em.'</td>
                               
                           </tr>
                           <tr align="left"> <td> </td><td> </td></tr>
                           <tr align="left">
                                <th align="left" width="30%"> <h4><strong>Phone</strong></h4></th>
                                <td align="left" width="70%">'.$ph.'</td>
                               
                           </tr>
                           <tr align="left"> <td> </td><td> </td></tr>
                           <tr align="left">
                                <th align="left" width="30%"> <h4><strong>Address</strong></h4></th>
                                <td align="left" width="70%">'.$ad.'</td>
                               
                           </tr>
                           <tr align="left"> <td> </td><td> </td></tr>
                           <tr align="left">
                                <th align="left" width="30%"> <h4><strong>Service Type</strong></h4></th>
                                <td align="left" width="70%">'.$ty.'</td>
                               
                           </tr>
                           <tr align="left"> <td> </td><td> </td></tr>
                           <tr align="left">
                                <th align="left" width="30%"> <h4><strong>Issued By</strong></h4></th>
                                <td align="left" width="70%">'.$isby.'</td>
                               
                           </tr>
                           <tr align="left"> <td> </td><td> </td></tr>
                           <tr align="left">
                                <th align="left" width="30%"> <h4><strong>Issued On</strong></h4></th>
                                <td align="left" width="70%">'.$ison.'</td>
                               
                           </tr>
                           <tr align="left"> <td> </td><td> </td></tr>
                           <tr align="left">
                                <th align="left" width="30%"> <h4><strong>Amount</strong></h4></th>
                                <td align="left" width="70%">'.$am.'</td></tr>';
                        
                        if($cr){
                        
                        $html .='<tr align="left">
                                <th align="left" width="30%"> <h4><strong>Credit Card No</strong></h4></th>
                                <td align="left" width="70%">XXXX-XXXX-XXXX-'.$cr.'</td>
                               
                           </tr>';
                        }

                        if($ch){
                        
                        $html .='<tr align="left">
                                <th align="left" width="30%"> <h4><strong>Cheque No</strong></h4></th>
                                <td align="left" width="70%">'.$ch.'</td>
                               
                           </tr>';
                        }
                        $html .='</table>
                      </table></div>';
                    //print_r($html); exit;
                    //$mpdf->WriteHTML($stylesheet,1);
                    //$mpdf->WriteHTML($pdf_content,2);
                    $mpdf->WriteHTML($html);
                    $quotation = rand(1000, 9999);
                    $filenames = 'Invoice_' . time();
                    //    print_r($mpdf->Output()); exit;

                    $path = $mpdf->Output(Yii::getAlias('@backend') . '/web/uploads/pdf/' . $filenames . '.pdf', 'F');
                    $mail_sub1 = 'Wall Dressup-Receipt for service' . $filenames . '';
                    // $mail_sub2 = 'Wall Dressup-Receipt for service "' . $service . '" ( "' . $filenames . '.pdf" )';
                    $mail_sub2 = 'RECEIPT OF SERVICE';
                    $mail_body1 = "<p>Hi " . $issuedby . ",</p>";
                    $mail_body1 .= "A new receipt is created from Wall Dressup at backend. <br><br>";
                    $mail_body1 .= "Here with attached the pdf. <br><br>";
                    $mail_body1 .= "<strong>Regards, </strong><br>";
                    $mail_body1 .= "<strong>Wall Dressup </strong><br><br>";

                    $mail_body2 = "<p>Hi " . $username . ",</p>";
                    // $mail_body2 .= "A pdf receipt is generated for the payment of your requested service " . $service . ".<br>";
                    $mail_body2 .= "Kindly find the 'Receipt of Service' attached with this mail for your reference.<br><br>";
                    // $mail_body2 .= "Here with attached the pdf. <br><br>";
                    $mail_body2 .= "<strong>Regards, </strong><br>";
                    $mail_body2 .= "<strong>Wall Dressup </strong><br><br>";


                    $emailSend1 = Yii::$app->mailer->compose()
                            ->setFrom(['sumanasdev@gmail.com'])
                            ->setTo('banushree@arkinfotec.com')
                            ->setSubject($mail_sub1)
                            ->setHtmlBody($mail_body1)
                            ->attach(Yii::getAlias('@backend') . '/web/uploads/pdf/' . $filenames . '.pdf');
                    $emailSend1->send();

                    $emailSend2 = Yii::$app->mailer->compose()
                            ->setFrom(['sumanasdev@gmail.com'])
                            ->setTo($send_mail)
                            ->setSubject($mail_sub2)
                            ->setHtmlBody($mail_body2)
                            ->attach(Yii::getAlias('@backend') . '/web/uploads/pdf/' . $filenames . '.pdf');
                    $emailSend2->send();

                    if ($emailSend1 && $emailSend2) {
                        Yii::$app->getSession()->setFlash('success', 'Receipt generated successfully!!');
                        unset($session['Sms']);

                        return $this->redirect(array('/admin/site/index'));
                        //return $this->redirect(array('/admin/site/index?new'));
                    } else {

                        return $this->redirect(['create']);
                    }
                }
            }
        } else {
            return $this->redirect(['create']);
        }

        return $this->renderAjax('bookotp', [
                    'model' => $model,
                    'session_otp' => $session_otp,
        ]);
    }

}
