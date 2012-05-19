<?php defined('BASEPATH') or exit('No direct script access allowed');

/**
 * Sliders Module
 *
 * @author Michael Giuliana
 */
class Module_Sliders extends Module {

	public $version = '1.1.0';

	public function info()
	{
		return array(
			'name' => array(
				'en' => 'Sliders',
			),
			'description' => array(
				'en' => 'Add Nivo Sliders to your site and display featured content.',
			),
			'frontend' => false,
			'backend'  => true,
			'skip_xss' => false,
			'menu'	  => 'content',

			'roles' => array(),

			'sections' => array(
				'sliders' => array(
					'name' => 'sliders.list_title',
					'uri' => 'admin/sliders',
				),
			),
		);
	}


	public function install()
	{
		$this->dbforge->drop_table('sliders');

		// Define tables
		$tables = array(
			'sliders' => array(
				'id' => array('type' => 'INT', 'constraint' => 11, 'auto_increment' => true, 'primary' => true,),
				'folder_id' => array('type' => 'INT', 'constraint' => 11, 'default' => 0),
				'jquery' => array('type' => 'INT', 'constraint' => 11, 'default' => 0),
			),
		);

		// Install Tables
		if ( ! $this->install_tables($tables))
		{
			return false;
		}


		$default_folder = array(
			'id'			=> null,
			'parent_id'		=> 0,
			'slug'			=> 'sliders-module',
			'name'			=> 'Sliders Module',
			'location'		=> 'local',
			'date_added'	=> now(),
			);


		/**
		 * Default file folder
		 */
		$query = $this->db->get_where('file_folders', array('name' => 'Sliders Module'));
		$folder_exists = $query->row();
		if($folder_exists)
		{
			$folder_id = $folder_exists->id;
		}
		else
		{
			$this->db->insert('file_folders', $default_folder);
			$folder_id = $this->db->insert_id();
		}

		

		$default_settings = array(
			'id'		 => 1,
			'folder_id'  => $folder_id,
			'jquery' 	 => 0,
		);

		// Insert config
		if ( ! $this->db->insert('sliders', $default_settings))
		{
			return false;
		}

		return true;
	}


	public function uninstall()
	{
		$this->dbforge->drop_table('sliders');
		return true;
	}


	public function upgrade($old_version)
	{
		// Upgrade Logic
		return true;
	}
}