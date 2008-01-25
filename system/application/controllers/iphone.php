<?php

class Iphone extends Controller {
	function __construct() {
		parent::__construct();
	}
	
	function index() {
		$this->load->model('pastes');
		$data = $this->pastes->getLists("iphone/");
		$this->load->view('iphone/recent', $data);
	}
	
	function view() {
		$this->load->model('pastes');
		$data = $this->pastes->getPaste(3);
		$this->load->view('iphone/view', $data);
	}
}

?>