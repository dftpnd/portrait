<?php

class Controller extends CController
{
    public $breadcrumbs = '';

    public function init()
    {
        $cs = Yii::app()->clientScript;

        $cs->registerCoreScript('jquery');
        $cs->registerCoreScript('jquery.ui');
        $cs->registerScriptFile($this->createUrl('/js/jquery.maskedinput.min.js'));

        $cs->registerCssFile($this->createUrl('/css/bootstrap.min.css'));

        $cs->registerCssFile($this->createUrl('/css/main.css'));
        $cs->registerCssFile($this->createUrl('/css/jquery-ui.css'));

        $cs->registerScriptFile($this->createUrl('/js/action.js'));
        $cs->registerScriptFile($this->createUrl('/js/bootstrap.min.js'));
        $cs->registerScriptFile($this->createUrl('/js/bootstrap-modal.min.js'));

        $cs->registerScriptFile($this->createUrl('/js/jquery.calendario.js'));
        $cs->registerScriptFile($this->createUrl('/js/jquery-scrollspy.js'));

        $cs->registerScriptFile($this->createUrl('/js/jquery.galleriffic.js'));
        $cs->registerScriptFile($this->createUrl('/js/jquery.opacityrollover.js'));

    }

}