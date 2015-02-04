<?php

use yii\db\Schema;
use yii\db\Migration;

class m150202_172254_AddDefaultClient extends Migration
{
    public function up()
    {
        $sqls[] = "INSERT IGNORE INTO `d_client` (`id`, `name`, `create_at`, `update_at`) VALUES ('1', 'DIGIMENUCARD', UNIX_TIMESTAMP(), UNIX_TIMESTAMP());";
        foreach($sqls as $sql)
        {
            $this->execute($sql);
        }
    }

    public function down()
    {
        echo "m150202_172254_AddDefaultClient cannot be reverted.\n";

        return false;
    }
}
