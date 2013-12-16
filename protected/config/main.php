<?php
return array(
    'basePath' => dirname(__FILE__) . DIRECTORY_SEPARATOR . '..',
    'name' => 'Градус-м',
    'language' => 'ru',
    // preloading 'log' component
    'preload' => array('log'),
    // autoloading model and component classes
    'import' => array(
        'application.models.*',
        //'application.modules.UsersModule.models.User',
        'application.components.*',
        'application.modules.srbac.controllers.SBaseController',
        'application.modules.*',
//        'application.modules.userAdmin.models.*',
//        'application.modules.userAdmin.components.*',
//        'application.modules.userAdmin.controllers.*',
    ),
    'defaultController' => 'site',
    'modules' => array(
        'srbac' => array(
            'userclass' => 'User',
            'userid' => 'id',
            'username' => 'username',
            'debug' => false,
            'delimeter' => "@",
            'pageSize' => 10,
            'superUser' => 'Authority',
            'css' => 'srbac.css',
            'layout' => 'application.modules.userAdmin.views.layouts.main',
            'notAuthorizedView' => 'srbac.views.authitem.unauthorized',
            //'alwaysAllowed'=>array(),
            'userActions' => array('show', 'View', 'List'),
            'listBoxNumberOfLines' => 15,
            'imagesPath' => 'srbac.images',
            'imagesPack' => 'tango',
            'iconText' => false,
            'header' => 'srbac.views.authitem.header',
            'footer' => 'srbac.views.authitem.footer',
            'showHeader' => true,
            'showFooter' => true,
            'alwaysAllowedPath' => 'srbac.components',
        ),
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
//        'mailer' => array(
//            'class' => 'application.extensions.mailer.EMailer',
//            'pathViews' => 'application.views.email',
//            'pathLayouts' => 'application.views.email.layouts'
//        ),
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
                '/about'=>'site/about/',
                ''=>'site/index/',
                '/equipment'=>'site/equipment/',
                '/services'=>'site/services/',
                '/works'=>'site/works/',
                '/login'=>'site/login/',
                '/logout'=>'site/logout/',
                '/production/<id:\d+>'=>'site/production/',
                '<controller:\w+>/<id:\d+>' => '<controller>/view',
                '<controller:\w+>/<action:\w+>/<id:\d+>' => '<controller>/<action>',
                '<controller:\w+>/<action:\w+>' => '<controller>/<action>',
            ),
        ),
    ),
    'params' => require(dirname(__FILE__) . '/params.php'),
);
