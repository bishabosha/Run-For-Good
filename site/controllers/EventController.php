<?php

namespace app\controllers;

use Yii;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\web\Controller;
use yii\db\Query;

class EventController extends Controller
{
	public function actionIndex($id)
	{
		$query = new Query;
        // compose the query
        $query->from('event')
                ->where('Eid=:id', array(':id' => $id));
        // build and execute the query
        $detail = $query->one();

        $q = new Query;
        $q->from('takespart')
            ->innerJoin('hero', 'takespart.HeroId=hero.Hid')
            ->where('EventId=:id', array(':id' => $id));
        $participants = $q->all();

        return $this->render('event', array('detail' => $detail, 'participants' => $participants));
	}

    public function actionCreate()
    {
        return $this->render('create');
    }

    public function actionSuccess($id)
    {
        $query = new Query;
        // compose the query
        $query->from('event')
                ->where('Eid=:id', array(':id' => $id));
        // build and execute the query
        $detail = $query->one();
        return $this->render('success', array('detail' => $detail));
    }
}
