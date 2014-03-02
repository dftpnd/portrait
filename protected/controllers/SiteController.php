<?php

class SiteController extends Controller
{
    public $layout = 'main';
    public $contacts;


    public function actionIndex()
    {
        $datapicks = Datapick::model()->jsonePrepeare(Datapick::model()->findAllByAttributes(array('status' => Datapick::STATUS_APPROVED)));
        $homes = Home::model()->findAll();

        $homes_arr[] = array();
        foreach ($homes as $home) {
            $homes_arr[$home->id] = $home;
        }

        $this->render('index',
            array(
                'datapicks' => $datapicks,
                'home' => $homes_arr
            ));
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

    public function actionOrderCallback1($name, $phone)
    {
        $response = array(
            'status' => 'success',
        );

        $callback = new Callback("1");
        $callback->name = $name;
        $callback->phone = $phone;
        if (!$callback->save()) {
            $response = array(
                'status' => 'error',
                'messages' => $callback->getErrors(),
            );
        }

        echo CJSON::encode($response);
    }

    public function actionSendReview()
    {
        $model = new Review();
        $model->attributes = $_POST;
        $model->save();

        echo CJSON::encode($response = array(
            'status' => 'success',
        ));
    }


    public function actionOrderCallback2($name, $phone, $email)
    {
        $response = array(
            'status' => 'success',
        );

        $callback = new Callback();
        $callback->name = $name;
        $callback->phone = $phone;
        $callback->email = $email;
        if (!$callback->save()) {
            $response = array(
                'status' => 'error',
                'messages' => $callback->getErrors(),
            );
        }

        echo CJSON::encode($response);
    }

    public function actionHomeBron()
    {
        $response = array();
        $response['status'] = 'success';

        $datapick = new Datapick();
        $datapick->attributes = $_POST['Datapick'];
        $datapick->created = time();

        if (!$datapick->save()) {
            $datapick->getErrors();
            $response['status'] = 'error';
            $response['message'] = $datapick->getErrors();
        }

        echo CJSON::encode($response);

    }


}
