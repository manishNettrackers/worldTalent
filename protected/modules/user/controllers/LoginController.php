<?php

class LoginController extends Controller
{
	public $defaultAction = 'login';

	/**
	 * Displays the login page
	 */
	public function actionLogin()
	{
		$this->layout='//layouts/log_in';
		if (Yii::app()->user->isGuest) {
			$model=new UserLogin;
			// collect user input data
			if(isset($_POST['UserLogin']))
			{
				$model->attributes=$_POST['UserLogin'];
				// validate user input and redirect to previous page if valid
				if($model->validate()) {
					$this->lastViset();
					$loginuser=Yii::app()->db->createCommand("select itemname from AuthAssignment where userid='".Yii::app()->user->id."'")->queryRow();
					//echo $loginuser['itemname'];die;
					if($loginuser['itemname']=='Admin')
						$this->redirect(array("/user/admin"));
					elseif($loginuser['itemname']=='Subscriber')
						$this->redirect(array("/user/user/index"));
				}
			}
			// display the login form
			$this->render('/user/login',array('model'=>$model));
		} else
			$this->redirect(Yii::app()->controller->module->returnUrl);
	}
	
	private function lastViset() {
		$lastVisit = User::model()->notsafe()->findByPk(Yii::app()->user->id);
		$lastVisit->lastvisit = time();
		$lastVisit->save();
	}

}