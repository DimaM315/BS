<?php

namespace Controller;


abstract class BaseController
{

	public function __construct()
	{

	}

	public function __call($name, $params)
	{
		
	}

	protected function render($fileName, $vars = array())
	{
		foreach ($vars as $k => $v)
		{
			$$k = $v;
		}

		ob_start();
		include "$fileName";
		return ob_get_clean();	
	}	

}