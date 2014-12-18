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
 * Creating a new event for handling 404 errors
 */
Events::create(array(
	'title' => 'application.error.404',
	'event' => function () {
		return View::render('404', array('page' => Request::createFromGlobals()->getPathInfo()));
	}
));

$app->debugger()->point('error_event_done');
$app->debugger()->point('events_done');

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

/**
 * Initialize the facade and setting some things up
 */

Facade::setFacadeApplication($app);
$app->attach('app', $app);

$app->boot();

/**
 * Load up the routes file
 */

require(APP . 'routes.php');


$commandr = new Commandr\Core\Application(
	new Commandr\Core\Input,
	new Commandr\Core\Output,
	new Commandr\Core\Dialog,
	'Commandr Console helping application',
	'1.0'
);

$config = new Commandr\Core\Config(require(APP . 'config' . DS . 'commandr.php'));

$commandr->setConfig($config);

$commandr->addCommands($config->get('commands'));

$commandr->match()->run(new Commandr\Core\Output());