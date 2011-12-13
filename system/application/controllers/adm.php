<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Adm extends CI_Controller {

	function __construct()
	{
		parent::__construct();
		
		/* Standard Libraries */
		$this->load->database();
		$this->load->helper('url');
		/* ------------------ */	
		
		$this->load->library('grocery_CRUD');	
	}
	
	function _adm_output($output = null)
	{
		$this->load->view('adm/adm',$output);	
	}
	
	function index()
	{
		$this->_adm_output((object)array('output' => '' , 'js_files' => array() , 'css_files' => array()));
	}	
	
	function pastes_list()
	{
		$adm = new grocery_CRUD();
		$adm->set_table('pastes');
		$adm->unset_add();
		$output = $adm->render();
		
		$this->_adm_output($output);
	}

	function users_list()
	{
		$adm = new grocery_CRUD();
		$adm->set_theme('flexigrid');
		$adm->set_table('users');
		$adm->unset_add();
		$adm->unset_columns('password');
		$output = $adm->render();
		
		$this->_adm_output($output);
	}
}
