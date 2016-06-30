<?php

/**
 * In this file you can edit the Flyer framework to your own wishes
 */

return array(

	/**
	 * These environment variables represend the core for your application, they handle general 'framework' stuff
	 */

	'environment' => array(
		'debug' 		   => false,
		'logperformance'   => false,
		'defaultDebugFile' => 'debug_' . time() . '.log',
		'url'        	   => 'localhost/myapp/framework/public/',
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
		'Flyer\Components\Console\ConsoleServiceProvider',
		// 'Flyer\Components\Performance\PerformanceServiceProvider'
	),

	/**
	 * The aliases that have to been made for facade and other classes
	 */

	'classAliases' => array(
        'Request'  => 'Symfony\Component\HttpFoundation\Request',
        'Events'   => 'Flyer\Foundation\Events\Events',
        'App'      => 'Flyer\Foundation\Facades\App',
        'Config'   => 'Flyer\Foundation\Facades\Config',
        'View'     => 'Flyer\Foundation\Facades\View',
        'Hash'     => 'Flyer\Foundation\Facades\Hash',
        'Route'    => 'Flyer\Foundation\Facades\Route',
        'File'     => 'Flyer\Foundation\Facades\File',
        'Folder'   => 'Flyer\Foundation\Facades\Folder',
        'Log'      => 'Flyer\Foundation\Facades\Log',
        'Random'   => 'Flyer\Foundation\Facades\Random',
        'FTP'      => 'Flyer\Foundation\Facades\FTP',
        'SSH'      => 'Flyer\Foundation\Facades\SSH',
        'HTML'     => 'Flyer\Foundation\Facades\HTML',
	    'Debugger' => 'Flyer\Foundation\Facades\Debugger',
		// 'Timer'    => 'Flyer\Foundation\Facades\Timer'
	),

	/**
	 * The view compilers
	 */

	'viewCompilers' => array(
		'flyer.blade' => 'Flyer\Compilers\Blade\BladeEngine',
	),

	/**
	 * The default view compiler for compiling any view
	 */

	'defaultViewCompiler' => 'flyer.blade',

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
		'add_implements'      => 'Adding implements to Exceptionizer...',
		'reg_handlers'        => 'Registering the Exceptionizer handlers, exceptions after this message will be thrown with exceptionizer',
		'reg_handlers_done'   => 'Registered Exceptionizer handlers, using Exceptionizer right now :)',
		'init_finished'       => 'The application is initialized',
		'events_done'         => 'The event manager has been registered to the application',
		'request_event'       => 'Appending HTTP request to event manager...',
		'request_event_done'  => 'The current HTTP request has been attached to the event manager',
		'error_event_done'    => 'A error loader has been added to the event manager',
		'imp_bindings'        => 'Importing application bindings...',
		'imp_bindings_done'   => 'Successfully imported application bindings',
		'db_init_done'        => 'The illuminate\database component has been initialized',
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
		'end'                 => 'Finished, send response!'
	)

);
