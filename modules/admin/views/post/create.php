<?php

use yii\helpers\Html;
$category = '';

/* @var $this yii\web\View */
/* @var $model app\models\Post */

$this->title = 'Создать статью';
$this->params['breadcrumbs'][] = ['label' => 'Статьи', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="post-create">

    <h1><?= Html::encode($this->title) ?></h1>
    
    <?= $this->render('_form', [
        'model' => $model,
        'category' => $category,
    ]) ?>

</div>
