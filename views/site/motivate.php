<?php
use yii\helpers\Html;
$this->title = 'Мотиватор';
$this->params['breadcrumbs'][] = $this->title;
?>


<?php if(!empty($motivates)): ?>
  <?php foreach ($motivates as $motivate): ?>
    <ul class="list-group">
      <li class="list-group-item list-group-item-warning">Цель: <?=$motivate->target?></li>

      <li class="list-group-item list-group-item-info">Описание: <?=$motivate->description?></li>

      <li class="list-group-item list-group-item-success">Создан: <?=\Yii::$app->formatter->asDatetime($motivate->created_at)?></li>

      <li class="list-group-item list-group-item-danger">Дедлайн: <?=$motivate->deadline?></li>
    </ul>
  <?php endforeach; ?>
<?php endif; ?>
