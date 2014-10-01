<?php 
class LogCMP
{
	public static function log($user_id,$description,$fa_desc,$action,$op_desc)
	{
		$log = new Log();
		$log->user_id = $user_id;
		$log->create_date = date("Y-m-d H:i:s");
		$log->desc = $description;
		$log->fa_desc = $fa_desc;
		$log->op_desc = $op_desc;
		$log->action = $action;
		$log->save();
	}
}
?>