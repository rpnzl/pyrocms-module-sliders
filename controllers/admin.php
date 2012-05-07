<?php defined('BASEPATH') OR exit('No direct script access allowed');

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
		$this->load->model(array(
			'slider_m',
			'files/file_folders_m',
		));
		$this->lang->load('sliders');

		// Load the validation library
		$this->load->library('form_validation');

		// Set the validation rules
		$this->form_validation->set_rules($this->_validation_rules);

		$this->template
			->title($this->module_details['name']);
	}



	/**
	 * Index method
	 */
	public function index()
	{
		// If val is run
		if ($this->form_validation->run())
		{
			// Get posted vars
			$id = $this->input->post('id');
			$props = array(
				'jquery' => $this->input->post('jquery'),
				'folder_id' => $this->input->post('folder_id'),
			);

			if ($id = $this->slider_m->update($id, $props))
			{
				$this->session->set_flashdata('success', 'Settings updated.');
			}
			else
			{
				$this->session->set_flashdata('error', 'Settings updated failed.');
			}

			$this->input->post('btnAction') == 'save_exit' ?
				redirect('admin/sliders') :
				redirect('admin/sliders');
		}

		// Loop through each validation rule
		foreach ($this->_validation_rules as $rule)
		{
			$slider_m->{$rule['field']} = set_value($rule['field']);
		}

		$settings 	= $this->slider_m->get_all();
		$settings 	= $settings[0];
		$folders 	= $this->file_folders_m->get_all();
		foreach($folders as $folder)
		{
			$folder_opts[$folder->id] = $folder->name;
		}

		$this->template
			->set('settings', $settings)
			->set('folders', $folder_opts)
			->build('admin/index');
	}
}