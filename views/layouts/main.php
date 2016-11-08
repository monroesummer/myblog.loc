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
        'brandLabel' => '<strong><span class="glyphicon glyphicon-leaf"></span> Мой блог</strong>',
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
            [
                'label' => '<span class="glyphicon glyphicon-bookmark"></span> Статьи',
                'url' => ['/site/category']
            ],
            [
                'label' => '<span class ="glyphicon glyphicon-info-sign"></span> О блоге',
                'url' => ['/site/about']
            ],
            Yii::$app->user->isGuest ? (
                [
                    'label' => '<span class="glyphicon glyphicon-sunglasses"></span> Панель администратора',
                    'url' => ['/site/login']]
            ) : (

            ['label' => '<span class="glyphicon glyphicon-sunglasses"></span> Панель Администратора', 'items' => [
                [
                    'label' => '<span class ="glyphicon glyphicon-wrench"></span> Конструкция сайта',
                    'url' => ['/site/construction']
                ],
                [
                    'label' => '<span class ="glyphicon glyphicon-hdd"></span> RESTful Web Service',
                    'url' => ['/site/restful']
                ],
                ['label' => '<span class="glyphicon glyphicon-book"></span> Категории', 'url' => ['/admin/category']],
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
            <em>
                <strong>
                    <small><span class="label label-success">Rustam Asylgareev Development</span></small>
                    <small><span class="label label-success"><abbr title="Phone">P:</abbr> 8 (917) 281-4527</span></small>
                        <small><span class="label label-success">Vk.com: <a href="https://vk.com/maxkruse" target="_blank">https://vk.com/maxkruse</a></span></small>
                </strong>
            </em>
            <br>
            <strong>
                <em>
                    <small><span class="label label-success">Email: <a href="mailto:rustamasylgareev@gmail.com">rustamasylgareev@gmail.com</a></span></small>
                    <small><span class="label label-success">Github: <a href="https://github.com/monroesummer" target="_blank">https://github.com/monroesummer</a></span></small>
                </em>
            </strong>
            <br>
        </p>
        <p class="pull-right">
            <em><strong><span class="label label-success">&copy; Мой блог <?= date('Y') ?></span></strong></em><br>
            <small> <em><strong><span class="label label-success"><?= Yii::powered() ?></span></strong></em></small>
        </p>
    </div>
</footer>

<?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage() ?>
