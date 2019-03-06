<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%type}}`.
 */
class m190212_091921_create_type_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('type', [
            'id' => $this->primaryKey(),
        ]);

        $this->createTable('type_language', [
            'id' => $this->primaryKey(),
            'type_id' => $this->integer()->notNull(),
            'locale' => $this->string(10)->notNull(),
            'name' => $this->string()->notNull(),
            'annotation' => $this->text(),
            'publication' => $this->text(),
        ]);

        $this->addForeignKey(
            'fk-type_language-type',
            'type_language',
            'type_id',
            'type',
            'id',
            'CASCADE'
        );
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropColumn('site', 'type_id');

        $this->dropForeignKey(
            'fk-type_language-type',
            'type_language'
        );

        $this->dropTable('type_language');

        $this->dropTable('type');
    }
}
