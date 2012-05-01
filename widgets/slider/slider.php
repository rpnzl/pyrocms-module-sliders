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
		array(
			'field' => 'effect',
			'label' => 'Effect',
		),
		array(
			'field' => 'captions',
			'label' => 'Captions',
		),
		array(
			'field' => 'animSpeed',
			'label' => 'Animation Speed',
		),
		array(
			'field' => 'pauseTime',
			'label' => 'Pause Time',
		),
		array(
			'field' => 'directionNav',
			'label' => 'Direction Nav',
		),
		array(
			'field' => 'directionNavHide',
			'label' => 'Direction Nav Hide',
		),
		array(
			'field' => 'controlNav',
			'label' => 'Control Nav',
		),
		array(
			'field' => 'keyboardNav',
			'label' => 'Keyboard Nav',
		),
		array(
			'field' => 'pauseOnHover',
			'label' => 'Pause On Hover',
		),
		array(
			'field' => 'manualAdvance',
			'label' => 'Manual Advance',
		),
		array(
			'field' => 'slices',
			'label' => 'Slices',
		),
		array(
			'field' => 'boxCols',
			'label' => 'Box Columns',
		),
		array(
			'field' => 'boxRows',
			'label' => 'Box Rows',
		),
	);


	public function form($options)
	{
		$this->load->model(array(
			'sliders/slider_settings_m',
			'sliders/slider_m',
		));

		$sliders = $this->slider_m->get_all();
		$select_slider = array();
		foreach($sliders as $slider)
		{
			$select_slider[$slider->id] = $slider->title;
		}

		!empty($options['slider_id'])				OR $options['slider_id'] = null;
		!empty($options['captions'])				OR $options['captions'] = 'false';
		!empty($options['effect'])					OR $options['effect'] = 'fade';
		!empty($options['animSpeed'])				OR $options['animSpeed'] = 500;
		!empty($options['pauseTime'])				OR $options['pauseTime'] = 3000;
		!empty($options['directionNav'])			OR $options['directionNav'] = 'true';
		!empty($options['directionNavHide'])		OR $options['directionNavHide'] = 'true';
		!empty($options['controlNav'])				OR $options['controlNav'] = 'true';
		!empty($options['keyboardNav'])				OR $options['keyboardNav'] = 'true';
		!empty($options['pauseOnHover'])			OR $options['pauseOnHover'] = 'true';
		!empty($options['manualAdvance'])			OR $options['manualAdvance'] = 'false';
		!empty($options['slices'])					OR $options['slices'] = 15;
		!empty($options['boxCols'])					OR $options['boxCols'] = 8;
		!empty($options['boxRows'])					OR $options['boxRows'] = 4;

		return array(
			'options'	=> $options,
			'select_slider'	=> $select_slider,
		);
	}


	public function run($options)
	{
		// Load templates and libraries
		$this->load->library(array('files/files'));
		$this->load->model(array(
			'sliders/slider_settings_m',
			'sliders/slider_m',
			'files/file_m',
		));


		// Get settings
		$settings = $this->slider_settings_m->get_all();
		$settings = $settings[0];


		// Get slider and images
		$slider = $this->slider_m->get($options['slider_id']);
		$query = $this->db->order_by('sort', 'asc')->get_where('files', array('folder_id' => $slider->folder_id));
		$images = $query->result();

		// Add path to module assets
		Asset::add_path('sliders', 'addons/shared_addons/modules/sliders/');

		// Include jQuery if needed
		if($settings->jquery == 1)
		{
			$this->template->append_js(array(
				'sliders::jquery.min.js',
				'sliders::jquery.nivo.slider.pack.js',
			));
		}
		else
		{
			$this->template->append_js('sliders::jquery.nivo.slider.pack.js');
		}


		// Append slider themes
		$this->template->append_css(array(
			'sliders::nivo-slider.css',
			'sliders::default.css',
			'sliders::orman.css',
			'sliders::pascal.css',
		));

		// returns the variables to be used within the widget's view
		return array(
			'options'	=> $options,
			'slider'	=> $slider,
			'images'	=> $images,
		);
	}
}
