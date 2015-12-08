<?php

namespace app\controllers;

use Yii;
use yii\web\Controller;
use yii\base\Object;
use yii\helpers\Html;
use yii\authclient\OAuth2;
use yii\authclient\OAuth1;

class LoginController extends Controller
{
	private $clientId = '229XJ3';
	private $secret = '6545557ab2e86ea84e43c51826b17985';
	
	public function actionIndex()
	{
		$request = \Yii::$app->request;
		
		$params = array(
			"response_type" => 'code',
			"client_id" => $this->clientId,
			"scope" => Html::encode('activity profile'),
		);
			
		return $this->redirect(
				"https://www.fitbit.com/oauth2/authorize?"
				.http_build_query($params)
		);	
	}
	
	public function actionSuccess()
	{
		$session = \Yii::$app->session;
		$request = \Yii::$app->request;
		
		$authHeader = 'Authorization: Basic '.base64_encode("$this->clientId:$this->secret");
		$contentHeader = 'Content-Type: application/x-www-form-urlencoded';
		$httpHeaders = array($authHeader, $contentHeader);
		
		$oauth = new OAuth2();
		$oauth->clientId = $this->clientId;
		$oauth->clientSecret = $this->secret;
		$oauth->returnUrl = "http://localhost".Yii::getAlias('@web/index.php/login/success');
		$oauth->tokenUrl = 'https://api.fitbit.com/oauth2/token';
		$oauth->fetchAccessToken($request->get('code'), [], $httpHeaders);
		$token = $oauth->getAccessToken();
		
		$session->set('dump', $token);
		return $this->redirect('@web/index.php/site/dump');
	}
}
