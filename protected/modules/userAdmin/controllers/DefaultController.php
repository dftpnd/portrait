<?php

class DefaultController extends Controller
{
    public function init()
    {
        $cs = Yii::app()->clientScript;
        $cs->scriptMap=array(
            'jquery.js'=>false,
            'jquery.ui.js' => false,
        );
        //$cs = Yii::app()->clientScript;
        //$cs->registerCoreScript('jquery') = false;
//        $cs->registerScriptFile($this->createUrl('/js/action.js'));

    }
	public function actionIndex()
	{
		$this->render('index');
	}

	// Uncomment the following methods and override them if needed
	/*
	public function filters()
	{
		// return the filter configuration for this controller, e.g.:
		return array(
			'inlineFilterName',
			array(
				'class'=>'path.to.FilterClass',
				'propertyName'=>'propertyValue',
			),
		);
	}

	public function actions()
	{
		// return external action classes, e.g.:
		return array(
			'action1'=>'path.to.ActionClass',
			'action2'=>array(
				'class'=>'path.to.AnotherActionClass',
				'propertyName'=>'propertyValue',
			),
		);
	}
	*/
}