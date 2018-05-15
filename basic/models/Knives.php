<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "knives".
 *
 * @property int $id
 * @property string $name
 * @property int $price
 * @property string $description
 * @property int $createdAt
 */
class Knives extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    const SCENARIO_CREATE = 'create';
    const SCENARIO_UPDATE = 'update';

    public static function tableName()
    {
        return 'knives';
    }
    
    public function scenarios() 
    {
        return [
            self::SCENARIO_DEFAULT => ['name'],
            self::SCENARIO_CREATE => ['name', 'price', 'description', 'createdAt'],
            self::SCENARIO_UPDATE => ['price', 'description', 'createdAt'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            ['name', 'required', 'on' => self::SCENARIO_CREATE],
            ['name', 'string', 'max' => 20],
            ['name', 'filter', 'filter' => function ($value) {
                return strip_tags(trim($value));
            }],
            ['price', 'integer', 'min' => 1, 'max' => 999 /*,'on' => 'update'*/],
            ['description', 'string', 'max' => 1200],
            [['createdAt'], 'integer'],
            //['id', 'safe'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'name' => 'Name',
            'price' => 'Price',
            'description' => 'Description',
            'createdAt' => 'Created At',
        ];
    }
}
