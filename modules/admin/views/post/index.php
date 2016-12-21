<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $searchModel app\models\PostSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Статьи';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="post-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Создать статью', ['create'], ['class' => 'btn btn-success']) ?>
    </p>
    
    <?= GridView::widget([
        'filterModel' => $searchModel,
        'dataProvider' => $dataProvider,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],
//            'id',
            'title',
            'content:ntext',
            'category.name',
            'created_at:datetime',
            'updated_at:datetime',
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