<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Web_frontend_controller extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model(array('Web_model','Admin_model','Online_admission_model'));
    }

    public function index($page = 'index')
	{
		if ( ! file_exists(APPPATH.'views/web/'.$page.'.php'))
	        {
	            redirect('404_override');
	        }
	        $title = ucfirst(humanize($page));
			$slider = $this->Web_model->slider_img();
			$speech = $this->Web_model->speech();
			$breaking_news = $this->Web_model->breaking_news_view();
			$notice = $this->Web_model->notice();
			$school_info= $this->Admin_model->school_info();
		    $this->load->view('web/'.$page, compact('school_info','title','slider','breaking_news','speech','notice'));
	}

	public function admission_form($page = 'admission_form')
	{
		if ( ! file_exists(APPPATH.'views/web/admission/'.$page.'.php'))
	        {
	            redirect('404_override');
	        }

	        $data['title'] = ucfirst(humanize($page));
	        $data['school_info'] = $this->Admin_model->school_info();

	        $this->load->view('web/admission/'.$page,$data);
	}

	public function insert_applicant_data($page = 'submit_form')
	{
		$post = $this->input->post();
		$submit_data = $this->Online_admission_model->insert_applicant_data($post);
		$school_info= $this->Admin_model->school_info();
		$this->load->library('Pdf');
		$this->load->view('web/admission/'.$page,compact("school_info","submit_data"));
	}

	public function single_speach($id,$page='single_speach'){
		if ( ! file_exists(APPPATH.'views/web/'.$page.'.php'))
	        {
	            redirect('404_override');
	        }
	        $title = ucfirst(humanize($page));
	        $speec_single = $this->Web_model->speech_single($id);
	        // echo $speech_single->title;exit();
	        $speech = $this->Web_model->speech();
			$breaking_news = $this->Web_model->breaking_news_view();
			$notice = $this->Web_model->notice();
		    $this->load->view('web/'.$page, compact('title','speec_single','breaking_news','speech','notice'));
	}

	public function single_notice($id,$page = 'single_notice'){

		if ( ! file_exists(APPPATH.'views/web/'.$page.'.php'))
	        {
	            redirect('404_override');
	        }
	        $title = ucfirst(humanize($page));
	        $single_notice = $this->Web_model->single_notice($id);
			$speech = $this->Web_model->speech();
			$breaking_news = $this->Web_model->breaking_news_view();
			$notice = $this->Web_model->notice();
		    $this->load->view('web/'.$page, compact('title','single_notice','breaking_news','speech','notice'));
	}

	public function all_notics($page = 'all_notics'){

		if ( ! file_exists(APPPATH.'views/web/'.$page.'.php'))
	        {
	            redirect('404_override');
	        }
	        $title = ucfirst(humanize($page));
			$speech = $this->Web_model->speech();
			$breaking_news = $this->Web_model->breaking_news_view();
			$notice = $this->Web_model->notice();
		    $this->load->view('web/'.$page, compact('title','breaking_news','speech','notice'));
	}

	public function photo_gallery($page='photo_gallery'){
		if ( ! file_exists(APPPATH.'views/web/'.$page.'.php'))
	        {
	            redirect('404_override');
	        }
	        $title = ucfirst(humanize($page));

	        $this->load->library('pagination');
	        $config = [
	        	'base_url' 		=> base_url('photo'),
	        	'per_page'		=> 9,
	        	'total_rows'	=> $this->Web_model->photo_num_rows(),
	        ];
	        // If use bootstrap or else remove.
			$config['full_tag_open'] = "<ul class='pagination'>";
			$config['full_tag_close'] ="</ul>";
			$config['num_tag_open'] = '<li>';
			$config['num_tag_close'] = '</li>';
			$config['cur_tag_open'] = "<li class='disabled'><li class='active'><a href='#'>";
			$config['cur_tag_close'] = "<span class='sr-only'></span></a></li>";
			$config['next_tag_open'] = "<li>";
			$config['next_tagl_close'] = "</li>";
			$config['prev_tag_open'] = "<li>";
			$config['prev_tagl_close'] = "</li>";
			$config['first_tag_open'] = "<li>";
			$config['first_tagl_close'] = "</li>";
			$config['last_tag_open'] = "<li>";
			$config['last_tagl_close'] = "</li>";
	        $this->pagination->initialize($config);
			$photo_gallery = $this->Web_model->photo_gallery_web( $config['per_page'], $this->uri->segment(2));

			$speech = $this->Web_model->speech();
			$breaking_news = $this->Web_model->breaking_news_view();
			$notice = $this->Web_model->notice();
		    $this->load->view('web/'.$page, compact('title','breaking_news','speech','notice','photo_gallery'));
	}

	public function video_gallery($page='video_gallery'){
		if ( ! file_exists(APPPATH.'views/web/'.$page.'.php'))
	        {
	            redirect('404_override');
	        }
	        $title = ucfirst(humanize($page));

	        $this->load->library('pagination');
	        $config = [
	        	'base_url' 		=> base_url('video'),
	        	'per_page'		=> 2,
	        	'total_rows'	=> $this->Web_model->video_num_rows(),
	        ];
	        // If use bootstrap or else remove.
			$config['full_tag_open'] = "<ul class='pagination'>";
			$config['full_tag_close'] ="</ul>";
			$config['num_tag_open'] = '<li>';
			$config['num_tag_close'] = '</li>';
			$config['cur_tag_open'] = "<li class='disabled'><li class='active'><a href='#'>";
			$config['cur_tag_close'] = "<span class='sr-only'></span></a></li>";
			$config['next_tag_open'] = "<li>";
			$config['next_tagl_close'] = "</li>";
			$config['prev_tag_open'] = "<li>";
			$config['prev_tagl_close'] = "</li>";
			$config['first_tag_open'] = "<li>";
			$config['first_tagl_close'] = "</li>";
			$config['last_tag_open'] = "<li>";
			$config['last_tagl_close'] = "</li>";
	        $this->pagination->initialize($config);
			$video_gallery_web = $this->Web_model->video_gallery_web( $config['per_page'], $this->uri->segment(2));

			$speech = $this->Web_model->speech();
			$breaking_news = $this->Web_model->breaking_news_view();
			$notice = $this->Web_model->notice();
		    $this->load->view('web/'.$page, compact('title','breaking_news','speech','notice','video_gallery_web'));
	}

	public function our_motiv($page='our_motiv'){
		if ( ! file_exists(APPPATH.'views/web/'.$page.'.php'))
	        {
	            redirect('404_override');
	        }
	        $title = ucfirst(humanize($page));
			$speech = $this->Web_model->speech();
			$breaking_news = $this->Web_model->breaking_news_view();
			$notice = $this->Web_model->notice();
		    $this->load->view('web/'.$page, compact('title','breaking_news','speech','notice'));
	}

	public function accadamic($page='accadamic'){
		if ( ! file_exists(APPPATH.'views/web/'.$page.'.php'))
	        {
	            redirect('404_override');
	        }
	        $title = ucfirst(humanize($page));
			$speech = $this->Web_model->speech();
			$breaking_news = $this->Web_model->breaking_news_view();
			$notice = $this->Web_model->notice();
		    $this->load->view('web/'.$page, compact('title','breaking_news','speech','notice'));
	}

	public function rulls($page='rulls'){
		if ( ! file_exists(APPPATH.'views/web/'.$page.'.php'))
	        {
	            redirect('404_override');
	        }
	        $title = ucfirst(humanize($page));
			$speech = $this->Web_model->speech();
			$breaking_news = $this->Web_model->breaking_news_view();
			$notice = $this->Web_model->notice();
		    $this->load->view('web/'.$page, compact('title','breaking_news','speech','notice'));
	}

	public function help_study($page='help_study'){
		if ( ! file_exists(APPPATH.'views/web/'.$page.'.php'))
	        {
	            redirect('404_override');
	        }
	        $title = ucfirst(humanize($page));
			$speech = $this->Web_model->speech();
			$breaking_news = $this->Web_model->breaking_news_view();
			$notice = $this->Web_model->notice();
		    $this->load->view('web/'.$page, compact('title','breaking_news','speech','notice'));
	}

	public function facility($page='facility'){
		if ( ! file_exists(APPPATH.'views/web/'.$page.'.php'))
	        {
	            redirect('404_override');
	        }
	        $title = ucfirst(humanize($page));
			$speech = $this->Web_model->speech();
			$breaking_news = $this->Web_model->breaking_news_view();
			$notice = $this->Web_model->notice();
		    $this->load->view('web/'.$page, compact('title','breaking_news','speech','notice'));
	}

	public function prize($page='prize'){
		if ( ! file_exists(APPPATH.'views/web/'.$page.'.php'))
	        {
	            redirect('404_override');
	        }
	        $title = ucfirst(humanize($page));
			$speech = $this->Web_model->speech();
			$breaking_news = $this->Web_model->breaking_news_view();
			$notice = $this->Web_model->notice();
		    $this->load->view('web/'.$page, compact('title','breaking_news','speech','notice'));
	}

	function subj4(){
		$postData = $this->input->post();
		$data = $this->Online_admission_model->subj4($postData);

		echo json_encode($data);
	}

	function subj5(){
		$postData = $this->input->post();
		$data = $this->Online_admission_model->subj5($postData);

		echo json_encode($data);
	}

	function subj6(){
		$postData = $this->input->post();
		$data = $this->Online_admission_model->subj6($postData);

		echo json_encode($data);
	}

	function subj7(){
		$postData = $this->input->post();
		$data = $this->Online_admission_model->subj7($postData);

		echo json_encode($data);
	}
}