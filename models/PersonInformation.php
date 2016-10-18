<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "person_info".
 *
 * @property integer $id
 * @property string $title
 * @property string $firstname
 * @property string $lastname
 * @property string $mobilenumber
 * @property string $telephone
 * @property string $flatNumber
 * @property string $address
 * @property string $address1
 * @property string $address2
 * @property string $address3
 * @property string $address4
 * @property string $address5
 * @property string $postcode
 * @property string $amount
 * @property string $reasonForLoan
 * @property string $emailAddress
 * @property string $dateOfBirth
 * @property integer $created_at
 * @property integer $updated_at
 */
class PersonInformation extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'person_info';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['created_at', 'updated_at'], 'required'],
            [['created_at', 'updated_at'], 'integer'],
            [['title', 'firstname', 'lastname', 'mobilenumber', 'telephone', 'flatNumber', 'address', 'address1', 'address2', 'address3', 'address4', 'address5', 'postcode', 'amount', 'reasonForLoan', 'emailAddress', 'dateOfBirth'], 'string', 'max' => 255],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'title' => 'Title',
            'firstname' => 'Firstname',
            'lastname' => 'Lastname',
            'mobilenumber' => 'Mobilenumber',
            'telephone' => 'Telephone',
            'flatNumber' => 'Flat Number',
            'address' => 'Address',
            'address1' => 'Address1',
            'address2' => 'Address2',
            'address3' => 'Address3',
            'address4' => 'Address4',
            'address5' => 'Address5',
            'postcode' => 'Postcode',
            'amount' => 'Amount',
            'reasonForLoan' => 'Reason For Loan',
            'emailAddress' => 'Email Address',
            'dateOfBirth' => 'Date Of Birth',
            'created_at' => 'Created At',
            'updated_at' => 'Updated At',
        ];
    }
}
