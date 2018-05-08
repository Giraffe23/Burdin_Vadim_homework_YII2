<?php
namespace app\components;

class Service extends \yii\base\Component
{
    public $prop = 'default';
    public function run()
    {
        return $this->prop;
    }
}
