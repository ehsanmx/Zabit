<?php

/**
 * This is the model class for table "tbl_cost".
 *
 * The followings are the available columns in table 'tbl_cost':
 * @property string $id
 * @property integer $amount
 * @property integer $status
 * @property string $description
 * @property string $create_date
 * @property string $user_id
 * @property integer $cost_type_id
 */
class Cost extends CActiveRecord
{
	public $sumc;
	
	const PAID=1;
	const PENDING=2;
	
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return Cost the static model class
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
		return 'tbl_cost';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('amount, user_id, cost_type_id', 'required'),
			array('amount, status, cost_type_id', 'numerical', 'integerOnly'=>true),
			array('user_id', 'length', 'max'=>20),
			array('description, create_date', 'safe'),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id, amount, status, description, create_date, user_id, cost_type_id', 'safe', 'on'=>'search'),
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
				'costType' => array(self::BELONGS_TO, 'CostType', 'cost_type_id'),
				'user' => array(self::BELONGS_TO, 'User', 'user_id'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => 'ID',
			'amount' => 'Amount',
			'status' => 'Status',
			'description' => 'Description',
			'create_date' => 'Create Date',
			'user_id' => 'User',
			'cost_type_id' => 'Type',
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
		$criteria->compare('amount',$this->amount);
		$criteria->compare('status',$this->status);
		$criteria->compare('description',$this->description,true);
		$criteria->compare('create_date',$this->create_date,true);
		$criteria->compare('user_id',Yii::app()->user->id,true);
		$criteria->compare('cost_type_id',$this->cost_type_id);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
	public function getStatusOptions(){
		return array(
				self::PAID=>'Paid',
				self::PENDING=>'Pending',
		);
	}
	public function getStatusOptionsText(){
		$options = $this->getStatusOptions();
		return $options[$this->status];
	}
}