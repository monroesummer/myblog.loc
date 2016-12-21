<?php

namespace app\modules\admin\controllers;

use Yii;
use app\models\Post;
use app\models\PostSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use app\models\Category;
use app\models;
use yii\web\UploadedFile;


/**
 * PostController implements the CRUD actions for Post model.
 */
class PostController extends Controller
{
    /**
     * @inheritdoc
     */
    public function behaviors()
    {
        return [
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'delete' => ['POST'],
                ],
            ],
        ];
    }

    /**
     * Lists all Post models.
     * @return mixed
     */

    public function actionUploaded(){

     

        $model = new models\OfferForm();
        $categories = Category::find()->all();
        if (isset($_POST['OfferForm']))
        {
            $model->attributes= Yii::$app->request->post('OfferForm');

            if ($model->validate())
            {
                $model->writeOffer();
                
            }
        }
        
        return $this->render('uploaded', compact('model', 'categories'));
    }

    public function actionIndex()
    {
        $redirectUrl = '/web/';
        $redirectUrlUploaded = '/web/admin/post/uploaded';
        if (Yii::$app->user->isGuest)
        {
            return Yii::$app->getResponse()->redirect($redirectUrl);
        }

        ///////////////
        $model = new models\UploadForm();

        if (Yii::$app->request->isPost) {
            $model->file = UploadedFile::getInstance($model, 'file');

            if ($model->file && $model->validate()) {
                $model->file->saveAs(Yii::getAlias('@webroot') . '/uploads/' . $model->file->baseName . '.' . $model->file->extension);
                Yii::$app->getResponse()->redirect($redirectUrlUploaded);

            }
        }
        ////////////////

        $searchModel = new PostSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
            'model' => $model,
        ]);
    }

    /**
     * Displays a single Post model.
     * @param integer $id
     * @return mixed
     */
    public function actionView($id)
    {
        $redirectUrl = '/web/';
        if (Yii::$app->user->isGuest)
        {
            return Yii::$app->getResponse()->redirect($redirectUrl);
        }
        return $this->render('view', [
            'model' => $this->findModel($id),
        ]);
    }

    /**
     * Creates a new Post model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $redirectUrl = '/web/';
        if (Yii::$app->user->isGuest)
        {
            return Yii::$app->getResponse()->redirect($redirectUrl);
        }
        $model = new Post();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id]);
        } else {
            return $this->render('create', [
                'model' => $model,
                'category' => Category::find()->all()
            ]);
        }
    }


    public function actionUpdate($id)
    {
        $redirectUrl = '/web/';
        if (Yii::$app->user->isGuest)
        {
            return Yii::$app->getResponse()->redirect($redirectUrl);
        }

        $model = $this->findModel($id);

        
        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id]);
        } else {
            return $this->render('update', [
                'model' => $model,
                'category' => Category::find()->all()
            ]);
        }
    }

    /**
     * Deletes an existing Post model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     */
    public function actionDelete($id)
    {
        $redirectUrl = '/web/';
        if (Yii::$app->user->isGuest)
        {
            return Yii::$app->getResponse()->redirect($redirectUrl);
        }
        $this->findModel($id)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the Post model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Post the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        $redirectUrl = '/web/';
        if (Yii::$app->user->isGuest)
        {
            return Yii::$app->getResponse()->redirect($redirectUrl);
        }
        if (($model = Post::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}
