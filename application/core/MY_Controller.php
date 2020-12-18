<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

/* load the MX_Router class */
require APPPATH . "third_party/MX/Controller.php";

/**
 * Description of my_controller
 *
 * @author http://roytuts.com
 */
class MY_Controller extends MX_Controller {

    function __construct() {
        parent::__construct();
        if (version_compare(CI_VERSION, '2.1.0', '<')) {
            $this->load->library('security');
        }
		date_default_timezone_set("Asia/Bangkok");
		
		$this->load->library(array('form_validation', 'cart'));
		$this->load->helper(array('url', 'form'));
	 	
    }

	public function settings()
	{
		$data = $this->get_theme();
		
		
		return $data;
	}
	
	public function get_theme()
	{
		$theme = "theme1";
		$data["theme"] = $theme;
		$data["url"] = base_url()."assets/";
		$data["url_theme"] = base_url()."assets/".$theme."/";;
		
		return $data;
	}
	
	public function pagination_settings($datas)
	{
		$total_data_order = $datas["total_data_order"];
		$base_url = $datas["base_url"];
		$per_page = $datas["per_page"];
		$uri_segment = $datas["uri_segment"];
		
		$this->load->helper("url");
		$this->load->library("pagination");
		
		$config["base_url"] = $base_url;
		$config["total_rows"] = $total_data_order;
		$config["per_page"] = $per_page;
		$config["uri_segment"] = $uri_segment;

		$config['full_tag_open'] = '<ul>';        
		$config['full_tag_close'] = '</ul>';        
		$config['first_link'] = 'First';        
		$config['last_link'] = 'Last';        
		$config['first_tag_open'] = '<li>';        
		$config['first_tag_close'] = '</li>';        
		$config['prev_link'] = '&laquo';        
		$config['prev_tag_open'] = '<li>';        
		$config['prev_tag_close'] = '</li>';        
		$config['next_link'] = '&raquo';        
		$config['next_tag_open'] = '<li>';        
		$config['next_tag_close'] = '</li>';        
		$config['last_tag_open'] = '<li>';        
		$config['last_tag_close'] = '</li>';        
		$config['cur_tag_open'] = '<li><a class="active" href="#">';        
		$config['cur_tag_close'] = '</a></li>';        
		$config['num_tag_open'] = '<li>';        
		$config['num_tag_close'] = '</li>';
		
		$this->pagination->initialize($config);
		
		return $config;
	}
}

/* End of file MY_Controller.php */
/* Location: ./application/core/MY_Controller.php */
