<?php

/* @var $this View */

/* @var $content string */

use devnullius\adminlte\assets\AdminLteAsset;
use devnullius\adminlte\assets\PluginAsset;
use yii\base\InvalidConfigException;
use yii\web\View;

AdminLteAsset::register($this);
try {
    $this->registerCssFile('https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700');
} catch (InvalidConfigException $e) {
    echo $e->getMessage();
}
try {
    $this->registerCssFile('https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css');
} catch (InvalidConfigException $e) {
    echo $e->getMessage();
}
PluginAsset::register($this)->add(['fontawesome', 'icheck-bootstrap']);
?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>">
<head>
    <meta charset="<?= Yii::$app->charset ?>">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title><?= Yii::$app->name ?></title>
    <!-- Tell the browser to be responsive to screen width -->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <?php $this->registerCsrfMetaTags() ?>
    <?php $this->head() ?>
</head>
<body class="hold-transition login-page">
<?php $this->beginBody() ?>
<div class="login-box">
    <div class="login-logo">
        <a href="<?= Yii::$app->homeUrl ?>"><b><?= Yii::$app->name ?></b></a>
    </div>
    <!-- /.login-logo -->

    <?= $content ?>
</div>
<!-- /.login-box -->

<?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage() ?>
