<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\Motivate */

$this->title = $model->target;
$this->params['breadcrumbs'][] = ['label' => 'Мотиватор', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="motivate-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Обновить', ['update', 'id' => $model->id], ['class' => 'btn btn-success']) ?>
        <?= Html::a('Удалить', ['delete', 'id' => $model->id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Вы уверенны что хотите удалить эту цель?',
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
//            'id',
            'created_at:datetime',
            'target',
            'description:ntext',
            'deadline',
        ],
    ]) ?>

</div>
