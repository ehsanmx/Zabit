<?php

/**
 * This is the model class for table "tbl_account_item".
 *
 * The followings are the available columns in table 'tbl_account_item':
 * @property string $id
 * @property integer $debtor
 * @property integer $creditor
 * @property string $cost_id
 * @property string $income_id
 * @property string $create_date
 * @property string $description
 * @property string $account_id
 */
class AccountItem extends CActiveRecord
{
	public $sumc;
	public $tyname;
	public $cyname;
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return AccountItem the static model class
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
		return 'tbl_account_item';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('debtor, creditor, create_date, account_id', 'required'),
			array('debtor, creditor', 'numerical', 'integerOnly'=>true),
			array('cost_id, income_id, account_id', 'length', 'max'=>20),
			array('description', 'safe'),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id, debtor, creditor, cost_id, income_id, create_date, description, account_id', 'safe', 'on'=>'search'),
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
			'debtor' => 'Debtor',
			'creditor' => 'Creditor',
			'cost_id' => 'Cost',
			'income_id' => 'Income',
			'create_date' => 'Create Date',
			'description' => 'Description',
			'account_id' => 'Account',
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
		$criteria->compare('debtor',$this->debtor);
		$criteria->compare('creditor',$this->creditor);
		$criteria->compare('cost_id',$this->cost_id,true);
		$criteria->compare('income_id',$this->income_id,true);
		$criteria->compare('create_date',$this->create_date,true);
		$criteria->compare('description',$this->description,true);
		$criteria->compare('account_id',$this->account_id,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
}