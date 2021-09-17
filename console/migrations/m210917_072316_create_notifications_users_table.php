<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%notifications_posts}}`.
 */
class m210917_072316_create_notifications_users_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%notifications_users}}', [
            'id' => $this->primaryKey(),
            'notification_id' => $this->integer(),
            'user_id' => $this->integer(),
        ]);
        $this->addForeignKey('fk_notifications_posts_id','notifications_users','notification_id','notifications','id','CASCADE','CASCADE');
        $this->addForeignKey('fk_posts_notifications_id','notifications_users','user_id','user','id','CASCADE','CASCADE');

    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%notifications_posts}}');
    }
}
