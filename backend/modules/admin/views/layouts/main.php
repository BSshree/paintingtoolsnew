<?php
/* @var $this \yii\web\View */
/* @var $content string */

use backend\assets\AppAssetAdmin;
use yii\helpers\Html;
use yii\bootstrap\Nav;
use yii\bootstrap\NavBar;
use yii\widgets\Breadcrumbs;
use common\widgets\Alert;
use yii\bootstrap\Modal;

AppAssetAdmin::register($this);
//$this->registerCssFile("http://code.ionicframework.com/ionicons/1.5.2/css/ionicons.min.css");
?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>">
    <head>
        <meta charset="<?= Yii::$app->charset ?>">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <?= Html::csrfMetaTags() ?>
        <title><?= Html::encode($this->title) ?></title>
        <!--        
 <link href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.1/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
<link href="//cdnjs.cloudflare.com/ajax/libs/font-awesome/4.2.0/css/font-awesome.min.css" rel="stylesheet" type="text/css" />
<link href="//code.ionicframework.com/ionicons/1.5.2/css/ionicons.min.css" rel="stylesheet" type="text/css" /> -->

        <?php $this->head() ?>
    </head>
    <body class="skin-blue">
        <?php $this->beginBody() ?>
        <?php echo $this->render('@backend/modules/admin/views/layouts/_headerBar'); ?> 
       
            <?php echo $this->render('@backend/modules/admin/views/layouts/_sidebarNav'); ?>  
            <div class="content-wrapper">
                <section class="content-header">
                    <h1>
                        <?= Html::encode($this->title) ?>
                    </h1>
                    <?=
                    Breadcrumbs::widget([
                        'homeLink' => [
                            'label' => Yii::t('yii', 'Dashboard'),
                            'url' => Yii::$app->homeUrl,
                        ],
                        'links' => isset($this->params['breadcrumbs']) ? $this->params['breadcrumbs'] : [],
                    ])
                    ?>
                  
                <?php echo $content; ?>
                     
                     </section>
            </div>
        <?php $this->endBody() ?>
    </body>
</html>
<?php $this->endPage() ?>