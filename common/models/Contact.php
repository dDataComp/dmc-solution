<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "f_contact".
 *
 * @property integer $location_id
 * @property integer $user_id
 * @property integer $contact_type
 * @property integer $intlcode
 * @property integer $areacode
 * @property string $contact_detail
 * @property string $updated_at
 * @property string $created_at
 * @property integer $is_primary
 * @property integer $is_invalid
 *
 * @property DContactType $contactType
 * @property DLocation $location
 * @property DUsers $user
 */
class Contact extends \yii\db\ActiveRecord
{
    const CONTACT_PRIMARY_YES = 1;
    const CONTACT_PRIMARY_NO = 0;
    const CONTACT_INVALID_YES = 1;
    const CONTACT_INVALID_NO = 0;
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'f_contact';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['location_id', 'user_id', 'contact_type', 'contact_detail', 'created_at'], 'required'],
            [['location_id', 'user_id', 'contact_type', 'intlcode', 'areacode', 'is_primary', 'is_invalid'], 'integer'],
            [['updated_at', 'created_at'], 'safe'],
            [['contact_detail'], 'string', 'max' => 255]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'location_id' => Yii::t('frontend', 'location'),
            'user_id' => Yii::t('frontend', 'user id'),
            'contact_type' => Yii::t('frontend', 'contact type'),
            'intlcode' => Yii::t('frontend', 'international code'),
            'areacode' => Yii::t('frontend', 'areacode'),
            'contact_detail' => Yii::t('frontend', 'detail'),
            'updated_at' => Yii::t('frontend', 'updated time'),
            'created_at' => Yii::t('frontend', 'created time'),
            'is_primary' => Yii::t('frontend', 'primary contact'),
            'is_invalid' => Yii::t('frontend', 'invalid contact'),
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getContactType()
    {
        return $this->hasOne(DContactType::className(), ['id' => 'contact_type']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getLocation()
    {
        return $this->hasOne(DLocation::className(), ['id' => 'location_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getUser()
    {
        return $this->hasOne(DUsers::className(), ['id' => 'user_id']);
    }
}
