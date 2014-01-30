<?php

namespace Flyer\Components;

use Flyer\Components\View\Compiler;

/**
 * The general view engine
 */

class View
{

	protected $compiler;

	/**
	 * Construct a compiler
	 *
	 * @param Next\Components\View\Compiler The compiler, has to be a instance of Next\Components\View\Compiler
	 */

	public function __construct(Compiler $compiler)
	{
		$this->compiler = $compiler;
	}

	/**
	 * Render a view
	 *
	 * @param  string The view path
	 * @return string The rendered view
	 */

	public function render($view)
	{
		$contents = file_get_contents(APP . 'views' . DS . $view . '.blade.php');

		return $this->compile($contents);

	}

	/**
	 * Compile a view if it does not exists in the cache or it is modified
	 *
	 * @param  string The view path
	 * @param  bool Enable caching
	 */

	public function compile($contents, $caching = true)
	{
		if ($caching)
		{
			// Check for existance in the cache
			return $this->compiler->compile($contents);
		} else {
			return $this->compiler->compile($contents);
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