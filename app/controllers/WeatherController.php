<?php

use Flyer\Foundation\Registry;

class WeatherController
{
	public function index()
	{
		//return "Hi, I am the weather page!!!"';
		
		//$engine = new ViewEngine();

		//$engine->compile();
		
		//$engine = Registry::get('application.view.engine');
		//echo $engine->render('view.html');
		echo \View::render('view.html');
	}
}