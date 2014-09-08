<?php

$config = array(
	'commands' => array(
		'Commandr\Commands\TestCommand',
		'Commandr\Commands\HelpCommand',
		'Flyer\Components\Router\Console\SimulateRouteCommand',
	),
	
	'errors' => array(
		'commandNotFound' => "This command cannot been found.",
		'notEnoughArguments' => "Command %s does not matches the amount of required arguments!",
	),
);

function dumpCommandrConfig()
{
	return $config;
}

return $config;