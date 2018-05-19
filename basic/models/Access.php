<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "access".
 *
 * @property int $id
 * @property int $note_id
 * @property int $user_id
 *
 * @property User $user
 * @property Note $note
 */
class Access extends \yii\db\ActiveRecord
{
    const RELATION_USER = 'user';
    const RELATION_NOTE = 'note';
    
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'access';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['note_id', 'user_id'], 'required'],
            [['note_id', 'user_id'], 'integer'],
            [['user_id'], 'exist', 'skipOnError' => true, 'targetClass' => User::className(), 'targetAttribute' => ['user_id' => 'id']],
            [['note_id'], 'exist', 'skipOnError' => true, 'targetClass' => Note::className(), 'targetAttribute' => ['note_id' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'note_id' => 'Note ID',
            'user_id' => 'User ID',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getUser()
    {
        return $this->hasOne(User::class, ['id' => 'user_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getNote()
    {
        return $this->hasOne(Note::class, ['id' => 'note_id']);
    }

    /**
     * {@inheritdoc}
     * @return \app\models\query\AccessQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new \app\models\query\AccessQuery(get_called_class());
    }
}
