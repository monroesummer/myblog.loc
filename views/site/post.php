<?php
use yii\widgets\ActiveForm;
$this->title = $post->title;
$this->params['breadcrumbs'][] = ['label' => 'Категории', 'url' => ['category']];
$this->params['breadcrumbs'][] = $this->title;
$comments  = $post->comments;
?>

<h3><span class="glyphicon glyphicon-pencil"></span> Статья:</h3>
<hr>
<div class="panel panel-success">
    <div class="panel-heading"><h4><?=$post->title?></h4></div>
    <div class="panel-body">
        <?=$post->content?>
        <div class="well well-sm">
            <?= 'Дата написания статьи: ' . \Yii::$app->formatter->asDatetime($post->created_at)?><br>
            <?= 'Дата последнего изменения статьи: ' . \Yii::$app->formatter->asDatetime($post->updated_at)?>
        </div>
    </div>

</div>

<hr>

<h3><span class="glyphicon glyphicon-send"></span> Комментарии:</h3>

<hr>

<?php foreach ($comments as $comment): ?>
    <div class="panel panel-success">
        <div class="panel-heading">
            <?= 'Имя: ' . $comment->author?>
            <br>
            <?= 'Email: ' . $comment->email?>
            <br>
            <?='Дата: '. \Yii::$app->formatter->asDatetime($comment->created_at) ?>


        </div>
        <div class="panel-body">
            <?='Комментарий: ' . '<br>' ?>
            <div class="well well-sm">
                <?=$comment->content ?>

            </div>

        </div>
    </div>
    <hr>
<?php endforeach; ?>


<?php $form = ActiveForm::begin(['class'=>'form-horizontal']); ?>
<div class="panel panel-success">
    <div class="panel-heading">
        <?=$form->field($model, 'author')->textInput(['maxlength' => true]) ?>
        <?=$form->field($model, 'email')->textInput(['maxlength' => true]) ?>
    </div>
    <div class="panel-body">
        <div class="well well-sm">
            <?=$form->field($model, 'content')->textarea(['rows' => 3]) ?>
        </div>
        <button type="submit" class="btn btn-success btn-lg">Отправить</button>
    </div>

<?php ActiveForm::end(); ?>

</div>