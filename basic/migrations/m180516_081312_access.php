<?php

use yii\db\Migration;

/**
 * Class m180516_081312_access
 */
class m180516_081312_access extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('access', [
            'id'      => $this->primaryKey()->notNull(),
            'note_id' => $this->integer()->notNull(),
            'user_id' => $this->integer()->notNull(),
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('access');

        return true;
    }

    /*
// Use up()/down() to run migration code without a transaction.
public function up()
{

}

public function down()
{
echo "m180516_081312_access cannot be reverted.\n";

return false;
}
 */
}
