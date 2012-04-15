<?php defined('BASEPATH') OR exit('No direct script access allowed');
/**
 * Slider settings controller
 *
 * @author 		Michael Giuliana
 */
class Admin_settings extends Admin_Controller {

	/**
	 * The current active section
	 *
	 * @var string
	 */
	protected $section = 'settings';

	/**
	 * Validation rules used by the form_validation library
	 *
	 * @var array
	 */
	private $validation_rules = array(
		/*
		array(
			'field' => 'title',
			'label' => 'lang:page_layouts.title_label',
			'rules' => 'trim|required|max_length[60]'
		),
		array(
			'field' => 'theme_layout',
			'label' => 'lang:page_layouts.theme_layout_label',
			'rules' => 'trim'
		),
		array(
			'field' => 'body',
			'label' => 'lang:page_layouts.body_label',
			'rules' => 'trim|required'
		),
		array(
			'field' => 'css',
			'label' => 'lang:page_layouts.css_label',
			'rules' => 'trim'
		),
		array(
			'field' => 'js',
			'label' => 'lang:page.js_label',
			'rules' => 'trim'
		),
		*/
	);

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
		$this->load->model('slider_settings_m');
		$this->load->model('slider_m');
		$this->lang->load('sliders');

		// Load the validation library
		$this->load->library('form_validation');

		// Set the validation rules
		//$this->form_validation->set_rules($this->validation_rules);
	}

	/**
	 * Index method
	 */
	public function index()
	{
		/*
		if ($_POST)
		{
			// Set validation rules from model
			//$this->form_validation->set_rules($this->slider_settings_m->validation_rules);

			// Get posted vars
			$setup_id = $this->input->post('id');
			$props = array(
				'jquery' = $this->input->post('jquery'),
			);

			// If val is run
			if ($this->form_validation->run())
			{
				if ($id = $this->slider_settings_m->update($setup_id, $props))
				{
					// Fire an event. A new keyword has been added.
					//Events::trigger('keyword_created', $id);

					$this->session->set_flashdata('success', 'Settings updated.');
				}
				else
				{
					$this->session->set_flashdata('error', 'Settings updated failed.'));
				}

				redirect('admin/sliders/setup');
			}
		}
		*/

		// Loop through each validation rule
		/*
		foreach ($this->validation_rules as $rule)
		{
			$slider_settings_m->{$rule['field']} = set_value($rule['field']);
		}
		*/

		$this->template
			->title($this->module_details['name']);
			//->set('settings', $this->slider_settings_m->get_all())
			//->build('admin/settings/index');
	}
}