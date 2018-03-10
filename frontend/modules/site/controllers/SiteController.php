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
class SiteController extends Controller
{
    /**
     * @inheritdoc
     */
    public function behaviors()
    {
        return [
            'access' => [
                'class' => AccessControl::className(),
                'only' => ['logout', 'signup'],
                'rules' => [
                   [
                    'actions' => ['login','error','changepassword','pages', 'bookotp', 'ajaxbookotp','mailme','mailmehome','mailmegeneral','calculators'],
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
    public function actions()
    {
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
    public function actionIndex()
    {
        return $this->render('index');
         $model = new Sms();

    
    return $this->render('/partials/_faq', [
                    'model' => $model,
        ]);
    }
    
     public function actionPages($slug)
    {
        return $this->render('/pages/'.$slug);
        //return $this->render('index', ['slugname' => $slug]);
    }
    
        
    
    public function actionMailme()
    {
//        $result =0;
        $model = new Sms();
        if (Yii::$app->request->isAjax) {
             $data = Yii::$app->request->post();
             $he1=  $data['he1'];
              $we1=  $data['we1'];
              $de1=  $data['de1'];
              $ra1=  $data['ra1'];
              $to1=  $data['to1'];
              $username=  $data['na1'];
              $email=  $data['em1'];
              if($data['form'] == 'royal'){
                    $mail_sub1 = 'Painting Tool-Royale-Play Calculation ' ;
                    $mail_body1 = "<p>Hi Admin,</p>";
                    $mail_body1 .= "A new rough estimation by a customer. <br><br>";
                    $mail_body1 .=  "Name: ".$username."<br>Email: ".$email." <br><br> Design: ".$de1."<br>";
                    $mail_body1 .=  "Height: ".$he1." <br>Width:  ".$we1." <br>Rate/SqFt:  ".$ra1." <br>Total: ".$to1."<br><br>";
                    $mail_body1 .= "<strong>Regards, </strong><br>";
                    $mail_body1 .= "<strong>Painting Tools </strong><br><br>";

                    $mail_sub2 = 'REQUEST FOR CALCULATION';
                    $mail_body2 = "<p>Hi ".$username.",</p>";
                    $mail_body2 .= "Here you find the calculation for your requested design.<br>Thank you. <br><br>";
                    $mail_body2 .= "Design: ".$de1."<br>";
                    $mail_body2 .= "Height: ".$he1." <br>Width:  ".$we1." <br>Rate/SqFt:  ".$ra1." <br>Total: ".$to1."<br><br>";
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
                        Yii::$app->getSession()->setFlash('success', 'Request sent successfully');
//                        $result =1;
                       // unset($session['Sms']);
                        echo "success"; exit;
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
    
    
     public function actionMailmehome()
    {
        $model = new Sms();
        if (Yii::$app->request->isAjax) {
            $data = Yii::$app->request->post();  
          //  print_r($data); exit;
            $room_name= array();
            $plan_name= array();
            $others = array();
            foreach($data['data'] as $value){
                 if(strpos($value['name'], 'room-name') !== false ){
                       $room_name[] = $value['value'];
                 }else if(strpos($value['name'], 'plan-name') !== false ){
                     $plan_name[] = $value['value'];
                 }else{
                     $others[$value['name']] = $value['value'];
                 }
                 
            }
            $price = ["Hatchling Plan" => "3000", "Baby Plan" => "6000", "Transformation Plan"=>"10000"];

            $mail_body = '';
            for($i = "0"; $i < count($room_name); $i++){
                $mail_body .= "<th>Room Name: </th><td>".$room_name[$i]."</td> <th> Plan Name: </th><td> ".$plan_name[$i]." </td><th> Rate: </th><td> ".$price[$plan_name[$i]]." </td>";
            }
             //print_r($others); exit;
//             print_r($others['name']); exit;
            //echo $mail_body; exit;
             
              if($data['form'] == 'home'){
                    $mail_sub1 = 'Painting Tool Home-Makeover Calculation ' ;
                    $mail_body1 = "<p>Hi Admin,</p>";
                    $mail_body1 .= "A new rough estimation by a customer. <br><br>";
                    $mail_body1 .=  "Name: ".$others['name']."<br>Email: ".$others['email']." <br>";
                    $mail_body1 .=  "Total: ".$others['total-price']." <br>";
                    $mail_body1 .= "<strong>Regards, </strong><br>";
                    $mail_body1 .= "<strong>Painting Tools </strong><br><br>";
                    $mail_body1 .= "<table cellpadding='10' cellspacing='10'>";
                    $mail_body1 .= "<tr><th>Room Name</th><th>Plan Name</th><th>Rate</th></tr>";
                    for($i = "0"; $i < count($room_name); $i++){
                        $mail_body1 .= "<tr><td>".$room_name[$i]." </td><td>".$plan_name[$i]." </td><td>".$price[$plan_name[$i]]." </td></tr>";
                    }
                    $mail_body1 .= "<tr><td colspan='2' align='center'><b>Total</b></td><td>".$others['total-price']." </td></tr>";
                    $mail_body1 .= "</table>";
                    
                    
                    $mail_sub2 = 'REQUEST FOR CALCULATION';
                    $mail_body2 = "<p>Hi ".$others['name'].",</p>";
                    $mail_body2 .= "Here you find the calculation for your requested plan.<br>Thank you. <br><br>";
                    $mail_body2 .= "<strong>Regards, </strong><br>";
                    $mail_body2 .= "<strong>Painting Tools </strong><br><br>";
                    $mail_body2 .= "<table>";
                    $mail_body2 .= "<tr><th>Room Name</th><th>Plan Name</th><th>Rate</th></tr>";
                    for($i = "0"; $i < count($room_name); $i++){
                        $mail_body2 .= "<tr><td>".$room_name[$i]." </td><td>".$plan_name[$i]." </td><td>".$price[$plan_name[$i]]." </td></tr>";
                    }
                    $mail_body2 .= "<tr><td colspan='2' align='center'><b>Total</b></td><td>".$others['total-price']." </td></tr>";
                    $mail_body2 .= "</table>";
                    
                     $emailSend1 = Yii::$app->mailer->compose()
                            ->setFrom(['sumanasdev@gmail.com'])
                            ->setTo('banushree@arkinfotec.com')
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
                        echo "success"; exit;
                    } else {
//                         Yii::$app->getSession()->setFlash('danger', 'Request not sent successfully');
                            echo "error";exit;
                    }
              }
            
        }
        
  
        
        return $this->renderAjax('/pages/home-makeover-calculator', [
                    'model' => $model,
        ]);
    }
    
    
    public function actionMailmegeneral(){
     
        if (Yii::$app->request->isAjax) {
            echo 'test'; exit;
            $data = Yii::$app->request->post();  
            
            
            
      }
        
        
        
        
        
        return $this->renderAjax('/pages/general-painting-calculator', [
                    'model' => $model,
        ]);
    }
    

    
  public function actionAjaxbookotp() {
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
                       // Yii::$app->getSession()->setFlash('success', 'Mail sent successfully');
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

public function actionRequestquote(){
     $model = new Sms();
               echo "testing"; exit;

      if ($model->load(Yii::$app->request->post())) {
          echo "test"; exit;
      }
    
    return $this->render('index', [
                    'model' => $model,
        ]);
}
   public function actionAjaxrequestquote(){
       
       if (Yii::$app->request->isAjax) {
           
           
       } 
   }

}
