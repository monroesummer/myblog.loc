<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\MotivateSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Мотиватор';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="motivate-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Создать Цель', ['create'], ['class' => 'btn btn-success']) ?>
    </p>
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

//            'id',
            'created_at:datetime',
            'target',
            'description:ntext',
            'deadline',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
