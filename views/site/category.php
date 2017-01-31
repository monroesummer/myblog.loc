<?php
use yii\helpers\Html;

$this->title = 'Категории';
$this->params['breadcrumbs'][] = $this->title;


?>
<div class="container-fluid">
    <div class="row">
        <div class="col-md-12">
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
        </div>
    </div>
</div>
<hr>
    <?= Html::a('<span class="glyphicon glyphicon-bookmark"></span> Предложить', ['/site/offer'], ['class'=>'btn btn-success btn-lg']) ?>








