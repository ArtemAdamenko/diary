<?php
return array(
    'basePath' => dirname(__FILE__) . DIRECTORY_SEPARATOR . '..',
    'name' => 'Электронный дневник',
    'language' => 'ru',

    // preloading 'log' component
    'preload' => array('log'),

    // autoloading model and component classes
    'import' => array(
        'application.models.*',
        'application.components.*',
    ),

    'modules'=>array(
		// uncomment the following to enable the Gii tool
		'diary',
		'gii'=>array(
			'class'=>'system.gii.GiiModule',
			'password'=>'qwe',
			// If removed, Gii defaults to localhost only. Edit carefully to taste.
			//'ipFilters'=>array('127.0.0.1','::1'),
		),
		
	),

    'components' => array(
        'authManager' => array(
        // Будем использовать свой менеджер авторизации
        'class' => 'PhpAuthManager',
        // Роль по умолчанию. Все, кто не админы, модераторы и юзеры — гости.
        'defaultRoles' => array('guest'),
    ),
    'user'=>array(
             'class' => 'WebUser',
            // enable cookie-based authentication
            'allowAutoLogin'=>true,
        ),
    // uncomment the following to enable URLs in path-format
    /*'urlManager' => array(
        'urlFormat' => 'path',
        'showScriptName' => false,
        'rules' => array(
            '<controller:\w+>/<id:\d+>' => '<controller>/view',
            '<controller:\w+>/<action:\w+>/<id:\d+>' => '<controller>/<action>',
            '<controller:\w+>/<action:\w+>' => '<controller>/<action>',
        ),
    ),*/
    'db' => require(dirname(__FILE__) . '/db.php'),
    
    'errorHandler' => array(
        // use 'site/error' action to display errors
        'errorAction' => 'site/error',
    ),
    'log' => array(
        'class' => 'CLogRouter',
        'routes' => array(

            array(
                // направляем результаты профайлинга в ProfileLogRoute (отображается
                // внизу страницы)
                'class' => 'CProfileLogRoute',
                'levels' => 'profile',
                'enabled' => true,
            ),
        ),
    ),
),

    // application-level parameters that can be accessed
    // using Yii::app()->params['paramName']
    'params' => array(
    // this is used in contact page 
    'adminEmail' => 'admin@yandex.ru',
),
);
