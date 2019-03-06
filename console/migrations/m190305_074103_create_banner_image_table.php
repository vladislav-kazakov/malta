<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%banner_image}}`.
 */
class m190305_074103_create_banner_image_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%banner_image}}', [
            'id' => $this->primaryKey(),
            'image' => $this->string(),
            'position' => $this->integer(),
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%banner_image}}');
    }
}
