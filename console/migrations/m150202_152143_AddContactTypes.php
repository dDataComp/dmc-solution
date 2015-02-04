<?php

use yii\db\Schema;
use yii\db\Migration;

class m150202_152143_AddContactTypes extends Migration
{
    public function up()
    {
        // add default contact types
        $sqls[] = "INSERT IGNORE INTO `d_contact_type` (`id`, `name`, `const`, `description`) VALUES
                   ('1', 'Personal email', 'CONTACT_TYPE_PERSONAL_EMAIL', 'Personal email'),
                   ('2', 'Personal Mobile', 'CONTACT_TYPE_PERSONAL_MOBILE', 'Personal Mobile'),
                   ('3', 'Residence Phone', 'CONTACT_TYPE_RESIDENCE_PHONE', 'Residence Phone'),
                   ('4', 'Residence Fax', 'CONTACT_TYPE_RESIDENCE_FAX', 'Residence Fax'),
                   ('5', 'Business Email', 'CONTACT_TYPE_BUSINESS_EMAIL', 'Business Email'),
                   ('6', 'Business Mobile', 'CONTACT_TYPE_BUSINESS_MOBILE', 'Business Mobile'),
                   ('7', 'Business Phone', 'CONTACT_TYPE_BUSINESS_PHONE', 'Business Phone'),
                   ('8', 'Business Fax', 'CONTACT_TYPE_BUSINESS_FAX', 'Business Fax');";
        foreach($sqls as $sql)
        {
            $this->execute($sql);
        }
    }

    public function down()
    {
        echo "m150202_152143_AddContactTypes cannot be reverted.\n";

        return false;
    }
}
