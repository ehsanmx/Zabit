<?php

/**
 * This is the model class for table "tbl_account".
 *
 * The followings are the available columns in table 'tbl_account':
 * @property string $id
 * @property string $name
 * @property integer $balance
 * @property integer $extra
 * @property integer $budget
 */
class Account extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return Account the static model class
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
		return 'tbl_account';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('id, name, balance, extra', 'required'),
			array('balance, extra, budget', 'numerical', 'integerOnly'=>true),
			array('id', 'length', 'max'=>20),
			array('name', 'length', 'max'=>100),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id, name, balance, extra, budget', 'safe', 'on'=>'search'),
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
			'name' => 'Name',
			'balance' => 'Balance',
			'extra' => 'Credit',
			'budget' => 'Budget',
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
		$criteria->compare('name',$this->name,true);
		$criteria->compare('balance',$this->balance);
		$criteria->compare('extra',$this->extra);
		$criteria->compare('budget',$this->budget);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
}