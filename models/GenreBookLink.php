<?php

namespace app\models;

use Yii;

/**
 * Model class for table genre_book
 * @property int $id_genre_book
 * @property int $genre
 * @property int $book
 *
 * @property Genre $genreModel
 * @property Book $bookModel
 */
class GenreBookLink extends \yii\db\ActiveRecord
{

    /**
     * @inheritDoc
     */
    public static function tableName()
    {
        return 'genre_book';
    }

    /**
     * @inheritDoc
     */
    public function rules()
    {
        return [
            ['book', 'required', 'message' => '{attribute} musí být vybrána.'],
            ['genre', 'required', 'message' => '{attribute} musí být vybrán.'],
            [['book', 'genre'], 'integer']
        ];
    }

    /**
     * @inheritDoc
     */
    public function attributeLabels()
    {
        return [
            'book' => 'Kniha',
            'genre' => 'Žánr',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getGenre()
    {
        return $this->hasOne(Genre::class, ['id_genre' => 'genre']);
    }
    /**
     * @return \yii\db\ActiveQuery
     */
    public function getBook()
    {
        return $this->hasOne(Book::class, ['id_book' => 'book']);
    }
}
