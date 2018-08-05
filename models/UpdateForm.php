<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\mongodb\ActiveRecord;

class UpdateForm extends ActiveRecord
{
    public $old_login;
    public $new_login;
    public $old_password;
    public $new_password;


    public function rules()
    {
        return [
            [['old_password', 'new_login', 'new_password'], 'trim'],
            ['old_password', 'validate_old_password'],
            ['new_login', 'unique', 'targetAttribute' => 'login', 'message' => 'This login has already been taken'],
            ['new_password', 'validate_new_password'],
        ];
    }

    public function validate_old_password($attribute, $params)
    {

        if (!empty($this->old_password)) {
            $this->old_login = Yii::$app->user->identity->login;
            //Yii::$app->user->identity->login
            $user = self::findOne(array('login' => $this->old_login));
            $table_password = $user['password'];
            if (!Yii::$app->security->validatePassword($this->old_password, $table_password)) {
                $this->addError($attribute, "Old password is incorrect");
            }

        }

    }

    public function validate_new_password($attribute, $params)
    {

        if (empty($this->old_password))
        {
            $this->addError($attribute, "To change password enter previous");
        }


    }



    public static function collectionName()
    {
        return ['task', 'users'];
    }

    public function attributes()
    {
        return ['_id', 'login', 'password'];
    }

    public function change_user_data()
    {
        if (empty($this->new_login) && empty($this->old_password) && empty($this->new_password))
        {
            return 'blank';
        }

        if (!empty($this->new_login) && empty($this->old_password) && empty($this->new_password) || $this->old_password == NULL || $this->new_password == NULL)
        {
            $this->old_login = Yii::$app->user->identity->login;

            self::updateAll(array('login' => $this->new_login), array('login' => $this->old_login));
            Yii::$app->user->identity->login = $this->new_login;
        }

        if (!empty($this->new_login) && !empty($this->old_password) && !empty($this->new_password))
        {
            $new_password_hash = Yii::$app->security->generatePasswordHash($this->new_password);
            self::updateAll(array('login' => $this->new_login, 'password' => $new_password_hash), array('login' => $this->old_login));
            Yii::$app->user->identity->login = $this->new_login;
        }

        if (empty($this->new_login) && !empty($this->old_password) && !empty($this->new_password))
        {
            $new_password_hash = Yii::$app->security->generatePasswordHash($this->new_password);
            self::updateAll(array('password' => $new_password_hash), array('login' => $this->old_login));
        }
    }

}