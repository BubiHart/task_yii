<?php

namespace app\models;

use Yii;
use yii\base\Model;

class UpdateForm extends Model
{
    public $new_login;
    public $old_password;
    public $new_password;

    public function rules()
    {
        return [
            [['new_login', 'old_password', 'new_password'], 'required'],
        ];
    }
}