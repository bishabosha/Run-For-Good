<?php

namespace app\controllers;

use Yii;
use yii\web\Controller;
use app\models\DonateForm;
use app\models\SupportForm;
use app\models\BuyForm;
use yii\base\Object;
use yii\db\Query;

class SupportController extends Controller
{
	public function actionIndex($id)
	{
		$session = \Yii::$app->session;
		$request = \Yii::$app->request;
		
		$donateForm = new DonateForm();
		$buyForm = new BuyForm();
		$supportForm = new SupportForm();
		
		if ($donateForm->load($request->post()) && $donateForm->submit())
		{
			$session->set('donate', $request->post('DonateForm'));
			return $this->redirect('@web/index.php?r=support/donate');
		}
		
		else if ($buyForm->load($request->post()) && $buyForm->submit())
		{	
			$session->set('bought', $request->post('BuyForm'));
			return $this->redirect('@web/index.php?r=support/buy');
		}
		
		else if ($supportForm->load($request->post()) && $supportForm->submit())
		{
			$session->set('motive', $request->post('SupportForm'));
			return $this->redirect('@web/index.php?r=support/motivation');
		}
		
		$query = new Query;
        // compose the query
        $query->from('hero')
            ->where('Hid=:id', array(':id' => $id));
        $hero = $query->one();
        
        $session->set('hero', $hero);
		return $this->render('support', array('hero' => $hero));
	}
	
	public function actionBuy()
	{
		$session = \Yii::$app->session;
		
		$bought = $session->get('bought');
		$hero = $session->get('hero');
		
		return $this->render('boughtMiles', [
				'boughtMiles' => $bought,
				'hero' => $hero
		]);
	}
	
	public function actionDonate()
	{
		$session = \Yii::$app->session;
	
		$donate = $session->get('donate');
		$hero = $session->get('hero');
	
		return $this->render('donationMade', [
				'donationMade' => $donate,
				'hero' => $hero
		]);
	}
	
	public function actionMotivation()
	{
		$session = \Yii::$app->session;
	
		$motive = $session->get('motive');
		$hero = $session->get('hero');
	
		return $this->render('motivated', [
				'motivated' => $motive,
				'hero' => $hero
		]);
	}
}
