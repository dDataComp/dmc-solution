<?php
namespace frontend\models;

use common\models\User;
use common\models\Contact;
use common\models\ContactType;
use yii\web\Request;
use yii\base\Model;
use Yii;

/**
 * Signup form
 */
class SignupForm extends Model
{
    public $username;
    public $contact_detail;
    public $password;

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            ['username', 'filter', 'filter' => 'trim'],
            ['username', 'required'],
            ['username', 'unique', 'targetClass' => '\common\models\User', 'message' => 'This username has already been taken.'],
            ['username', 'string', 'min' => 2, 'max' => 255],

            ['contact_detail', 'filter', 'filter' => 'trim'],
            ['contact_detail', 'required'],
            ['contact_detail', 'email'],
            ['contact_detail', 'unique', 'targetClass' => '\common\models\Contact', 'message' => 'This email address has already been taken.'],

            ['password', 'required'],
            ['password', 'string', 'min' => 6],
        ];
    }

    /**
     * Signs user up.
     *
     * @return User|null the saved model or null if saving fails
     */
    public function signup()
    {
        if ($this->validate()) {
            $httpRequest = new Request();
            $location_id = $httpRequest->getBodyParam('location',1);
            $user = new User();
            $user->username = $this->username;
            $user->setPassword($this->password);
            $user->generateAuthKey();
            if ($user->save()) {
                $contact = new Contact();
                $contact->location_id = $location_id;
                $contact->user_id = $user->id;
                $contact->contact_type = ContactType::$contactType[1];
                $contact->areacode = null;
                $contact->intlcode = null;
                $contact->created_at = date('Y-m-d H:i:s');
                $contact->updated_at = date('Y-m-d H:i:s');
                $contact->is_primary = true;
                $contact->is_invalid = false;
                if($contact->save())
                {
                    return $user;
                }
            }
        }

        return null;
    }
}
