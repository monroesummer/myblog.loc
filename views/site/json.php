<?php
use yii\helpers\Html;
use yii\bootstrap\Alert;
$this->title = $post->title;
$this->params['breadcrumbs'][] = ['label' => 'Категории', 'url' => ['category']];
$this->params['breadcrumbs'][] = ['label' => 'Предложить', 'url' => ['offer']];
$this->params['breadcrumbs'][] = $this->title;
$comments  = $post->comments;
?>




<?php
echo Alert::widget([
    'options' => [
        'class' => 'alert-success'
    ],
    'body' => '<h4><b>Json</b>, успешно сгенерирован!</h4>'
]);

?>

<div class="container-fluid">
    <div class="row">
        <div class="col-md-12">

            <div class="col-sm-6 col-md-4">
                <div class="panel panel-success">

                    <div class="panel-heading">
                        <span class="glyphicon glyphicon-info-sign"></span> Информация:
                    </div>

                        <ul class="list-group">
                        <li class="list-group-item"><?='id: ' . $post->id?></li>


                        <li class="list-group-item"><?='title: ' . $post->title?></li>

                        <li class="list-group-item"><?='content: ' . htmlspecialchars($post->content)?></li>

                        <li class="list-group-item"><?='category_id: ' . $post->category_id?></li>

                        <li class="list-group-item"><?='status: ' . $post->status?></li>

                        <li class="list-group-item"><?= 'created_at: ' . $post->created_at . ' (' . \Yii::$app->formatter->asDatetime($post->created_at) . ')'?></li>

                        <li class="list-group-item"><?= 'updated_at: ' . $post->created_at . ' (' . \Yii::$app->formatter->asDatetime($post->updated_at) . ')'?><br></li>
                        </ul>

                </div>
            </div>


            <div class="col-sm-6 col-md-4">
                <div class="panel panel-success">
                    <div class="panel-heading">
                        <span class="glyphicon glyphicon-pencil"></span> Json - вид:
                    </div>

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
                </div>
            </div>
        </div>
    </div>
</div>
<hr>
<?= Html::a('<span class="glyphicon glyphicon-download-alt"></span> Скачать', ['/site/download', 'id' => $post->id], ['class'=>'btn btn-success btn-lg']) ?>



