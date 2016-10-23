
<?php

/* @var $this yii\web\View */

$this->title = 'Категории';

?>
<div class="page-header">
    <h1><span class="glyphicon glyphicon-book" aria-hidden="true"></span> Категории, доступные к просмотру: </h1>
</div>


<?php if(!empty($categories)): ?>
    <?php foreach ($categories as $category): ?>

    <div class="col-sm-6 col-md-4">
        <div class="panel panel-success">
            <div class="panel-heading"><strong><p class="lead"><span class="glyphicon glyphicon-book" aria-hidden="true"></span> <?=$category->name?></p></strong></div>
            <div class="panel-body">
                <p><span class ="glyphicon glyphicon-info-sign"></span> <?=$category->description?></p>
            </div>
            <ul class="list-group">
                <?php $posts = $category->posts; ?>
                <?php foreach ($posts as $post): ?>
                <a href="<?=\yii\helpers\Url::to(['site/post', 'id'=> $post->id])?>">
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

    <?php endforeach; ?>
<?php endif; ?>





