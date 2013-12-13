<?php

class EventsController extends Controller
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
				'actions'=>array('index','view','dynamiccategory','Viewevent'),
				'users'=>array('*'),
			),
			array('allow', // allow authenticated user to perform 'create' and 'update' actions
				'actions'=>array('create','update','dynamiccategory','Viewevent'),
				'users'=>array('@'),
			),
			array('allow', // allow admin user to perform 'admin' and 'delete' actions
				'actions'=>array('admin','delete','dynamiccategory','Viewevent'),
				'users'=>array('admin'),
			),
			array('deny',  // deny all users
				'users'=>array('*'),
			),
		);
	}

  public function actionDynamiccategory()
	{ 
		$data=Categories::model()->findAll('sports_id=:sports_id',
             array(':sports_id'=>(int) $_REQUEST['sportsval']));

             $data=CHtml::listData($data,'id','category');
			 $content='';
              foreach($data as $value=>$subcategory)
                {
                    $content.=CHtml::tag('option',array('value'=>$value),CHtml::encode($subcategory),true);
                }
		$returnarr=array('data'=>$content);		
		die(json_encode($returnarr));		

	}

	/*public function actionEventunit($value='')
		{
			if($value=='' && $_REQUEST['eventval']!='')
				$value=$_REQUEST['eventval'];
			$unit=Yii::app()->db->createCommand("select unitName from units u left join events e on u.id=e.unitid where e.id ='".$value."' ")->queryRow();
			echo $unit['unitName'];
		}
	public function actionDynamiccategory()
	{ //echo $_POST['Events']['sports_id'];die;
		$data=Categories::model()->findAll('sports_id=:sports_id',
             array(':sports_id'=>(int) $_POST['Events']['sports_id']));

             $data=CHtml::listData($data,'id','category');
              foreach($data as $value=>$subcategory)
                {
                    echo CHtml::tag('option',array('value'=>$value),CHtml::encode($subcategory),true);
                }
	}*/
	public function actionViewevent($id)
	{
		
		/*$criteria->compare('id',$this->id);
		$criteria->compare('user_id',$this->user_id);
		$criteria->compare('event_id',$id);
		$criteria->compare('unit_id',$this->unit_id);
		$criteria->compare('category_id',$this->category_id);
		$criteria->compare('score',$this->score,true);
		$criteria->compare('dateTime',$this->dateTime,true);
		$criteria->compare('description',$this->description,true);*/
		$model=new Events('scoresearch');
		//$model->unsetAttributes();  // clear any default values
		//if(isset($_GET['Events']))
			//$model->attributes=$_GET['Events'];

		$event_details=Yii::app()->db->createCommand("select `s`.`SportName` as `SportName`,`c`.`category` as `category`,`e`.`eventName`,`u`.`unitName` as `unitName`,`e`.`description` from `events` `e` left join `sport` `s` on `s`.`id`=`e`.`sports_id` left join `units` `u` on `u`.`id`=`e`.`unitid` left join `categories` `c` on `c`.`id`=`e`.`category_id` where `e`.`id`='".$id."'")->queryRow();
		
		$event_users=Yii::app()->db->createCommand("select AVG(`s`.`score`) as `Avarage Sore`, `e`.`eventName` as `event`,`c`.`category` as `category` ,`s`.`score`,`s`.`dateTime`,`u`.`username` as `username` from `scores` `s` left join `users` `u` on `u`.`id`=`s`.`user_id` left join `categories` `c` on `c`.`id`=`s`.`category_id` left join `events` `e` on `e`.`id`=`s`.`event_id` where `s`.`event_id`='".$id."' group by `s`.`user_id` order by `Avarage Sore` ASC")->queryAll();
		$this->render('viewevent',array(
			'event_details'=>$event_details,'model'=>$model,'event_users'=>$event_users
		));
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
		$model=new Events;

		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if(isset($_POST['Events']))
		{
			$model->attributes=$_POST['Events'];
			if($model->save())
			{
				$model->description=$_POST['Events']['description'];
				$model->save();
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

		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if(isset($_POST['Events']))
		{
			$model->attributes=$_POST['Events'];
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
		$dataProvider=new CActiveDataProvider('Events');
		$this->render('index',array(
			'dataProvider'=>$dataProvider,
		));
	}

	/**
	 * Manages all models.
	 */
	public function actionAdmin()
	{
		$model=new Events('search');
		$model->unsetAttributes();  // clear any default values
		if(isset($_GET['Events']))
			$model->attributes=$_GET['Events'];

		$this->render('admin',array(
			'model'=>$model,
		));
	}

	/**
	 * Returns the data model based on the primary key given in the GET variable.
	 * If the data model is not found, an HTTP exception will be raised.
	 * @param integer $id the ID of the model to be loaded
	 * @return Events the loaded model
	 * @throws CHttpException
	 */
	public function loadModel($id)
	{
		$model=Events::model()->findByPk($id);
		if($model===null)
			throw new CHttpException(404,'The requested page does not exist.');
		return $model;
	}

	/**
	 * Performs the AJAX validation.
	 * @param Events $model the model to be validated
	 */
	protected function performAjaxValidation($model)
	{
		if(isset($_POST['ajax']) && $_POST['ajax']==='events-form')
		{
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}
	}
}
