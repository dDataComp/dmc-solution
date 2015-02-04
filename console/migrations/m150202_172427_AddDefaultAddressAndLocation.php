<?php

use yii\db\Schema;
use yii\db\Migration;

class m150202_172427_AddDefaultAddressAndLocation extends Migration
{
    public function up()
    {
        // add address
        $sqls[] = "INSERT IGNORE INTO `d_address` (`id`, `address1`, `address2`, `address3`, `street_id`, `city_id`, `state_id`, `country_id`, `zip_code`) VALUES ('1', '200 South Huangzhen Road, Building No. 20', 'Room No. 20, Cross street Hechuan Road', 'Minhang District, Shanghai', NULL, NULL, NULL, NULL, '200031');";

        // add location
        $sqls[] = "INSERT IGNORE INTO `d_location` (`id`, `name`, `client_id`, `address_id`) VALUES ('1', 'Website', '1', '1');";

        foreach($sqls as $sql)
        {
            $this->execute($sql);
        }
    }

    public function down()
    {
        echo "m150202_172427_AddDefaultAddressAndLocation cannot be reverted.\n";

        return false;
    }
}
