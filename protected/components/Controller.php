<?php

class Controller extends SBaseController
{


    public function init()
    {
        $cs = Yii::app()->clientScript;
        $cs->registerCoreScript('jquery');
        $cs->registerCssFile($this->createUrl('/css/door.css'));
        $cs->registerCssFile($this->createUrl('/css/main.css'));
        $cs->registerScriptFile($this->createUrl('/js/door.js'));
        $cs->registerScriptFile($this->createUrl('/js/action.js'));




    }

}