<?php

namespace backend\modules\admin\controllers;

use Yii;
use common\models\Faq;
use common\models\Sms;
use common\models\FaqSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\AccessControl;
use yii\filters\VerbFilter;

/**
 * FaqController implements the CRUD actions for Faq model.
 */
class FaqController extends Controller {

    /**
     * @inheritdoc
     */
    public function behaviors() {
        return [
            'access' => [
                'class' => AccessControl::className(),
                'rules' => [
                        [
                        'actions' => ['index', 'create', 'update', 'view', 'delete', 'bookotp', 'bookapp', 'ajaxbooktop', 'ajaxbookotp'],
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
     * Lists all Faq models.
     * @return mixed
     */
    public function actionIndex() {
        $searchModel = new FaqSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
                    'searchModel' => $searchModel,
                    'dataProvider' => $dataProvider,
        ]);
    }

    public function actionBookapp() {
        $searchModel = new FaqSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('bookapp', [
                    'searchModel' => $searchModel,
                    'dataProvider' => $dataProvider,
        ]);
    }

    public function actionAjaxbookotp() {
        if (Yii::$app->request->isAjax) {
            $session = Yii::$app->session;
            $json = array();
            $data = Yii::$app->request->post();
            if ($data['form'] == 'phone') {
               $token = 'rGdiHxtdXw';
              // $token = 'ZVDzjxMguN';
                $mobile = $data['req_val'];
                $rndno = rand(1000, 9999);
                $message = urlencode("Your otp number is " . $rndno);
                $site = 'FSTSMS';
                $url = "http://api.fast2sms.com/sms.php?token=" . $token . "&mob=" . $mobile . "&mess=" . $message . "&sender=" . $site . "&route=0";
                $homepage = file_get_contents($url);

                $session['Sms'] = [
                    'otp' => $rndno,
                    'phone' => $data['req_val'],
                ];
                $json["mgs"] = "success";
                $json["otp"] = $rndno;
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

   
  

    public function actionBookotp() {

        $model = new Sms();
       // $model->scenario = 'bookotp';
      //  $model->scenario = 'bookotp';
        $session = Yii::$app->session;
        $session->open();
        $session_otp = '';
        if ($model->load(Yii::$app->request->post())) {
            $post = Yii::$app->request->post();
            $username = $post['Sms']['name'];
                    $email = $post['Sms']['email'];
                    $message= $post['Sms']['mess'];
                    $phone= $session['Sms']['phone'];
                    $service= $post['Sms']['type_service'];
                    
                    $mail_sub1 = 'Painting Tool-Booking Appointment ' ;
                    $mail_sub2 = 'REQUEST FOR AN APPOINTMENT';
                    $mail_body1 = "<p>Hi Admin,</p>";
                    $mail_body1 .= "A new appointment is booked from customer. <br><br>";
                    $mail_body1 .=  "Name: ".$username."<br>Email: " .$email."<br>Phone: ".$phone."<br> Service: " .$service."<br> Message: " .$message."<br><br>";
                    $mail_body1 .= "<strong>Regards, </strong><br>";
                    $mail_body1 .= "<strong>Painting Tools </strong><br><br>";

                    $mail_body2 = "<p>Hi " . $username . ",</p>";
                    $mail_body2 .= "Thank you. We will contact you as soon as possible.<br><br>";
                   // $mail_body2 .= $email."<br> " .$message;
                    $mail_body2 .= "<strong>Regards, </strong><br>";
                    $mail_body2 .= "<strong>Painting Tools </strong><br><br>";

                     $emailSend1 = Yii::$app->mailer->compose()
                            ->setFrom(['sumanasdev@gmail.com'])
                            ->setTo('banushree@arkinfotec.com')
                            ->setSubject($mail_sub1)
                            ->setHtmlBody($mail_body1)
                            ->send();
                   $emailSend2 = Yii::$app->mailer->compose()
                            ->setFrom(['sumanasdev@gmail.com'])
                            ->setTo($email)
                            ->setSubject($mail_sub2)
                            ->setHtmlBody($mail_body2)
                            ->send();

                    if ($emailSend1 && $emailSend2) {
                        unset($session['Sms']);
                        echo "success"; exit;
                    } else {
                         // return $this->redirect(['site/index']);
                            echo "error";exit;
                    }
                  
        }
//        elseif (Yii::$app->request->isAjax) {
//            return $this->renderAjax('bookotp', [
//                        'model' => $model
//            ]);
//        }
        return $this->renderAjax('bookotp', [
                    'model' => $model,
                    'session_otp' => $session_otp,
        ]);
    }

    /**
     * Displays a single Faq model.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView($id) {
        return $this->render('view', [
                    'model' => $this->findModel($id),
        ]);
    }

    /**
     * Creates a new Faq model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate() {
        $model = new Faq();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['index']);
        }

        return $this->render('create', [
                    'model' => $model,
        ]);
    }

    /**
     * Updates an existing Faq model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($id) {
        $model = $this->findModel($id);
        if (Yii::$app->request->isAjax && $model->load(Yii::$app->request->post())) {
            Yii::$app->response->format = Response::FORMAT_JSON;
            return ActiveForm::validate($model);
        }

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            // return $this->redirect(['index']);
            Yii::$app->getSession()->setFlash('success', 'Status changed successfully');
            return $this->redirect(['index']);
        } elseif (Yii::$app->request->isAjax) {
            return $this->renderAjax('update', [
                        'model' => $model,
            ]);
        }

        return $this->render('update', [
                    'model' => $model,
        ]);
    }

    /**
     * Deletes an existing Faq model.
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
     * Finds the Faq model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Faq the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id) {
        if (($model = Faq::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }

}
