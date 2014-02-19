<?php

class SiteController extends Controller
{

    public $layout = 'main';
    public $contacts;


    public function actionIndex()
    {
        $cs = Yii::app()->clientScript;
        $cs->registerCssFile($this->createUrl('/css/calendario/calendar.css'));

        $cs->registerScriptFile($this->createUrl('/js/calendario/modernizr.custom.63321.js'));
        $cs->registerScriptFile($this->createUrl('/js/calendario/jquery.calendario.js'));
        $cs->registerScriptFile($this->createUrl('/js/jquery-scrollspy.js'));


        $datapicks = Datapick::model()->jsonePrepeare(Datapick::model()->findAllByAttributes(array('status' => Datapick::STATUS_APPROVED)));



        $this->render('index', array('datapicks' => $datapicks));
    }


    public function actionError()
    {
        if ($error = Yii::app()->errorHandler->error) {
            if (Yii::app()->request->isAjaxRequest)
                echo $error['message'];
            else
                $this->render('error', $error);
        }
    }

    public function actionLogin()
    {
        $cs = Yii::app()->clientScript;
        $cs->registerScriptFile($this->createUrl('/js/jquery.md5.js'));

        $model = new LoginForm;
        if (isset($_POST['ajax']) && $_POST['ajax'] === 'login-form') {
            echo CActiveForm::validate($model);
            Yii::app()->end();
        }

        if (isset($_POST['LoginForm'])) {
            $model->attributes = $_POST['LoginForm'];
            // validate user input and redirect to the previous page if valid
            if ($model->validate() && $model->login())
                echo CJSON::encode(array('status' => 'success'));
            else {
                echo CJSON::encode(array('status' => 'failure'));
            }

            Yii::app()->end();
        }

        MyHelper::render($this, '/site/login', array('model' => $model), 'Авторизация');
    }

    public function actionLogout()
    {
        Yii::app()->user->logout();
        $this->redirect(Yii::app()->homeUrl);
    }

    public function actionCalendarDoor()
    {
        $datapick = new Datapick();
        $datapick->attributes = $_POST['datapick'];
        echo $this->renderPartial('_calendar_door', array('datapick' => $datapick));
    }

}
