<?php

namespace frontend\modules\site\controllers;

use Yii;
use yii\base\InvalidParamException;
use yii\web\BadRequestHttpException;
use yii\web\Controller;
use yii\filters\VerbFilter;
use yii\filters\AccessControl;
use common\models\Sms;

/**
 * Site controller
 */
class SiteController extends Controller {

    /**
     * @inheritdoc
     */
    public function behaviors() {
        return [
            'access' => [
                'class' => AccessControl::className(),
                'only' => ['logout', 'signup'],
                'rules' => [
                        [
                        'actions' => ['login', 'error', 'changepassword', 'pages', 'bookotp', 'ajaxbookotp', 'mailme', 'mailmehome', 'mailmegeneral', 'calculators','contactus'],
                        'allow' => true,
                    ],
//                    [
//                        'actions' => ['logout','index'],
//                        'allow' => true,
//                        'roles' => ['@'],
//                    ],
                ],
            ],
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                //   'logout' => ['post'],
                ],
            ],
        ];
    }

    /**
     * @inheritdoc
     */
    public function actions() {
        return [
            'error' => [
                'class' => 'yii\web\ErrorAction',
            ],
            'captcha' => [
                'class' => 'yii\captcha\CaptchaAction',
                'fixedVerifyCode' => YII_ENV_TEST ? 'testme' : null,
            ],
        ];
    }

    /**
     * Displays homepage.
     *
     * @return mixed
     */
    public function actionIndex() {
        return $this->render('index');
        $model = new Sms();


        return $this->render('/partials/_faq', [
                    'model' => $model,
        ]);
    }

    public function actionPages($slug) {
        return $this->render('/pages/' . $slug);
        //return $this->render('index', ['slugname' => $slug]);
    }

    public function actionMailme() {
        $model = new Sms();
        if (Yii::$app->request->isAjax) {
            $data = Yii::$app->request->post();
            $he1 = $data['he1'];
            $we1 = $data['we1'];
            $de1 = $data['de1'];
            $ra1 = $data['ra1'];
            $to1 = $data['to1'];
            $username = $data['na1'];
            $email = $data['em1'];
            $phone = $data['ph1'];
            if ($data['form'] == 'royal') {
                $mail_sub1 = 'Royale-Play Estimation Request';
                $mail_body1 = "<p>Hi Admin,</p>";
                $mail_body1 .= "A new royale play estimation request has been initiated by the customer. <br><br>";
                $mail_body1 .= "Name: " . $username . "<br>Email: " . $email . " <br>Phone: " . $phone ."<br><br>";
                $mail_body1 .= "<table cellpadding='10' border='1' >";
                $mail_body1 .= "<tr><th>Design Name </th><td>".$de1."</td></tr>";
                $mail_body1 .= "<tr><th>Height</th><td>".$he1."</td></tr>";
                $mail_body1 .= "<tr><th>Width </th><td>".$we1."</td></tr>";
                $mail_body1 .= "<tr><th>Rate/Sqft(in Rs.) </th><td>".$ra1."</td></tr>";
                $mail_body1 .= "<tr><th>Total(in Rs.)</th><td><b>" .$to1 . "</b></td></tr>";
                $mail_body1 .= "</table><br><br>";
//                $mail_body1 .= "Height: " . $he1 . " <br>Width:  " . $we1 . " <br>Rate/SqFt:  " . $ra1 . " <br><b>Total: " . $to1 . "</b><br><br>";
                $mail_body1 .= "<strong>Regards, </strong><br>";
                $mail_body1 .= "<strong>Wall Dressup </strong><br><br>";

                $mail_sub2 = 'Royale-Play Service Estimation';
                $mail_body2 = "<p>Hi " . $username . ",</p>";
                $mail_body2 .= "Kindly find the estimation for your Royale-Play calculation request.<br><br>Thank you. <br><br>";
                $mail_body2 .= "<table cellpadding='10' border='1' >";
                $mail_body2 .= "<tr><th>Design Name </th><td>".$de1."</td></tr>";
                $mail_body2 .= "<tr><th>Height</th><td>".$he1."</td></tr>";
                $mail_body2 .= "<tr><th>Width </th><td>".$we1."</td></tr>";
                $mail_body2 .= "<tr><th>Rate/Sqft(in Rs.) </th><td>".$ra1."</td></tr>";
                $mail_body2 .= "<tr><th>Total(in Rs.)</th><td><b>" .$to1 . "</b></td></tr>";
                $mail_body2 .= "</table><br><br>";
                $mail_body2 .= "<strong>Regards, </strong><br>";
                $mail_body2 .= "<strong>Wall Dressup </strong><br><br>";

                $emailSend1 = Yii::$app->mailer->compose()
                        ->setFrom(['sumanasdev@gmail.com'])
                        ->setTo('arumugabalaji@gmail.com')
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
                    Yii::$app->getSession()->setFlash('success', 'Request sent successfully');
//                        $result =1;
                    // unset($session['Sms']);
                    echo "success";
                    exit;
                } else {
                    // return $this->redirect(['site/index']);
                    Yii::$app->getSession()->setFlash('danger', 'Request not sent successfully');
                    //  echo "error";exit;
                }
            }
        }



        return $this->renderAjax('/pages/royale-play', [
                    'model' => $model,
        ]);
    }

    public function actionMailmehome() {
        $model = new Sms();
        if (Yii::$app->request->isAjax) {
            $data = Yii::$app->request->post();
            $plan_name = array();
            $room_name = array();
            $others = array();
            foreach ($data['data'] as $value) {
                if (strpos($value['name'], 'room-name') !== false) {
                    $room_name[] = $value['value'];
                } else if (strpos($value['name'], 'plan-name') !== false) {
                    $plan_name[] = $value['value'];
                } else {
                    $others[$value['name']] = $value['value'];
                }
            }
            $price = ["Hatchling Plan" => "3000", "Baby Plan" => "6000", "Transformation Plan" => "10000"];

            $mail_body = '';
            for ($i = "0"; $i < count($room_name); $i++) {
                $mail_body .= "<th>Room Name: </th><td>" . $room_name[$i] . "</td> <th> Plan: </th><td> " . $plan_name[$i] . " </td><th> Rate: </th><td> " . $price[$plan_name[$i]] . " </td>";
            }

            if ($data['form'] == 'home') {
                $mail_sub1 = 'Home Makeover Estimation Request';
                $mail_body1 = "<p>Hi Admin,</p>";
                $mail_body1 .= "A new home makeover estimation request has been initiated by the customer. <br><br>";
                $mail_body1 .= "Name: " . $others['name'] . "<br>Email: " . $others['email'] . " <br>Phone: " . $others['phone'] . "<br><br>";
                //$mail_body1 .= "<b>Total: " . $others['home-total'] . " </b><br>";
                $mail_body1 .= "<table cellpadding='10' border='1' >";
                $mail_body1 .= "<tr><th>Room Name</th><th>Plan</th><th>Rate(in Rs.)</th></tr>";
                for ($i = "0"; $i < count($room_name); $i++) {
                    $mail_body1 .= "<tr><td>" . $room_name[$i] . " </td><td>" . $plan_name[$i] . " </td><td>" . $price[$plan_name[$i]] . " </td></tr>";
                }
                $mail_body1 .= "<tr><td colspan='2' align='center'><b>Total(in Rs.)</b></td><td><b>" . $others['home-total'] . " </b></td></tr>";
                $mail_body1 .= "</table>";
                $mail_body1 .= "<br><br><strong>Regards, </strong><br>";
                $mail_body1 .= "<strong>Wall Dressup </strong><br><br>";

                $mail_sub2 = 'Home Makeover Service Estimation';
                $mail_body2 = "<p>Hi " . $others['name'] . ",</p>";
                $mail_body2 .= "Kindly find the estimation for your Home Makeover calculation request.<br>Thank you. <br><br>";
                $mail_body2 .= "<table cellpadding='10' border='1'>";
                $mail_body2 .= "<tr><th>Room Name</th><th>Plan</th><th>Rate(in Rs.)</th></tr>";
                for ($i = "0"; $i < count($room_name); $i++) {
                    $mail_body2 .= "<tr><td>" . $room_name[$i] . " </td><td>" . $plan_name[$i] . " </td><td>" . $price[$plan_name[$i]] . " </td></tr>";
                }
                $mail_body2 .= "<tr><td colspan='2' align='center'><b>Total(in Rs.)</b></td><td><b>" . $others['home-total'] . "</b></td></tr>";
                $mail_body2 .= "</table>";
                $mail_body2 .= "<br><br><strong>Regards, </strong><br>";
                $mail_body2 .= "<strong>Wall Dressup </strong><br><br>";

                $emailSend1 = Yii::$app->mailer->compose()
                        ->setFrom(['sumanasdev@gmail.com'])
                        ->setTo('arumugabalaji@gmail.com')
                        ->setSubject($mail_sub1)
                        ->setHtmlBody($mail_body1)
                        ->send();
                $emailSend2 = Yii::$app->mailer->compose()
                        ->setFrom(['sumanasdev@gmail.com'])
                        ->setTo($others['email'])
                        ->setSubject($mail_sub2)
                        ->setHtmlBody($mail_body2)
                        ->send();

                if ($emailSend1 && $emailSend2) {
                    // unset($session['Sms']);
                    echo "success";
                    exit;
                } else {
//                         Yii::$app->getSession()->setFlash('danger', 'Request not sent successfully');
                    echo "error";
                    exit;
                }
            }
        }



        return $this->renderAjax('/pages/home-makeover-calculator', [
                    'model' => $model,
        ]);
    }

    public function actionMailmegeneral() {

        if (Yii::$app->request->isAjax) {
            $data = Yii::$app->request->post();


            if ($data['general'] == 'general') {

                $mail_sub1 = 'General Painting Estimation Request';
                $mail_body1 = "<p>Hi Admin,</p>";
                $mail_body1 .= "A new general painting estimation request has been initiated by the customer. <br><br>";
                $mail_body1 .= "Name: " . $data['name'] . "<br>Email: " . $data['email'] . " <br>Phone: " . $data['phone'] . "<br><br>";
                $mail_body1 .= "<table  cellpadding='10' border='1'>";
                $mail_body1 .= "<tr><th>Paint type</th><th>Room Name</th><th>Paint</th><th>Approximate Sqft</th><th>Rate(in Rs.)</th><th>Amount(in Rs.)</th></tr>";
                if (!empty($data['interior'])) {
                     foreach ($data['interior'] as $item){ 
                         if (array_key_exists("'radio1'", $item)) { 
                             $mail_body1 .= "<tr><td colspan='6'><b>Interior</b></td></tr>";
                             break;
                         }
                     }
                    foreach ($data['interior'] as $value) {
                        if (array_key_exists('fresh', $value)) {
                            $type = $value['fresh'];
                            $mail_body1 .= "<tr><td> " . ucfirst($value["'radio1'"]). "</td><td>" . $value["'room-name1'"] . " </td><td> " . $type . "</td><td>" . $value["'appr-sqft1'"] . "</td><td>" . $value["'rate'"] . "</td><td>" . $value["'amount'"] . "</td></tr>";
                        } else if (array_key_exists('repaint', $value)) {
                            $type = $value['repaint'];
                            $mail_body1 .= "<tr><td> " . ucfirst($value["'radio1'"]) . "</td><td>" . $value["'room-name1'"] . " </td><td> " . $type . "</td><td>" . $value["'appr-sqft1'"] . "</td><td>" . $value["'rate'"] . "</td><td>" . $value["'amount'"] . "</td></tr>";
                        } else {

                            $type = "-";
                        }
                    }
                }

                if (!empty($data['exterior'])) {
                     foreach ($data['exterior'] as $item){ 
                         if (array_key_exists("'radio2'", $item)) { 
                             $mail_body1 .= "<tr><td colspan='6'><b>Exterior</b></td></tr>";
                             break;
                         }
                     }
                     
                    foreach ($data['exterior'] as $value) {
                        if (array_key_exists('fresh', $value)) {
                            $type = $value['fresh'];
                            $mail_body1 .= "<tr><td> " . ucfirst($value["'radio2'"]) . "</td><td>" . $value["'room-name1'"] . " </td><td> " . $type . "</td><td>" . $value["'appr-sqft1'"] . "</td><td>" . $value["'rate2'"] . "</td><td>" . $value["'amount'"] . "</td></tr>";
                        } else if (array_key_exists('repaint', $value)) {
                            $type = $value['repaint'];
                            $mail_body1 .= "<tr><td> " . ucfirst($value["'radio2'"]) . "</td><td>" . $value["'room-name1'"] . " </td><td> " . $type . "</td><td>" . $value["'appr-sqft1'"] . "</td><td>" . $value["'rate2'"] . "</td><td>" . $value["'amount'"] . "</td></tr>";
                        } else {
                            $type = "-";
                        }
                    }
                }
                
                $mail_body1 .= "<tr><td  colspan='5'><b>Total(in Rs.)</b></td><td><b>".$data['general-total']."</b></td></tr>";
                $mail_body1 .= "</table><br><br><strong>Regards, </strong><br>";
                $mail_body1 .= "<strong>Wall Dressup </strong><br><br>";

        
                                
                $mail_sub2 = 'General Painting Service Estimation ';
                $mail_body2 = "<p>Hi " . $data['name'] . "</p>";
                $mail_body2 .= "Kindly find the estimation for your General Painting calculation request. <br><br>";
                $mail_body2 .= "Name: " . $data['name'] . "<br>Email: " . $data['email'] . " <br>Phone: " . $data['phone'] . "<br><br>";
                $mail_body2 .= "<table cellpadding='10' border='1'>";
                $mail_body2 .= "<tr><th>Paint type</th><th>Room Name</th><th>Paint</th><th>Approximate Sqft</th><th>Rate(in Rs.)</th><th>Amount(in Rs.)</th></tr>";         
                 if (!empty($data['interior'])) {
                     foreach ($data['interior'] as $item){ 
                         if (array_key_exists("'radio1'", $item)) { 
                             $mail_body2 .= "<tr><td colspan='6'><b>Interior</b></td></tr>";
                             break;
                         }
                     }
                    
                    foreach ($data['interior'] as $value) {
                        if (array_key_exists('fresh', $value)) {
                            $type = $value['fresh'];
                            $mail_body2 .= "<tr><td> " .ucfirst($value["'radio1'"]) . "</td><td>" . $value["'room-name1'"] . " </td><td> " . $type . "</td><td>" . $value["'appr-sqft1'"] . "</td><td>" . $value["'rate'"] . "</td><td>" . $value["'amount'"] . "</td></tr>";
                        } else if (array_key_exists('repaint', $value)) {
                            $type = $value['repaint'];
                            $mail_body2 .= "<tr><td> " . ucfirst($value["'radio1'"]) . "</td><td>" . $value["'room-name1'"] . " </td><td> " . $type . "</td><td>" . $value["'appr-sqft1'"] . "</td><td>" . $value["'rate'"] . "</td><td>" . $value["'amount'"] . "</td></tr>";
                        } else {

                            $type = "-";
                        }
                    }
                }

                if (!empty($data['exterior'])) {
                    foreach ($data['exterior'] as $item){ 
                         if (array_key_exists("'radio2'", $item)) { 
                             $mail_body2 .= "<tr><td colspan='6'><b>Exterior</b></td></tr>";
                             break;
                         }
                     }
                     
                    
                    foreach ($data['exterior'] as $value) {
                        if (array_key_exists('fresh', $value)) {
                            $type = $value['fresh'];
                            $mail_body2 .= "<tr><td> " . ucfirst($value["'radio2'"] ). "</td><td>" . $value["'room-name1'"] . " </td><td> " . $type . "</td><td>" . $value["'appr-sqft1'"] . "</td><td>" . $value["'rate2'"] . "</td><td>" . $value["'amount'"] . "</td></tr>";
                        } else if (array_key_exists('repaint', $value)) {
                            $type = $value['repaint'];
                            $mail_body2 .= "<tr><td> " . ucfirst($value["'radio2'"]) . "</td><td>" . $value["'room-name1'"] . " </td><td> " . $type . "</td><td>" . $value["'appr-sqft1'"] . "</td><td>" . $value["'rate2'"] . "</td><td>" . $value["'amount'"] . "</td></tr>";
                        } else {
                            $type = "-";
                        }
                    }
                }                
                  
                $mail_body2 .= "<tr><td  colspan='5'><b>Total(in Rs.)</b></td><td><b>".$data['general-total']."</b></td></tr>";
                $mail_body2 .= "</table><br><br><strong>Regards, </strong><br>";
                $mail_body2 .= "<strong>Wall Dressup </strong><br><br>";

                $emailSend1 = Yii::$app->mailer->compose()
                        ->setFrom(['sumanasdev@gmail.com'])
                        ->setTo('arumugabalaji@gmail.com')
                        ->setSubject($mail_sub1)
                        ->setHtmlBody($mail_body1)
                        ->send();
                $emailSend2 = Yii::$app->mailer->compose()
                        ->setFrom(['sumanasdev@gmail.com'])
                        ->setTo($data['email'])
                        ->setSubject($mail_sub2)
                        ->setHtmlBody($mail_body2)
                        ->send();
                if ($emailSend1 && $emailSend2) {
                   $json=array();
                    $json["mgs"] = "success";
                    echo json_encode($json);
                    exit;
                } else {
                    echo "error";
                    exit;
                }
            }
        }

        return $this->renderAjax('/pages/general-painting-calculator');
                   // 'model' => $model,
//        ]);
    }

    public function actionAjaxbookotp() {
        if (Yii::$app->request->isAjax) {
            $session = Yii::$app->session;
            $json = array();
            $data = Yii::$app->request->post();
            if ($data['form'] == 'phone') {
                $token = 'rGdiHxtdXw';
//                $token = 'ZVDzjxMguN';
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

    public function actionBookotp() {

        $model = new Sms();
        $session = Yii::$app->session;
        $session->open();
        $session_otp = '';
        if ($model->load(Yii::$app->request->post())) {
            $post = Yii::$app->request->post();
            $username = $post['Sms']['name1'];
            $email = $post['Sms']['email1'];
            $message = $post['Sms']['mess'];
            $phone = $session['Sms']['phone'];
            $service = $post['Sms']['type_service'];
            $plans = $post['Sms']['plan'];

            $mail_sub1 = 'Book An Appointment-Request for service ';
            $mail_sub2 = 'Service Request Acknowledgement';
            $mail_body1 = "<p>Hi Admin,</p>";
            $mail_body1 .= "You have received a new service enquiry from the customer. <br><br>";
            $mail_body1 .= "<table cellpadding='10' border='1' >";
            $mail_body1 .= "<tr><th>Name: </th><td>".$username."</td></tr>";
            $mail_body1 .= "<tr><th>Email:</th><td>".$email."</td></tr>";
            $mail_body1 .= "<tr><th>Phone: </th><td>".$phone."</td></tr>";
            //$mail_body1 .= "Name: " . $username . "<br>Email: " . $email . "<br>Phone:  " . $phone . "<br> Service:  " . $service . "<br> Message: " . $message . "<br>";
           if(!empty($plans)){
            $mail_body1 .= "<tr><th>Plan Name: </th><td>" . $plans ."</td></tr>";
           }
            $mail_body1 .= "<tr><th>Service: </th><td>".$service."</td></tr>";
            $mail_body1 .= "<tr><th>Message: </th><td>".$message."</td></tr>";
            $mail_body1 .= "</table><br><br>";
            $mail_body1 .= "<br><strong>Regards, </strong><br>";
            $mail_body1 .= "<strong>Wall Dressup</strong><br><br>";

            $mail_body2 = "<p>Hi " . $username . ",</p>";
            $mail_body2 .= "Thank you for contacting us!<br>We will get back to you at the earliest.<br><br>";
            // $mail_body2 .= $email."<br> " .$message;
            $mail_body2 .= "<strong>Regards, </strong><br>";
            $mail_body2 .= "<strong>Wall Dressup </strong><br><br>";

            $emailSend1 = Yii::$app->mailer->compose()
                    ->setFrom(['sumanasdev@gmail.com'])
                    ->setTo('arumugabalaji@gmail.com')
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
                // Yii::$app->getSession()->setFlash('success', 'Mail sent successfully');
                unset($session['Sms']);
                echo "success";
                exit;
//                $json=array();
//                    $json["mgs"] = "success";
//                    echo json_encode($json);
//                    exit;
            } else {
                // return $this->redirect(['site/index']);
                echo "error";
                exit;
            }
        }

        return $this->renderAjax('bookotp', [
                    'model' => $model,
                    'session_otp' => $session_otp,
        ]);
    }

    public function actionRequestquote() {
        $model = new Sms();
         if (Yii::$app->request->isAjax) {
            $data = Yii::$app->request->post();
        
            $na1 = $data['na1'];
            $em1 = $data['em1'];
            $ph1 = $data['ph1'];
            $mes1 = $data['mes1'];
            if ($data['form'] == 'quote') {
                $mail_sub1 = 'Request A Quote';
                $mail_body1 = "<p>Hi Admin,</p>";
                $mail_body1 .= "You have a new Quote-request. <br><br>";
                $mail_body1 .= "<table cellpadding='10' border='1' >";
                $mail_body1 .= "<tr><th>Name: </th><td>".$na1."</td></tr>";
                $mail_body1 .= "<tr><th>Email:</th><td>".$em1."</td></tr>";
                $mail_body1 .= "<tr><th>Phone: </th><td>".$ph1."</td></tr>";
                $mail_body1 .= "<tr><th>Message: </th><td>".$mes1."</td></tr>";
                $mail_body1 .= "</table><br><br>";
               // $mail_body1 .= "Name: " . $na1 . "<br>Email: " . $em1 . " <br> Phone: " . $ph1 . "<br>Message: " . $mes1 . "<br><br>";
                $mail_body1 .= "<strong>Regards, </strong><br>";
                $mail_body1 .= "<strong>Wall Dressup </strong><br><br>";

                $mail_sub2 = 'Request A Quote';
                $mail_body2 = "<p>Hi " . $na1 . ",</p>";
                $mail_body2 .= "Thank you for contacting us!<br>We will get back to you at the earliest.<br><br>";
                $mail_body2 .= "<strong>Regards, </strong><br>";
                $mail_body2 .= "<strong>Wall Dressup </strong><br><br>";

                $emailSend1 = Yii::$app->mailer->compose()
                        ->setFrom(['sumanasdev@gmail.com'])
                        ->setTo('arumugabalaji@gmail.com')
                        ->setSubject($mail_sub1)
                        ->setHtmlBody($mail_body1)
                        ->send();
                $emailSend2 = Yii::$app->mailer->compose()
                        ->setFrom(['sumanasdev@gmail.com'])
                        ->setTo($em1)
                        ->setSubject($mail_sub2)
                        ->setHtmlBody($mail_body2)
                        ->send();

                if ($emailSend1 && $emailSend2) {
                   //$json=array();
                   // $json["mgs"] = "success";
                    //echo json_encode($json);
                    echo "success";
                    exit;
                } else {
                     echo "error";exit;
                }
            }
        }



       return $this->renderAjax('index', [
                    'model' => $model,
        ]);
    }
        

    public function actionContactus(){
         $model = new Sms();
        
          if (Yii::$app->request->isAjax) {
            $data = Yii::$app->request->post();
        
            $na1 = $data['na1'];
            $em1 = $data['em1'];
            $ph1 = $data['ph1'];
            $mes1 = $data['mes1'];
            if ($data['form'] == 'contact') {
                $mail_sub1 = 'Enquire A Request';
                $mail_body1 = "<p>Hi Admin,</p>";
                $mail_body1 .= "You have a new enquiry. <br><br>";
                $mail_body1 .= "<table cellpadding='10' border='1' >";
                $mail_body1 .= "<tr><th>Name: </th><td>".$na1."</td></tr>";
                $mail_body1 .= "<tr><th>Email:</th><td>".$em1."</td></tr>";
                $mail_body1 .= "<tr><th>Phone: </th><td>".$ph1."</td></tr>";
                $mail_body1 .= "<tr><th>Message: </th><td>".$mes1."</td></tr>";
                $mail_body1 .= "</table><br><br>";
               // $mail_body1 .= "Name: " . $na1 . "<br>Email: " . $em1 . " <br> Phone: " . $ph1 . "<br>Message: " . $mes1 . "<br><br>";
                $mail_body1 .= "<strong>Regards, </strong><br>";
                $mail_body1 .= "<strong>Wall Dressup </strong><br><br>";

                $mail_sub2 = 'Enquire A Request';
                $mail_body2 = "<p>Hi " . $na1 . ",</p>";
                $mail_body2 .= "Thank you for contacting us!<br>We will get back to you at the earliest.<br><br>";
                $mail_body2 .= "<strong>Regards, </strong><br>";
                $mail_body2 .= "<strong>Wall Dressup </strong><br><br>";

                $emailSend1 = Yii::$app->mailer->compose()
                        ->setFrom(['sumanasdev@gmail.com'])
                        ->setTo('arumugabalaji@gmail.com')
                        ->setSubject($mail_sub1)
                        ->setHtmlBody($mail_body1)
                        ->send();
                $emailSend2 = Yii::$app->mailer->compose()
                        ->setFrom(['sumanasdev@gmail.com'])
                        ->setTo($em1)
                        ->setSubject($mail_sub2)
                        ->setHtmlBody($mail_body2)
                        ->send();

                if ($emailSend1 && $emailSend2) {
                   //$json=array();
                   // $json["mgs"] = "success";
                    //echo json_encode($json);
                    echo "success";
                    exit;
                } else {
                     echo "error";exit;
                }
            }
        }
         
         
         return $this->render('contactus', [
                    'model' => $model,
        ]);
    }
    

}
