<?php

class ProfileController extends Controller
{
	public $defaultAction = 'profile';
	public $layout='//layouts/mainpage';

	/**
	 * @var CActiveRecord the currently loaded data model instance.
	 */
	private $_model;
	/**
	 * Shows a particular model.
	 */
	public function actionProfile()
	{
		if(!Yii::app()->user->id)
		 {
			 $this->redirect(Yii::app()->user->loginUrl);
		 }else{
			 $Profile_image = Gallery::model()->findbyAttributes(array('userid'=>Yii::app()->user->id));
		$model = $this->loadUser();
	    $this->render('profile',array(
	    	'model'=>$model,
			'profile'=>$model->profile,'Profile_image'=>$Profile_image
	    ));
		 }
	}


	/**
	 * Updates a particular model.
	 * If update is successful, the browser will be redirected to the 'view' page.
	 */
	public function actionEdit()
	{
		if(!Yii::app()->user->id)
		 {
			 $this->redirect(Yii::app()->user->loginUrl);
		 }else{
		$model = $this->loadUser();
		$profile=$model->profile;
		$gallerymodel=new Gallery;
		// ajax validator
		if(isset($_POST['ajax']) && $_POST['ajax']==='profile-form')
		{
			echo UActiveForm::validate(array($model,$profile));
			Yii::app()->end();
		}
			$Profile_image = Gallery::model()->findbyAttributes(array('userid'=>$model->id));
			if(!$Profile_image)
			{
				$Profile_image = new Gallery;
				$Profile_image->userid = $model->id;
			}
				if(isset($_FILES['Gallery']))
				{
					$rnd = rand(0,9999);  
					
					$uploadedFile=CUploadedFile::getInstance($Profile_image,'image');
					$fileName = "{$rnd}-{$uploadedFile}";  // random number + file name
					$Profile_image->image = $fileName;
					if($Profile_image->save())
					{
						$uploadedFile->saveAs(Yii::app()->basePath.'/../banner/'.$fileName);  
						// redirect to success page
					}
				}
			
		if(isset($_POST['User']))
		{
			$model->attributes=$_POST['User'];
			$profile->attributes=$_POST['Profile'];
			$profile->foot=$_POST['Profile']['foot'];
			
			if($model->validate()&&$profile->validate()) {
				$model->save();
				$profile->save();
                Yii::app()->user->updateSession();
				Yii::app()->user->setFlash('profileMessage',UserModule::t("Changes is saved."));
				$this->redirect(array('/user/profile'));
			} else $profile->validate();
		}
		$passwordmodel = new UserChangePassword;
		if(isset($_POST['ajax']) && $_POST['ajax']==='changepassword-form')
					{
						echo UActiveForm::validate($passwordmodel);
						Yii::app()->end();
					}
					if(isset($_POST['UserChangePassword'])) {
							$passwordmodel->attributes=$_POST['UserChangePassword'];
							if($passwordmodel->validate()) {
								$new_password = User::model()->notsafe()->findbyPk(Yii::app()->user->id);
								$new_password->password = UserModule::encrypting($passwordmodel->password);
								$new_password->activkey=UserModule::encrypting(microtime().$passwordmodel->password);
								$new_password->save();
								Yii::app()->user->setFlash('profileMessage',UserModule::t("New password is saved."));
								$this->redirect(array("profile"));
							}
					}
					
		
		$this->render('edit',array('passwordmodel'=>$passwordmodel,
			'model'=>$model,
			'profile'=>$profile,'Profile_image'=>$Profile_image
		));
		 }
	}
	
	/**
	 * Change password
	 */
	public function actionChangepassword() {
		if(!Yii::app()->user->id)
		 {
			 $this->redirect(Yii::app()->user->loginUrl);
		 }else{
		$model = new UserChangePassword;
		if (Yii::app()->user->id) {
			
			// ajax validator
			if(isset($_POST['ajax']) && $_POST['ajax']==='changepassword-form')
			{
				echo UActiveForm::validate($model);
				Yii::app()->end();
			}
			
			if(isset($_POST['UserChangePassword'])) {
					$model->attributes=$_POST['UserChangePassword'];
					if($model->validate()) {
						$new_password = User::model()->notsafe()->findbyPk(Yii::app()->user->id);
						$new_password->password = UserModule::encrypting($model->password);
						$new_password->activkey=UserModule::encrypting(microtime().$model->password);
						$new_password->save();
						Yii::app()->user->setFlash('profileMessage',UserModule::t("New password is saved."));
						$this->redirect(array("profile"));
					}
			}
			$this->render('changepassword',array('model'=>$model));
	    }
		 }
	}

	/**
	 * Returns the data model based on the primary key given in the GET variable.
	 * If the data model is not found, an HTTP exception will be raised.
	 * @param integer the primary key value. Defaults to null, meaning using the 'id' GET variable
	 */
	public function loadUser()
	{
		if($this->_model===null)
		{
			if(Yii::app()->user->id)
				$this->_model=Yii::app()->controller->module->user();
			if($this->_model===null)
				$this->redirect(Yii::app()->controller->module->loginUrl);
		}
		return $this->_model;
	}
}