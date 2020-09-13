<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "user".
 *
 * @property int $id_user
 * @property string $first_name
 * @property string $last_name
 *
 * @property Borrowing[] $borrowings
 */
class LibraryUser extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'user';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            ['first_name', 'required', 'message' => '{attribute} musí být vyplněno'],
            ['last_name', 'required', 'message' => '{attribute} musí být vyplněno'],
            [['first_name', 'last_name'], 'string', 'max' => 64],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id_user' => 'ID',
            'first_name' => 'Jméno',
            'last_name' => 'Příjmení',
        ];
    }

    /**
     * Gets query for [[Borrowings]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getBorrowings()
    {
        return $this->hasMany(Borrowing::class, ['user' => 'id_user']);
    }

    /**
     * Returns name for view
     *
     * @return string
     */
    public function getDisplayName()
    {
        return $this->first_name . ' ' . $this->last_name;
    }
}
