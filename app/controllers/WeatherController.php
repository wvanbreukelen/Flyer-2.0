<?php

use Flyer\Foundation\Registry;

class WeatherController
{
	public function index()
	{
		print_r(\Registry::get('application.db')->table('users')->where('user_id', '=', 2)->get());
	}
}