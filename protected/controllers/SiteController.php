<?php

class SiteController extends Controller
{

    public $layout = 'main';
    public $contacts;


    public function actionIndex()
    {
        $criteria = new CDbCriteria();
        $criteria->order = 't.order ASC';
        $slides = Slider::model()->findAllByAttributes(array('position' => Slider::POSION_SHOW), $criteria);
        $service = Service::model()->findAll();
        MyHelper::render($this, '/site/index', array('service' => $service, 'slides' => $slides), 'Главная');
    }

    public function actionAbout()
    {
        $criteria = new CDbCriteria();
        $criteria->order = 't.order ASC';
        $vacancys = Vacancy::model()->findAllByAttributes(array('position' => 2));

        MyHelper::render($this, '/site/about', array('vacancys' => $vacancys), 'О компании');
    }


    public function actionEquipment()
    {
        $pgs = ProductsGroup::model()->findAll();
        MyHelper::render($this, '/site/equipment', array('pgs' => $pgs), 'Оборудование');
    }

    public function actionProduction($id)
    {
        $pgs = ProductsGroup::model()->findAll();
        $equipments = Equipment::model()->findAllByAttributes(array('pg_id' => $id));

        MyHelper::render($this, '/site/production', array('equipments' => $equipments, 'pgs' => $pgs), 'Оборудование');
    }

    public function actionServices()
    {

        $service = Service::model()->findAll();
        MyHelper::render($this, '/site/services', array('service' => $service), 'Услуги');
    }

    public function actionWorks()
    {

        $tags = Tag::model()->findAll();

        MyHelper::render($this, '/site/works', array('tags' => $tags), 'Работы');
    }

    public function actionWork()
    {

        MyHelper::render($this, '/site/work', array(), 'Работы');
    }

    public function actionContacts()
    {

        MyHelper::render($this, '/site/contacts', array(), 'Контакты');
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

}
