<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\Summary */

$this->title = $model->name;
$this->params['breadcrumbs'][] = ['label' => 'Резюме', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="summary-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Редактировать', ['update', 'id' => $model->id], ['class' => 'btn btn-success']) ?>
        <?= Html::a('Удалить', ['delete', 'id' => $model->id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Вы уверенны что хотите удалить это резюме?',
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            //'id',
            'name',
            'surname',
            'patronymic',
            'dob',
            'address',
            'phone',
            'email:email',
            'target',
            'experience:ntext',
            'education:ntext',
            'exteducation:ntext',
            'skills',
            'merit',
            [
                'attribute' => 'status',
                'value' => ($model->status==1)?'Активен':'Неактивен',
            ],
        ],
    ]) ?>

</div>
