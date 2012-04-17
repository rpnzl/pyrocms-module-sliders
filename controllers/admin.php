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
	 * Array that contains the validation rules
	 *
	 * @access	protected
	 * @var		array
	 */
	protected $_validation_rules = array(
		'title' => array(
			'field' => 'title',
			'label' => 'Title',
			'rules' => 'trim|htmlspecialchars|required|max_length[100]'
		),
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
		$this->load->model(array('slider_settings_m', 'slider_m'));
		$this->lang->load('sliders');

		// Load the validation library
		$this->load->library('form_validation');

		// Set the validation rules
		$this->form_validation->set_rules($this->_validation_rules);

		$this->template
			->title($this->module_details['name']);
	}


	public function index()
	{
		$this->template
			->set('sliders', $this->slider_m->get_all())
			->build('admin/index');
	}


	public function create()
	{
		// If val is run
		if ($this->form_validation->run())
		{
			// Get posted vars
			$props = array(
				'title' => $this->input->post('title'),
				'created_on' => now(),
				'updated_on' => now(),
			);

			if ($id = $this->slider_m->insert($props))
			{
				$this->session->set_flashdata('success', 'Slider created.');
			}
			else
			{
				$this->session->set_flashdata('error', 'Slider was not created.');
			}

			redirect('admin/sliders');
		}

		// Loop through each validation rule
		foreach ($this->_validation_rules as $rule)
		{
			$slider_m->{$rule['field']} = set_value($rule['field']);
		}

		$this->template
			->build('admin/form');
	}




	public function delete($id = 0)
	{
		/*
		$id_array = (!empty($id)) ? array($id) : $this->input->post('action_to');

		// Loop through each item to delete
		if(!empty($id_array))
		{
			foreach ($id_array as $id)
			{
				$this->navigation_m->delete_link($id);
			}

			Events::trigger('post_navigation_delete', $id_array);
		}
		// Flush the cache and redirect
		$this->session->set_flashdata('success', $this->lang->line('nav_link_delete_success'));
		*/
		redirect('admin/sliders');
	}
}