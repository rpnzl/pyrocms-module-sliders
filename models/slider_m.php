<?php defined('BASEPATH') OR exit('No direct script access allowed');
/**
 * Slider Model
 * 
 * @author Michael Giuliana
 */
class Slider_m extends MY_Model
{
	/**
	 * Array that contains the validation rules.
	 *
	 * @access	public
	 * @var		array
	 */
	public $_validation_rules = array(
		array(
			'field' => 'jquery',
			'label' => 'jQuery',
			'rules' => 'trim|required|numeric'
		),
		array(
			'field' => 'folder_id',
			'label' => 'Folder',
			'rules' => 'trim|required|numeric'
		),
	);

	/**
	 * Get Sliders Module settings.
	 * 
	 * Takes the work out of grabbing the settings whenever
	 * we need them. Will also return a single value if
	 * needed.
	 * 
	 * @param str $field The settings field to retrieve.
	 * @return array / str
	 */
	public function get_settings($field = null)
	{
		// return value of a single setting
		if($field)
		{
			$settings = parent::get_all();
			$settings = $settings[0];
			$result = (property_exists($settings, $field)) ? $settings->{$field} : 'Invalid field.';
		}
		// return all settings
		else
		{
			$settings = parent::get_all();
			$result = $settings[0];
		}

		return $result;
	}
}