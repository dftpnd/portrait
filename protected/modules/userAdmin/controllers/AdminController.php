<?php

class AdminController extends CController
{
    public function init()
    {

        $cs = Yii::app()->clientScript;
        $cs->registerCoreScript('jquery');
        $cs->registerCoreScript('jquery.ui');
        $cs->registerScriptFile($this->createUrl('/js/jquery.maskedinput.min.js'));

        $cs->registerCssFile($this->createUrl('/css/bootstrap.min.css'));

        $cs->registerCssFile($this->createUrl('/css/main.css'));

        $cs->registerScriptFile($this->createUrl('/js/action.js'));
        $cs->registerScriptFile($this->createUrl('/js/bootstrap.min.js'));
        $cs->registerScriptFile($this->createUrl('/js/bootstrap-modal.min.js'));


        $cs->registerCssFile($this->createUrl('/css/bootstrap-theme.min.css'));
        $cs->registerCssFile($this->createUrl('/css/jumbotron-narrow.css'));
        $cs->registerCssFile($this->createUrl('/css/admin.css'));
        $cs->registerScriptFile($this->createUrl('/js/admin.js'));

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

        $this->renderPartial('_popup_prepear', array('model' => $model));

    }

    public function actionPopupSender()
    {
        $response = array('status' => 'success');
        $id = $_POST['datapick_id'];
        $model = Datapick::model()->findByPk($id);
        $model->attributes = $_POST['Datapick'];


        if (!$model->confirmation()) {
            $response = array(
                'status' => 'error',
                'message' => array(array("Домик №$model->home_id уже занят $model->datapick"))
            );
        } else {
            if (!$model->save()) {
                $response = array(
                    'status' => 'error',
                    'message' => $model->getErrors()
                );
            }
        }


        echo json_encode($response);
    }

    public function actionHomes()
    {
        $home_id = 1;

        if (isset($_GET['home_id'])) {
            $home_id = $_GET['home_id'];
        }

        $uploads = Upload::model()->findAllByAttributes(array('home_id' => $home_id));

        $this->render('homes', array(
            'uploads' => $uploads,
            'home_id' => $home_id
        ));
    }

}