<?php

namespace Flyer\Components\View\Compiler;

class ViewCompiler
{

	protected $compilers = array();

	public function addCompiler($id, $compiler)
	{
		$this->compilers[$id] = $compiler;
	}

	public function compile($id, $view)
	{
		if (isset($this->compilers[$id]))
		{
			return $this->compilers[$id]->render($view);
		}

		throw new \Exception("ViewCompiler: Compiler " . $id . " does not exists!");
	}
}