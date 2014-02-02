<?php

namespace Flyer;

use Flyer\Foundation\ServiceProvider;
use Flyer\Foundation\Events\Events;
use Flyer\Foundation\Config\Config;
use Flyer\Foundation\AliasLoader;

/**
 * The main application object
 */

class App
{

	/**
	 * Holds the config object
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

	/**
	 * Construct
	 *
	 * @param object The config object the application has to use
	 */

	public function __construct(Config $config)
	{
		$this->app = $this;
		$this->config = $config;

		ServiceProvider::setApp($this);
	}
	
	/**
	 * Returns the config instance
	 *
	 * @return object The object instance
	 */

	public function config()
	{
		return $this->config;
	}

	/**
	 * Returns the Registry instance
	 *
	 * @return object The registry instance
	 */
	
	public function registry()
	{
		return $this->registryHandler->registry();
	}

	/**
	 * Returns the database instance
	 *
	 * @return object The database instance
	 */

	public function database()
	{
		return $this->registry()['application.db'];
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
	 * Creates aliases for specified classes
	 *
	 * @param array The classes
	 */

	public function createAliases(array $options = array())
	{
		foreach ($options as $alias => $class)
		{
			AliasLoader::create($class, $alias);
		}
	}
	
	/**
	 * Import a ServiceProvider into the application, and run the register method in the Service Provider
	 *
	 * @var mixed The Service Provider(s), a array or an object 
	 */

	public function register($providerCollection)
	{
		if (is_array($providerCollection))
		{
			foreach ($providerCollection as $provider)
			{
				$provider = new $provider;
				$provider->register();

				$this->providers[] = $provider;
			}
		} else if (is_object($providerCollection)) {
			$provider = new $providerCollection;

			$provider->register();
			$this->providers[] = $provider;
		} else {
			throw new \Exception("Unable to register provider(s), variable type has to been a array or object, not " . gettype($providerCollection));
		}
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

	/**
	 * Gets the instance of the app object
	 *
	 * @return  object The app instance
	 */
	
	public function getInstance()
	{
		return $this;
	}
}
