<?php
use yii\widgets\ActiveForm;;
use yii\helpers\Html;
use yii\bootstrap\Alert;
use yii\jui\DatePicker;

$this->title = 'Отправка';
$this->params['breadcrumbs'][] = ['label' => 'Резюме', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;

$file = Yii::getAlias('@webroot') . '/uploads/' ;

$dir = new DirectoryIterator($file);

foreach ($dir as $fileinfo) {
    if ($fileinfo->isFile()) {

        $file = Yii::getAlias('@webroot') . '/uploads/' . $fileinfo->getBasename() ;
        $file2 = Yii::getAlias('@webroot') . '/offer/' . $fileinfo->getBasename() ;
        $json = file_get_contents($file);
        $array = json_decode($json, true);
        $model->id = $array[id];
        $model->name= $array[name];
        $model->surname = $array[surname];
        $model->patronymic = $array[patronymic];
        $model->dob = $array[dob];
        $model->address = $array[address];
        $model->phone = $array[phone];
        $model->email = $array[email];
        $model->target = $array[target];
        $model->experience = $array[experience];
        $model->education = $array[education];
        $model->exteducation = $array[exteducation];
        $model->skills = $array[skills];
        $model->merit = $array[merit];
        $model->status = $array[status];
        unlink($file);
        unlink($file2);


    }
}

if (empty($array)) echo
    Alert::widget([
            'options' => [
                'class' => 'alert-danger'
            ],
        'body' => '<h4><span class="glyphicon glyphicon-remove-sign"></span> Ошибка чтения файла! Пожалуйста, вернитесь назад и укажите файл в формате <b>JSON</b>.</h4>'
]);
?>


<?php $form = ActiveForm::begin(['class'=>'form-horizontal']); ?>
<div class="container-fluid">
    <div class="row">
        <div class="col-md-12">
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
                        //'0' => 'Неактивен',
                        '1' => 'Активен'
                    ]) ?>
                    <?= Html::a('Назад', ['post/index'], ['class'=>'btn btn-danger btn-lg']) ?>
                    <button type="submit" class="btn btn-success btn-lg"><span class="glyphicon glyphicon-bookmark"></span> Продолжить</button>

                </div>
            </div>
        </div>
    </div>
</div>
<?php ActiveForm::end(); ?>