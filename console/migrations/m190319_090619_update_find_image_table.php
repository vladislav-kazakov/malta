<?php

use yii\db\Migration;

/**
 * Class m190319_090619_update_find_image_table
 */
class m190319_090619_update_find_image_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->addColumn('find_image', 'description', $this->text());
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropColumn('find_image', 'description');
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m190319_090619_update_find_image_table cannot be reverted.\n";

        return false;
    }
    */
}
