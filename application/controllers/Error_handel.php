<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Error_handel extends CI_Controller {

	public function __construct(){
		parent::__construct();

	}

	 public function index(){
	 	$this->output->set_status_header('404'); 
	    $this->load->view('errors/404');
 	}
}