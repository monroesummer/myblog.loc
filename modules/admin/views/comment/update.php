<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Comment */

$this->title = 'Редактировать комментарий: ' . $model->author;
$this->params['breadcrumbs'][] = ['label' => 'Комментарии', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->author, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Редактировать';
?>
<div class="comment-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
        'post' => $post
    ]) ?> 

</div>
