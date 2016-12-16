<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Motivate */

$this->title = 'Обновить Цель: ' . $model->target;
$this->params['breadcrumbs'][] = ['label' => 'Мотиватор', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->target, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Обновить';
?>
<div class="motivate-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
