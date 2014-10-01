<?php

/**
 * This is the model class for table "tbl_active_sessions".
 *
 * The followings are the available columns in table 'tbl_active_sessions':
 * @property string $user_id
 * @property string $login_date
 * @property string $expire_date
 * @property integer $isActive
 * @property string $ip
 * @property integer $id
 * @property string $active_date
 */
class ActiveSession extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return ActiveSession the static model class
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
		return 'tbl_active_sessions';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('user_id, login_date, expire_date, isActive, ip, active_date', 'required'),
			array('isActive', 'numerical', 'integerOnly'=>true),
			array('user_id', 'length', 'max'=>20),
			array('ip', 'length', 'max'=>30),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('user_id, login_date, expire_date, isActive, ip, id, active_date', 'safe', 'on'=>'search'),
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
			'user_id' => 'User',
			'login_date' => 'Login Date',
			'expire_date' => 'Expire Date',
			'isActive' => 'Is Active',
			'ip' => 'Ip',
			'id' => 'ID',
			'active_date' => 'Active Date',
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

		$criteria->compare('user_id',$this->user_id,true);
		$criteria->compare('login_date',$this->login_date,true);
		$criteria->compare('expire_date',$this->expire_date,true);
		$criteria->compare('isActive',$this->isActive);
		$criteria->compare('ip',$this->ip,true);
		$criteria->compare('id',$this->id);
		$criteria->compare('active_date',$this->active_date,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
}