<?php

namespace Flyer\Components\Database;

use Flyer\Foundation\ServiceProvider;
use Illuminate\Database\Capsule\Manager as DatabaseHandler;
use Illuminate\Events\Dispatcher;
use Illuminate\Container\Container;

class DatabaseServiceProvider extends ServiceProvider
{

	protected $driver;
	protected $database;

	public function register()
	{
		$this->driver = new DatabaseHandler;

		$this->driver->addConnection(\Config::get('database'));
		$this->driver->setEventDispatcher(new Dispatcher(new Container));
		$this->driver->setAsGlobal();
	}

	public function boot()
	{
		$this->driver->bootEloquent();
		\Registry::set('application.db', $this->driver);

		$this->app()->database()->table('users')->get();
	}
}