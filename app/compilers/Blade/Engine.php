<?php

namespace wvanbreukelen\Blade;

use wvanbreukelen\Blade\BladeCompiler;
use Flyer\Components\View\Compiler\Compiler;
use File;

class BladeEngine extends Compiler
{

	protected $blade;

	protected $values;

	public function compile($contents, $view, array $values = array())
	{
		$this->blade = new BladeCompiler();

		$output = $this->blade->compile($contents);
		$path = app_path() . 'storage/cache/' . $view . '.php';

		if (!File::exists($path))
		{
			File::write($path, $output);
		} else if ($output != File::contents($path)) {
			File::write($path, $output);
		}

		return $this->build($path, $values);
	}

	protected function build($path, $values)
	{
		ob_start();
		extract($values);
		include($path);
		
		return ltrim(ob_get_clean());
	}
}