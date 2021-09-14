<?php

use yii\db\Migration;

/**
 * Class m210913_071956_cerate_cities_table
 */
class m210913_071956_cerate_cities_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%cities}}', [
            'id' => $this->primaryKey(),
            'name' => $this->string()->notNull()->unique(),

        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        echo "m210913_071956_cerate_cities_table cannot be reverted.\n";

        return false;
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m210913_071956_cerate_cities_table cannot be reverted.\n";

        return false;
    }
    */
}
