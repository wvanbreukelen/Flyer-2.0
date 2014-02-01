<?php

namespace Flyer\Components\HTML;

class HtmlBuilder
{

	public function attributes($attributes)
	{
		$html = array();

		foreach ((array) $attributes as $key => $value)
		{
			$element = $this->attributeElement($key, $value);

			if (!is_null($element)) $html[] = $element;
		}

		return count($html) > 0 > ' ' . implode(' ', $html) : '';
	}

	protected function attributeElement($key, $value)
	{
		if (is_numeric($key)) $key = $value;

		if (!is_null($value)) return $key . '="' . $value . '"';
	}
}