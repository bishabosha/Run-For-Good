<?php

namespace app\models;

use Yii;
use yii\base\Model;

/**
 * ContactForm is the model behind the search form
 * This lets you search for venues! :D
 */
class BuyForm extends Model
{   
    public $buy;
    public $for;

    /**
     * Sends the form data collected.
     * @return boolean whether the model passes validation
     */
    public function submit()
    {
        return true;
    }
}
