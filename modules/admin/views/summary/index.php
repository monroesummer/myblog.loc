<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $searchModel app\models\SummarySearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Резюме';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="summary-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Создать резюме', ['create'], ['class' => 'btn btn-success']) ?>
    </p>
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            //'id',
            'name',
            'surname',
            'patronymic',
            'dob',
            // 'address',
            // 'phone',
            // 'email:email',
             'target',
            // 'experience:ntext',
            // 'education:ntext',
            // 'exteducation:ntext',
            // 'skills',
            // 'merit',
            [
                'attribute' => 'status',
                'value' => function ($data) { return ($data->status==1)?'Опубликован':'Черновик'; }
            ],

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
<hr>

<?php $form = ActiveForm::begin(['options' => [ 'enctype' => 'multipart/form-data']]) ?>

<?= $form->field($model, 'file')->label(null,['class'=>'btn btn-success']) ->fileInput(['class'=>'sr-only']) ?>

<button class = "btn btn-success btn-lg"><span class="glyphicon glyphicon-cloud-upload"></span> Отправить</button>

<?php ActiveForm::end() ?>
