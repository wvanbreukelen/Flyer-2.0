<?php

namespace Flyer\Components\View;

/**
 * The compiler compiles the view into readable code for the browser
 */

class Compiler
{

	/**
	 * All of the registered compilers
	 */

	protected $compilers = array();

	/**
	 * Register a compiler
	 *
	 * @param object The compiler, has to implement the CompilerInterface
	 */

	public function register($compiler)
	{
		if (is_object($compiler))
		{
			$this->compilers[] = $compiler;
		}
	}

	/**
	 * Compile a given view "string" and return the results back to the client
	 *
	 * @param string The view
	 * @return string The compiled view
	 */

	public function compile($view)
	{
		$compiled = null;

		foreach ($this->compilers as $compiler)
		{
			$compiled = $compiler->compile($view);
		}

		return $compiled;
	}
}