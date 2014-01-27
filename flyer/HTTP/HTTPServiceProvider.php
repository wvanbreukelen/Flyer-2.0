<?php

namespace Flyer\Components\HTTP;

use Flyer\Components\HTTP\Request\Request;
use Flyer\Foundation\ServiceProvider;
use Flyer\Foundation\Events\Events;

class HTTPServiceProvider extends ServiceProvider
{

	private $request;

	public function boot()
	{
		// $this->package($package, $namespace = null, $path = null);

		$request = new Request($this->request);
	}

	public function register()
	{
		$this->request = Events::trigger('request.get');
	}
}