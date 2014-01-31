<?php

namespace Flyer;

use Flyer\Foundation\ServiceProvider;
use Flyer\Foundation\Events\Events;
use Flyer\Foundation\Config\Config;

class App
{

	/**
	 * The config object
	 */
	
	public $config;

	/**
	 * Holds all of the service providers
	 */

	protected $providers = array();

	/**
	 * Holds all of the booted service providers
	 */

	protected $bootedProviders = array();

	/**
	 * Holds the current booting status of the application
	 */

	protected $booted = false;

	/**
	 * Holds the registry handler that is used the application
	 */

	protected $registryHandler;

	/**
	 * The application instance
	 */

	protected $app;

	public function __construct(Config $config)
	{
		$this->app = $this;
		$this->config = $config;

		ServiceProvider::setApp($this);
	}
	
	/**
	 * Returns the config instance
	 */

	public function config()
	{
		return $this->config;
	}

	/**
	 * Returns the Registry instance
	 */
	
	public function registry()
	{
		return $this->registryHandler->registry();
	}

	/**
	 * Sets the registry handler that the application has to use
	 *
	 * @var  object The registry handler
	 * @return  void
	 */

	public function setRegistryHandler($handler)
	{
		$this->registryHandler = $handler;
	}
	
	/**
	 * Import a ServiceProvider into the application, and run the register method in the Service Provider
	 *
	 * @var object The Service Provider of the component, extending the ServiceProvider class
	 * @return  void 
	 */

	public function register(ServiceProvider $provider)
	{
		$provider->register();

		$this->providers[] = $provider;
	}

	/**
	 * Get or check the current application environment.
	 *
	 * @param  dynamic
	 * @return string
	 */
	public function environment()
	{
		if (count(func_get_args()) > 0)
		{
			return in_array($this['env'], func_get_args());
		}
		else
		{
			return $this['env'];
		}
	}

	/**
	 * Boot the application, boots all of the imported Service Providers
	 *
	 * @return  void
	 */

	public function boot() 
	{
		foreach ($this->providers as $provider)
		{
			$provider->boot();
		}
	
		$this->booted = true;
	}
	
	/**
	 * Trigger the final events to shutdown the application
	 */

	public function shutdown()
	{
		if (!$this->booted) throw new \Exception("App: Application cannot been shutdown, it has to been booted!");
		if (Events::exists('application.route'))
		{
			echo Events::trigger('application.route');
		} else {
			echo $this->triggerErrorPage('404');
		}
	}
	
	/**
	 * Triggers the error page, developer has to give the HTTP error code
	 * 
	 * @param $error The HTTP error code
	 */

	public function triggerErrorPage($error)
	{
		return Events::trigger('application.error.' . $error);
	}

	/**
	 * Removes all Service Providers out of the pending boot payload
	 *
	 * @return  void 
	 */

	public function resetProviders()
	{
		unset($this->providers);
	}

	/**
	 * Returns the application booting status
	 *
	 * @return bool The booting status
	 */

	public function booted()
	{
		return $this->booted;
	}
}
