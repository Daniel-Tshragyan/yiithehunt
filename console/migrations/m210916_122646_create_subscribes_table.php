<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%subscribes}}`.
 */
class m210916_122646_create_subscribes_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%subscribes}}', [
            'id' => $this->primaryKey(),
            'user_id' => $this->integer(),
            'category_id' => $this->integer(),
        ]);
        $this->addForeignKey('fk_subscribe_user_id','subscribes','user_id','user','id','CASCADE','CASCADE');
        $this->addForeignKey('fk_subscribe_category_id','subscribes','category_id','categories','id','CASCADE','CASCADE');

    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%subscribes}}');
    }
}
