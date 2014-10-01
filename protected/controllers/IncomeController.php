<?php

class IncomeController extends Controller
{
	/**
	 * @var string the default layout for the views. Defaults to '//layouts/column2', meaning
	 * using two-column layout. See 'protected/views/layouts/column2.php'.
	 */
	public $layout='//layouts/column2';

	/**
	 * @return array action filters
	 */
	public function filters()
	{
		return array(
			'accessControl', // perform access control for CRUD operations
			'postOnly + delete', // we only allow deletion via POST request
		);
	}

	/**
	 * Specifies the access control rules.
	 * This method is used by the 'accessControl' filter.
	 * @return array access control rules
	 */
	public function accessRules()
	{
		return array(
			array('allow',  // allow all users to perform 'index' and 'view' actions
				'actions'=>array('index','view'),
				'users'=>array('*'),
			),
			array('allow', // allow authenticated user to perform 'create' and 'update' actions
				'actions'=>array('create','update'),
				'users'=>array('@'),
			),
			array('allow', // allow admin user to perform 'admin' and 'delete' actions
				'actions'=>array('list','delete'),
				'users'=>array('@'),
			),
			array('deny',  // deny all users
				'users'=>array('*'),
			),
		);
	}

	/**
	 * Displays a particular model.
	 * @param integer $id the ID of the model to be displayed
	 */
	public function actionView($id)
	{
		$this->render('view',array(
			'model'=>$this->loadModel($id),
		));
	}

	/**
	 * Creates a new model.
	 * If creation is successful, the browser will be redirected to the 'view' page.
	 */
	public function actionCreate()
	{
		$model=new Income;

		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);
		if(isset($_POST['Income']))
		{
			$model->attributes=$_POST['Income'];
			$model->user_id=Yii::app()->user->id;
			$model->create_date = date("Y-m-d H:i:s");
			if($model->save()){
				if($model->status==1){
					AccountCMP::increaseBalance($model->user_id, $model->amount);
					AccountCMP::newCreditor($model->amount,null,$model->id, $model->user_id, $model->incomeType->name);
				}
				$this->redirect(array('view','id'=>$model->id));
			}
		}

		$this->render('create',array(
			'model'=>$model,
		));
	}

	/**
	 * Updates a particular model.
	 * If update is successful, the browser will be redirected to the 'view' page.
	 * @param integer $id the ID of the model to be updated
	 */
	public function actionUpdate($id)
	{
		$model=$this->loadModel($id);
		$previous_amount = $model->amount;

		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if(isset($_POST['Income']))
		{
			$model->attributes=$_POST['Income'];
			$model->create_date = date("Y-m-d H:i:s");
			if($model->save()){
				if($model->status==1){
					// I'm too drunk, i need to calc the diff of these 2 amounts :/
					$acountItem = AccountCMP::findCreaditor($model->id);
					if(isset($acountItem)){
						AccountCMP::decreaseBalance(Yii::app()->user->id, $previous_amount);
						AccountCMP::increaseBalance(Yii::app()->user->id, $model->amount);						
						AccountCMP::updateCreditor($model->id, $model->amount, $model->incomeType->name);
					}else{
						AccountCMP::increaseBalance(Yii::app()->user->id, $model->amount);
						AccountCMP::newCreditor($model->amount,null,$model->id, Yii::app()->user->id, $model->incomeType->name);
					}
				}else{
					AccountCMP::decreaseBalance(Yii::app()->user->id, $model->amount);
					AccountCMP::dellCreditor($model->id);						
				}
				$this->redirect(array('view','id'=>$model->id));
			}
				
		}

		$this->render('update',array(
			'model'=>$model,
		));
	}

	/**
	 * Deletes a particular model.
	 * If deletion is successful, the browser will be redirected to the 'admin' page.
	 * @param integer $id the ID of the model to be deleted
	 */
	public function actionDelete($id)
	{
		$model = $this->loadModel($id);
		if($model->status==1){
			AccountCMP::decreaseBalance(Yii::app()->user->id, $model->amount);
			AccountCMP::dellCreditor($model->id);
		}		
		$model->delete();

		// if AJAX request (triggered by deletion via admin grid view), we should not redirect the browser
		if(!isset($_GET['ajax']))
			$this->redirect(isset($_POST['returnUrl']) ? $_POST['returnUrl'] : array('list'));
	}

	/**
	 * Lists all models.
	 */
	public function actionIndex()
	{
		$dataProvider=new CActiveDataProvider('Income');
		$this->render('index',array(
			'dataProvider'=>$dataProvider,
		));
	}

	/**
	 * Manages all models.
	 */
	public function actionList()
	{
		$model=new Income('search');
		$model->unsetAttributes();  // clear any default values
		if(isset($_GET['Income']))
			$model->attributes=$_GET['Income'];

		$this->render('admin',array(
			'model'=>$model,
		));
	}

	/**
	 * Returns the data model based on the primary key given in the GET variable.
	 * If the data model is not found, an HTTP exception will be raised.
	 * @param integer the ID of the model to be loaded
	 */
	public function loadModel($id)
	{
		$model=Income::model()->findByPk($id);
		if($model===null || $model->user_id!=Yii::app()->user->id)
			throw new CHttpException(404,'The requested page does not exist.');
		return $model;
	}

	/**
	 * Performs the AJAX validation.
	 * @param CModel the model to be validated
	 */
	protected function performAjaxValidation($model)
	{
		if(isset($_POST['ajax']) && $_POST['ajax']==='income-form')
		{
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}
	}
}
