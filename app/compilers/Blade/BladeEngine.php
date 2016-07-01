<?php

namespace Flyer\Compilers\Blade;

use Flyer\App;

class BladeEngine
{
	/**
	 * Compile a view using blade
	 * @param  path $path   Uncompiled view path
	 * @param  string $view View name
	 * @param  array  $values Passed values with the view
	 * @return string Compiled data
	 */
	public function compile($path, $view, array $values = array())
	{
		// Receive cache path
		$cachePath = App::getInstance()->make('path.cache');

		// Create new Blade compiler instance
		$this->blade = new BladeCompiler($cachePath);

		// Compile the actual view and return the path of the cached (compiled) view
		$compiledPath = $this->blade->compile($path);

		// Merge compiled view and values, return the raw file contents of the merged file
		return $this->blade->evaluatePath($compiledPath, $values);
	}
}
