<?php

return array(

	'environment' => array(
		'debug' => false,
		'defaultDebugFolder' => 'debug.log'
	),

	'classAliases' => array(
        'Request' =>'Symfony\Component\HttpFoundation\Request',
        'Events' => 'Flyer\Foundation\Events\Events',
        'App' => 'Flyer\Foundation\Facades\App',
        'Config' => 'Flyer\Foundation\Facades\Config',
        'View' => 'Flyer\Foundation\Facades\View',
        'Hash' => 'Flyer\Foundation\Facades\Hash',
        'Route' => 'Flyer\Foundation\Facades\Route',
        'File' => 'Flyer\Foundation\Facades\File',
        'Folder' => 'Flyer\Foundation\Facades\Folder',
        'Log' => 'Flyer\Foundation\Facades\Log',
        'Random' => 'Flyer\Foundation\Facades\Random',
        'Ftp' => 'Flyer\Foundation\Facades\Ftp',
        'Ssh' => 'Flyer\Foundation\Facades\Ssh',
	),

	'serviceProviders' => array(
		'Flyer\Components\Router\RouterServiceProvider',
		'Flyer\Components\View\ViewServiceProvider',
		'Flyer\Components\Database\DatabaseServiceProvider',
		'Flyer\Components\Security\SecurityServiceProvider',
		'Flyer\Components\Filesystem\FilesystemServiceProvider',
		'Flyer\Components\Random\RandomServiceProvider',
		'Flyer\Components\Server\ServerServiceProvider',
		'Flyer\Components\Config\ConfigServiceProvider',
		'Flyer\Components\Logging\LoggingServiceProvider'

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

	'debugMessages' => array(
		'init_finished' => 'The application has been inited!',
		'events_done' => 'The event manager has been registered to the application',
		'request_event_done' => 'The current HTTP request has been attached to the event manager',
		'error_event_done' => 'A error loader has been added to the event manager',
		'db_init_done' => 'The illimate database component has been initialized',
		'reg_view_comp_done' => 'All the view compilers have been registered to the view component',
		'app_reg_done' => 'All the application attached packages have been autoloaded/registered',
		'alias_reg_done' => 'All the aliases have been created for the selected packages in the app config file',
		'facade_app_done' => 'Setted the facade require app instance',
		'self_app_bind_done' => 'The current app instance has been binded to the "app" variable',
		'kernel_done' => 'The kernel has now succeeded loading',
		'return_app_inst' => 'Returning app instance...',
		'loading_routes' => 'Loading the routes.php file...',
		'loading_routes_done' => 'Finished loading the routes',
		'app_boot' => 'Booting the application...',
		'end' => 'ALL DONE!'
	)

);
