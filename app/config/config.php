<?php

return array(

	'classAliases' => array(
        'Request' =>'Symfony\Component\HttpFoundation\Request',
        'Events' => 'Flyer\Foundation\Events\Events',
        'Registry' => 'Flyer\Foundation\Registry',
        'Config' => 'Flyer\Foundation\Config\Config',
        'View' => 'Flyer\Foundation\Facades\View',
        'Hash' => 'Flyer\Foundation\Facades\Hash',
        'Route' => 'Flyer\Foundation\Facades\Route',
        
	),

	'serviceProviders' => array(
		//'Flyer\Components\HTTP\HTTPServiceProvider',
		'Flyer\Components\Router\RouterServiceProvider',
		'Flyer\Components\View\ViewServiceProvider',
		'Flyer\Components\Database\DatabaseServiceProvider',
		'Flyer\Components\Security\SecurityServiceProvider',
		'wvanbreukelen\Test\TestServiceProvider',
		
	),

	'viewCompilers' => array(
		'wvanbreukelen.blade' => 'wvanbreukelen\Blade\BladeEngine',
	),

	'defaultViewCompiler' => 'wvanbreukelen.blade',

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