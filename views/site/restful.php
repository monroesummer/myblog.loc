<?php

/* @var $this yii\web\View */

use yii\helpers\Html;

$this->title = 'Документация RESTful Web Service';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="site-construction" xmlns="http://www.w3.org/1999/html">
    <h1><?= Html::encode($this->title) ?></h1>
    <div class="well">
    <p><h3>Коротко о REST</h3></p>
    <p><strong>REST</strong> (сокр. от англ. <em>Representational State Transfer</em> — «передача состояния представления») — архитектурный стиль взаимодействия компонентов распределённого приложения в сети. <strong>REST</strong> представляет собой согласованный набор ограничений, учитываемых при проектировании распределённой гипермедиа-системы. В определённых случаях (интернет-магазины, поисковые системы, прочие системы, основанные на данных) это приводит к повышению производительности и упрощению архитектуры. В широком смысле[уточнить] компоненты в <strong>REST</strong> взаимодействуют наподобие взаимодействия клиентов и серверов во Всемирной паутине. <strong>REST</strong> является альтернативой RPC.<br>
        В сети Интернет, вызов удалённой процедуры может представлять собой обычный <em>HTTP-запрос</em> (<strong>обычно «GET» или «POST»; такой запрос называют «REST-запрос»</strong>), а необходимые данные передаются в качестве параметров запроса.</p>
    </div>
    <div class="well">
    <p><h3>Блог - myblog.loc</h3></p>
    <p>Данный сайт поддерживает передачу данных в базу данных с помощью <strong>RESTful API</strong>, который находится на моем локальном <em>Apache 2.4-x64+Nginx-1.10</em>.</p>
    <p><em>WEB - Адрес: <a href="http://r-ful.api/" target="_blank">http://r-ful.api/</a></em></p>
    <p>Логика очень проста: <kbd>Client -> RESTful Server -> Database</kbd></p>
    </div>
    <div class="well">
    <p><h3>Семантика: </h3></p>

    <hr>

    <p><h5>PUT: </h5></p>
    <p>Допустим нам надо поменять данные в нашей таблице. Пишем адрес <em>объекта</em> и обновляем информацию:</p>
    <p><kbd>table_name/id -> PUT -> update by ID</kbd><p>

    <hr>

    <p><h5>DELETE: </h5></p>
    <p>Если требуется удаление, вводим адрес <em>объекта</em>, и удаляем: </p>
    <p><kbd>table_name/id -> DELETE -> destroy by ID</kbd></p>

    <hr>

    <p><h5>GET: </h5></p>
    <p>Если надо достать данные с БД, пишем адрес <em>объекта</em>, с соответсвующей командой, либо достаем все сразу:</p>
    <p><kbd>table_name/id -> GET -> show by ID</kbd></p>
    <p><kbd>table_name -> GET -> show all</kbd></p>

    <hr>

    <p><h5>POST: </h5></p>
    <p>Если мы хотим создать запись в нашей БД, пишем адрес <em>объектов</em>, данные, которые надо передать и команду:</p>
    <p><kbd>table_name -> POST -> create</kbd></p>

    </div>


    <div class="well">
    <p><h3>Синтаксис: </h3></p>

    <p><h5>PUT: </h5></p>
        <p>PUT-запрос <strong>/users/1</strong> — обновление данных для 1 экземпляра модели. Находит модель, загружает данные, сохраняет и возвращает модель в случаи успеха
        Исходный код:</p>

        <p><kbd>
        $model = $modelClass::findOne($id);<br>
        $model->load(Yii::$app->getRequest()->getBodyParams(), '');<br>
        if ($model->save() === false && !$model->hasErrors()) {<br>
        throw new ServerErrorHttpException('Failed to update the object for unknown reason.');
        }<br>
        return $model;
        </p></kbd>
        <hr>
    <p><h5>DELETE: </h5></p>
        <p>DELETE-запрос /users/1 — удаление модели.
        Исходный код:</p>

        <p><kbd>
        $model = $this->findModel($id);<br>
        if ($model->delete() === false) {<br>
        throw new ServerErrorHttpException('Failed to delete the object for unknown reason.');
        }
        Yii::$app->getResponse()->setStatusCode(204);
        </p></kbd>
        <hr>
    <p><h5>GET: </h5></p>
        <p>GET-запрос <strong>/users</strong> — постраничный вывод данных модели
            Обратите внимание имя модели переведено во множественное число
            (это можно отключить в настройках класса yii\rest\UrlRule установив pluralize в false). Исходный код:</p>

        <kbd>new ActiveDataProvider([<br>
            'query' => $modelClass::find(),
            ]);</kbd>
        <br>
        <p>GET-запрос <strong>/users/1</strong> — выбор данных для 1 экземпляра модели. Исходный код:</p>

        <kbd>$model = $modelClass::findOne($id);</kbd>

        <hr>
    <p><h5>POST: </h5></p>

        <p>POST-запрос <strong>/users</strong> — добавление модели. Исходный код:</p>
        <p><kbd>
            $model = new $this->modelClass([<br>
            'scenario' => $this->scenario,<br>
            ]);<br>
            $model->load(Yii::$app->getRequest()->getBodyParams(), '');<br>
            if ($model->save()) {<br>
            $response = Yii::$app->getResponse();<br>
            $response->setStatusCode(201);<br>
            $id = implode(',', array_values($model->getPrimaryKey(true)));<br>
            $response->getHeaders()->set('Location', Url::toRoute([$this->viewAction, 'id' => $id], true));<br>
            } elseif (!$model->hasErrors()) {<br>
            throw new ServerErrorHttpException('Failed to create the object for unknown reason.');
            }
            return $model;</kbd>
        </p>

    </div>

    <div class="well">
    <p><h3>Синтаксис на личных примерах, на ОС Windows 10 + <strong>curl</strong>: </h3></p>
    <p>Запуск <em>cmd</em>: </p>
    <p><kbd>Win+R, cmd</kbd></p>

    <p>Исполнение <strong>POST</strong>, с добавлением <em>Категории</em> с <strong>ID = 2</strong>, <strong>name = TestCategory</strong>, <strong>description = RestApiTestCategory</strong>: </p>
    <p><kbd>curl --data "id=2&name=TestCategory&description=RestApiTestCategory" http://r-ful.api/web/categories</kbd></p>

    <p>Достаем данные с помощью <strong>GET</strong>, с <strong>ID = 2</strong>: </p>
    <p><kbd>curl http://r-ful.api/web/categories/2</kbd></p>

    <p>Исполнение <strong>PUT</strong>, которая изменит запись с <strong>ID = 2</strong>, где <strong>name = TestCategory</strong> изменится на <strong>name = PUTMethod</strong>: </p>
    <p><kbd>curl -X PUT -d name=PUTMethod http://r-ful.api/web/categories/2</kbd></p>

    <p>Исполнение <strong>DELETE</strong>, с удалением <em>объекта</em> с <strong>ID = 2</strong>: </p>
    <p><kbd>curl -X DELETE "http://r-ful.api/web/categories/2"</kbd></p>

    <p>Мониторить изменения мы можем по <em>адресу <a href="http://r-ful.api/web/categories" target="_blank"> http://r-ful.api/web/categories</a></em></p>
    </div>


    <div class="well">
    <p><h3>Примеры фильтрации ответа:</h3></p>
    <p>Мы может отфильтровать ответ. Например достать только значения <kbd>id,title,content</kbd> в <kbd>posts</kbd>, и достать таблицу его категории <kbd>category</kbd>:</p>
    <p><kbd>http://r-ful.api/web/posts?fields=id,title,content&expand=category</kbd></p>
    </div>

</div>
