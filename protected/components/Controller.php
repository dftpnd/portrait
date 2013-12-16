<?php

class Controller extends SBaseController
{

    public $layout = 'column1';
    public $menu = array();
    public $breadcrumbs = array();

    public function init()
    {
        $this->contacts = Contacts::contactsHelper();
        $this->menu = MyHelper::menu();
    }

}