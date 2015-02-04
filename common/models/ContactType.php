<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "d_contact_type".
 *
 * @property integer $id
 * @property string $name
 * @property string $description
 *
 * @property FContact[] $fContacts
 */
class ContactType extends \yii\db\ActiveRecord
{
    const CONTACT_TYPE_PERSONAL_EMAIL = 1;
    const CONTACT_TYPE_PERSONAL_MOBILE = 2;
    const CONTACT_TYPE_RESIDENCE_PHONE = 3;
    const CONTACT_TYPE_RESIDENCE_FAX = 4;

    const CONTACT_TYPE_BUSINESS_EMAIL = 5;
    const CONTACT_TYPE_BUSINESS_MOBILE = 6;
    const CONTACT_TYPE_BUSINESS_PHONE = 7;
    const CONTACT_TYPE_BUSINESS_FAX = 8;

    protected static $contactType = array(
                                            self::CONTACT_TYPE_PERSONAL_EMAIL => 'Personal Email',
                                            self::CONTACT_TYPE_PERSONAL_MOBILE => 'Personal Mobile',
                                            self::CONTACT_TYPE_RESIDENCE_PHONE => 'Residence Phone',
                                            self::CONTACT_TYPE_RESIDENCE_FAX => 'Residence Fax',
                                            self::CONTACT_TYPE_BUSINESS_EMAIL => 'Business Email',
                                            self::CONTACT_TYPE_BUSINESS_MOBILE => 'Business Mobile',
                                            self::CONTACT_TYPE_BUSINESS_PHONE => 'Business Phone',
                                            self::CONTACT_TYPE_BUSINESS_FAX => 'Business Fax'
                                         );
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'd_contact_type';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['name', 'description'], 'required'],
            [['name'], 'string', 'max' => 128],
            [['description'], 'string', 'max' => 255]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('frontend', 'ID'),
            'name' => Yii::t('frontend', 'name'),
            'description' => Yii::t('frontend', 'description'),
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getFContacts()
    {
        return $this->hasMany(FContact::className(), ['contact_type' => 'id']);
    }
}
