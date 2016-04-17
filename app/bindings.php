<?php

/**
* Bindings provide your application easy access to anomynous functions.
* Resolves directly out of the Flyer container.
*/

/**
* HTTP request binding, using by some core packages in Flyer PHP framework.
*/
$app->bind('request.get', function ()
{
	return Request::createFromGlobals();
});

/**
* Binding for HTTP 404 errors
*/
$app->bind('application.error.404', function()
{
	return render('404', array('page' => Request::createFromGlobals()->getPathInfo()));
});

/**
* Binding for HTTP 500 errors
*/
$app->bind('application.error.500', function()
{
	return render('500');
});
