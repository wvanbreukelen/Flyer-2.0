<?php

$config = array(
	'commands' => array(
		'Commandr\Commands\HelpCommand',
		'Flyer\Components\Router\Console\SimulateRouteCommand',
		'Flyer\Components\Router\Console\RouteListCommand',
	),
	
	'errors' => array(
		'commandNotFound' => "This command cannot been found.",
		'notEnoughArguments' => "Command %s does not matches the amount of required arguments, type help   [command] for help",
	),
);

function dumpCommandrConfig()
{
	return $config;
}

return $config;