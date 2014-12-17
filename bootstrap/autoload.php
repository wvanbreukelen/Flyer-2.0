<?php

use Flyer\Foundation\Events\Events;
use Flyer\Foundation\Facades\Facade;
use Flyer\Foundation\Registry;
use Flyer\Components\Config;
use Flyer\Components\Logging\Debugger;
use Flyer\App;

$config = new Config;

/**
 * Create a new application
 */

$app = new App($config);

/**
 * Set the application registry handler
 */

$app->setRegistryHandler(new Registry);


/**
 * Set up the Exception handler for the application
 */

$whoops = new Whoops\Run();
$whoops->pushHandler(new Whoops\Handler\PrettyPageHandler());
$whoops->register();

/**
 * Setting up the current request method
 */

Registry::set('application.request.method', $_SERVER['REQUEST_METHOD']);

/**
 * Require the config files and add those results to the Registry
 */

$app->config()->import(APP . 'config' . DS . 'config.php');

Registry::set('config', require(APP . 'config' . DS . 'config.php'));

/**
 * Set the application debugging handler
 */

$app->setDebuggerHandler(new Debugger($config));

$app->debugger()->point('init_finished');

/**
 * Setting up the events manager
 */

Registry::set('foundation.events', new Events);

$app->debugger()->point('events_done');


/**
 * Setting the current HTTP request to the events manager
 */

Events::create(array(
	'title' => 'request.get',
	'event' => function () {
		return Request::createFromGlobals();
	}
));

$app->debugger()->point('request_event_done');

/**
 * Setting up the default error page
 */

Events::create(array(
	'title' => 'application.error.404',
	'event' => function () {
		return View::render('404', array('page' => Request::createFromGlobals()->getPathInfo()));
	}
));

$app->debugger()->point('error_event_done');

/**
 * Initialize the Database component
 */

$app->createAliases(array('Eloquent' => 'Illuminate\Database\Eloquent\Model'), false);

$app->debugger()->point('db_init_done');

/**
 * Register all of the developed created compilers
 */

$app->setViewCompilers(Registry::get('config')['viewCompilers']);

$app->debugger()->point('reg_view_comp_done');


/**
 * Attach all of the service providers (specified the config file) to the application
 */

$app->register(Registry::get('config')['serviceProviders']);

$app->debugger()->point('app_reg_done');

$app->createAliases(Registry::get('config')['classAliases']);

$app->debugger()->point('alias_reg_done');



/**
 * Initialize the facade and setting some things up
 */

Facade::setFacadeApplication($app);

$app->debugger()->point('facade_app_done');

$app->attach('app', $app);

$app->debugger()->point('self_app_bind_done');
$app->debugger()->point('kernel_done');
$app->debugger()->point('return_app_inst');


return $app;