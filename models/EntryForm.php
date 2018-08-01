<?php

namespace app\models;

use Yii;
use yii\base\Model;

class EntryForm extends Model
{
    public $login;
    public $password;

    public function rules()
    {
        return [
            [['login', 'password'], 'required'],
        ];
    }
}