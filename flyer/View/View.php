<?php

namespace Next\Components;

/**
 * The general view engine
 */

class View
{

	/**
	 * Compile a view if it does not exists in the cache or it is modified
	 *
	 * @param  string The view path
	 * @param  bool Enable caching
	 */

	public function compile($view, $caching = true)
	{
		if ($caching)
		{
			// Check for existance in the cache
			// Compile the view and return the result
		} else {
			// Compile the view and return the result
		}
	}

	/**
	 * Recache the given view
	 *
	 * @param string The view path
	 * @return bool
	 */

	public function recache($view)
	{

	}
}