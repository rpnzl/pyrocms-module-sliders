<?php defined('BASEPATH') or exit('No direct script access allowed');

/**
 * Sliders Module
 *
 * @author Michael Giuliana
 */
class Module_Sliders extends Module {

	public $version = '1.0';

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
					'shortcuts' => array(
						array(
							'name' => 'sliders.create_title',
							'uri' => 'admin/sliders/create',
							'class' => 'add'
						),
					),
				),
				'settings' => array(
					'name' => 'sliders.setup_title',
					'uri' => 'admin/sliders/settings',
			    ),
			),
		);
	}


	public function install()
	{
		$this->dbforge->drop_table('sliders');
		$this->dbforge->drop_table('slider_settings');
		$this->dbforge->drop_table('sliders_images');

		// Define tables
		$tables = array(
			'sliders' => array(
				'id' => array('type' => 'INT', 'constraint' => 11, 'auto_increment' => true, 'primary' => true,),
				'title' => array('type' => 'VARCHAR', 'constraint' => 60,),
				'created_on' => array('type' => 'INT', 'constraint' => 11,),
				'updated_on' => array('type' => 'INT', 'constraint' => 11,),
			),
			'slider_settings' => array(
				'id' => array('type' => 'INT', 'constraint' => 11, 'auto_increment' => true, 'primary' => true,),
				'jquery' => array('type' => 'INT', 'constraint' => 11, 'default' => 0),
			),
			'sliders_images' => array(
				'slider_id' => array('type' => 'INT', 'constraint' => 11, 'default' => null),
				'file_id' => array('type' => 'INT', 'constraint' => 11, 'default' => null),
				'order' => array('type' => 'INT', 'constraint' => 11, 'default' => null),
			),
		);

		// Install Tables
		if ( ! $this->install_tables($tables))
		{
			return false;
		}

		// Set default config
		$default_settings = array(
			'id' => 1,
			'jquery' => 0,
		);

		// Insert config
		if ( ! $this->db->insert('slider_settings', $default_settings))
		{
			return false;
		}

		return true;
	}


	public function uninstall()
	{
		$this->dbforge->drop_table('sliders');
		$this->dbforge->drop_table('slider_settings');
		$this->dbforge->drop_table('sliders_images');
		return true;
	}


	public function upgrade($old_version)
	{
		return true;
	}
}