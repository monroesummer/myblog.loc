<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\Motivate */

$this->title = 'Создать Цель';
$this->params['breadcrumbs'][] = ['label' => 'Мотиватор', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="motivate-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
