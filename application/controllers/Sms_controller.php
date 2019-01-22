<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class Sms_controller extends CI_Controller {

	# This __construct fisrt load after class
	public function __construct()
	{
		parent::__construct();

		$this->load->model(array('Login_model','Student_model','Teacher_and_staff_model','Sms_model'));

		# This check is_user_logged_in!
		if ( !$this->Login_model->is_user_logged_in() ) 
		{
			redirect('?logged_in_first');
		}
	}
	
	public function index()
	{
		
	}

	public function sms($page = 'sms')
	{
		// $this->form_validation->set_rules('all_student', 'All Student');
		// $this->form_validation->set_rules('all_teacher', 'All Teacher');
		// $this->form_validation->set_rules('other', 'Other');
		// $this->form_validation->set_rules('number', 'Number', 'trim|required|min_length[11]|numeric');
		// $this->form_validation->set_rules('message_body', 'Message Body', 'trim|required|max_length[1080]');

		// if ($this->form_validation->run() == FALSE){

			$title['title'] = ucfirst(humanize($page));

    		$this->load->view('includs/header_link', $title);
	        $this->load->view('includs/navigation', $title);
	        $this->load->view('includs/header', $title);
	        $this->load->view('admin/'.$page);
	        $this->load->view('includs/footer', $title);
	        $this->load->view('includs/footer_link', $title);

		// }else{

		// 	$post = $this->input->post();
		// 	$sms_validation = $this->Sms_model->sendsms($post);

		// 	$this->session->set_flashdata('success', 'SMS Sent Successfully');
  //   		redirect($_SERVER['HTTP_REFERER']);
		// }
	}

	public function send_sms()
	{
		$sms_data = $this->Sms_model->sms_data();
		$post = $this->input->post();
		$send_sms = $this->Sms_model->send_sms($post,$sms_data);

		$this->session->set_flashdata('success', 'SMS sent successful.');
    	redirect($_SERVER['HTTP_REFERER']);
	}
}
