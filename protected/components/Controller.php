<?php

class Controller extends CController
{
    public $breadcrumbs = '';

    public function init()
    {
        $cs = Yii::app()->clientScript;
        $cs->registerCoreScript('jquery');
        $cs->registerCoreScript('jquery.ui');

        $cs->registerCssFile($this->createUrl('/css/bootstrap.min.css'));

        $cs->registerCssFile($this->createUrl('/css/main.css'));

        $cs->registerScriptFile($this->createUrl('/js/action.js'));
        $cs->registerScriptFile($this->createUrl('/js/bootstrap-modal.min.js'));
    }

}