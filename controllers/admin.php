<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Admin extends Admin_Controller {

	/**
	 * The current active section
	 *
	 * @var string
	 */
	protected $section = 'sliders';

	public function __construct()
	{
		parent::__construct();

		// load classes, libs, language
		$this->lang->load('sliders');
		$this->load->library('form_validation');
		$this->load->model(array('slider_m', 'files/file_folders_m',));

		// set validation rules
		$this->form_validation->set_rules($this->slider_m->_validation_rules);

		// template settings
		$this->template->title($this->module_details['name']);
	}


	public function index()
	{
		// if val is run
		if ($this->form_validation->run())
		{
			// get posted vars
			$id = $this->input->post('id');
			$props = array(
				'jquery'	=> $this->input->post('jquery'),
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

			redirect('admin/sliders');
		}

		// loop through each validation rule
		foreach ($this->slider_m->_validation_rules as $rule)
		{
			$this->slider_m->{$rule['field']} = set_value($rule['field']);
		}

		// get folders for dropdown
		$folders = $this->file_folders_m->get_all();
		foreach($folders as $folder)
		{
			$select_folders[$folder->id] = $folder->name;
		}

		// set template vars and build
		$this->template
			->set('settings', $this->slider_m->get_settings())
			->set('folders', $select_folders)
			->build('admin/index');
	}
}