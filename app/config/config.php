<?php

return array(

	'classAliases' => array(
        'Request' =>'Symfony\Component\HttpFoundation\Request',
        'Events' => 'Flyer\Foundation\Events\Events',
        'Registry' => 'Flyer\Foundation\Registry',
        'Config' => 'Flyer\Foundation\Config\Config',
        'View' => 'Flyer\Components\View',
	),

	'serviceProviders' => array(
		//'Flyer\Components\HTTP\HTTPServiceProvider',
		'Flyer\Components\Router\RouterServiceProvider',
		'Flyer\Components\View\ViewServiceProvider',
		'Flyer\Components\Database\DatabaseServiceProvider',
		
	),

	'database' => array(
		'driver'    => 'mysql',
		'host'      => 'localhost',
		'database'  => 'flyer',
		'username'  => 'root',
		'password'  => 'linux',
		'charset'   => 'utf8',
		'collation' => 'utf8_unicode_ci',
		'prefix'    => '',
	),

);