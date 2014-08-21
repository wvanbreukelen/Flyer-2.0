<?php

$app = require('autoload.php');

$commandr = new Commandr\Core\Application(
	new Commandr\Core\Input,
	new Commandr\Core\Output,
	new Commandr\Core\Dialog,
	'Commandr Console helping application',
	'1.0'
);

$config = new Commandr\Core\Config(getCommandrConfig());

$commandr->setConfig($config);

$commandr->addCommands($config->get('commands'));

$app->match()->run(new Commandr\Core\Output());