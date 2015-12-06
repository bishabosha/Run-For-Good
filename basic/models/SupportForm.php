<?php

namespace app\models;

use Yii;
use yii\base\Model;

/**
 * ContactForm is the model behind the search form
 * This lets you search for venues! :D
 */
class SupportForm extends Model
{   
    public $by;
    
    public $run;
    
    public $in;
    public $prize;

    /**
     * @return array the validation rules.
     */
    public function rules()
    {
        return [
        		
            // timeframes must be valid dates in the format dd/MM/yyyy
            [['by'], 'date', 'format'=> 'dd/MM/yyyy'],
        ];
    }

    /**
     * Sends the form data collected.
     * @return boolean whether the model passes validation
     */
    public function submit()
    {
        return true;
    }
}
