<?php

namespace Flyer\Components;

class View
{
	public static function render($view, $id = null)
	{
		return \Registry::get('application.view.engine')->compile($view, $id);
	}
}