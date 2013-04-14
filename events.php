<?php defined('BASEPATH') OR exit('No direct script access allowed');
/**
 * Sliders Event Class - this class loads the configuration files js and css
 * 
 * @package		PyroCMS
 * @subpackage          Jqlightbox
 * @category            events
 * @author		Bojan Mazej
 */

class Events_Sliders
{
    protected $ci;
    
    public function __construct()
    {
        $this->ci =& get_instance();
        
        // register the public_controller event when this file is autoloaded
        Events::register('public_controller', array($this, 'run'));
     }
    
    // this will be triggered by the Events::trigger('public_controller') code in Public_Controller.php
    public function run()
    {
        $this->ci->load->model(array('sliders/slider_m'));

        // get settings
        $settings = $this->ci->slider_m->get_settings();
                
        // add path to module assets
	// MODIFY THIS PATH IF YOU'D LIKE TO KEEP THE MODULE ELSEWHERE
	Asset::add_path('sliders', 'addons/shared_addons/modules/sliders/');
        
        if($settings->jquery == 1)
        {
            $this->ci->template->append_js('sliders::jquery.min.js');
        }
                
        $this->ci->template->append_js('sliders::jquery.nivo.slider.pack.js');
        $this->ci->template->append_css(array('sliders::nivo-slider.css'));
        
        $this->ci->template->append_css(array('sliders::nivo-slider.theme.css'));
    }
}