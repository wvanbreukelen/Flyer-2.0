<?php

namespace Flyer\Components;

class View
{
	public static function render($view, $values = null, $id = null)
	{
		return \Registry::get('application.view.engine')->compile($view, $values, $id);
	}
}