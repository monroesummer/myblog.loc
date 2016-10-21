<?php

/* @var $this \yii\web\View */
/* @var $content string */

use yii\helpers\Html;
use yii\bootstrap\Nav;
use yii\bootstrap\NavBar;
use yii\widgets\Breadcrumbs;
use app\assets\AppAsset;

AppAsset::register($this);
?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>">
<head>
    <meta charset="<?= Yii::$app->charset ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <?= Html::csrfMetaTags() ?>
    <title><?= Html::encode($this->title) ?></title>
    <?php $this->head() ?>
</head>
<body>
<?php $this->beginBody() ?>

<div class="wrap">
    <?php

    //Navbar begin here----------------------------------------------------------------------------------------
    NavBar::begin([
        'brandLabel' => '<span class="glyphicon glyphicon-leaf"></span> Мой блог',
        'brandUrl' => Yii::$app->homeUrl,
        'options' => [
            'class' => 'navbar navbar-default navbar-fixed-top',
        ],
    ]);
    echo Nav::widget([
        'encodeLabels' => false,
        'options' => ['class' => 'navbar-nav navbar-right'],
        'items' => [

            [
                'label' => '<span class="glyphicon glyphicon-home"></span> Главная',
                'url' => ['/site/index']
            ],
            ['label' => '<span class ="glyphicon glyphicon-info-sign"></span> О блоге', 'url' => ['/site/about']],
//            ['label' => 'Связаться со мной', 'url' => ['/site/contact']],
            Yii::$app->user->isGuest ? (
                [
                    'label' => '<span class="glyphicon glyphicon-sunglasses"></span> Панель администратора',
                    'url' => ['/site/login']]
            ) : (
//            ['label' => Yii::$app->user->identity->username, 'items' => [
            ['label' => '<span class="glyphicon glyphicon-sunglasses"></span> Панель Администратора', 'items' => [
                ['label' => '<span class="glyphicon glyphicon-star-empty"></span> Категории', 'url' => ['/admin/category']],
                ['label' => '<span class="glyphicon glyphicon-pencil"></span> Статьи', 'url' => ['/admin/post']],
                ['label' => '<span class="glyphicon glyphicon-send"></span> Комментарии', 'url' => ['/admin/comment']],
                [
                    'label' => '<span class="glyphicon glyphicon-remove-circle"></span> Выйти',
                    'url' => ['/site/logout'],
                    'linkOptions' => ['data-method' => 'post']]
            ]]
            )
        ],
    ]);
    NavBar::end();
    //Navbar end here----------------------------------------------------------------------------------------
    ?>







    <div class="container">
        <?= Breadcrumbs::widget([
            'links' => isset($this->params['breadcrumbs']) ? $this->params['breadcrumbs'] : [],
        ]) ?>
        <?= $content ?>
    </div>
</div>



<footer class="footer">
    <div class="container">

        <p class="pull-left">
            <em><strong><span class="label label-default">Рустам Асылгареев</span></strong></em><br>
            <em>Email: </em><a href="mailto:#">rustamasylgareev@gmail.com</a>
        </p>
        <p class="pull-right">
            &copy; Мой блог <?= date('Y') ?>
        </p>
    </div>
</footer>

<?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage() ?>
