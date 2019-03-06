<?php

use yii\db\Migration;

/**
 * Handles the creation of table `category`.
 */
class m190213_050502_create_category_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('category', [
            'id' => $this->primaryKey(),
            'image' => $this->string(),
            'type_id' => $this->integer()
        ]);

        $this->addForeignKey(
            'fk-category-type',
            'category',
            'type_id',
            'type',
            'id',
            'CASCADE'
        );

        $this->createTable('category_language', [
            'id' => $this->primaryKey(),
            'category_id' => $this->integer()->notNull(),
            'locale' => $this->string(10)->notNull(),
            'name' => $this->string()->notNull(),
            'annotation' => $this->text(),
            'description' => $this->text(),
            'publication' => $this->text(),
        ]);

        $this->addForeignKey(
            'fk-category_language-category',
            'category_language',
            'category_id',
            'category',
            'id',
            'CASCADE'
        );
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropForeignKey(
            'fk-category_language-category',
            'category_language'
        );

        $this->dropTable('category_language');

        $this->dropForeignKey(
            'fk-category-type',
            'category'
        );

        $this->dropTable('category');
    }
}
