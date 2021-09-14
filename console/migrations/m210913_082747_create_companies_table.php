<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%companies}}`.
 */
class m210913_082747_create_companies_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%companies}}', [
            'id' => $this->primaryKey(),
            'user_id' => $this->integer(),
            'city_id' => $this->integer(),
            'companyname' => $this->string(),
            'tagline' => $this->string(),
            'location' => $this->string(),
            'image' => $this->string(),
        ]);

        $this->addForeignKey('fk_company_user_id','companies','user_id','user','id','CASCADE','CASCADE');
        $this->addForeignKey('fk_company_city_id','companies','city_id','cities','id','CASCADE','CASCADE');
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%companies}}');
    }
}
