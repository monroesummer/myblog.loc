
<?php

/* @var $this yii\web\View */

$this->title = 'Мой блог';

?>
<div class="page-header">
    <h1><span class="glyphicon glyphicon-book" aria-hidden="true"></span> Категории, доступные к просмотру: </h1>
</div>


<?php if(!empty($categories)): ?>
    <?php foreach ($categories as $category): ?>

    <div class="col-sm-6 col-md-4">
        <div class="panel panel-warning">
            <div class="panel-heading"><strong><p class="lead"><span class="glyphicon glyphicon-book" aria-hidden="true"></span> <?=$category->name?></p></strong></div>
            <div class="panel-body">
                <p><span class ="glyphicon glyphicon-info-sign"></span> <?=$category->description?></p>
            </div>
            <ul class="list-group">
                <?php $posts = $category->posts; ?>
                <?php foreach ($posts as $post): ?>
                <a href="<?=\yii\helpers\Url::to(['site/post', 'id'=> $post->id])?>"><small><em><li class="list-group-item"><span class="glyphicon glyphicon-pencil"></span> <?=$post->title?></li></em></small></a>
                <?php endforeach; ?>
            </ul>
        </div>
    </div>

    <?php endforeach; ?>
<?php endif; ?>





