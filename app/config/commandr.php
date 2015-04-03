<?php

$config = array(

	/**
	 * All the commands that have to been registered
	 */
	'commands' => array(
		'Commandr\Commands\HelpCommand',
		'Flyer\Components\Router\Console\SimulateRouteCommand',
		'Flyer\Components\Router\Console\RouteListCommand',
		'Flyer\Components\Package\PackageInstallCommand',
	),
	
	/**
	 * The errors for the commandr core
	 */
	'errors' => array(
		'commandNotFound' => "This command cannot been found.",
		'notEnoughArguments' => "Command %s does not matches the amount of required arguments, type help   [command] for help",
	),
);

/**
 * Simply dump the current configuration
 * @return array The configuration
 */
function dumpCommandrConfig()
{
	return $config;
}

return $config;