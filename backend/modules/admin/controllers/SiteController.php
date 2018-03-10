<?php
namespace backend\modules\admin\controllers;

use Yii;
use yii\web\Controller;
use yii\filters\VerbFilter;
use yii\filters\AccessControl;
use common\models\LoginForm;
use common\models\User;
use common\models\Userprofile;
use common\models\SignupForm;

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
                'rules' => [
                    [
                        'actions' => ['login','profile', 'error','changepassword','updateprofile','register','signup'],
                        'allow' => true,
                    ],
                    [
                        'actions' => ['logout', 'index'],
                        'allow' => true,
                        'roles' => ['@'],
                    ],
                ],
            ],
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
//                  /  'logout' => ['post'],
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
        ];
    }

    /**
     * Displays homepage.
     *
     * @return string
     */
    public function actionIndex()
    {
        return $this->render('index');
    }

    /**
     * Login action.
     *
     * @return string
     */
    public function actionLogin()
    {
         $this->layout = "@app/modules/admin/views/layouts/login";
         
        if (!Yii::$app->user->isGuest) {
            return $this->goHome();
        }

        $model = new LoginForm();
        if ($model->load(Yii::$app->request->post()) && $model->login()) {
             $this->redirect(array('/admin/receipt/create'));
        }     

         return $this->render('login', [
                'model' => $model,
            ]);
    }
    
    public function actionSignup()
    {
         $this->layout = "@app/modules/admin/views/layouts/login";

        $model = new SignupForm();
        if ($model->load(Yii::$app->request->post())) {
            if ($user = $model->signup()) {
                if (Yii::$app->getUser()->login($user)) {
                    $this->redirect(array('/admin/site/login'));
                }
            }
        }

        return $this->render('signup', [
            'model' => $model,
        ]);
    }

    /**
     * Logout action.
     *
     * @return string
     */
    public function actionLogout() {

        Yii::$app->user->logout();
        $this->redirect(array('/admin/site/login'));
    }
    
   
     public function actionProfile() {
        $this->layout = "@app/modules/admin/views/layouts/main";
        $model = $this->findModel(Yii::$app->user->getId());
        $id=Yii::$app->user->getId();
     
        if (($model->load(Yii::$app->request->post())) && $model->validate() ) {

            $post = Yii::$app->request->post();
            $model->username = $post['User']['username'];
            $model->email = $post['User']['email'];
            
            if ( $model->save()) {
                Yii::$app->getSession()->setFlash('success', 'Profile updated successfully!!!');
               // return $this->redirect(['site/updateprofile', 'id' => $model->id]);
            }
      }
       return $this->render('updateprofile', [
                            'model' => $model,
                ]);
     }
     
     public function actionChangepassword1() {
        $model = $this->findModel(Yii::$app->user->getId());
         $model->scenario = 'changepassword';
        // $model->scenario = 'changepassword';

        if ($model->load(Yii::$app->request->post()) ) {
            $pwd_details = Yii::$app->request->post();
            $model->password = $pwd_details['User']['oldpass'];
            $model->password = $pwd_details['User']['newpass'];
            $model->password = $pwd_details['User']['repeatnewpass'];

            if ($pwd_details['User']['newpass'] == $pwd_details['User']['repeatnewpass']) {
                $model->save();
                Yii::$app->getSession()->setFlash('success', 'Changed the password successfully!!!');
                $this->redirect(array('/admin/site/changepassword'));
            } else {
                Yii::$app->getSession()->setFlash('error', 'Changed does not match!!!');
                return $this->redirect(['/admin/site/changepassword']);
            }
        } else {
            return $this->render('changepassword', [
                        'model' => $model,
            ]);
        }
    }
    
     public function actionChangepassword() {
        $model = $this->findModel(Yii::$app->user->getId());
        $model->scenario = 'changepassword';
        if ($model->load(Yii::$app->request->post()) && $model->validate()) {
            $model->password_hash = Yii::$app->getSecurity()->generatePasswordHash($model->newpass);
            $model->save();
            Yii::$app->getSession()->setFlash('success', 'Password changed successfully!!!');
            return $this->redirect(['/admin/site/changepassword']);
        }
        return $this->render('changepassword', [
                    'model' => $model,
        ]);
    }
    
     
      protected function findModel($id) {
        if (($model = User::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}
