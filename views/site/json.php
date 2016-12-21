<?php
use yii\helpers\Html;
use yii\widgets\ActiveForm;
$this->title = $post->title;
$this->params['breadcrumbs'][] = ['label' => 'Предложить', 'url' => ['offer']];
$this->params['breadcrumbs'][] = $this->title;
$comments  = $post->comments;
?>

<h3><span class="glyphicon glyphicon-pencil"></span> Информация: </h3>
<hr>

<ul class="list-group">

    <li class="list-group-item"><?='id: ' . $post->id?></li>


    <li class="list-group-item"><?='title: ' . $post->title?></li>

    <li class="list-group-item"><?='content: ' . htmlspecialchars($post->content)?></li>

    <li class="list-group-item"><?='category_id: ' . $post->category_id?></li>

    <li class="list-group-item"><?='status: ' . $post->status?></li>

    <li class="list-group-item"><?= 'created_at: ' . $post->created_at . ' (' . \Yii::$app->formatter->asDatetime($post->created_at) . ')'?></li>

    <li class="list-group-item"><?= 'updated_at: ' . $post->created_at . ' (' . \Yii::$app->formatter->asDatetime($post->updated_at) . ')'?><br></li>


</ul>

<h3><span class="glyphicon glyphicon-pencil"></span> Json - вид:</h3>
<hr>

<?php


$array = [
    'id' => $post->id,
    'title' => $post->title,
    'content' => htmlspecialchars($post->content),
    'category_id' => $post->category_id,
    'status' => $post->status,
    'created_at' => $post->created_at,
    'updated_at' => $post->updated_at
];

debug($array);
$json = json_encode($array);
$file = Yii::getAlias('@webroot') . '/offer/' . $post->id . '.json' ;
file_put_contents($file, $json);
?>


<?= Html::a('<span class="glyphicon glyphicon-bookmark"></span> Скачать', ['/site/download', 'id' => $post->id], ['class'=>'btn btn-success btn-lg']) ?>



