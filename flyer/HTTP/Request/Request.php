<?php

namespace Flyer\Components\HTTP\Request;

class Request
{

	protected static $payload;

	public function setPayload($payload)
	{
		self::$payload = $payload;
	}

	public static function getPath()
	{
		return ltrim(self::$payload->getPathInfo(), '/');
	}

	public static function getRequestMethod()
	{
		return Registry::get('application.request.method');
	}
}