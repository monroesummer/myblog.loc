<?php
use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\ArrayHelper;


$this->title = 'Предложить';
$this->params['breadcrumbs'][] = ['label' => 'Категории', 'url' => ['category']];
$this->params['breadcrumbs'][] = $this->title;

?>

<?php $form = ActiveForm::begin(['class'=>'form-horizontal']); ?>

<div class="container-fluid">
    <div class="row">
        <div class="col-md-8">
            <div class="panel panel-success">
                <div class="panel-body">
                    <?= $form->field($model, 'title') ?>


                    <?= $form->field($model, 'category_id')->dropDownList(
                        ArrayHelper::map($categories, 'id', 'name')
                    ) ?>

                    <?= $form->field($model, 'status')->dropDownList([
                        '0' => 'Черновик',
                        //            '1' => 'Опубликован' // все приходит в черновике
                    ]) ?>
                    
                        <?=$form->field($model, 'content')->textarea(['rows' => 10]) ?>

                    
                    <?= Html::a('Назад', ['/site/category'], ['class'=>'btn btn-danger btn-lg']) ?>
                    <button type="submit" class="btn btn-success btn-lg"><span class="glyphicon glyphicon-bookmark"></span> Предложить</button>



                </div>
            </div>
            <?php ActiveForm::end(); ?>
        </div>


        <div class="col-md-4">
                <div class="panel panel-success">
                    <div class="panel-heading">
                    <h2>Сгенерировать Json:</h2>
                        <ul class="list-group">
                            <?php foreach ($posts as $post): ?>
                                <a href="<?=\yii\helpers\Url::to(['site/json', 'id'=> $post->id])?>">
                                    <small>
                                        <em>
                                            <li class="list-group-item">
                                                <span class="glyphicon glyphicon-pencil"></span> <?=$post->title?><br>
                                                <?php if($post->status == 1)
                                                    echo 'Статус: <span class="glyphicon glyphicon-saved"></span> Публикация';
                                                else
                                                    echo 'Статус: <span class="glyphicon glyphicon-erase"></span> Черновик' ?>

                                            </li>
                                        </em>
                                    </small>
                                </a>
                            <?php endforeach; ?>
                        </ul>

                    </div>
                </div>
        </div>

    </div>
</div>



