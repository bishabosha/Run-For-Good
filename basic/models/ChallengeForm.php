<?php

namespace app\models;

use Yii;
use yii\base\Model;

/**
 * ContactForm is the model behind the search form
 * This lets you search for venues! :D
 */
class ChallengeForm extends Model
{   
    public $forename;
    
    public $surname;
    
    public $date;
    public $pot;

    public $phone;
    public $email;

    /**
     * @return array the validation rules.
     */
    public function rules()
    {
        return [
        	// all required
        	[['forename', 'surname', 'date', 'pot', 'email', 'phone'], 'required'],
        		
            // timeframes must be valid dates in the format dd/MM/yyyy
            [['date'], 'date', 'format'=> 'dd/MM/yyyy'],
        		
        	//email is an email
        	['email', 'email'],
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
