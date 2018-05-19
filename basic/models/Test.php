<?php

namespace app\models;

use yii\base\Model;

class Test extends Model
{
    public $id;
    public $name;
    public $price;

    public function attributeLabels()
    {
        return [
            'id'    => 'Номер',
            'name'  => 'Имя',
            'price' => 'Цена',
        ];
    }

}
