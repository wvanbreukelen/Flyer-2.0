<?php

/**
 * Namespaces that have to been used to get this application running
 */
use Flyer\Foundation\Events\Events;
use Flyer\Foundation\Facades\Facade;
use Flyer\Components\Config;
use Flyer\Components\Logging\Debugger;
use Flyer\App;

/**
 * Create a new application
 */
$app = new App(new Config);

/**
 * Set up the Exception handler for the application
 */
$whoops = new Whoops\Run();
$whoops->pushHandler(new Whoops\Handler\PrettyPageHandler());

$whoops->register();

/**
 * Require the config files and add those results to the config handler
 */
$app->config()->import(APP . 'config' . DS . 'config.php');

/**
 * Setting the application environment
 */
$app->setEnvironment();

/**
 * Set the application debugging handler
 */
$app->setDebuggerHandler(new Debugger($app->config()));
$app->debugger()->point('init_finished');

/**
 * Set the facade application
 */

Facade::setFacadeApplication($app);
$app->debugger()->point('facade_app_done');


/**
 * Creating a HTTP request that can been actioned by a event
 */
Events::create(array(
	'title' => 'request.get',
	'event' => function () {
		return Request::createFromGlobals();
	}
));

$app->debugger()->point('request_event_done');

/**
 * Bind the default http 404 error page to the application
 */

$app->bind('application.error.404', function()
{
	return View::render('404', array('page' => Request::createFromGlobals()->getPathInfo()));
});

$app->debugger()->point('error_event_done');

/**
 * Import the file with additional bindings
 */

require(APP . 'bindings' . DS . 'bindings.php');

/**
 * Initialize the Illuminate database component
 */
$app->createAliases(array('Eloquent' => 'Illuminate\Database\Eloquent\Model'), false);
$app->debugger()->point('db_init_done');

/**
 * Add all the view compilers to the application
 */
$app->setViewCompilers($app->config()->get('viewCompilers'));
$app->debugger()->point('reg_view_comp_done');


/**
 * Attach all of the service providers to the application
 */
$app->register($app->config()->get('serviceProviders'));
$app->debugger()->point('app_reg_done');

$app->createAliases($app->config()->get('classAliases'));
$app->debugger()->point('alias_reg_done');
/**
 * Attach the current app instance to the container
 */
$app->attach('app', $app);

/**
 * Some debug messages
 */
$app->debugger()->point('self_app_bind_done');
$app->debugger()->point('kernel_done');

/**
 * Return the application instance back to the bootstrap, so that one can start handling other cool things
 */
$app->debugger()->point('return_app_inst');

return $app;