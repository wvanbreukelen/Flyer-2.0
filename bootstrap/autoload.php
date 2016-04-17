<?php

use Flyer\Components\Performance\Timer;
use Flyer\Components\Logging\Debugger;
use Flyer\Foundation\Facades\Facade;
use Flyer\Foundation\Events\Events;
use Flyer\Components\Config;
use Flyer\App;

/**
 * Create a new Flyer application
 */

$app = new App();

/**
 * Set the application config instance
 */

$app->setConfig(new Config);

/**
 * Set the performance monitor
 */

$app->setPerformanceMonitor(new Timer);

/**
 * Setting the application environment, by example; browser or CLI
 */

$app->setEnvironment();

/**
 * Require the needed config files
 */

$app->config()->import($app->path() . 'config/config.php');

/**
 * Implement the helpers into the application
 */

require_once($app->basePath() . 'app/helpers.php');

/**
 * Set the debugger handler for debugging purposes
 */

$app->setDebuggerHandler(new Debugger($app->config(), $app->performance()));

function debugger() {return app('application.debugger');}

/**
 * Set up Exceptionizer for throwing errors/notices/exceptions
 */
$app->debugger()->point('init_exceptions');

$ec = new Exceptionizer();

/**
 * Register some required implementors to Exceptionizer
 */

$app->debugger()->point('add_implements');

$ec->addImplementor(new Flyer\Components\Logging\LoggingImplementor);
$ec->addImplementor(new Exceptionizer\Implement\WhoopsImplementor);

$app->debugger()->point('reg_handlers');

/**
 * Register the Exceptionizer errors/notice/exceptions handlers
 */

$ec->register();

$app->debugger()->point('reg_handlers_done');
$app->debugger()->point('init_finished');

/**
 * Set the application instance that the facade handler has to use
 */

Facade::setFacadeApplication($app);
$app->debugger()->point('facade_app_done');

/**
 * Creating a HTTP request that can been called by triggering the event
 */

$app->debugger()->point('request_event');

$app->debugger()->point('request_event_done');

// @wvanbreukelen Remove?
$app->debugger()->point('error_event_done');
$app->debugger()->point('imp_bindings');

/**
 * Import the file with additional bindings
 */

require(app_path() . 'bindings.php');
$app->debugger()->point('imp_bindings_done');


/**
 * Lets start up the database component by creating an alias for the illuminate/database package
 */

// NOTICE: Can this be handled by a facade? @wvanbreukelen

//$app->createAliases(array('Eloquent' => 'Illuminate\Database\Eloquent\Model'), false);
//$app->debugger()->point('db_init_done');

/**
 * Add the view compilers to the application
 */

$app->setViewCompilers($app->config()->get('viewCompilers'));
$app->debugger()->point('reg_view_comp_done');

/**
 * Attach all of the service providers to the application
 */

$app->debugger()->point('app_reg');
$app->register($app->config()->get('serviceProviders'));
$app->debugger()->point('app_reg_done');

/**
 * Creating the aliases that where defined in the config
 */

$app->debugger()->point('alias_reg');
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
 * Return a freshly brewed app instance
 */

return $app;
