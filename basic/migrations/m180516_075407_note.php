<?php

use yii\db\Migration;

/**
 * Class m180516_075407_note
 */
class m180516_075407_note extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('note', [
            'id'         => $this->primaryKey()->notNull(),
            'text'       => $this->text()->notNull(),
            'creator_id' => $this->integer()->notNull(),
            'created_at' => $this->integer(),
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('note');

        return true;
    }

    /*
// Use up()/down() to run migration code without a transaction.
public function up()
{

}

public function down()
{
echo "m180516_075407_note cannot be reverted.\n";

return false;
}
 */
}
