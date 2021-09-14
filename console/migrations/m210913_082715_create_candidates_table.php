<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%candidates}}`.
 */
class m210913_082715_create_candidates_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%candidates}}', [
            'id' => $this->primaryKey(),
            'user_id' => $this->integer(),
            'city_id' => $this->integer(),
            'age' => $this->integer(),
            'location' => $this->string(),
            'profession' => $this->string(),
            'image' => $this->string(),
        ]);
        $this->addForeignKey('fk_user_id','candidates','user_id','user','id','CASCADE','CASCADE');
        $this->addForeignKey('fk_city_id','candidates','city_id','cities','id','CASCADE','CASCADE');
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%candidates}}');
    }
}
