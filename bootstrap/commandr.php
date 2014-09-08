<?php

use Flyer\Foundation\Events\Events;
use Flyer\Foundation\Facades\Facade;
use Flyer\Foundation\Registry;
use Flyer\Foundation\Config\Config;
use Flyer\App;

/**
 * Create a new application
 */

$app = new App(new Config);

/**
 * Set the application registry handler
 */

$app->setRegistryHandler(new Registry);


/**
 * Require the config files and add those results to the Registry
 */

$app->config()->import(APP . 'config' . DS . 'config.php');


Registry::set('config', require(APP . 'config' . DS . 'config.php'));

/**
 * Setting up the events manager
 */

Registry::set('foundation.events', new Events);

/**
 * Setting the current HTTP request to the events manager
 */

Events::create(array(
	'title' => 'request.get',
	'event' => function () {
		return Request::createFromGlobals();
	}
));


/**
 * Initialize the Database component
 */

$app->createAliases(array('Eloquent' => 'Illuminate\Database\Eloquent\Model'), false);

/**
 * Register all of the developed created compilers
 */

$app->setViewCompilers(Registry::get('config')['viewCompilers']);

/**
 * Attach all of the service providers (specified the config file) to the application
 */

$app->register(Registry::get('config')['serviceProviders']);

$app->createAliases(Registry::get('config')['classAliases']);


/**
 * Initialize the facade and setting some things up
 */

Facade::setFacadeApplication($app);
$app->attach('app', $app);


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