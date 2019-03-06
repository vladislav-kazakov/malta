<?php

use yii\db\Migration;

/**
 * Class m190221_100212_update_find_table
 */
class m190221_100212_update_find_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->addColumn('find', 'three_d', $this->string(400));

    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropColumn('find', 'three_d');
    }
}
