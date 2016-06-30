<?php

namespace Flyer\Compilers\Blade;

use Illuminate\Filesystem\Filesystem as IlluminateFilesystem;
use Illuminate\View\Compilers\BladeCompiler as IlluminateBladeCompiler;

class BladeCompiler
{

	/**
	 * Instance of Illuminate\View\Compilers\BladeCompiler
	 * @var object Illuminate\View\Compilers\BladeCompiler
	 */
	protected $compiler;

	/**
	 * Construct the blade compiler, with empty Illuminate filesystem
	 * @param string $cachePath Cache path to use
	 */
	public function __construct($cachePath)
	{
		$this->compiler = new IlluminateBladeCompiler(new IlluminateFilesystem, $cachePath);
	}

	/**
	 * Compile a view with a given view pathg
	 * @param  string $viewPath View path
	 * @return string           Compiled view path
	 */
	public function compile($viewPath)
	{
		$this->compiler->compile($viewPath);

		return $this->compiler->getCompiledPath($viewPath);
	}

	/**
	 * Evaluates a path with values
	 * @param  string $path   View path
	 * @param  array $values  View values
	 * @return string Evaluated data
	 */
	public function evaluatePath($path, array $values = array())
	{
		ob_start();

		extract($values, EXTR_SKIP);

		try {
			include $path;
		} catch (Exception $e) {
			throw new Exception("Blade compiler error accoured!");
		}

		return ltrim(ob_get_clean());
	}
}
