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
    public static function tableName()
    {
        return 'knives';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['price', 'createdAt'], 'integer'],
            [['name'], 'string', 'max' => 50],
            [['description'], 'string', 'max' => 1000],
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
