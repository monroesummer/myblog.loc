<?php
use yii\helpers\Html;
use yii\bootstrap\Alert;
$this->title = $summary->target;
$this->params['breadcrumbs'][] = ['label' => 'Резюме', 'url' => ['summary']];
$this->params['breadcrumbs'][] = $this->title;

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
                        <li class="list-group-item"><?='id: ' . $summary->id?></li>
                        <li class="list-group-item"><?='name: ' . $summary->name?></li>
                        <li class="list-group-item"><?='surname: ' . $summary->surname?></li>
                        <li class="list-group-item"><?='patronymic: ' . $summary->patronymic?></li>
                        <li class="list-group-item"><?='dob: ' . $summary->dob?></li>
                        <li class="list-group-item"><?= 'address: ' . $summary->address ?></li>
                        <li class="list-group-item"><?= 'phone: ' . $summary->phone ?><br></li>
                        <li class="list-group-item"><?= 'email: ' . $summary->email ?><br></li>
                        <li class="list-group-item"><?= 'target: ' . $summary->target ?><br></li>
                        <li class="list-group-item"><?= 'experience: ' . $summary->experience ?><br></li>
                        <li class="list-group-item"><?= 'education: ' . $summary->education ?><br></li>
                        <li class="list-group-item"><?= 'exteducation: ' . $summary->exteducation ?><br></li>
                        <li class="list-group-item"><?= 'skills: ' . $summary->skills ?><br></li>
                        <li class="list-group-item"><?= 'merit: ' . $summary->merit ?><br></li>
                        <li class="list-group-item"><?= 'status: ' . $summary->status ?><br></li>

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
                        'id' => $summary->id,
                        'name' => $summary->name,
                        'surname' => $summary->surname,
                        'patronymic' => $summary->patronymic,
                        'dob' => $summary->dob,
                        'address' => $summary->address,
                        'phone' => $summary->phone,
                        'email' => $summary->email,
                        'target' => $summary->target,
                        'experience' => $summary->experience,
                        'education' => $summary->education,
                        'exteducation' => $summary->exteducation,
                        'skills' => $summary->skills,
                        'merit' => $summary->merit,
                        'status' => $summary->status,
                        ];

                        debug($array);
                        $json = json_encode($array);
                        $file = Yii::getAlias('@webroot') . '/offer/' . $summary->id . '.json' ;
                        file_put_contents($file, $json);





                        ?>
                </div>
            </div>
        </div>
    </div>
</div>
<hr>
<?= Html::a('<span class="glyphicon glyphicon-download-alt"></span> Скачать', ['/site/download', 'id' => $summary->id], ['class'=>'btn btn-success btn-lg']) ?>



