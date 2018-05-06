<?php

namespace app\models;

use yii\base\Model;

class DeliveryForm extends Model
{

    public $name;
    public $address;
    public $instructions;
    public $verifyCode;

    public function rules()
    {
        return [
// name and address are required
            [['name', 'address'], 'required'],
// verifyCode needs to be entered correctly
            ['verifyCode', 'captcha'],
        ];
    }

    public function attributeLabels()
    {
        return [
            'verifyCode' => 'Verification Code',
        ];
    }

    public function contact($name)
    {
        if ($this->validate()) {
            Yii::$app->mailer->compose()
                ->setTo($name)
                ->setFrom([$this->name => $this->address])
                ->setAddress($this->address)
                ->setInstructions($this->instructions)
                ->send();

            return true;
        }
        return false;
    }

}
