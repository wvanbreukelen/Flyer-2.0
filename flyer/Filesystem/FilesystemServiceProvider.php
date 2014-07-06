<?php

namespace Flyer\Components\Filesystem;

use Flyer\Foundation\ServiceProvider;

class FilesystemServiceProvider extends ServiceProvider
{
	public function register()
	{
		$this->share('file', new File);
	}
}