<?php
/**
 * Конфигурационный файл приложения
 */
$config = [
    'core' => [ // подмассив используемый самим ядром фреймворка        
        'webrouter' => [ // подсистема маршрутизации
            'class' => \ItForFree\SimpleMVC\Router\WebRouter::class
        ],
        'mvc' => [ // настройки MVC
            'views' => [
                'base-template-path' => '',
                'base-layouts-path' => ''
            ]
        ],
        'user' => [ // подсистема авторизации
            'class' => \support\ExampleUser::class,
	    'construct' => [
                'session' => '@session'
             ], 
        ],
        'session' => [ // подсистема работы с сессиями
            'class' => ItForFree\SimpleMVC\Session::class,
            'alias' => '@session'
        ]
    ]    
];

return $config;