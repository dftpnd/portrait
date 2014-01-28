<?php

class Controller extends SBaseController
{


    public function init()
    {
        $cs = Yii::app()->clientScript;
        $cs->registerCoreScript('jquery');
        $cs->registerCssFile($this->createUrl('/css/door.css'));
        $cs->registerCssFile($this->createUrl('/css/main.css'));
//        $cs->registerCssFile($this->createUrl('/css/bootstrap.min.css'));
        $cs->registerCssFile($this->createUrl('/css/prettyPhoto.css'));
        $cs->registerScriptFile($this->createUrl('/js/door.js'));
        $cs->registerScriptFile($this->createUrl('/js/action.js'));
        $cs->registerScriptFile($this->createUrl('/js/carousel.js'));
        $cs->registerScriptFile($this->createUrl('/js/bootstrap-paginator.min.js'));
        $cs->registerScriptFile($this->createUrl('/js/prettyPhoto.js'));
        $cs->registerScriptFile($this->createUrl('/js/modal.js'));



    }

}