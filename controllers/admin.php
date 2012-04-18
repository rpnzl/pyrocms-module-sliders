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
			'slider_settings_m',
			'slider_m',
			'files/file_folders_m',
		));

		$this->lang->load('sliders');

		// Load the validation library
		$this->load->library(array(
			'form_validation',
			'files/files',
		));

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
		// Get general settings
		$settings 	= $this->slider_settings_m->get_all();
		$settings 	= $settings[0];

		// If validation is run
		if ($this->form_validation->run())
		{
			// If user wants to create a new folder
			if($this->input->post('folder_id') == 0)
			{
				// Insert the record
				if(Files::create_folder($settings->folder_id, $this->input->post('title')))
				{
					$folder_id = $this->db->insert_id();
				}
			}
			else
			{
				// Otherwise, just use the posted folder id
				$folder_id = $this->input->post('folder_id');
			}

			// Set slider props
			$props = array(
				'title' => $this->input->post('title'),
				'folder_id' => $folder_id,
				'created_on' => now(),
				'updated_on' => now(),
			);

			// Insert new slider
			if ($id = $this->slider_m->insert($props))
			{
				$this->session->set_flashdata('success', 'Slider created.');
			}
			else
			{
				$this->session->set_flashdata('error', 'Slider was not created.');
			}

			$this->input->post('btnAction') == 'save_exit' ?
				redirect('admin/sliders') :
				redirect('admin/sliders/edit/' . $id);
		}

		// Loop through each validation rule
		foreach ($this->_validation_rules as $rule)
		{
			$slider_m->{$rule['field']} = set_value($rule['field']);
		}


		$query = $this->db->get_where('file_folders', array('parent_id' => $settings->folder_id));
		$folder_opts[0] = 'Create a new folder';
		foreach($query->result() as $row)
		{
			$folder_opts[$row->id] = $row->name;
		}

		$this->template
			->set('folders', $folder_opts)
			->build('admin/form');
	}







	public function edit($id = 0)
	{
		// Get requested slider or redirect out
		$slider = $this->slider_m->get($id);
		$slider OR redirect('admin/sliders');

		// Get general settings
		$settings 	= $this->slider_settings_m->get_all();
		$settings 	= $settings[0];

		// If validation is run
		if ($this->form_validation->run())
		{
			// If user wants to create a new folder
			if($this->input->post('folder_id') == 0)
			{
				// Insert the record
				if(Files::create_folder($settings->folder_id, $this->input->post('title')))
				{
					$folder_id = $this->db->insert_id();
				}
			}
			else
			{
				// Otherwise, just use the posted folder id
				$folder_id = $this->input->post('folder_id');
			}

			// Set slider props
			$props = array(
				'title' => $this->input->post('title'),
				'folder_id' => $folder_id,
				'created_on' => now(),
				'updated_on' => now(),
			);

			// Update slider
			if ($success = $this->slider_m->update($id, $props))
			{
				$this->session->set_flashdata('success', 'Slider created.');
			}
			else
			{
				$this->session->set_flashdata('error', 'Slider was not created.');
			}

			$this->input->post('btnAction') == 'save_exit' ?
				redirect('admin/sliders') :
				redirect('admin/sliders/edit/' . $id);
		}

		// Loop through each validation rule
		foreach ($this->_validation_rules as $rule)
		{
			$slider_m->{$rule['field']} = set_value($rule['field']);
		}


		$query = $this->db->get_where('file_folders', array('parent_id' => $settings->folder_id));
		$folder_opts[0] = 'Create a new folder';
		foreach($query->result() as $row)
		{
			$folder_opts[$row->id] = $row->name;
		}

		$this->template
			->set('folders', $folder_opts)
			->set('slider', $slider)
			->build('admin/form');
	}







	public function delete($id = 0)
	{
		$slider = $this->slider_m->get($id);
		$slider OR redirect('admin/sliders');

		if ($success = $this->slider_m->delete($id))
		{
			$this->session->set_flashdata('success', 'Slider deleted.');
		}
		else
		{
			$this->session->set_flashdata('error', 'Slider was not deleted.');
		}

		redirect('admin/sliders');
	}
}