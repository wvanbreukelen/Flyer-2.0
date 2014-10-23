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
		$this->contents = $this->blade->compile($contents);

		if (!File::exists(APP . 'storage/cache' . DS .$view . '.php'))
		{
			File::write(APP . 'storage/cache' . DS . $view . '.php', $this->contents);
		} else if ($this->contents != file_get_contents(APP . 'storage/cache' . DS . $view . '.php')) {
			File::write(APP . 'storage/cache' . DS . $view . '.php', $this->contents);
		}

		return $this->build(APP . 'storage/cache' . DS . $view . '.php', $values);
	}

	protected function build($path, $values)
	{
		ob_start();

		extract($values);
		include($path);

		return ltrim(ob_get_clean());
	}
}