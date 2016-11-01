<?php

namespace app\controllers;

use app\models\Category;
use app\models\CommentForm;
use app\models\Post;
use Yii;
use yii\filters\AccessControl;
use yii\web\Controller;
use yii\filters\VerbFilter;
use app\models\LoginForm;
use app\models\ContactForm;
use yii\web\HttpException;

class SiteController extends Controller
{
    
    /**
     * @inheritdoc
     */
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

    /**
     * @inheritdoc
     */
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

    /**
     * Displays homepage.
     *
     * @return string
     */
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
//            debug($_POST['CommentForm']);
//            die();
            $model->attributes= Yii::$app->request->post('CommentForm');

            if ($model->validate())
            {
                $model->writeComment();
            }

        }


        return $this->render('post', compact('id', 'post', 'model'));
    }
    
    
    public function actionRestful(){
        return $this->render('restful');
    }
}
