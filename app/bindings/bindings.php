<?php

/**
 * All errors bindings
 */

$app->bind('application.error.500', function()
{
	return View::render('500');
});

/**
 * Add any other bindings down here!
 */