<?php

namespace Flyer\Components\Database;

use Illuminate\Database\Capsule\Manager as DatabaseHandler;
use Illuminate\Events\Dispatcher;
use Illuminate\Container\Container;

class DB
{

	private static $driver;

	public function __construct($driver)
	{
		$this->setDriver($driver);
	}
	
	public function setDriver($driver)
	{
		self::$driver = $driver;
	}

	public static function getDriver()
	{
		return self::$driver;
	}
}
