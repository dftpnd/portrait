<?php
return array(
    'basePath' => dirname(__FILE__) . DIRECTORY_SEPARATOR . '..',
    'name' => 'starter',
    'language' => 'ru',
    // preloading 'log' component
    'preload' => array('log'),
    // autoloading model and component classes
    'import' => array(
        'application.models.*',
        //'application.modules.UsersModule.models.User',
        'application.components.*',
        'application.modules.*',
//        'application.modules.userAdmin.models.*',
//        'application.modules.userAdmin.components.*',
//        'application.modules.userAdmin.controllers.*',
    ),
    'defaultController' => 'site',
    'modules' => array(
        'gii' => array(
            'class' => 'system.gii.GiiModule',
            'password' => '7878',
            'ipFilters' => array('*'),
        ),
        'userAdmin',
    ),
    'components' => array(
        'ih' => array(
            'class' => 'CImageHandler',
        ),
        'uh' => array(
            'class' => 'UploadHandler',
        ),
        'mailer' => array(
            'class' => 'application.extensions.mailer.EMailer',
            'pathViews' => 'application.views.email',
            'pathLayouts' => 'application.views.email.layouts'
        ),
        'authManager' => array(
            'class' => 'srbac.components.SDbAuthManager',
            'connectionID' => 'db',
            'itemTable' => 'items',
            'assignmentTable' => 'assignments',
            'itemChildTable' => 'itemchildren',
        ),
        'user' => array(
            'class' => 'WebUser',
            'allowAutoLogin' => true,
        ),
//        /* для локали */
        'db' => require(dirname(__FILE__) . '/database.php'),
        'errorHandler' => array(
            // use 'site/error' action to display errors
            'errorAction' => 'site/error',
        ),
        'urlManager' => array(
            'urlFormat' => 'path',
            'showScriptName' => false,
            'rules' => array(
                '<controller:\w+>/<id:\d+>' => '<controller>/view',
                '<controller:\w+>/<action:\w+>/<id:\d+>' => '<controller>/<action>',
                '<controller:\w+>/<action:\w+>' => '<controller>/<action>',
            ),
        ),
    ),
    'aliases' => array(
        'xupload' => 'ext.xupload'
    ),
    'params' => require(dirname(__FILE__) . '/params.php'),
);
