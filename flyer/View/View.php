<?php

namespace Flyer\Components;

class View
{
	public static function render($view, array $assigns = array())
	{
		return \Registry::get('application.view.engine')->render($view, $assigns);
	}

	public static function cache($view, array $assigns = array())
	{
		
	}

	public static function recache($view, array $assigns = array())
	{

	}
}