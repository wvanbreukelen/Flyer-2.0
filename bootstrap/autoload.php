<?php

use Flyer\Foundation\Events\Events;
use Flyer\Foundation\Facades\Facade;
use Flyer\Components\Config;
use Flyer\Components\Logging\Debugger;
use Flyer\App;

/**
 * Create a new Flyer application, with a config instance
 */

$app = new App();

$app->setConfig(new Config);




/**
 * Set up the Whoops exception handler for the application
 */


$whoops = new Whoops\Run();
$whoops->pushHandler(new Whoops\Handler\PrettyPageHandler());


/**
 * Register the Whoops exception handler into PHP
 */

$whoops->register();

require_once($app->basePath() . 'FlyerCore/flyer/Foundation/helpers.php');


/**
 * Require the needed config files
 */


$app->config()->import(config_path() . 'config.php');


/**
 * Setting the application environment, by example; browser or CLI
 */


$app->setEnvironment();


/**
 * Set the application debugging handler
 */


$app->setDebuggerHandler(new Debugger($app->config()));
$app->debugger()->point('init_finished');


/**
 * Set the application instance that the facade handler has to use
 */


Facade::setFacadeApplication($app);
$app->debugger()->point('facade_app_done');


/**
 * Creating a HTTP request that can been called by triggering the event
 */


$app->bind('request.get', function ()
{
	return Request::createFromGlobals();
});

$app->debugger()->point('request_event_done');


/**
 * Bind the default error page to the application
 */


$app->bind('application.error.404', function()
{
	return View::render('404', array('page' => Request::createFromGlobals()->getPathInfo()));
});

$app->debugger()->point('error_event_done');


/**
 * Import the file with additional bindings
 */


require(bindings_path() . 'bindings.php');


/**
 * Lets start up the database component by creating an alias for the illuminate/database package
 */


//$app->createAliases(array('Eloquent' => 'Illuminate\Database\Eloquent\Model'), false);
$app->debugger()->point('db_init_done');


/**
 * Add the view compilers to the application
 */


$app->setViewCompilers($app->config()->get('viewCompilers'));
$app->debugger()->point('reg_view_comp_done');

/**
 * Attach all of the service providers to the application
 */


$app->register($app->config()->get('serviceProviders'));
$app->debugger()->point('app_reg_done');


/**
 * Creating the aliases that where defined in the config
 */


$app->createAliases($app->config()->get('classAliases'));
$app->debugger()->point('alias_reg_done');


/**
 * Attach the current app instance to the container
 */


$app->attach('app', $app);
$app->debugger()->point('self_app_bind_done');


/**
 * Some final debug messages
 */


$app->debugger()->point('kernel_done');


/**
 * Return the application instance back to the bootstrap, so that one can start handling other cool things
 */


$app->debugger()->point('return_app_inst');


/**
 * Return the app instance back to the bootstrap
 */

return $app;