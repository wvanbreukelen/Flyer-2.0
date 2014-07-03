<?php

use Flyer\Foundation\Registry;

class WeatherController extends BaseController
{
	public function index()
	{
		echo View::render('view.html', 'application.blade');
	}

	public function handle()
	{
		return "Hey, you used the POST method!";
	}

	public function weather()
	{
		return "You use the GET method";
		//print_r(\Registry::get('application.db')->table('users')->where('user_id', '=', 2)->get());
	}
}