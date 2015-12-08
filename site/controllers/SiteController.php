<?php

namespace app\controllers;

use Yii;
use yii\filters\AccessControl;
use yii\web\Controller;
use yii\filters\VerbFilter;
use app\models\LoginForm;
use app\models\ContactForm;
use yii\db\Query;

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
        $query = new Query;
        // compose the query
        $query->from('event');
        // build and execute the query
        $rows = $query->all();

        return $this->render('index', array('events' => $rows));
    }

    public function actionLogout()
    {
        Yii::$app->user->logout();

        return $this->goHome();
    }
    
    public function actionDump()
    {
    	return $this->render('dump', [
    			'dump' => \Yii::$app->session->get('dump')
    	]);
    }

    public function actionChallenge()
    {
        return $this->render('challenge');
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

    public function actionProfile($id)
    {
        $query = new Query;
        // compose the query
        $query->from('hero')
            ->where('Hid=:id', array(':id' => $id));
        $hero = $query->one();

        $q = new Query;
        $q->from('takespart')
            ->innerJoin('event', 'takespart.EventId=event.Eid')
            ->where('HeroId=:id', array(':id' => $id));
        $event = $q->one();

        return $this->render('profile', array('hero' => $hero, 'event' => $event));
    }

    public function actionTraining($id)
    {
        $q = new Query;
        $q->from('train')
            ->where('HeroId=:id', array(':id' => $id));
        $training = $q->all();
        return json_encode($training);
    }
}
