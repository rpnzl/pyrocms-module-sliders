<?php defined('BASEPATH') OR exit('No direct script access allowed');
/**
 * Regular slider model
 *
 * @author Michael Giuliana
 *
 */
class Slider_m extends MY_Model
{
	public function get_settings()
	{
		$settings = parent::get_all();
		$settings = $settings[0];

		return $settings;
	}
}