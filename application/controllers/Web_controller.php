<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Web_controller extends CI_Controller {
    public function __construct() {
        parent::__construct();
        $this->load->model(array('Web_model','Login_model'));

        if ( !$this->Login_model->is_user_logged_in() ) 
		{
			redirect('?logged_in_first');
		}

		if ( !$this->Login_model->check_admin() ) 
		{
			redirect($_SERVER['HTTP_REFERER']);
		}
    }

	public function slider_add($page = 'slider_add')
	{
		if ( ! file_exists(APPPATH.'views/admin/'.$page.'.php'))
	        {
	            redirect('404_override');
	        }
	    $data['title'] = ucfirst(humanize($page));

	    $slider_img = $this->Web_model->slider_img();

		$this->load->view('includs/header_link', $data);
        $this->load->view('includs/navigation', $data);
        $this->load->view('includs/header', $data);
        $this->load->view('admin/'.$page, compact('slider_img'));
        $this->load->view('includs/footer', $data);
        $this->load->view('includs/footer_link', $data);
	}

	public function slider_insert($page = 'slider_add')
	{
		$post = $this->input->post();
		$slider_insert = $this->Web_model->slider_insert($post);
		if ($slider_insert==FALSE) {
			$this->session->set_flashdata('error', 'There is a problem in slider upload.');
			redirect($_SERVER['HTTP_REFERER']);
		} else {
			$this->session->set_flashdata('success', 'Slider add successful.');
			redirect($_SERVER['HTTP_REFERER']);
		}
	}

	public function slider_delete($id){
		$slider_delete = $this->Web_model->slider_delete($id);
		if ($slider_delete==FALSE) {
			$this->session->set_flashdata('error_delete', 'There is a problem in slider delete.');
			redirect($_SERVER['HTTP_REFERER']);
		} else {
			$this->session->set_flashdata('success_delete', 'Slider delete successful.');
			redirect($_SERVER['HTTP_REFERER']);
		}
	}	

	public function menu_bar($page = 'menu_bar')
	{
		if ( ! file_exists(APPPATH.'views/admin/'.$page.'.php'))
	        {
	            redirect('404_override');
	        }
	    $data['title'] = ucfirst(humanize($page));
	    $menu_data = $this->Web_model->menu_data();

		$this->load->view('includs/header_link', $data);
        $this->load->view('includs/navigation', $data);
        $this->load->view('includs/header', $data);
        $this->load->view('admin/'.$page, compact('menu_data'));
        $this->load->view('includs/footer', $data);
        $this->load->view('includs/footer_link', $data);
	}

	// public function menu_insert(){
	// 	$post = $this->input->post();
	// 	$menu_insert = $this->Web_model->menu_insert($post);
	// 	redirect($_SERVER['HTTP_REFERER']);
	// }

	public function breaking_news($page = 'breaking_news')
	{
		if ( ! file_exists(APPPATH.'views/admin/'.$page.'.php'))
	        {
	            redirect('404_override');
	        }
	    $data['title'] = ucfirst(humanize($page));
	    $breacking_news = $this->Web_model->breacking_news();

		$this->load->view('includs/header_link', $data);
        $this->load->view('includs/navigation', $data);
        $this->load->view('includs/header', $data);
        $this->load->view('admin/'.$page, compact('breacking_news'));
        $this->load->view('includs/footer', $data);
        $this->load->view('includs/footer_link', $data);
	}

	public function breaking_news_insert(){
		$post = $this->input->post();
		$this->Web_model->breaking_news_insert($post);
		redirect($_SERVER['HTTP_REFERER']);
	}

	function breacking_news_delete($id){
		$this->db->where('id', $id);
		$this->db->delete('breaking_news');
		redirect($_SERVER['HTTP_REFERER']);
	}

	public function speech($page = 'speech'){
		if ( ! file_exists(APPPATH.'views/admin/'.$page.'.php'))
	        {
	            redirect('404_override');
	        }
	    $data['title'] = ucfirst(humanize($page));
	    $speech = $this->Web_model->speech();

		$this->load->view('includs/header_link', $data);
        $this->load->view('includs/navigation', $data);
        $this->load->view('includs/header', $data);
        $this->load->view('admin/'.$page, compact('speech'));
        $this->load->view('includs/footer', $data);
        $this->load->view('includs/footer_link', $data);
	}

	public function speech_edit($id,$page = 'speech'){
		if ( ! file_exists(APPPATH.'views/admin/'.$page.'.php'))
	        {
	            redirect('404_override');
	        }
	    $data['title'] = ucfirst(humanize($page));
	    $speech_single = $this->Web_model->speech_single($id);

		$this->load->view('includs/header_link', $data);
        $this->load->view('includs/navigation', $data);
        $this->load->view('includs/header', $data);
        $this->load->view('admin/'.$page, compact('speech_single'));
        $this->load->view('includs/footer', $data);
        $this->load->view('includs/footer_link', $data);
	}

	public function speech_update(){
		$post = $this->input->post();
		$this->Web_model->speech_update($post);
		$this->speech(); 
	}

	public function notics_board($page='notics_board')
	{
		if ( ! file_exists(APPPATH.'views/admin/'.$page.'.php'))
	        {
	            redirect('404_override');
	        }
	    $data['title'] = ucfirst(humanize($page));
	    $notice = $this->Web_model->notice();

		$this->load->view('includs/header_link', $data);
        $this->load->view('includs/navigation', $data);
        $this->load->view('includs/header', $data);
        $this->load->view('admin/'.$page, compact('notice'));
        $this->load->view('includs/footer', $data);
        $this->load->view('includs/footer_link', $data);
	}

	public function notice_insert(){
		$post = $this->input->post();
		$this->Web_model->notice_insert($post);
		$this->notics_board(); 
	}

	public function notice_delete($id){
		$this->Web_model->notice_delete($id);
		$this->notics_board();
	}

	public function photo_gallery($page='photo_gallery')
	{
		if ( ! file_exists(APPPATH.'views/admin/'.$page.'.php'))
	        {
	            redirect('404_override');
	        }
	    $data['title'] = ucfirst(humanize($page));
	    $this->load->library('pagination');
        $config = [
        	'base_url' 		=> base_url('photo_gallery'),
        	'per_page'		=> 6,
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

		$this->load->view('includs/header_link', $data);
        $this->load->view('includs/navigation', $data);
        $this->load->view('includs/header', $data);
        $this->load->view('admin/'.$page, compact('photo_gallery'));
        $this->load->view('includs/footer', $data);
        $this->load->view('includs/footer_link', $data);
	}

	public function image_gallery_insert(){
		$post = $this->input->post();
		$this->Web_model->image_gallery_insert($post);
		$this->photo_gallery(); 
	}

	public function gallary_photo_delete($id){
		$this->Web_model->gallary_photo_delete($id);
		$this->photo_gallery(); 
	}

	public function video_gallery($page='video_gallary')
	{
		if ( ! file_exists(APPPATH.'views/admin/'.$page.'.php'))
	        {
	            redirect('404_override');
	        }
	    $data['title'] = ucfirst(humanize($page));
	    $video_list = $this->Web_model->video_list();

		$this->load->view('includs/header_link', $data);
        $this->load->view('includs/navigation', $data);
        $this->load->view('includs/header', $data);
        $this->load->view('admin/'.$page, compact('video_list'));
        $this->load->view('includs/footer', $data);
        $this->load->view('includs/footer_link', $data);
	}

	public function add_video($page='video_gallary')
	{
		if ( ! file_exists(APPPATH.'views/admin/'.$page.'.php'))
	        {
	            redirect('404_override');
	        }
	    $data['title'] = ucfirst(humanize($page));
	    $add_video = true;

		$this->load->view('includs/header_link', $data);
        $this->load->view('includs/navigation', $data);
        $this->load->view('includs/header', $data);
        $this->load->view('admin/'.$page, compact('add_video'));
        $this->load->view('includs/footer', $data);
        $this->load->view('includs/footer_link', $data);
	}

	public function video_insert(){
		$post = $this->input->post();
		$this->Web_model->video_insert($post);
		$this->video_gallery(); 
		// $curent_image = $_FILES["s_image"]["name"];
	    // 	if (isset($_FILES['video']['name']) && $_FILES['video']['name'] != '') {
	    //     unset($config);
	    //     $date = date("ymd");
	    //     $configVideo['upload_path'] = './web_resource/video/';
	    //     $configVideo['max_size'] = '9000000';
	    //     $configVideo['allowed_types'] = 'avi|flv|wmv|mp3|mp4|jpg|3gpp';
	    //     $configVideo['overwrite'] = FALSE;
	    //     $configVideo['remove_spaces'] = TRUE;
	    //     $video_name = $date.$_FILES['video']['name'];
	    //     $configVideo['file_name'] = $video_name;
	    //     $this->load->library('upload', $configVideo);
	    //     $this->upload->initialize($configVideo);
	    //     if(!$this->upload->do_upload('video')) {
	    //         echo $this->upload->display_errors();
	    //     }else{
	    //         $videoDetails = $this->upload->data();
	    //         $data['video_name']= $configVideo['file_name'];
	    //         $data['video_detail'] = $videoDetails;
	    //     }
	        
	    // }else{
	    //     echo "Please select a file";
	    // }
	}

	public function hot_line()
	{
		$this->load->model('login_model');

		if ( $this->login_model->is_user_logged_in() ) 
		{
			$this->load->view('admin/hot_line');
		}
		else
		{
			$this->load->view('welcome_message');
		}
	}

	public function left_side()
	{
		$this->load->model('login_model');

		if ( $this->login_model->is_user_logged_in() ) 
		{
			$this->load->view('admin/left_side');
		}
		else
		{
			$this->load->view('welcome_message');
		}
	}

}
