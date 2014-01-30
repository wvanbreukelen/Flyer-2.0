<?php

namespace Flyer\Components\View;

use Flyer\Foundation\ServiceProvider;
use Flyer\Components\View\Compiler;

class ViewServiceProvider extends ServiceProvider
{
	public function register()
	{
		$compiler = new Compiler;
		$config = $this->app()->config()->getAll();

		$compile->register(new Flyer\Components\View\Compilers\BladeCompiler);
	}
}