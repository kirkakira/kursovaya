<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%tournament}}`.
 */
class m250426_070802_create_tournament_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('tournament', [
            'id' => $this->primaryKey(),
            'name' => $this->string()->notNull(),
            'date' => $this->date()->notNull(),
            'description' => $this->text(),
            'created_at' => $this->integer()->notNull(),
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%tournament}}');
    }
}
