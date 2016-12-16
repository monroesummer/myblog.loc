
<?php
use yii\bootstrap\Html;
/* @var $this yii\web\View */
use yii\bootstrap\Carousel;

$this->title = 'Мой блог';

?>
        <div class="row">
            <div class="col-md-4">

            </div>

            <div class="col-md-4">
                <?php echo Carousel::widget ( [
                    'items' => [
                        [
                            'content' => '<img style="width:474px;height:296px" src="//nix-tips.ru/wp-content/uploads/2014/11/carousel003.jpg"/>',
                            'caption' => '<h2>Yii Gii</h2><p>Удобный встроенный генератор кода. Модули, модели на основе таблиц в БД и, конечно же, CRUD</p>',
                            'options' => []
                        ],
                        [
                            'content' => '<img style="width:474px" src="//nix-tips.ru/wp-content/uploads/2014/11/carousel002.jpg"/>',
                            'caption' => '<h2>Отличный отладчик</h2><p>Легко подключается, помнит все запросы http, БД и логи</p>',
                            'options' => []
                        ],
                        [
                            'content' => '<img style="width:474px" src="//nix-tips.ru/wp-content/uploads/2014/11/carousel001.jpg"/>',
                            'caption' => '<h2>Быстрый старт</h2><p>Установка и обновление через composer</p>',
                            'options' => []
                        ]
                    ],
                    'options' => [
                        'style' => 'width:474px;' // Задаем ширину контейнера
                    ]
                ]); ?>

            </div>

            <div class="col-md-4">
                
            </div>
        </div>



