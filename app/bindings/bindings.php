<?php

/**
 * All errors bindings
 */

s
$app->bind('application.error.500', function()
{
	return View::render('500');
});


/**
 * Add any other error bindings down here!
 */
