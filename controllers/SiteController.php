<?php

namespace app\controllers;

use app\models\Category;
use app\models\CommentForm;
use app\models\Motivate;
use app\models\OfferForm;
use app\models\Post;
use app\models\Summary;
use app\models\SummaryForm;
use app\models\UploadForm;
use Yii;
use yii\helpers\Url;
use yii\filters\AccessControl;
use yii\web\Controller;
use yii\filters\VerbFilter;
use app\models\LoginForm;
use app\models\ContactForm;
use yii\web\HttpException;
use yii\web\UploadedFile;

class SiteController extends Controller
{

    public function behaviors()
    {
        return [
            'access' => [
                'class' => AccessControl::className(),
                'only' => ['logout'],
                'rules' => [
                    [
                        'actions' => ['logout'],
                        'allow' => true,
                        'roles' => ['@'],
                    ],
                ],
            ],
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'logout' => ['post'],
                ],
            ],
        ];
    }
    
    public function actions()
    {
        return [
            'error' => [
                'class' => 'yii\web\ErrorAction',
            ],
            'captcha' => [
                'class' => 'yii\captcha\CaptchaAction',
                'fixedVerifyCode' => YII_ENV_TEST ? 'testme' : null,
            ],
        ];
    }
    
    public function actionIndex()
    {

        return $this->render('index');

    }
    
    public function actionLogin()
    {
        if (!Yii::$app->user->isGuest) {
            return $this->goHome();
        }

        $model = new LoginForm();
        if ($model->load(Yii::$app->request->post()) && $model->login()) {
            return $this->goBack();
        }
        return $this->render('login', [
            'model' => $model,
        ]);
    }

    public function actionLogout()
    {
        Yii::$app->user->logout();

        return $this->goHome();
    }
    
    public function actionContact()
    {
        $model = new ContactForm();
        if ($model->load(Yii::$app->request->post()) && $model->contact(Yii::$app->params['adminEmail'])) {
            Yii::$app->session->setFlash('contactFormSubmitted');

            return $this->refresh();
        }
        return $this->render('contact', [
            'model' => $model,
        ]);
    }
    
    public function actionAbout()
    {
        return $this->render('about');
    }

    public  function  actionConstruction()
    {
        $redirectUrl = '/web/';
        if (Yii::$app->user->isGuest)
        {
            return Yii::$app->getResponse()->redirect($redirectUrl);
        }
        return $this->render('construction');
    }

    public function actionCategory()
    {

        
        $categories = Category::find()->with('posts')->all();
        return $this->render('category', compact('categories'));

    }


    public function actionPost(){
        $id = \Yii::$app->request->get('id');
        $post = Post::findOne($id);
        if(empty($post)) throw new HttpException(404, 'Такой страницы нет.');

        $model = new CommentForm();
        
        if (isset($_POST['CommentForm']))
        {
            $model->comment_post = $id;
            
            $model->attributes= Yii::$app->request->post('CommentForm');

            if ($model->validate())
            {
                $model->writeComment();
               

            }
        }
        
        return $this->render('post', compact('id', 'post', 'model'));
    }
    
    
    public function actionRestful(){
        $redirectUrl = '/web/';
        if (Yii::$app->user->isGuest)
        {
            return Yii::$app->getResponse()->redirect($redirectUrl);
        }
        return $this->render('restful');
    }
    public function  actionMotivate(){

        $motivates = Motivate::find()->all();

        return $this->render('motivate', compact('motivates'));
    }
    
    public function actionDiary(){
        return $this->render('diary');
    }

    public function actionIdea(){
        return $this->render('idea');
    }
    public function actionChat(){
        return $this->render('chat');
    }
    
    public function actionOffer(){

        $categories = Category::find()->all();
        $posts = Post::find()->all();
        $model = new OfferForm();

        if (isset($_POST['OfferForm']))
        {
//            debug($_POST['OfferForm']);
//            die();
            $model->attributes= Yii::$app->request->post('OfferForm');

            if ($model->validate())
            {
                $model->writeOffer();
                Yii::$app->getResponse()->redirect(Url::to(['site/offer']));

                
            }
        }
        return $this->render('offer', compact('model', 'categories', 'posts'));
    }


    public function actionDownload($id) {
    $file = Yii::getAlias('@webroot') . '/offer/' . $id . '.json' ;


    if (file_exists($file)) {

        ini_set('max_execution_time', 5*60);

        return \Yii::$app->response->sendFile($file);

    }
    else{
        throw new  \yii\web\NotFoundHttpException('Такого файла не существует.');
    }

    }
    public function actionJson(){

        $id = \Yii::$app->request->get('id');
        $post = Post::findOne($id);
        if ($post->status == 0){
            $post->delete();
        }

        if(empty($post)) throw new HttpException(404, 'Такой страницы нет.');



        return $this->render('json', compact('id', 'post'));
    }

    public function actionSummaryjson(){

        $id = \Yii::$app->request->get('id');
        $summary = Summary::findOne($id);
        if ($summary->status == 0){
            $summary->delete();
        }


        if(empty($summary)) throw new HttpException(404, 'Такой страницы нет.');
        

        return $this->render('summaryjson', compact('id', 'summary'));


        
    }




    public function actionSummary(){
        
        $summaries = Summary::find()->all();
        $model = new SummaryForm();

        if (isset($_POST['SummaryForm']))
        {
            $model->attributes= Yii::$app->request->post('SummaryForm');

            if ($model->validate())
            {
                $model->writeSummary();
                Yii::$app->getResponse()->redirect(Url::to(['site/summary']));
            
            }
        }
        
        
        return $this->render('summary', compact('model', 'summaries'));
        
    }

}
