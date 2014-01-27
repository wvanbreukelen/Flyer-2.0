<?php

return array(

	'classAliases' => array(
		'Symfony\Component\HttpFoundation\Request' => 'SymfonyRequest',
		'Flyer\Foundation\Events\Events' => 'Events',
		'Flyer\Foundation\Registry' => 'Registry',
		'Flyer\Foundation\Config\Config' => 'Config',

	),

	'serviceProviders' => array(
		//'Flyer\Components\HTTP\HTTPServiceProvider',
		'Flyer\Components\Router\RouterServiceProvider',
		
	),

	'database' => array(
		'driver'    => 'mysql',
		'host'      => 'localhost',
		'database'  => 'flyer',
		'username'  => 'root',
		'password'  => '',
		'charset'   => 'utf8',
		'collation' => 'utf8_unicode_ci',
		'prefix'    => '',
	),

);