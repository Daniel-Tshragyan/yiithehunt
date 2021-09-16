<?php

use yii\db\Migration;

/**
 * Class m210916_092430_change_posts_table
 */
class m210916_092430_change_posts_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->alterColumn('posts', 'created_at', 'integer');
        $this->addColumn('posts', 'updated_at','integer');
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        echo "m210916_092430_change_posts_table cannot be reverted.\n";
        return false;
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m210916_092430_change_posts_table cannot be reverted.\n";

        return false;
    }
    */
}
