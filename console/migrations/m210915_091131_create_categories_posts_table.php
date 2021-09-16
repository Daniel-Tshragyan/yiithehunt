<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%categories_posts}}`.
 */
class m210915_091131_create_categories_posts_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%categories_posts}}', [
            'id' => $this->primaryKey(),
            'post_id' => $this->integer(),
            'category_id' => $this->integer(),
        ]);

        $this->addForeignKey('fk_post_id','categories_posts','post_id','posts','id','CASCADE','CASCADE');
        $this->addForeignKey('fk_category_id','categories_posts','category_id','categories','id','CASCADE','CASCADE');
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%categories_posts}}');
    }
}
