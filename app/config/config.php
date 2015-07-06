<?php

/**
 * In this file you can edit the framework configuration to your own wish
 */

return array(

	/**
	 * These environment variables represend the core for your application, they handle general 'framework' stuff
	 */

	'environment' => array(
		'debug' 		   => false,
		'defaultDebugFile' => 'debug.log',
		'url'        	   => 'localhost/workspace/public/',
	),

	/**
	 * All the service providers for your application
	 */

	'serviceProviders' => array(
		'Flyer\Components\Router\RouterServiceProvider',
		'Flyer\Components\View\ViewServiceProvider',
		'Flyer\Components\Security\SecurityServiceProvider',
		'Flyer\Components\Filesystem\FilesystemServiceProvider',
		'Flyer\Components\Random\RandomServiceProvider',
		'Flyer\Components\Server\ServerServiceProvider',
		'Flyer\Components\Config\ConfigServiceProvider',
		'Flyer\Components\Logging\LoggingServiceProvider',

	),

	/**
	 * The aliases that have to been made for facade and other classes
	 */

	'classAliases' => array(
        'Request' => 'Symfony\Component\HttpFoundation\Request',
        'Events'  => 'Flyer\Foundation\Events\Events',
        'App'     => 'Flyer\Foundation\Facades\App',
        'Config'  => 'Flyer\Foundation\Facades\Config',
        'View'    => 'Flyer\Foundation\Facades\View',
        'Hash'    => 'Flyer\Foundation\Facades\Hash',
        'Route'   => 'Flyer\Foundation\Facades\Route',
        'File'    => 'Flyer\Foundation\Facades\File',
        'Folder'  => 'Flyer\Foundation\Facades\Folder',
        'Log'     => 'Flyer\Foundation\Facades\Log',
        'Random'  => 'Flyer\Foundation\Facades\Random',
        'Ftp'     => 'Flyer\Foundation\Facades\Ftp',
        'Ssh'     => 'Flyer\Foundation\Facades\Ssh',
        'HTML'    => 'Flyer\Foundation\Facades\HTML'
	),

	/**
	 * The view compilers
	 */

	'viewCompilers' => array(
		'wvanbreukelen.blade' => 'wvanbreukelen\Blade\BladeEngine',
	),

	/**
	 * The default view compiler for compiling any view
	 */

	'defaultViewCompiler' => 'wvanbreukelen.blade',

	/**
	 * Database configuration settings (see Illuminate/Database)
	 */

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

	/**
	 * All the debug messages for the application, add one if you need :)
	 */

	'debugMessages' => array(
		'init_exceptions'     => 'Setting up Exceptionizer...',
		'reg_implements'      => 'Adding implements to Exceptionizer...',
		'reg_handlers'        => 'Registering the Exceptionizer handlers, exceptions after this message will be thrown with exceptionizer',
		'reg_handlers_done'   => 'Registered Exceptionizer handlers, using Exceptionizer right now :)',
		'init_finished'       => 'The application is initialized',
		'events_done'         => 'The event manager has been registered to the application',
		'request_event'       => 'Appending HTTP request to event manager...',
		'request_event_done'  => 'The current HTTP request has been attached to the event manager',
		'error_event_done'    => 'A error loader has been added to the event manager',
		'imp_bindings'        => 'Importing application bindings...',
		'imp_bindings_done'   => 'Successfully imported application bindings',
		'db_init_done'        => 'The illimunate\database component has been initialized',
		'reg_view_comp_done'  => 'All the view compilers have been registered to the view component',
		'app_reg'			  => 'Registering service providers...',
		'app_reg_done'        => 'All the application attached packages have been autoloaded/registered',
		'alias_reg'           => 'Registering aliases...',
		'alias_reg_done'      => 'All the aliases have been created for the selected packages in the app config file',
		'facade_app_done' 	  => 'Mocked the facade require app instance',
		'self_app_bind_done'  => 'The current app instance has been binded to the App variable',
		'kernel_done'         => 'The kernel has now succeeded loading',
		'return_app_inst'     => 'Returning app instance...',
		'loading_routes'      => 'Loading the routes.php file...',
		'loading_routes_done' => 'Finished loading the routes',
		'app_boot' 			  => 'Booting the application...',
		'end'                 => 'All done!'
	)

);
