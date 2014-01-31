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

	public function render($view, array $assigns = array())
	{
		return $this->twig->render($view);
	}

	public function compile()
	{

	}
}	