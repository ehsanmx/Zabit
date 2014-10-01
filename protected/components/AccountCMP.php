<?php
class AccountCMP{
	public static function newCreditor($creditor,$cost_id=null,$income_id=null,$account_id,$description)
	{
		$creditorItem = new AccountItem();
		$creditorItem->debtor=0;
		$creditorItem->creditor=$creditor;
		$creditorItem->cost_id=$cost_id;
		$creditorItem->income_id=$income_id;
		$creditorItem->create_date = date("Y-m-d H:i:s");
		$creditorItem->account_id=$account_id;
		$creditorItem->description=$description;
		if($creditorItem->save()) {		
				return array('errCode'=>0,'data'=>$creditorItem);
		}
		else {
			LogCMP::log(Yii::app()->user->id,'accountCMP/creditor : failed to create creditor item for income id = '.$income_id.'due to '.serialize($creditorItem->getErrors()),'خطا در ثبت حساب بستانکاری برای ثبت درآمد = '.$income_id,'accountCMP/creditor','');
			return array('errCode'=>1,'data'=>serialize($creditorItem->getErrors()));
		}
	}
	public static function newDebtor($debtor,$cost_id=null,$income_id=null,$account_id,$description)
	{
		$debtorItem = new AccountItem();
		$debtorItem->debtor=$debtor;
		$debtorItem->creditor=0;
		$debtorItem->cost_id=$cost_id;
		$debtorItem->income_id=$income_id;
		$debtorItem->create_date = date("Y-m-d H:i:s");
		$debtorItem->account_id=$account_id;
		$debtorItem->description=$description;
		if($debtorItem->save()) {
			return array('errCode'=>0,'data'=>$debtorItem);
		}
		else {
			LogCMP::log(Yii::app()->user->id,'accountCMP/debtor : failed to create debtor item for cost id = '.$cost_id.'due to '.serialize($debtorItem->getErrors()),'خطا در ثبت حساب بدهکاری برای ثبت هزینه = '.$cost_id,'accountCMP/debtor','');
			return array('errCode'=>1,'data'=>serialize($debtorItem->getErrors()));
		}
	}
	public static function increaseBalance($id,$amount){
		$account = Account::model()->findByPk($id);
		$account->balance += $amount;
		$account->save();		
	}
	
	public static function decreaseBalance($id,$amount){
		$account = Account::model()->findByPk($id);
		$account->balance -= $amount;
		$account->save();
	}
	
	public static function dellCreditor($income_id){
		$model = AccountItem::model()->findByAttributes(array('income_id'=>$income_id));
		$model->delete();
	}
	public static function dellDebtor($cost_id){
		$model = AccountItem::model()->findByAttributes(array('cost_id'=>$cost_id));
		$model->delete();		
	}
	public static function updateCreditor($income_id,$amount,$desc){
		$model = AccountItem::model()->findByAttributes(array('income_id'=>$income_id));
		$model->creditor=$amount;
		$model->description=$desc;
		$model->save();
	}
	public static function updateDebtor($cost_id,$amount,$desc){
		$model = AccountItem::model()->findByAttributes(array('cost_id'=>$cost_id));
		$model->debtor=$amount;
		$model->description=$desc;
		$model->save();
	}
	public static function findDebtor($cost_id){
		$model = AccountItem::model()->findByAttributes(array('cost_id'=>$cost_id));
		return $model;
	}
	public static function findCreaditor($income_id){
		$model = AccountItem::model()->findByAttributes(array('income_id'=>$income_id));
		return $model;
	}	
}