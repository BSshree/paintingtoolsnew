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
                        'actions' => ['index', 'create', 'update', 'view', 'delete', 'verifyotp', 'pdfpage', 'gen-pdf', 'mPDF', 'otpset','bookotp','bookapp'],
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

        return $this->render('index', [
                    'searchModel' => $searchModel,
                    'dataProvider' => $dataProvider,
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
                    'creditno' => $creditno,
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
                'SetHeader' => ['Painting Tools'],
                'SetFooter' => ['{PAGENO}'],
            ]
        ]);

        $mpdf = $pdf->api;
        $mpdf->WriteHTML($pdf_content);
        $quotation = rand(1000, 9999);
        $filenames = 'Invoice_' . time();
        $path = $mpdf->Output(Yii::getAlias('@backend') . '/web/uploads/pdf/' . $filenames . '.pdf', 'F');
        $mail_sub1 = 'Painting Tool-Receipt for service' . $filenames . '';
        $mail_sub2 = 'Painting Tool-Receipt for service "' . $service . '" with file name "' . $filenames . '.pdf"';
        $mail_body1 = '<p>Hi Admin,</p>';
        $mail_body1 .= "A new receipt is created from Painting Tools at backend. <br><br>";
        $mail_body1 .= "Here with attached the pdf. <br><br>";
        $mail_body1 .= "<strong>Thanks, </strong>";
        $mail_body1 .= "<strong>Painting Tools </strong><br><br>";

        $mail_body2 = "<p>Hi " . $username . ",</p>";
        $mail_body2 .= "A pdf receipt is generated for the payment of your requested service " . $service . " .<br><br>";
        $mail_body2 .= "Here with attached the pdf. <br><br>";
        $mail_body2 .= "<strong>Thanks, </strong>";
        $mail_body2 .= "<strong>Painting Tools </strong><br><br>";


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
            Yii::$app->getSession()->setFlash('success', 'Receipt sent successfully');
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
        if ($model->load(Yii::$app->request->post())) {
            $post = Yii::$app->request->post();
            $phone = $post['Sms']['phone'];
            $token = 'rGdiHxtdXw';
           // $token = 'ZVDzjxMguN';
            $mobile = $post['Sms']['phone'];
            $rndno = rand(1000, 9999);

            $message = urlencode("Your otp number is " . $rndno);
            $site = 'FSTSMS';
            $url = "http://api.fast2sms.com/sms.php?token=" . $token . "&mob=" . $mobile . "&mess=" . $message . "&sender=" . $site . "&route=0";
            $homepage = file_get_contents($url);
            $otp = $rndno;
            $session['Sms'] = [
                'otp' => $otp,
                'phone' => $phone,
            ];
            $sp = $session['Sms']['otp'];
            $phone = $session['Sms']['phone'];
            if ($homepage) {
                Yii::$app->getSession()->setFlash('success', 'OTP number has been sent successfully !!!');
                return $this->redirect(['verifyotp']);
            } else {
                Yii::$app->getSession()->setFlash('danger', 'OTP not sent successfully. . .');
            }
        }

        return $this->render('create', [
                    'model' => $model,
                    'session_otp' => $session_otp,
        ]);
    }

    public function actionVerifyotp() {
        $model = new Sms();
        $session = Yii::$app->session;
        $session->open();
        $getting = Yii::$app->request->post('Sms');
//        $sp = $session['Sms']['otp'];
//                echo "<pre>"; print_r($sp); exit;
        if ((isset($session['Sms'])) || ($session['Sms']['otp'] && $session['Sms']['phone'])) {
            if ($model->load(Yii::$app->request->post())) {
                $sp = $session['Sms']['otp'];
                $post = Yii::$app->request->post();
                $type_otp = $post['Sms']['otp'];
                if ($type_otp == $sp) {
                    Yii::$app->getSession()->setFlash('success', 'OTP number is verified successfully !!!');
                    $phone = $session['Sms']['phone'];
                    unset($session['otp']);
                    unset($session['phone']);
                    $session['Sms'] = [
                        'newphone' => $phone,
                    ];
                    return $this->redirect(['pdfpage']);
                } else if (isset($_POST['button3'])) {
                    Yii::$app->getSession()->setFlash('');
                    // return $this->refresh();
                } else {

                    Yii::$app->getSession()->setFlash('danger', 'Entered wrong OTP number. Please try it again...');
                }
            }
        } else {
            return $this->redirect(['create',
                            // 'session_otp' => '',
            ]);
        }
        if (isset($_POST['button3'])) {
            if ($model->load(Yii::$app->request->post())) {
                $post = Yii::$app->request->post();
                $phone = $post['Sms']['phone'];
                $token = 'rGdiHxtdXw';
                $mobile = $post['Sms']['phone'];
                $rndno = rand(1000, 9999);

                $message = urlencode("Your otp number is " . $rndno);
                $site = 'FSTSMS';
                $url = "http://api.fast2sms.com/sms.php?token=" . $token . "&mob=" . $mobile . "&mess=" . $message . "&sender=" . $site . "&route=0";
                $homepage = file_get_contents($url);
                $otp = $rndno;
                $session['Sms'] = [
                    'otp' => $otp,
                    'phone' => $phone,
                ];
                $sp = $session['Sms']['otp'];
                if ($homepage) {
                    Yii::$app->getSession()->setFlash('success', 'OTP number has been sent successfully !!!');
                    return $this->redirect(['verifyotp']);
                } else {
                    Yii::$app->getSession()->setFlash('danger', 'OTP not sent successfully. . .');
                }
            }
        }
        return $this->render('verifyotp', array('model' => $model,
                    'session_otp' => $session['Sms']['otp'],
        ));
    }

    public function actionPdfpage() {
        $model = new Sms();
       // $model->scenario = 'pdfpage';
        $session = Yii::$app->session;
        $session->open();
        $newphone = $session['Sms']['newphone'];
        if ($newphone) {
            if ($model->load(Yii::$app->request->post())) {
                $post = Yii::$app->request->post();
                $cc = $post['Sms']['credit_no'];
                // $var = substr_replace($var, str_repeat("X", 8), 4, 8);
                $credit_no = 'XXXX-XXXX-XXXX-' . $cc;
                $session['Sms'] = [
                    'creditno' => $credit_no,
                ];
                
                $model->invoice_no = 'OR'. time();
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
//                $ser = $model->receipt_data;
//                $unser = unserialize($ser);
                if ($model->save()) {
                    $send_mail = $model->email;
                    $service = $model->type_service;
                    $username = $model->name;
                    $issuedby = $model->issued_by;

                    $pdf_content = $this->renderPartial('view-pdf', [
                        'model' => $model,
                    ]);
//                    echo $pdf_content; exit;
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
                            'SetHeader' => ['Painting tools'],
                            'SetFooter' => ['{PAGENO}'],
                        ]
                    ]);

                    $mpdf = $pdf->api;
                    $mpdf->WriteHTML($pdf_content);
                    $quotation = rand(1000, 9999);
                    $filenames = 'Invoice_' . time();
                    $path = $mpdf->Output(Yii::getAlias('@backend') . '/web/uploads/pdf/' . $filenames . '.pdf', 'F');
                    $mail_sub1 = 'Painting Tool-Receipt for service' . $filenames . '';
                    // $mail_sub2 = 'Painting Tool-Receipt for service "' . $service . '" ( "' . $filenames . '.pdf" )';
                    $mail_sub2 = 'RECEIPT OF SERVICE';
                    $mail_body1 = "<p>Hi " . $issuedby . ",</p>";
                    $mail_body1 .= "A new receipt is created from Painting Tools at backend. <br><br>";
                    $mail_body1 .= "Here with attached the pdf. <br><br>";
                    $mail_body1 .= "<strong>Regards, </strong><br>";
                    $mail_body1 .= "<strong>Painting Tools </strong><br><br>";

                    $mail_body2 = "<p>Hi " . $username . ",</p>";
                    // $mail_body2 .= "A pdf receipt is generated for the payment of your requested service " . $service . ".<br>";
                    $mail_body2 .= "Kindly find the 'Receipt of Service' attached with this mail for your reference.<br><br>";
                    // $mail_body2 .= "Here with attached the pdf. <br><br>";
                    $mail_body2 .= "<strong>Regards, </strong><br>";
                    $mail_body2 .= "<strong>Painting Tools </strong><br><br>";


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
                        Yii::$app->getSession()->setFlash('success', 'Receipt sent successfully');
                        unset($session['Sms']);
                        return $this->redirect(['create']);
                    } else {

                        return $this->redirect(['pdfpage']);
                    }
                }
            }
        } else {
            return $this->redirect(['create']);
        }
        $session_otp = '';
        return $this->render('pdfpage', [
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
    
    
    
    

}
