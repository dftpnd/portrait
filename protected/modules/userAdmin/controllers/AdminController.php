<?php

class AdminController extends Controller
{
    public function init()
    {
        $cs = Yii::app()->clientScript;
        $cs->registerCoreScript('jquery');
        $cs->registerCoreScript('jquery.ui');
        $cs->registerScriptFile($this->createUrl('/js/action.js'));
        $cs->registerScriptFile($this->createUrl('/js/admin.js'));
        $cs->registerCssFile($this->createUrl('/css/bootstrap.min.css'));
        $cs->registerCssFile($this->createUrl('/css/bootstrap-theme.min.css'));
        $cs->registerCssFile($this->createUrl('/css/jumbotron-narrow.css'));
        $cs->registerCssFile($this->createUrl('/css/admin.css'));
        $cs->registerCssFile($this->createUrl('/css/door.css'));

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
            Yii::app()->end();
        }
        $this->render('index', array('user' => $user));
    }

    public function actionCalendar()
    {
        $cs = Yii::app()->clientScript;
        $cs->registerCssFile($this->createUrl('/css/calendario/calendar.css'));

        $cs->registerScriptFile($this->createUrl('/js/calendario/modernizr.custom.63321.js'));
        $cs->registerScriptFile($this->createUrl('/js/calendario/jquery.calendario.js'));


        $datapick = new Datapick;


        $models = Datapick::model()->jsonePrepeare(Datapick::model()->findAllByAttributes(array('status' => Datapick::STATUS_APPROVED)));

        $this->render('calendar', array('datapick' => $datapick, 'models' => $models));
    }

    public function actionSetDatapick()
    {

        Datapick::model()->setDatapick();

        echo json_encode(array('status' => 'success'));

    }

    public function actionPopupPrepear()
    {

        $id = $_POST['datapick_id'];

        $model = Datapick::model()->findByPk($id);

        echo $this->renderPartial('_popup_prepear', array('model' => $model));

    }

    public function actionPopupSender()
    {
        $id = $_POST['datapick_id'];
        $model = Datapick::model()->findByPk($id);
        $model->attributes = $_POST['Datapick'];
        $model->save();
        echo json_encode(array('status' => 'success'));

    }

}