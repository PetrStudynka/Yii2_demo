<?php

namespace app\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Borrowing;

/**
 * BorrowingSearch represents the model behind the search form of `app\models\Borrowing`.
 */
class BorrowingSearch extends Borrowing
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id_borrowing', 'user', 'book'], 'integer'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function scenarios()
    {
        // bypass scenarios() implementation in the parent class
        return Model::scenarios();
    }

    /**
     * Creates data provider instance with search query applied
     *
     * @param array $params
     *
     * @return ActiveDataProvider
     */
    public function search($params)
    {
        //$query = Borrowing::find()->joinWith('user')->joinWith('book')->select(['*']);
        $query = Borrowing::find();

        // add conditions that should always apply here

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        $this->load($params);

        if (!$this->validate()) {
            // uncomment the following line if you do not want to return any records when validation fails
            // $query->where('0=1');
            return $dataProvider;
        }


        // grid filtering conditions
        $query->andFilterWhere([
            'id_borrowing' => $this->id_borrowing,
            'user' => $this->user,
            'book' => $this->book,
        ]);

        return $dataProvider;
    }
}
