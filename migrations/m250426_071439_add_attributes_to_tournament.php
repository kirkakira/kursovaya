<?php

use yii\db\Migration;

class m250426_071439_add_attributes_to_tournament extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->addColumn('tournament', 'class', $this->integer());
        $this->addColumn('tournament', 'age_group', $this->string(50));
        $this->addColumn('tournament', 'language', $this->string(50));
    }

    public function safeDown()
    {
        $this->dropColumn('tournament', 'class');
        $this->dropColumn('tournament', 'age_group');
        $this->dropColumn('tournament', 'language');
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m250426_071439_add_attributes_to_tournament cannot be reverted.\n";

        return false;
    }
    */
}
