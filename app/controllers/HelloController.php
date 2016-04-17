<?php

/**
 * The "Hello" controller is an example, you may get rid of it
 */
class HelloController
{
	/**
	 * Simple method to say hello!
	 * @param  string $name Value out of request
	 * @return string       The output
	 */
	public function index($name = null)
	{
		if (is_null($name))
		{
			return "Welcome to Flyer!";
		}

		return "Welcome to Flyer, " . ucfirst($name) . "!";
	}

	public function test()
	{
		return render();
	}
}
