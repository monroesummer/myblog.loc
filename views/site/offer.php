<?php

/* @var $this yii\web\View */

$this->title = 'Предложить';
$this->params['breadcrumbs'][] = $this->title;

?>

<?php
use yii\helpers\Html;
use yii\widgets\ActiveForm;

use yii\helpers\ArrayHelper;
?>
<?php $form = ActiveForm::begin(['class'=>'form-horizontal']); ?>

<div class="container-fluid">
    <div class="row">
        <div class="col-md-8">
            <div class="panel panel-success">
                <div class="panel-heading">
                    <?= $form->field($model, 'title') ?>


                    <?= $form->field($model, 'category_id')->dropDownList(
                        ArrayHelper::map($categories, 'id', 'name')
                    ) ?>

                    <?= $form->field($model, 'status')->dropDownList([
                        '0' => 'Черновик',
                        //            '1' => 'Опубликован' // все приходит в черновике
                    ]) ?>
                </div>

                <div class="panel-body">
                    <div class="well well-sm">
                        <?=$form->field($model, 'content')->textarea(['rows' => 6]) ?>
                    </div>
                    <button type="submit" class="btn btn-success btn-lg">Предложить</button>



                </div>
            </div>
            <?php ActiveForm::end(); ?>
        </div>


        <div class="col-md-4">
                <div class="panel panel-success">
                    <div class="panel-heading">
                    <h2>Json - вид:</h2>
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



