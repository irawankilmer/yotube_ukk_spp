<?php 
/**
 * 
 */
class Controller
{
	public function view($path, $data = [])
	{
		include '../app/views/'.$path.'.php';
	}
}