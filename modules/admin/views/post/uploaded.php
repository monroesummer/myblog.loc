<?php
use yii\widgets\ActiveForm;;
use yii\helpers\ArrayHelper;
$this->title = 'Отправка';
$this->params['breadcrumbs'][] = ['label' => 'Статьи', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;

$file = Yii::getAlias('@webroot') . '/uploads/' ;

$dir = new DirectoryIterator($file);
foreach ($dir as $fileinfo) {
    if ($fileinfo->isFile()) {
//        echo $fileinfo->getBasename() . "\n";
        $file = Yii::getAlias('@webroot') . '/uploads/' . $fileinfo->getBasename() ;

        $json = file_get_contents($file);

        $array = json_decode($json, true);

//        debug($array);

        $model->title=$array[title];
        $model->category_id =$array[category_id];
        $model->status =$array[status];
        $model->content =$array[content];

    }
}?>


<?php $form = ActiveForm::begin(['class'=>'form-horizontal']); ?>
<div class="container-fluid">
    <div class="row">
        <div class="col-md-8">
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
                    <button type="submit" class="btn btn-success btn-lg">Продолжить</button>

                </div>
            </div>
        </div>
    </div>
</div>
<?php ActiveForm::end(); ?>