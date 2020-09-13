<?php

use yii\db\Migration;

/**
 * Class m200913_000724_library
 */
class m200913_000724_library extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
    }

    public function up()
    {

        $this->createTable('genre', [
            'id_genre' => $this->primaryKey(),
            'name' => $this->string(64)->notNull()->unique(),
        ]);

        $this->createTable('book', [
            'id_book' => $this->primaryKey(),
            'name' => $this->string(128)->notNull(),
            'author' => $this->string(128)->notNull(),
        ]);

        $this->createTable('user', [
            'id_user' => $this->primaryKey(),
            'first_name' => $this->string(64)->notNull(),
            'last_name' => $this->string(64)->notNull()
        ]);

        $this->createTable('borrowing', [
            'id_borrowing' => $this->primaryKey(),
            'user' => $this->integer()->notNull(),
            'book' => $this->integer()->notNull(),
            'borrowed' => $this->timestamp()->defaultExpression('CURRENT_TIMESTAMP'),
            'returned' => $this->timestamp()->defaultValue(null)
        ]);

        $this->createTable('genre_book', [
            'id_genre_book' => $this->primaryKey(),
            'book' => $this->integer()->notNull(),
            'genre' => $this->integer()->notNull()
        ]);

        $this->addForeignKey('gk_book_FK', 'genre_book', 'book', 'book', 'id_book', 'CASCADE', 'CASCADE');
        $this->addForeignKey('gk_genre_FK', 'genre_book', 'genre', 'genre', 'id_genre', 'CASCADE', 'CASCADE');
        $this->addForeignKey('bg_user_FK', 'borrowing', 'user', 'user', 'id_user', 'CASCADE', 'CASCADE');
        $this->addForeignKey('bg_book_FK', 'borrowing', 'book', 'book', 'id_book', 'CASCADE', 'CASCADE');

        $this->batchInsert('genre', ['name'], [
            ['Fantasy'],
            ['Historický'],
            ['Dobrodružný'],
            ['Drama'],
            ['Scifi'],
            ['Pohádka'],
        ]);

        $this->batchInsert('user', ['first_name', 'last_name'], [
            ['Michal', 'David'],
            ['Andreas', 'Muntzer'],
            ['Tomáš', 'Fuk'],
        ]);

        $this->batchInsert('book', ['name', 'author'], [
            ['Válka s mloky', 'Karel Čapek'],
            ['Ostře sledované vlaky', 'Bohumil Hraba'],
            ['Pipi dlouhá punčocha', 'Astrid Lindgren'],
        ]);

        $this->batchInsert('genre_book', ['genre', 'book'], [
            [1, 1],
            [2, 2],
            [3, 3],
            [3, 1]
        ]);
    }

    public function down()
    {
        $this->dropTable('genre_book');
        $this->dropTable('borrowing');
        $this->dropTable('book');
        $this->dropTable('user');
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        echo "m200913_000724_library cannot be reverted.\n";

        return false;
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m200913_000724_library cannot be reverted.\n";

        return false;
    }
    */
}
