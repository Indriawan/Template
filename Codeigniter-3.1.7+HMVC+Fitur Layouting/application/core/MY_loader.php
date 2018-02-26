<?php (defined('BASEPATH')) OR exit('No direct script access allowed');

/* load the MX_Loader class */
require APPPATH."third_party/MX/Loader.php";

class MY_Loader extends MX_Loader {
	
	public function beginContent()
	{
		$ci = get_instance();
		$args = func_get_args();
		return call_user_func_array(array($ci, 'beginContent'), $args);
	}
	public function endContent()
	{
		$ci = get_instance();
		$args = func_get_args();
		return call_user_func_array(array($ci, 'endContent'), $args);
	}
	public function render()
	{
		$ci = get_instance();
		$args = func_get_args();
		return call_user_func_array(array($ci, 'render'), $args);
	}
}
