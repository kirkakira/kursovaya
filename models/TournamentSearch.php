<?php
namespace app\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;

class TournamentSearch extends Tournament
{
    public function rules()
    {
        return [
            [['class', 'age_group', 'language'], 'safe'],
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
        ];
    }
    public function search($params)
    {
        $query = Tournament::find();

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
            'sort' => [
                'defaultOrder' => ['date' => SORT_ASC]
            ]
        ]);

        $this->load($params);

        if (!$this->validate()) {
            return $dataProvider;
        }

        $query->andFilterWhere(['class' => $this->class])
            ->andFilterWhere(['age_group' => $this->age_group])
            ->andFilterWhere(['language' => $this->language]);

        return $dataProvider;
    }
}