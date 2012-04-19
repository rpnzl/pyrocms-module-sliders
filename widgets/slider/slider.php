<?php defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * @package 		PyroCMS
 * @subpackage 		Slider Widget
 * @author			Michael Giuliana
 *
 * Display a slider configured in the Sliders Module
 *
 * Usage : on a CMS page add {widget_area('name_of_area')}
 * where 'name_of_area' is the name of the widget area you created in the admin control panel
 */

class Widget_Slider extends Widgets
{
	public $title		= array(
		'en' => 'Slider',
	);
	public $description	= array(
		'en' => 'Display a Nivo Slider on your website.',
	);

	public $author		= 'Michael Giuliana';
	public $website		= 'http://rpnzl.com';
	public $version		= '1.0';

	public $fields = array(
		array(
			'field' => 'slider_id',
			'label' => 'Slider',
		),
	);


	/**
	 * Set option defaults
	 */
	public function form($options)
	{
		$this->load->model(array(
			'sliders/slider_settings_m',
			'sliders/slider_m',
		));

		$sliders = $this->slider_m->get_all();
		$slider_array = array();
		foreach($sliders as $slider)
		{
			$slider_array[$slider->id] = $slider->title;
		}

		!empty($options['slider_id'])	OR $options['slider_id'] = null;

		return array(
			'options'	=> $options,
			'sliders'	=> $slider_array,
		);
	}


	public function run($options)
	{
		$this->load->library(array('files/files'));
		$this->load->model(array(
			'sliders/slider_settings_m',
			'sliders/slider_m',
			'files/file_m',
		));

		$slider = $this->slider_m->get($options['slider_id']);
		$query = $this->db->get_where('files', array('folder_id' => $slider->folder_id));
		$images = $query->result();


		Asset::add_path('sliders', 'addons/shared_addons/modules/sliders/');
		$this->template->append_js('sliders::jquery.nivo.slider.pack.js');
		$this->template->append_css('sliders::nivo-slider.css');


		// returns the variables to be used within the widget's view
		return array(
			'options'	=> $options,
			'slider'	=> $slider,
			'images'	=> $images,
		);
	}
}
