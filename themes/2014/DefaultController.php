<?php

class DefaultController extends Controller
{
	
	/**
	 * Lists all models.
	 */
	public function actionIndex()
	{
		/*$dataProvider=new CActiveDataProvider('User', array(
			'criteria'=>array(
		        'condition'=>'status>'.User::STATUS_BANNED,
		    ),
			'pagination'=>array(
				'pageSize'=>Yii::app()->controller->module->user_page_size,
			),
		));*/
		if(!Yii::app()->user->id)
		 {
			 $this->redirect(Yii::app()->user->loginUrl);
		 }else{
				$profiles=Yii::app()->db->createCommand("select * from profiles")->queryAll();
				foreach($profiles as $profilesval)
				{
							$Profile_image[$profilesval['user_id']] = Gallery::model()->findbyAttributes(array('userid'=> $profilesval['user_id']));
				}				
				$this->render('/user/index',array('profiles'=>$profiles,'Profile_image'=>$Profile_image));
		 }
	}

}