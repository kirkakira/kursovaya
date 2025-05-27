<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%application}}`.
 */
class m250426_070807_create_application_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('application', [
            'id' => $this->primaryKey(),
            'user_id' => $this->integer()->notNull(),
            'tournament_id' => $this->integer()->notNull(),
            'status' => $this->string()->defaultValue('pending'),
            'created_at' => $this->integer()->notNull(),
        ]);

        $this->addForeignKey(
            'fk-application-user_id',
            'application',
            'user_id',
            'user',
            'id',
            'CASCADE'
        );

        $this->addForeignKey(
            'fk-application-tournament_id',
            'application',
            'tournament_id',
            'tournament',
            'id',
            'CASCADE'
        );
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%application}}');
    }
}
