<?php

/**
 * This is the model class for table "tbl_user".
 *
 * The followings are the available columns in table 'tbl_user':
 * @property string $id
 * @property string $username
 * @property string $password
 * @property string $name
 * @property string $family
 * @property integer $status
 * @property string $email
 * @property string $phone
 * @property integer $lock
 * @property string $premium_code
 * @property string $password_repeat
 */
class User extends CActiveRecord
{
	
	public $password_repeat;
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return User the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}

	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'tbl_user';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('username, password, password_repeat,email,name', 'required'),
			array('username','unique','message'=>'Username already exists.'),
			array('email','unique','message'=>'You have already signed up.'),
			array('status, lock', 'numerical', 'integerOnly'=>true),
			array('username, password, email', 'length', 'max'=>50),
			array('name, family', 'length', 'max'=>60),
			array('password','compare','on'=>'create'),
			array('password_repeat','safe','on'=>'create'),
			array('phone, premium_code', 'length', 'max'=>20),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id, username, password, name, family, status, email, phone, lock, premium_code', 'safe', 'on'=>'search'),
		);
	}

	/**
	 * @return array relational rules.
	 */
	public function relations()
	{
		// NOTE: you may need to adjust the relation name and the related
		// class name for the relations automatically generated below.
		return array(
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => 'ID',
			'username' => 'Username',
			'password' => 'Password',
			'name' => 'Name',
			'family' => 'Family',
			'status' => 'Status',
			'email' => 'Email',
			'phone' => 'Phone',
			'lock' => 'Lock',
			'premium_code' => 'Premium Code',
			'password_repeat'=>'Password Repeat',
		);
	}

	/**
	 * Retrieves a list of models based on the current search/filter conditions.
	 * @return CActiveDataProvider the data provider that can return the models based on the search/filter conditions.
	 */
	public function search()
	{
		// Warning: Please modify the following code to remove attributes that
		// should not be searched.

		$criteria=new CDbCriteria;

		$criteria->compare('id',$this->id,true);
		$criteria->compare('username',$this->username,true);
		$criteria->compare('password',$this->password,true);
		$criteria->compare('name',$this->name,true);
		$criteria->compare('family',$this->family,true);
		$criteria->compare('status',$this->status);
		$criteria->compare('email',$this->email,true);
		$criteria->compare('phone',$this->phone,true);
		$criteria->compare('lock',$this->lock);
		$criteria->compare('premium_code',$this->premium_code,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
}