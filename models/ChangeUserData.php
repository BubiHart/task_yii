<?php
namespace app\models;

use Yii;
use yii\mongodb\ActiveRecord;
use yii\mongodb\validators;

class ChangeUserData extends ActiveRecord
{
    public $old_password;
    public $new_password;
    public $new_login;
    public $login;


    public function rules()
    {
        return [
            // login and password are both required
            ['old_password', 'validate_old_password'],
            ['new_login', 'unique', 'targetAttribute' => 'login', 'message' => 'This login has already been taken'],
        ];
    }


    public static function collectionName()
    {
        return ['task', 'users'];
    }

    public function attributes()
    {
        return ['_id', 'login', 'password'];
    }

    public function validate_old_password($attribute, $params)
    {

        if(!empty($this->old_password))
        {
            //Yii::$app->user->identity->login
            $user = self::findOne(array('login' => 'BubiHart'));
            $table_password = $user['password'];
            if(!Yii::$app->security->validatePassword($this->old_password, $table_password))
            {
                $this->addError($attribute, "Old password is incorrect");
            }

        }
    }

/*
    public function validate_new_login($attribute, $params)
    {

    }

    public function get_user_login()
    {
        $id = Yii::$app->user->identity->getId();
        $user_data = self::findOne(array('_id' => $id));
        $this->login = $user_data['login'];
    }
*/
}