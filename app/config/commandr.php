<?php

/**
 * Commandr config file
 * You may add your own config options for Commandr here
 */

$config = array(
	/**
	 * The errors for Commandr
	 */
	'errors' => array(
		'commandNotFound' => "This command cannot been found.",
		'notEnoughArguments' => "Command %s does not matches the amount of required arguments, type help   [command] for help",
	),
);

return $config;
