<?php

class Controller extends CController
{
    public  $breadcrumbs = '';

    public function init()
    {
        $cs = Yii::app()->clientScript;
        $cs->registerCoreScript('jquery');


        $cs->registerCssFile($this->createUrl('/css/bootstrap.min.css'));
        $cs->registerCssFile($this->createUrl('/css/modal/bootstrap-modal.css'));
        $cs->registerCssFile($this->createUrl('/css/modal/bootstrap-modal-bs3patch.css'));



        $cs->registerCssFile($this->createUrl('/css/main.css'));



        $cs->registerScriptFile($this->createUrl('/js/carousel.js'));
        $cs->registerScriptFile($this->createUrl('/js/prettyPhoto.js'));


        $cs->registerScriptFile($this->createUrl('/js/action.js'));
        $cs->registerScriptFile('/js/bootstrap.min.js');
        $cs->registerScriptFile('/js/modal/bootstrap-modal.js');
        $cs->registerScriptFile('/js/modal/bootstrap-modalmanager.js');



    }

}