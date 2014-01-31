<?php

namespace Flyer\Components\View;

use Flyer\Foundation\ServiceProvider;
use Flyer\Components\View\ViewEngine;

class ViewServiceProvider extends ServiceProvider
{

	protected $twig;
	protected $engine;

	public function register()
	{
		$this->twig = new \Twig_Environment(new \Twig_Loader_Filesystem(APP . 'views' . DS));
		\Registry::set('application.view.engine', new ViewEngine($this->twig));
	}
}