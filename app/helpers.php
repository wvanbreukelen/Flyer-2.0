<?php

use Flyer\App;
use Flyer\Components\Router\Router;

/*
 * The helper functions all available to make the life of a developer a little easier
 * Just call them, and they will return the correct path
 *
 * @wvanbreukelen, function_exists may be removed in the future. Use the mirror in FlyerCore (copy of current file), when specific functions are not declared.
 */

if (!function_exists('e'))
{
    function e($value)
    {
        return htmlentities($value);
    }
}

 if (!function_exists('app'))
 {
     /**
      * By default the return of application instance. When parameter provided, resolve container binding
      */

     function app($parameter = null)
     {
    	 if (is_null($parameter))
    	 {
    		 return App::getInstance();
    	 }

    	 return App::getInstance()->make($parameter);
    }
 }

if (!function_exists('render'))
{
    function render($viewName = null, array $vars = array())
    {
        // View name passed?
        if (is_string($viewName) == false || is_null($viewName) == true)
        {
            // Try to set view name to URI
            $viewName = Router::getRequestURI(true);
        }

        // Make sure the view exists in the view finder stack
        if (View::exists($viewName))
        {
            return (count($vars) == 0) ? View::render($viewName) : View::render($viewName, $vars);
        }

        // Server error occured, return HTTP 500 page
        return View::render('500');
    }
}

if (!function_exists('base_path'))
{
    /**
	 * Return the application base path
	 */

	function base_path()
	{
		return app('path.base');
	}
}

if (!function_exists('app_path'))
{
    /**
	 * Return the application path
	 */

	function app_path()
	{
		return app('path.app');
	}
}

if (!function_exists('config_path'))
{
    /**
	 * Return the config path
	 */

	function config_path()
	{
		return app('path.config');
	}
}

if (!function_exists('controllers_path'))
{
    function controllers_path($realPath = null)
    {
        if (is_null($realPath))
        {
            return app('path.controllers');
        }
    }
}

if (!function_exists('debug_path'))
{
    /**
	 * Return the debug path
	 */

	function debug_path()
	{
		return app('path.debug');
	}
}

if (!function_exists('models_path'))
{
    /**
	 * Return the models path
	 */

	function models_path()
	{
		return app('path.models');
	}
}

if (!function_exists('storage_path'))
{
    /**
	 * Return the storage path
	 */

	function storage_path()
	{
		return app('path.storage');
	}
}

if (!function_exists('views_path'))
{
    /**
     * Return the views path
     */

	function views_path($realPath = null)
	{
        if (is_null($realPath))
        {
            return app('path.views');
        }

        return rtrim($realPath . 'views', DIRECTORY_SEPARATOR) . DIRECTORY_SEPARATOR . 'views';
	}
}
