<?php
namespace app\models;

use yii\db\ActiveRecord;

class Tournament extends ActiveRecord
{
    const AGE_GROUP_JUNIOR = 'junior';
    const AGE_GROUP_MIDDLE = 'middle';
    const AGE_GROUP_SENIOR = 'senior';

    const LANGUAGE_CPP = 'C++';
    const LANGUAGE_PYTHON = 'Python';
    const LANGUAGE_JAVA = 'Java';

    public static function tableName()
    {
        return 'tournament';
    }

    public function rules()
    {
        return [
            [['name', 'date'], 'required'],
            [['date'], 'date', 'format' => 'php:Y-m-d'],
            [['class'], 'integer', 'min' => 1, 'max' => 11],
            [['age_group'], 'in', 'range' => array_keys(self::getAgeGroups())],
            [['language'], 'in', 'range' => array_keys(self::getLanguages())],
            [['description'], 'string'],
            ['age_group', 'in', 'range' => array_keys(self::getAgeGroups())],
            ['language', 'in', 'range' => array_keys(self::getLanguages())]
        ];
    }

    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'name' => 'Название',
            'date' => 'Дата',
            'class' => 'Класс',
            'age_group' => 'Возрастная группа',
            'language' => 'Язык программирования',
            'description' => 'Описание',
            'pending' => 'В обратотке'
        ];
    }


    public static function getAgeGroups()
    {
        return [
            self::AGE_GROUP_JUNIOR => 'Младшая (7-12 лет)',
            self::AGE_GROUP_MIDDLE => 'Средняя (13-16 лет)',
            self::AGE_GROUP_SENIOR => 'Старшая (17-18 лет)',
            'unknown' => 'Не указана'
        ];
    }

    public static function getLanguages()
    {
        return [
            self::LANGUAGE_CPP => 'C++',
            self::LANGUAGE_PYTHON => 'Python',
            self::LANGUAGE_JAVA => 'Java',
        ];
    }
}