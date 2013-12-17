<?php

class AdminController extends Controller
{
    public function init()
    {
        $cs = Yii::app()->clientScript;
        $cs->registerCoreScript('jquery');
        $cs->registerCoreScript('jquery.ui');
        $cs->registerScriptFile($this->createUrl('/js/admin.js'));
        $cs->registerCssFile($this->createUrl('/css/bootstrap.min.css'));
        $cs->registerCssFile($this->createUrl('/css/bootstrap-theme.min.css'));
        $cs->registerCssFile($this->createUrl('/css/jumbotron-narrow.css'));
        $cs->registerCssFile($this->createUrl('/css/admin.css'));

    }

    public $layout = 'main';

    public function actionIndex()
    {
        $user = User::model()->findByPk(1);
        if (isset($_POST['User'])) {
            if (!empty($_POST['User']['username']) && !empty($_POST['User']['password'])) {
                $user->username = $_POST['User']['username'];
                $user->password = md5($_POST['User']['password']);
                $user->save(false);
                echo json_encode(array('status' => 'succses'));

            }
            die();
        }
        $this->render('index', array('user' => $user));
    }

    public function actionCalendar()
    {
        $cs = Yii::app()->clientScript;
        $cs->registerCssFile($this->createUrl('/css/calendario/calendar.css'));
        $cs->registerCssFile($this->createUrl('/css/calendario/custom_1.css'));
        $cs->registerScriptFile($this->createUrl('/js/calendario/action.js'));
        $cs->registerScriptFile($this->createUrl('/js/calendario/modernizr.custom.63321.js'));
        $cs->registerScriptFile($this->createUrl('/js/calendario/jquery.calendario.js'));
        $cs->registerScriptFile($this->createUrl('/js/calendario/data.js'));


        $this->render('calendar');
    }

}