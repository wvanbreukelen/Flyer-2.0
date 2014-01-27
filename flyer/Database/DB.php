<?php

namespace Flyer\Components\Database;

use Illuminate\Database\Capsule\Manager as IlluminateDB;

class DB
{

	private $driver;

	public function register()
	{
		$this->driver = new IlluminateDB;

		$this->driver->addConnection(Config::get('database'));
	}
}