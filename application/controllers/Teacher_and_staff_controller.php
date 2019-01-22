<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class Teacher_and_staff_controller extends CI_Controller {

	# ISMAIL START
	# This __construct fisrt load after class
	public function __construct()
	{
		parent::__construct();

		# This load User_model page
		$this->load->model(array('Login_model','Teacher_and_staff_model','Class_model','Machine_model'));

		# This check is_user_logged_in!
		if ( !$this->Login_model->is_user_logged_in() ) 
		{
			redirect('?logged_in_first');
		}
	}

	public function teacher_and_staff($page = 'teacher_and_staff')
	{
		if ( ! file_exists(APPPATH.'views/school_admin/'.$page.'.php'))
        {
                redirect('404_override');
        }

        $title['title'] = ucfirst(humanize($page));

        $data = $this->Teacher_and_staff_model->view();

        $this->load->view('school_admin/includs/header_link', $title);
        $this->load->view('school_admin/includs/navigation', $title);
        $this->load->view('school_admin/includs/header', $title);
        $this->load->view('school_admin/'.$page,compact("data"));
        $this->load->view('school_admin/includs/footer', $title);
        $this->load->view('school_admin/includs/footer_link', $title);
	}

	public function add_teacher($page = 'add_teacher')
	{
		if ( ! file_exists(APPPATH.'views/school_admin/'.$page.'.php'))
        {
                redirect('404_override');
        }
        $title['title'] = ucfirst(humanize($page));
        $class_data = $this->Class_model->getClass();

		$this->load->view('school_admin/includs/header_link', $title);
        $this->load->view('school_admin/includs/navigation', $title);
        $this->load->view('school_admin/includs/header', $title);
        $this->load->view('school_admin/'.$page,compact("class_data"));
        $this->load->view('school_admin/includs/footer', $title);
        $this->load->view('school_admin/includs/footer_link', $title);
	}

	public function insert_teacher_data($page='add_teacher')
	{
		$this->form_validation->set_rules('t_name', 'Name', 'trim|required|min_length[3]');
		$this->form_validation->set_rules('teacher_id', 'Teacher ID', 'trim|required|numeric');
		$this->form_validation->set_rules('t_dob', 'Date of Birth', 'trim|required');
		$this->form_validation->set_rules('t_sex', 'Sex', 'trim|required|callback_select_sex');
		$this->form_validation->set_rules('t_religion', 'Religion', 'trim|required|callback_select_religion');
		$this->form_validation->set_rules('t_blood_group', 'Blood Group', 'trim|required|callback_select_blood_group');
		$this->form_validation->set_rules('t_class[]', 'Asinine class', 'required');
		$this->form_validation->set_rules('t_present_address', 'Present Address', 'required');
		$this->form_validation->set_rules('t_phone', 'Phone', 'trim|required|min_length[11]|numeric');
		$this->form_validation->set_rules('t_salary', 'Salary', 'trim|required|numeric');

		if ($this->form_validation->run() == FALSE){
			
			$data['title'] = ucfirst(humanize($page));
        	$class_data = $this->Class_model->getClass();
			
			
			$this->load->view('school_admin/includs/header_link', $data);
	        $this->load->view('school_admin/includs/navigation', $data);
	        $this->load->view('school_admin/includs/header', $data);
	        $this->load->view('school_admin/'.$page,compact("class_data"));
	        $this->load->view('school_admin/includs/footer', $data);
	        $this->load->view('school_admin/includs/footer_link', $data);
	        
		}else{
			$post = $this->input->post();

			$tescher_insert = $this->Teacher_and_staff_model->insert_teacher_data($post);

			if ($tescher_insert==FALSE) {
				redirect($_SERVER['HTTP_REFERER']);
			} else {
				$this->session->set_flashdata('success', 'Teacher Add successful.');
    			redirect($_SERVER['HTTP_REFERER']);
			}
		}
	}

	public function select_sex(){
		if ($this->input->post('t_sex') === 'none')  {

			$this->form_validation->set_message('select_sex', 'You have to select a sex.');

            return FALSE;
        }else{
            return TRUE;
        }
	}

	public function select_religion(){
		if ($this->input->post('t_religion') === 'none')  {

			$this->form_validation->set_message('select_religion', 'You have to select a religion.');

            return FALSE;
        }else{
            return TRUE;
        }
	}

	public function select_blood_group(){
		if ($this->input->post('t_blood_group') === 'none')  {

			$this->form_validation->set_message('select_blood_group', 'You have to select a blood group.');

            return FALSE;
        }else{
            return TRUE;
        }
	}

	public function select_t_class(){
		if ($this->input->post('t_class') === 'none')  {

			$this->form_validation->set_message('select_t_class', 'You have to select a class.');

            return FALSE;
        }else{
            return TRUE;
        }
	}

	public function teacher_view($id, $page = 'teacher_view')
	{
		if ( ! file_exists(APPPATH.'views/school_admin/'.$page.'.php'))
        {
                redirect('404_override');
        }

        $teacher_info = $this->Teacher_and_staff_model->teacher_view($id);

        $data['title'] = ucfirst(humanize($page));

		$this->load->view('school_admin/includs/header_link', $data);
        $this->load->view('school_admin/includs/navigation', $data);
        $this->load->view('school_admin/includs/header', $data);
        $this->load->view('school_admin/'.$page, compact('teacher_info'));
        $this->load->view('school_admin/includs/footer', $data);
        $this->load->view('school_admin/includs/footer_link', $data);
	}

	public function teacher_edit($id, $page = 'teacher_edit')
	{
		if ( ! file_exists(APPPATH.'views/school_admin/'.$page.'.php'))
        {
                redirect('404_override');
        }

		$teacher_info = $this->Teacher_and_staff_model->teacher_view($id);

		$data['title'] = ucfirst(humanize($page));

		$this->load->view('school_admin/includs/header_link', $data);
        $this->load->view('school_admin/includs/navigation', $data);
        $this->load->view('school_admin/includs/header', $data);
        $this->load->view('school_admin/'.$page, compact('teacher_info'));
        $this->load->view('school_admin/includs/footer', $data);
        $this->load->view('school_admin/includs/footer_link', $data);
	}

	public function update_teacher($page='teacher_edit')
	{
		$this->form_validation->set_rules('t_name', 'Name', 'trim|required|min_length[3]');
		$this->form_validation->set_rules('teacher_id', 'Teacher ID', 'trim|required|numeric');
		$this->form_validation->set_rules('t_dob', 'Date of Birth', 'trim|required');
		$this->form_validation->set_rules('t_sex', 'Sex', 'trim|required|callback_select_sex');
		$this->form_validation->set_rules('t_religion', 'Religion', 'trim|required|callback_select_religion');
		$this->form_validation->set_rules('t_blood_group', 'Blood Group', 'trim|required|callback_select_blood_group');
		$this->form_validation->set_rules('t_class', 'Asinine class', 'required');
		$this->form_validation->set_rules('t_present_address', 'Present Address', 'trim|required|min_length[6]');
		$this->form_validation->set_rules('t_phone', 'Phone', 'trim|required|min_length[11]|numeric');

		if ($this->form_validation->run() == FALSE){
			
			$data['title'] = ucfirst(humanize($page));
			
			$prev_image = $this->input->post('prev_image');
			$this->load->view('school_admin/includs/header_link', $data);
	        $this->load->view('school_admin/includs/navigation', $data);
	        $this->load->view('school_admin/includs/header', $data);
	        $this->load->view('school_admin/'.$page,compact('prev_image'));
	        $this->load->view('school_admin/includs/footer', $data);
	        $this->load->view('school_admin/includs/footer_link', $data);
	        
		}else{
			$post = $this->input->post();
			$teacher_update = $this->Teacher_and_staff_model->update_teacher($post);
			
			$this->session->set_flashdata('success', 'Teacher Update successful.');
    		redirect($_SERVER['HTTP_REFERER']);
		}
	}

	public function update_image_check(){
		$post = $this->input->post();
		$t_image_path = $this->input->post("t_image_path");
		$image_name = $post['teacher_id'];
		if (empty($t_image_path)) {
			return TRUE;
		} else {
			$config['upload_path']          = './resource/teacher_and_staff/';
	        $config['allowed_types']        = 'jpg';
	        $config['max_size']             = 500;
	        $config['max_width']            = 1024;
	        $config['max_height']           = 768;
	        $config['file_name']           	= $image_name;
	        $config['overwrite'] 			= TRUE;

	        $this->load->library('upload', $config);

	        if ( ! $this->upload->do_upload('t_image_path'))
	        {
	            $this->form_validation->set_message('update_image_check', 'This image format is invalid. *The IMAGE contains only JPG format <br>& size 500kb-400*400.');
	                return FALSE;
	        }else{
	        	// $image_data =   $this->upload->initialize($config);
	        	$upload_data = $this->upload->data();
	        	$file_ext = $upload_data['file_ext'];
	        }
		}
	}

	public function teacher_data_delete($id = NULL)
	{
        if ( $this->Teacher_and_staff_model->teacher_data_delete($id) ) {
        	redirect ('teacher_and_staff');
        }else{
        	redirect ('dashboard');
        }
	}

	public function teacher_attendence($page = 'attendence')
	{
		if ( ! file_exists(APPPATH.'views/school_admin/'.$page.'.php'))
        {
            redirect('404_override');
        }

        $title['title'] = ucfirst($page);
        $class_data = $this->Class_model->getClass();

        $this->load->view('school_admin/includs/header_link', $title);
        $this->load->view('school_admin/includs/navigation', $title);
        $this->load->view('school_admin/includs/header', $title);
        $this->load->view('school_admin/'.$page, compact('class_data'));
        $this->load->view('school_admin/includs/footer', $title);
        $this->load->view('school_admin/includs/footer_link', $title);
	}

	public function teacher_attendence_search($page = 'attendence')
	{
		$this->form_validation->set_rules('month', 'Month', 'required|callback_month_select');
		$this->form_validation->set_rules('year', 'Month', 'required|callback_year_select');
		if ($this->form_validation->run() == FALSE){
			if ( ! file_exists(APPPATH.'views/school_admin/'.$page.'.php'))
	        {
	            redirect('404_override');
	        }

	        $title['title'] = ucfirst($page);
	        $class_data = $this->Class_model->getClass();

	        $this->load->view('school_admin/includs/header_link', $title);
	        $this->load->view('school_admin/includs/navigation', $title);
	        $this->load->view('school_admin/includs/header', $title);
	        $this->load->view('school_admin/'.$page, compact('class_data'));
	        $this->load->view('school_admin/includs/footer', $title);
	        $this->load->view('school_admin/includs/footer_link', $title);

    	}else{

			if ( ! file_exists(APPPATH.'views/school_admin/'.$page.'.php'))
	        {
	             redirect('404_override');
	        }

	        $title['title'] = ucfirst($page);

	        $post = $this->input->post();

	        $machine_model_view = $this->Machine_model;
	        $teacher_model_view = $this->Teacher_and_staff_model;

	        $this->load->view('school_admin/includs/header_link', $title);
	        $this->load->view('school_admin/includs/navigation', $title);
	        $this->load->view('school_admin/includs/header', $title);
	        $this->load->view('school_admin/'.$page, compact('machine_model_view','post','teacher_model_view'));
	        $this->load->view('school_admin/includs/footer', $title);
	        $this->load->view('school_admin/includs/footer_link', $title);
    	}
    }

    public function month_select(){
		if ($this->input->post('month') === 'none')  {

			$this->form_validation->set_message('month_select', 'You have to select a month.');

            return FALSE;
        }else{
            return TRUE;
        }
	}

	public function year_select(){
		if ($this->input->post('year') === 'none')  {

			$this->form_validation->set_message('year_select', 'You have to select a year.');

            return FALSE;
        }else{
            return TRUE;
        }
	}

	public function teacher_single_attendence_search($page = 'teacher_single_attendence')
	{
		$this->form_validation->set_rules('month', 'Month', 'required|callback_month_select');
		$this->form_validation->set_rules('year', 'Month', 'required|callback_year_select');
		if ($this->form_validation->run() == FALSE){
			if ( ! file_exists(APPPATH.'views/teacher/'.$page.'.php'))
	        {
	            redirect('404_override');
	        }

	        $title['title'] = ucfirst($page);
	        $class_data = $this->Class_model->getClass();

	        $this->load->view('teacher/includs/header_link', $title);
	        $this->load->view('teacher/includs/navigation', $title);
	        $this->load->view('teacher/includs/header', $title);
	        $this->load->view('teacher/'.$page, compact('class_data'));
	        $this->load->view('teacher/includs/footer', $title);
	        $this->load->view('teacher/includs/footer_link', $title);

    	}else{

			if ( ! file_exists(APPPATH.'views/teacher/'.$page.'.php'))
	        {
	             redirect('404_override');
	        }

	        $title['title'] = ucfirst($page);

	        $post = $this->input->post();
	        $class_data = $this->Class_model->getClass();

	        $machine_model_view = $this->Machine_model;
	        $teacher_model_view = $this->Teacher_and_staff_model;

	        $this->load->view('teacher/includs/header_link', $title);
	        $this->load->view('teacher/includs/navigation', $title);
	        $this->load->view('teacher/includs/header', $title);
	        $this->load->view('teacher/'.$page, compact('class_data','machine_model_view','post','teacher_model_view'));
	        $this->load->view('teacher/includs/footer', $title);
	        $this->load->view('teacher/includs/footer_link', $title);
    	}
    }
}
