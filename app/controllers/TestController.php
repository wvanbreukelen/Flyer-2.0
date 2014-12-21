<?php

class TestController extends BaseController
{
	public function test()
	{
		return View::render('hello', array('name' => 'Foo'));
	}
}