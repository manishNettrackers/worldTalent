<?php

class ScoresController extends Controller
{
	/**
	 * @var string the default layout for the views. Defaults to '//layouts/column2', meaning
	 * using two-column layout. See 'protected/views/layouts/column2.php'.
	 */
	public $layout='//layouts/mainpage';

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
				'actions'=>array('index','view','eventunit','dynamicevent','eventunitname'),
				'users'=>array('*'),
			),
			array('allow', // allow authenticated user to perform 'create' and 'update' actions
				'actions'=>array('create','update','eventunit','dynamicevent','eventunitname'),
				'users'=>array('@'),
			),
			array('allow', // allow admin user to perform 'admin' and 'delete' actions
				'actions'=>array('admin','delete','eventunit','dynamicevent','eventunitname'),
				'users'=>array('admin'),
			),
			array('deny',  // deny all users
				'users'=>array('*'),
			),
		);
	}

	public function actionDynamicevent()
	{ 
		$data=Events::model()->findAll('category_id=:category_id',
             array(':category_id'=>(int) $_REQUEST['categoryval']));

             $data=CHtml::listData($data,'id','eventName');
			 $content='';
			 $eventname='';
			 $counter = 0;
              foreach($data as $value=>$subcategory)
                {
					if($counter == 0)
					$eventname .= $this->actionEventunit($value);
					
                    $content.=CHtml::tag('option',array('value'=>$value),CHtml::encode($subcategory),true);
					$counter++;
                }
		$returnarr=array('data'=>$content,'eventname'=>$eventname);		
		die(json_encode($returnarr));		

	}

	public function actionEventunit($value='')
		{
			if($value=='' && $_REQUEST['eventval']!='')
				$value=$_REQUEST['eventval'];
			$unit=Yii::app()->db->createCommand("select unitName from units u left join events e on u.id=e.unitid where e.id ='".$value."' ")->queryRow();
			return $unit['unitName'];
		}
		
public function actionEventunitname()
		{
			$units=Yii::app()->db->createCommand("select unitName from units u left join events e on u.id=e.unitid where e.id ='".$_REQUEST['eventval']."' ")->queryRow();
			echo $units['unitName'];
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
		$model=new Scores;
		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);
		//echo '<pre>';print_r($_POST);die;
		
		$unitDetails=Yii::app()->db->createCommand("select unitid from events where id ='". $_POST['Scores']['event_id']."'")->queryRow();
		if(isset($_POST['Scores']))
		{
				foreach($_POST['Scores']['score'] as $Scoresval)
				{
					$model  = new Scores;
					$model->attributes=$_POST['Scores'];
					$model->unit_id=$unitDetails['unitid'];
					$model->description=$_POST['Scores']['description'];
					$model->dateTime=date('Y-m-d H:i:s');
					$model->score =$Scoresval;
					$model->save();
			}
				$this->redirect(array('admin'));
			
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

		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);
		if(isset($_POST['Scores']))
		{
			$model->attributes=$_POST['Scores'];
			if($model->save())
				$this->redirect(array('view','id'=>$model->id));
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
		$this->loadModel($id)->delete();

		// if AJAX request (triggered by deletion via admin grid view), we should not redirect the browser
		if(!isset($_GET['ajax']))
			$this->redirect(isset($_POST['returnUrl']) ? $_POST['returnUrl'] : array('admin'));
	}

	/**
	 * Lists all models.
	 */
	public function actionIndex()
	{
		$dataProvider=new CActiveDataProvider('Scores');
		$this->render('index',array(
			'dataProvider'=>$dataProvider,
		));
	}

	/**
	 * Manages all models.
	 */
	public function actionAdmin()
	{
		$model=new Scores('search');
		$model->unsetAttributes();  // clear any default values
		if(isset($_GET['Scores']))
			$model->attributes=$_GET['Scores'];

		$this->render('admin',array(
			'model'=>$model,
		));
	}

	/**
	 * Returns the data model based on the primary key given in the GET variable.
	 * If the data model is not found, an HTTP exception will be raised.
	 * @param integer $id the ID of the model to be loaded
	 * @return Scores the loaded model
	 * @throws CHttpException
	 */
	public function loadModel($id)
	{
		$model=Scores::model()->findByPk($id);
		if($model===null)
			throw new CHttpException(404,'The requested page does not exist.');
		return $model;
	}

	/**
	 * Performs the AJAX validation.
	 * @param Scores $model the model to be validated
	 */
	protected function performAjaxValidation($model)
	{
		if(isset($_POST['ajax']) && $_POST['ajax']==='scores-form')
		{
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}
	}
}
