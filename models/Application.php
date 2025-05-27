<?php
namespace app\models;

use yii\db\ActiveRecord;

class Application extends ActiveRecord
{
    const STATUS_PENDING = 'в обработке';
    const STATUS_APPROVED = 'одобрена';
    const STATUS_REJECTED = 'отклонена';

    public static function tableName()
    {
        return 'application';
    }

    public function rules()
    {
        return [
            [['user_id', 'tournament_id'], 'required'],
            [['status'], 'default', 'value' => self::STATUS_PENDING],
        ];
    }

    public function getUser()
    {
        return $this->hasOne(User::class, ['id' => 'user_id']);
    }

    public function getTournament()
    {
        return $this->hasOne(Tournament::class, ['id' => 'tournament_id']);
    }
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'user_id' => 'Пользователь',
            'tournament_id' => 'Турнир',
            'status' => 'Статус',
            'created_at' => 'Дата создания',
            'pending' => 'В обратотке'
        ];
    }
}