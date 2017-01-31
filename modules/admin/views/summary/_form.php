<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\jui\DatePicker;

/* @var $this yii\web\View */
/* @var $model app\models\Summary */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="summary-form">

    <?php $form = ActiveForm::begin(); ?>

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
        '1' => 'Активен'
    ]) ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Создать' : 'Редактировать', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
