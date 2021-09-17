<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%users_posts}}`.
 */
class m210917_093131_create_users_posts_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%users_posts}}', [
            'id' => $this->primaryKey(),
            'user_id' => $this->integer(),
            'post_id' => $this->integer(),
        ]);
        $this->addForeignKey('user_post','users_posts','user_id','user','id','CASCADE','CASCADE');
        $this->addForeignKey('post_user','users_posts','post_id','posts','id','CASCADE','CASCADE');

    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%users_posts}}');
    }
}
