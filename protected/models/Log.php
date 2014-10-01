<?php

/**
 * This is the model class for table "tbl_log".
 *
 * The followings are the available columns in table 'tbl_log':
 * @property integer $id
 * @property integer $user_id
 * @property string $desc
 * @property string $create_date
 * @property string $action
 * @property string $fa_desc
 * @property string $op_desc
 */
class Log extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return Log the static model class
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
		return 'tbl_log';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('create_date', 'required'),
			array('user_id', 'numerical', 'integerOnly'=>true),
			array('desc', 'length', 'max'=>1000),
			array('action', 'length', 'max'=>500),
			array('fa_desc, op_desc', 'length', 'max'=>4000),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id, user_id, desc, create_date, action, fa_desc, op_desc', 'safe', 'on'=>'search'),
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
			'user_id' => 'User',
			'desc' => 'Desc',
			'create_date' => 'Create Date',
			'action' => 'Action',
			'fa_desc' => 'Fa Desc',
			'op_desc' => 'Op Desc',
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

		$criteria->compare('id',$this->id);
		$criteria->compare('user_id',$this->user_id);
		$criteria->compare('desc',$this->desc,true);
		$criteria->compare('create_date',$this->create_date,true);
		$criteria->compare('action',$this->action,true);
		$criteria->compare('fa_desc',$this->fa_desc,true);
		$criteria->compare('op_desc',$this->op_desc,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
}