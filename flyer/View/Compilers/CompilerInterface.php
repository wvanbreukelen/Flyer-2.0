<?php

namespace Flyer\Components\View\Compilers;

/**
 * All compilers has to implement this inferface
 */

interface CompilerInterface
{
	public function compile($view);
}
