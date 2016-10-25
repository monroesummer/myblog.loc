<?php
$this->title = $post->title;
$this->params['breadcrumbs'][] = ['label' => 'Категории', 'url' => ['category']];
$this->params['breadcrumbs'][] = $this->title;
$comments  = $post->comments;
?>
<h3><span class="glyphicon glyphicon-pencil"></span> Статья:</h3>
<div class="panel panel-success">
    <div class="panel-heading"><h4><?=$post->title?></h4></div>
    <div class="panel-body">
        <?=$post->content?>
    </div>
    <div class="well well-sm">
        <?= 'Дата написания статьи: ' . \Yii::$app->formatter->asDatetime($post->created_at)?><br>
        <?= 'Дата последнего изменения статьи: ' . \Yii::$app->formatter->asDatetime($post->updated_at)?>
    </div>
</div>
<h3><span class="glyphicon glyphicon-send"></span> Комментарии:</h3>

<?php foreach ($comments as $comment): ?>
    <div class="panel panel-success">
        <div class="panel-heading"> <?= 'Имя: ' . $comment->author?><br><?= 'Email: ' . $comment->email?></div>
        <div class="panel-body">
            <?='Комментарий: ' . '<br>' ?>
            <div class="well well-sm">
                <?=$comment->content ?>
            </div>
        </div>
    </div>

<?php endforeach; ?>



