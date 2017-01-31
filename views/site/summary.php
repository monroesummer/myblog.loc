<?php
use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\ArrayHelper;
use yii\jui\DatePicker;

$this->title = 'Создать Резюме';
$this->params['breadcrumbs'][] = $this->title;

?>
<?php $form = ActiveForm::begin(['class'=>'form-horizontal']); ?>

<div class="container-fluid">
    <div class="row">
        <div class="col-md-8">
            <div class="panel panel-success">
                <div class="panel-body">

                    <?= $form->field($model, 'name')->textInput(['maxlength' => true]) ?>

                    <?= $form->field($model, 'surname')->textInput(['maxlength' => true]) ?>

                    <?= $form->field($model, 'patronymic')->textInput(['maxlength' => true]) ?>

                    <?= $form->field($model, 'dob')->widget(DatePicker::classname(), [
                        'options' => ['class' => 'form-control input-sm','readOnly'=>'readOnly'],
                        'language' => 'ru-Ru',
                        'dateFormat' => 'yy.MM.dd',
                        'clientOptions' => [
                            'yearRange' => '1956:2016',
                            'changeMonth' => 'true',
                            'changeYear' => 'true',
                            'firstDay' => '1',]
                    ]) ?>

                    <?= $form->field($model, 'address')->textInput(['maxlength' => true]) ?>

                    <?= $form->field($model, 'phone')->textInput() ?>

                    <?= $form->field($model, 'email')->textInput(['maxlength' => true]) ?>

                    <?= $form->field($model, 'target')->textInput(['maxlength' => true]) ?>

                    <?= $form->field($model, 'experience')->textarea(['rows' => 6]) ?>

                    <?= $form->field($model, 'education')->textarea(['rows' => 6]) ?>

                    <?= $form->field($model, 'exteducation')->textarea(['rows' => 6]) ?>

                    <?= $form->field($model, 'skills')->textInput(['maxlength' => true]) ?>

                    <?= $form->field($model, 'merit')->textInput(['maxlength' => true]) ?>

                    <?= $form->field($model, 'status')->dropDownList([
                        '0' => 'Неактивен',
                        //'1' => 'Активен'
                    ]) ?>
                    
                    <button type="submit" class="btn btn-success btn-lg"><span class="glyphicon glyphicon-bookmark"></span> Создать</button>
                    
                </div>
            </div>
            <?php ActiveForm::end(); ?>
        </div>


        <div class="col-sm-6 col-md-4">
            <div class="panel panel-success">
                <div class="panel-heading">Сгенерировать Json: </div>
                <div class="panel-body">
                    <p><span class ="glyphicon glyphicon-info-sign"></span> Нажав на одну из ссылок, вы сможете сгенерировать JSON файл, а так же скачать его.</p>
                </div>

                    <ul class="list-group">
                        <?php foreach ($summaries as $summary): ?>
                            <a href="<?=\yii\helpers\Url::to(['site/summaryjson', 'id'=> $summary->id])?>">
                                <small>
                                    <em>
                                        <li class="list-group-item">
                                            <span class="glyphicon glyphicon-pencil"></span> <?=$summary->target?><br>

                                            <?php if($summary->status == 1)
                                                echo 'Статус: <span class="glyphicon glyphicon-saved"></span> Активен';
                                            else
                                                echo 'Статус: <span class="glyphicon glyphicon-remove-sign"></span> Неактивен' ?>

                                        </li>
                                    </em>
                                </small>
                            </a>
                        <?php endforeach; ?>
                    </ul>
            </div>
        </div>

    </div>
</div>
