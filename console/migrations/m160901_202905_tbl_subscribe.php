<?php

use yii\db\Migration;

class m160901_202905_tbl_subscribe extends Migration
{
    public function up()
    {
        $this->execute("
        CREATE TABLE `subscribe` (
          `idsubscribe` int(11) NOT NULL,
          `email` varchar(50) DEFAULT NULL,
          `date_subcribe` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
        ) ENGINE=InnoDB DEFAULT CHARSET=latin1;
        ");
    }

    public function down()
    {
        echo "m160901_202905_tbl_subscribe cannot be reverted.\n";
        $this->dropTable("subscribe");
        return false;
    }

    /*
    // Use safeUp/safeDown to run migration code within a transaction
    public function safeUp()
    {
    }

    public function safeDown()
    {
    }
    */
}
