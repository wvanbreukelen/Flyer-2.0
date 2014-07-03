<?php

namespace Flyer\Components\View;

use Twig_Environment;
use Flyer\Foundation\Registry;

class ViewEngine
{

	protected $twig;

	public function __construct(Twig_Environment $twig)
	{
		$this->twig = $twig;
	}

	public function compile($view, $id = null)
	{
		if (is_null($id))
		{
			return $this->render($view . '.html');
		}

		return Registry::get('application.view.compiler')->compile($id, $view);
	}

	private function render($view, array $assigns = array())
	{
		return $this->twig->render($view);
	}

}	
