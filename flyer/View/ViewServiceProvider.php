<?php

namespace Flyer\Components\View;

use Flyer\Foundation\ServiceProvider;
use Flyer\Components\View\Compiler;
use Flyer\Components\View;

class ViewServiceProvider extends ServiceProvider
{

	protected $compiler;
	protected $view;

	public function register()
	{
		$this->compiler = new Compiler;
		$config = $this->app()->config()->getFull();

		$this->compiler->register(new \Flyer\Components\View\Compilers\BladeCompiler);

		$this->view = new View($this->compiler);
	}

	public function boot()
	{
		file_put_contents(APP . 'views/test.php', $this->view->render('test'));
	}
}