<?php
use yii\widgets\ActiveForm;;
use yii\helpers\ArrayHelper;
use yii\helpers\Html;
$this->title = 'Отправка';
$this->params['breadcrumbs'][] = ['label' => 'Статьи', 'url' => ['index']];
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
        $model->title= $array[title];
        $model->category_id = $array[category_id];
        $model->status = $array[status];
        $model->content = $array[content];
        unlink($file);
        unlink($file2);


    }
}

if (empty($array)) echo '<hr><h3><span class="glyphicon glyphicon-remove-sign"></span> Ошибка чтения файла! Пожалуйста, вернитесь назад и укажите файл в формате JSON.</h3><hr>';

?>


<?php $form = ActiveForm::begin(['class'=>'form-horizontal']); ?>
<div class="container-fluid">
    <div class="row">
        <div class="col-md-12">
            <div class="panel panel-success">
                <div class="panel-heading">
                    <?= $form->field($model, 'title')->textInput(['maxlength' => true])?>

                    <?= $form->field($model, 'category_id')->dropDownList(
                        ArrayHelper::map($categories, 'id', 'name')
                    ) ?>

                    <?= $form->field($model, 'status')->dropDownList([
                        '0' => 'Черновик',
                        '1' => 'Опубликован' // все приходит в черновике
                    ]) ?>
                </div>

                <div class="panel-body">
                    <div class="well well-sm">
                        <?=$form->field($model, 'content')->textarea(['rows' => 6]) ?>
                    </div>
                    <?= Html::a('Назад', ['post/index'], ['class'=>'btn btn-danger btn-lg']) ?>
                    <button type="submit" class="btn btn-success btn-lg"><span class="glyphicon glyphicon-bookmark"></span> Продолжить</button>

                </div>
            </div>
        </div>
    </div>
</div>
<?php ActiveForm::end(); ?>