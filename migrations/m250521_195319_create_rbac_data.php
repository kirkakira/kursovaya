<?php

use yii\db\Migration;

class m250521_195319_create_rbac_data extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $auth = Yii::$app->authManager;


        $admin = $auth->createRole('admin');
        $auth->add($admin);


        $auth->assign($admin, 1);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        echo "m250521_195319_create_rbac_data cannot be reverted.\n";

        return false;
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m250521_195319_create_rbac_data cannot be reverted.\n";

        return false;
    }
    */
}
