<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "borrowing".
 *
 * @property int $id_borrowing
 * @property int $user
 * @property int $book
 * @property string $borrowed
 * @property string|null $returned
 *
 * @property Book $bookModel
 * @property LibraryUser $userModel
 */
class Borrowing extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'borrowing';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            ['book', 'required', 'message' => 'Musíte vybrat knihu'],
            ['user', 'required', 'message' => 'Musíte vybrat čtenáře'],
            [['user', 'book', 'returned'], 'integer'],
            [['borrowed', 'returned'], 'safe'],
            [['book'], 'exist', 'skipOnError' => true, 'targetClass' => Book::class, 'targetAttribute' => ['book' => 'id_book']],
            [['user'], 'exist', 'skipOnError' => true, 'targetClass' => LibraryUser::class, 'targetAttribute' => ['user' => 'id_user']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id_borrowing' => 'ID',
            'user' => 'Čtenář',
            'book' => 'Kniha',
            'borrowed' => 'Půjčeno',
            'returned' => 'Vráceno',
        ];
    }

    public function getUsername()
    {
        return LibraryUser::find();
    }

    /**
     * Gets query for [[Book]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getBooks()
    {
        return $this->hasOne(Book::class, ['id_book' => 'book']);
    }

    /**
     * Gets query for [[LibraryUser]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getUsers()
    {
        return $this->hasOne(LibraryUser::class, ['id_user' => 'user']);
    }
}
