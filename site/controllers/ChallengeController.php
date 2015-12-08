<?php

namespace app\controllers;

use Yii;
use yii\web\Controller;
use app\models\ChallengeForm;
use yii\db\Query;

class ChallengeController extends Controller
{
	public function actionIndex($id)
	{
		$session = \Yii::$app->session;
		$request = \Yii::$app->request;
		$challengeForm = new ChallengeForm();
		
		if ($challengeForm->load($request->post()) && $challengeForm->submit())
		{
			$session->set('dump', $request->post('ChallengeForm'));
			return $this->redirect('@web/index.php?r=site/dump');
		}
		else
		{
			$query = new Query;
	        // compose the query
	        $query->from('hero')
	            ->where('Hid=:id', array(':id' => $id));
	        $hero = $query->one();
			return $this->render('challenge', [
					'challengeForm' => $challengeForm,
					'hero' => $hero
			]);
		}
	}
}
