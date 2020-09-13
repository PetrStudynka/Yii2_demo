<?php

namespace app\models;

use Yii;
use yii\helpers\ArrayHelper;

/**
 * This is the model class for table "book".
 *
 * @property int $id_book
 * @property string $name
 * @property string $author
 *
 * @property Borrowing[] $borrowings
 */
class Book extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'book';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['name', 'author'], 'string', 'max' => 128],
            ['name', 'required', 'message' => '{attribute} knihy musí být vyplněn'],
            ['author', 'required', 'message' => '{attribute} knihy musí být vyplněn']
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'name' => 'Název',
            'author' => 'Autor',
            'genre' => 'Žánr',
        ];
    }

    /**
     * Gets query for [[Borrowings]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getBorrowings()
    {
        return $this->hasMany(Borrowing::class, ['book' => 'id_book']);
    }

    public function getGenresList()
    {
        $genres = $this->getGenres()->all();
        $result = [];
        foreach ($genres as $genre) {
            $result[] = $genre['name'];
        }
        return implode(', ', $result);
    }

    public function getGenreNames()
    {

        $models = Genre::find()->asArray()->all();

        return ArrayHelper::map($models, 'id_genre', 'name');
    }

    /**
     * Gets query for [[Genre]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getGenres()
    {
        return $this->hasMany(Genre::class, ['id_genre' => 'genre'])->viaTable('genre_book', ['book' => 'id_book']);
    }
}
