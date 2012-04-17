<?php defined('BASEPATH') OR exit('No direct script access allowed');
/**
 * Sliders controller
 *
 * @author 		Michael Giuliana
 */
class Admin extends Admin_Controller {

	/**
	 * The current active section
	 *
	 * @var string
	 */
	protected $section = 'sliders';

	/**
	 * Constructor method
	 *
	 * Loads the form_validation library, the pages, pages layout
	 * and navigation models along with the language for the pages
	 * module.
	 */
	public function __construct()
	{
		parent::__construct();

		// Load the required classes
		$this->load->model(array('slider_settings_m', 'slider_m'));
		$this->lang->load('sliders');

		// Load the validation library
		$this->load->library('form_validation');

		$this->template
			->title($this->module_details['name']);

		// Set the validation rules
		//$this->form_validation->set_rules($this->validation_rules);
	}


	public function index()
	{
		$this->template
			->title($this->module_details['name'])
			->set('sliders', $this->slider_m->get_all())
			->build('admin/index');
	}


	public function create()
	{
		$this->template
			->title($this->module_details['name'])
			->build('admin/form');
	}
}