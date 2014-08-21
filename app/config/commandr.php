<?php

$config = array(
	'commands' => array(
		'Commandr\Commands\TestCommand',
		'Commandr\Commands\HelloCommand',
		'Commandr\Commands\HelpCommand',
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