<?php

namespace app\controllers;

use Yii;
use yii\web\Controller;
use yii\base\Object;
use yii\helpers\Html;
use yii\authclient\OAuth2;

class LoginController extends Controller
{
	private $clientId = '229XBT';
	private $secret = 'fd590071df7af3a872eec8d61d80f35e';
	
	public function actionIndex()
	{
		$request = \Yii::$app->request;
		
		$clientId = '229XBT';
		$responseType = 'code';
		$scope = Html::encode('activity profile');
		$prompt = 'login';
			
		return $this->redirect(
				"https://www.fitbit.com/oauth2/authorize?"
				."response_type=$responseType&"
				."client_id=$this->clientId&"
				."scope=$scope"
		);	
	}
	
	public function actionSuccess()
	{
		$session = \Yii::$app->session;
		$request = \Yii::$app->request;
		
		$base64auth = base64_encode("229XBT:fd590071df7af3a872eec8d61d80f35et");
		echo $base64auth;
		$url = 'https://api.fitbit.com/oauth2/token';
		$data = array(
			'client_id' => $this->clientId,
			'grant_type' => 'authorization_code',
			'redirect_uri' => Yii::getAlias('@web/index.php?r=login/success')."&code=".$request->get('code')
		);
		$options = array(
				'https' => array(
						'header'  => "Authorization: Basic ".base64_encode("229XBT:fd590071df7af3a872eec8d61d80f35et").
									 "Content-type: application/x-www-form-urlencoded",
						'method'  => 'POST',
						'content' => http_build_query($data),
				),
		);
		$context  = stream_context_create($options);
		$result = file_get_contents($url, false, $context);
		
		$session->set('dump', $result);
		return $this->redirect('@web/index.php?r=site/dump');
		
		//$session->set('dump', $request->post());
		//return $this->redirect('@web/index.php?r=site/dump');
	}
}
