<?php
$this->title = $post->title;
$this->params['breadcrumbs'][] = ['label' => 'Статьи', 'url' => ['category']];
$this->params['breadcrumbs'][] = $this->title;
?>




<div class="panel panel-success">
    <div class="panel-heading"><h4><span class="glyphicon glyphicon-pencil"></span> <?=$post->title?></h4></div>
    <div class="panel-body">
        <?=$post->content?>
    </div>
</div>
<div class="well well-sm">
    <?= 'Дата написания статьи: ' . \Yii::$app->formatter->asDatetime($post->created_at)?><br>
    <?= 'Дата последнего изменения статьи: ' . \Yii::$app->formatter->asDatetime($post->updated_at)?>
</div>