<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Student_controller extends CI_Controller {

	public function __construct(){
		parent::__construct();
		$this->load->model(array('Login_model','Student_model','Class_model'));
		if ( !$this->Login_model->is_user_logged_in() ) 
		{
			redirect('?logged_in_first');
		}
	}

	public function index()
	{
		redirect ('Student_controller/dashboard');
	}

	public function insert(){

		$this->form_validation->set_rules('s_f_name', 'First Name', 'required');
		// $this->form_validation->set_rules('s_id', 'Student ID', 'trim|required|numeric|callback_user_id_check');
		$this->form_validation->set_rules('s_roll', 'Student Roll', 'trim|required');
		$this->form_validation->set_rules('class', 'Class', 'required|callback_class_select');
		$this->form_validation->set_rules('section', 'Section', 'required|callback_section_select');
		// $this->form_validation->set_rules('fat_name', 'Father Name', 'required|alpha_numeric_spaces');
		// $this->form_validation->set_rules('fat_mobile', 'Father Mobile', 'trim|required|numeric');
		// $this->form_validation->set_rules('mot_name', 'Mother Name', 'required|alpha_numeric_spaces');
		// $this->form_validation->set_rules('mot_mobile', 'Mother Mobile', 'trim|required|numeric');
		// $this->form_validation->set_rules('s_dob', 'Student Date-of-birth', 'trim|required');
		// $this->form_validation->set_rules('s_sex', 'Student Sex', 'trim|required');
		// $this->form_validation->set_rules('s_reli', 'Student Religion', 'trim|required');
		// $this->form_validation->set_rules('s_per_add', 'Permanent Name', 'required');
		// $this->form_validation->set_rules('s_image', 'Student Image', 'callback_image_check');
		// $this->form_validation->set_rules('pass', 'Password', 'trim|required|min_length[6]|max_length[12]');


		if ($this->form_validation->run() == FALSE){

			$data['title'] = "Admission";
			$page='student_admission';

	        $class_data = $this->Class_model->getClass();
	        
	        $this->load->view('includs/header_link', $data);
	        $this->load->view('includs/navigation', $data);
	        $this->load->view('includs/header', $data);
	        $this->load->view('admin/'.$page , compact("class_data","data"));
	        $this->load->view('includs/footer', $data);
	        $this->load->view('includs/footer_link', $data);
		}else{
			$post = $this->input->post();
			$student_insert = $this->Student_model->insert($post);
			if ($student_insert==FALSE) {
				$this->session->set_flashdata('error', 'Student ID must be unique.');
    			redirect($_SERVER['HTTP_REFERER']);
			} else {
				$this->session->set_flashdata('success', 'Student add successful.');
    			redirect($_SERVER['HTTP_REFERER']);
    		}
		}
	}

	public function student_edit($id){
		$student_info = $this->Student_model->student_info($id);
		
		foreach ($student_info as $value){

			// $page_data['id'] = @$value->id;
			$page_data['id'] = @$value->st_id;
			$page_data['s_f_name'] = @$value->s_f_name;
			$page_data['s_id'] = @$value->s_id;
			$page_data['class_name'] = @$value->class_name;
			$page_data['section_name'] = @$value->section_name;
			$page_data['s_roll'] = @$value->s_roll;
			$page_data['fat_name'] = @$value->fat_name;
			$page_data['fat_mobile'] = @$value->fat_mobile;
			$page_data['mot_name'] = @$value->mot_name;
			$page_data['mot_mobile'] = @$value->mot_mobile;
			$page_data['s_dob'] = @$value->s_dob;
			$page_data['s_sex'] = @$value->s_sex;
			$page_data['s_reli'] = @$value->s_reli;
			$page_data['s_per_add'] = @$value->s_per_add;
			$page_data['prev_image'] = @$value->s_image;

		}

		$page = 'student_edit';
		if ( ! file_exists(APPPATH.'views/admin/'.$page.'.php'))
	        {
	           redirect('404_override');
	        }

	        $data['title'] = ucfirst(humanize($page)); // Capitalize the first letter

	        $page_data['class_data'] = $this->Class_model->getClass();

	        $this->load->view('includs/header_link', $data);
	        $this->load->view('includs/navigation', $data);
	        $this->load->view('includs/header', $data);
	        $this->load->view('admin/'.$page, $page_data);
	        $this->load->view('includs/footer', $data);
	        $this->load->view('includs/footer_link', $data);
	}

	public function update(){

		$this->form_validation->set_rules('s_f_name', 'First Name', 'required');
		// $this->form_validation->set_rules('s_id', 'Student ID', 'trim|required|numeric');
		$this->form_validation->set_rules('s_roll', 'Student Roll', 'trim|required');
		$this->form_validation->set_rules('class', 'Class', 'required|callback_class_select');
		$this->form_validation->set_rules('section', 'Section', 'required|callback_section_select');
		// $this->form_validation->set_rules('fat_name', 'Father Name', 'required|alpha_numeric_spaces');
		// $this->form_validation->set_rules('fat_mobile', 'Father Mobile', 'trim|required|numeric');
		// $this->form_validation->set_rules('mot_name', 'Mother Name', 'required|alpha_numeric_spaces');
		// $this->form_validation->set_rules('mot_mobile', 'Mother Mobile', 'trim|required|numeric');
		// $this->form_validation->set_rules('s_dob', 'Student Date-of-birth', 'trim|required');
		// $this->form_validation->set_rules('s_sex', 'Student Sex', 'trim|required|callback_select_s_sex');
		// $this->form_validation->set_rules('s_reli', 'Student Religion', 'trim|required|callback_select_s_reli');
		// $this->form_validation->set_rules('s_per_add', 'Permanent Name', 'required');
// 		$this->form_validation->set_rules('s_image', 'Student Image', 'callback_image_check');
		


		if ($this->form_validation->run() == FALSE){
			$page = 'student_edit';
		if ( ! file_exists(APPPATH.'views/admin/'.$page.'.php'))
	        {
	            redirect('404_override');
	        }

	        $data['title'] = ucfirst(humanize($page)); // Capitalize the first letter

	        $class_data = $this->Class_model->getClass();
	        $prev_image = $this->input->post('prev_image');

	        $this->load->view('includs/header_link', $data);
	        $this->load->view('includs/navigation', $data);
	        $this->load->view('includs/header', $data);
	        $this->load->view('admin/'.$page, compact('class_data','prev_image'));
	        $this->load->view('includs/footer', $data);
	        $this->load->view('includs/footer_link', $data);
		}else{
			$post = $this->input->post();
			$this->Student_model->update($post);
			redirect(base_url('admin_controller/student_information'));
		}

	}

	public function user_id_check(){
		$post = $this->input->post();
		$user_id = $post['s_id'];

		$query = $this->db->get_where('student_info', array('s_id' => $user_id));
		$is_unic = $query->num_rows();

		if ($is_unic==0) {
			return TRUE;
		} else {
			$this->form_validation->set_message('user_id_check', 'ID already in use.');
			return FALSE;
		}
	}

	public function select_s_sex(){
		if ($this->input->post('s_sex') === 'none')  {

			$this->form_validation->set_message('select_s_sex', 'You have to select a gendar.');

            return FALSE;
        }else{
            return TRUE;
        }
	}

	public function select_s_reli(){
		if ($this->input->post('s_reli') === 'none')  {

			$this->form_validation->set_message('select_s_reli', 'You have to select a religion.');

            return FALSE;
        }else{
            return TRUE;
        }
	}

	public function update_image_check(){
		$post = $this->input->post();
		$image_name = $post['s_id'];
		$config['upload_path']          = './resource/student_images/';
        $config['allowed_types']        = 'jpg';
        $config['max_size']             = 500;
        $config['max_width']            = 400;
        $config['max_height']           = 400;
        $config['file_name']           	= $image_name;
        $config['overwrite'] 			= TRUE;

        $this->load->library('upload', $config);

        if ( ! $this->upload->do_upload('s_image'))
        {
            $this->form_validation->set_message('update_image_check', 'This image format is invalid.');
                return FALSE;
        }else{
        	// $image_data =   $this->upload->initialize($config);
        	$upload_data = $this->upload->data();
        	$file_ext = $upload_data['file_ext'];
        }
	}

	public function student_search($page='student_information'){
		$this->form_validation->set_rules('class', 'Class', 'required|callback_class_select');
		$this->form_validation->set_rules('section', 'Section', 'required|callback_section_select');

		if ($this->form_validation->run() == FALSE){
			if ( ! file_exists(APPPATH.'views/admin/'.$page.'.php'))
	        {
	            redirect('404_override');
	        }

	        $data['title'] = "Information"; // Capitalize the first letter

	        $Student_num = $this->Student_model->student_num();
			$class_data = $this->Class_model->getClass();
	        $this->load->view('includs/header_link', $data);
	        $this->load->view('includs/navigation', $data);
	        $this->load->view('includs/header', $data);
	        $this->load->view('admin/'.$page , compact("Student_num","class_data","data"));
	        $this->load->view('includs/footer', $data);
	        $this->load->view('includs/footer_link', $data);
		}else{
			$post = $this->input->post();
			$student_data = $this->Student_model->student_data($post);
			
			if ( ! file_exists(APPPATH.'views/admin/'.$page.'.php'))
	        {
	            redirect('404_override');
	        }

	        $data['title'] = "Information"; // Capitalize the first letter

	        $Student_num = $this->Student_model->student_num();
			$class_data = $this->Class_model->getClass();
	        $this->load->view('includs/header_link', $data);
	        $this->load->view('includs/navigation', $data);
	        $this->load->view('includs/header', $data);
	        $this->load->view('admin/'.$page , compact("student_data","Student_num","class_data","data"));
	        $this->load->view('includs/footer', $data);
	        $this->load->view('includs/footer_link', $data);
		}
	}

	public function class_select(){
		if ($this->input->post('class') === 'none')  {

			$this->form_validation->set_message('class_select', 'You have to select a class.');

            return FALSE;
        }else{
            return TRUE;
        }
	}

	public function section_select(){
		if ($this->input->post('section') === 'none')  {

			$this->form_validation->set_message('section_select', 'You have to select a section.');

            return FALSE;
        }else{
            return TRUE;
        }
	}

	public function student_info($id){
		$student_info = $this->Student_model->student_info($id);

		foreach ($student_info as $student_info) {
			$page_data['id'] = $student_info->id;
			$page_data['s_image'] = $student_info->s_image;
			$page_data['s_f_name'] = $student_info->s_f_name;
			$page_data['s_n_name'] = @$student_info->s_n_name;
			$page_data['s_roll'] = $student_info->s_roll;
			$page_data['s_id'] = $student_info->s_id;
			$page_data['s_class'] = $student_info->class_name;
			$page_data['s_section'] = $student_info->section_name;
			$page_data['s_roll'] = $student_info->s_roll;
			$page_data['fat_name'] = $student_info->fat_name;
			$page_data['fat_mobile'] = $student_info->fat_mobile;
			$page_data['mot_name'] = @$student_info->mot_name;
			$page_data['mot_mobile'] = @$student_info->mot_mobile;
			$page_data['s_per_add'] =@ $student_info->s_per_add;
			$page_data['s_dob'] = @$student_info->s_dob;
			$page_data['s_sex'] = @$student_info->s_sex;
			$page_data['s_reli'] = @$student_info->s_reli;
		}

			$data['title'] = "Student Information"; // Capitalize the first letter

	        $this->load->view('includs/header_link', $data);
	        $this->load->view('includs/navigation', $data);
	        $this->load->view('includs/header', $data);
	        $this->load->view('admin/student_single_info',$page_data);
	        $this->load->view('includs/footer', $data);
	        $this->load->view('includs/footer_link', $data);
	}

	public function exam_search($page='student_information'){
		$this->form_validation->set_rules('class', 'Class', 'required|callback_class_select');
		$this->form_validation->set_rules('section', 'Section', 'required|callback_section_select');

		if ($this->form_validation->run() == FALSE){
			
			if ( ! file_exists(APPPATH.'views/admin/'.$page.'.php'))
	        {
	            redirect('404_override');
	        }

	        $data['title'] = ucfirst(humanize($page));

	        $Student_num = $this->Student_model->student_num();
			$class_data = $this->Class_model->getClass();

	        $this->load->view('includs/header_link', $data);
	        $this->load->view('includs/navigation', $data);
	        $this->load->view('includs/header', $data);
	        $this->load->view('admin/'.$page , compact("Student_num","class_data","data"));
	        $this->load->view('includs/footer', $data);
	        $this->load->view('includs/footer_link', $data);
		}else{
			$post = $this->input->post();
			$student_data = $this->Student_model->student_data($post);
			$page='student_information';
			if ( ! file_exists(APPPATH.'views/admin/'.$page.'.php'))
	        {
	            redirect('404_override');
	        }

	        $data['title'] = ucfirst(humanize($page));

	        $Student_num = $this->Student_model->student_num();
			$class_data = $this->Class_model->getClass();
			
	        $this->load->view('includs/header_link', $data);
	        $this->load->view('includs/navigation', $data);
	        $this->load->view('includs/header', $data);
	        $this->load->view('admin/'.$page , compact("student_data","Student_num","class_data","data"));
	        $this->load->view('includs/footer', $data);
	        $this->load->view('includs/footer_link', $data);
		}
	}

	function exam_add(){
		$post = $this->input->post();
		$exam_add = $this->Student_model->exam_add($post);
		redirect('managment_exam');
	}

	function bulk_student_input($page='bulk_student_input'){
		if ( ! file_exists(APPPATH.'views/admin/'.$page.'.php'))
	        {
	            redirect('404_override');
	        }

	        $data['title'] = ucfirst(humanize($page));

	        $this->load->view('includs/header_link', $data);
	        $this->load->view('includs/navigation', $data);
	        $this->load->view('includs/header', $data);
	        $this->load->view('admin/'.$page);
	        $this->load->view('includs/footer', $data);
	        $this->load->view('includs/footer_link', $data);
	}

	function download_student_sample(){
		$link = base_url('samples/student_data_sample.zip');

		$curl_handle = curl_init();  
	    curl_setopt($curl_handle, CURLOPT_URL, $link);  
	    curl_setopt($curl_handle, CURLOPT_RETURNTRANSFER, 1); 
	    $buffer = curl_exec($curl_handle);  
	    curl_close($curl_handle);
	    $nme    =   "student_sample.zip";
		force_download($nme, $buffer);
	}

	function bulk_student_insert(){
		$config = array(
			'upload_path'   => FCPATH.'resource/uploaded_data/',
			'allowed_types' => 'xls|csv'
		);
		$this->load->library('upload', $config);
		if ($this->upload->do_upload('file')) {
			$data = $this->upload->data();
			@chmod($data['full_path'], 0777);

			$this->load->library('Spreadsheet_Excel_Reader');
			$this->spreadsheet_excel_reader->setOutputEncoding('CP1251');

			$this->spreadsheet_excel_reader->read($data['full_path']);
			$sheets = $this->spreadsheet_excel_reader->sheets[0];
			error_reporting(0);

			$data_excel = array();
			for ($i = 2; $i <= $sheets['numRows']; $i++) {
				if ($sheets['cells'][$i][1] == '') break;

				$data_excel[$i - 1]['s_id']    = $sheets['cells'][$i][1];
				$data_excel[$i - 1]['s_f_name']   = $sheets['cells'][$i][2];
				$data_excel[$i - 1]['s_class'] = $sheets['cells'][$i][3];
				$data_excel[$i - 1]['s_section'] = $sheets['cells'][$i][4];
				$data_excel[$i - 1]['s_roll'] = $sheets['cells'][$i][5];
				$data_excel[$i - 1]['s_dob'] = $sheets['cells'][$i][6];
				$data_excel[$i - 1]['s_sex'] = $sheets['cells'][$i][7];
				$data_excel[$i - 1]['s_reli'] = $sheets['cells'][$i][8];
				$data_excel[$i - 1]['s_per_add'] = $sheets['cells'][$i][9];
				$data_excel[$i - 1]['fat_name'] = $sheets['cells'][$i][10];
				$data_excel[$i - 1]['fat_mobile'] = $sheets['cells'][$i][11];
				$data_excel[$i - 1]['mot_name'] = $sheets['cells'][$i][12];
				$data_excel[$i - 1]['mot_mobile'] = $sheets['cells'][$i][13];
				$data_excel[$i - 1]['s_image'] = $sheets['cells'][$i][14];
			}

			$this->db->insert_batch('student_info', $data_excel);
			@unlink($data['full_path']);
			redirect('student_information');
		}
	}

	function transfer_certificate($page='transfer_certificate'){
        if ( ! file_exists(APPPATH.'views/admin/'.$page.'.php'))
        {
            redirect('404_override');
        }

        $data['title'] = ucfirst(humanize($page));
        $class_data = $this->Class_model->getClass();
        $ex_student = $this->Student_model->ex_student();

        $this->load->view('includs/header_link', $data);
        $this->load->view('includs/navigation', $data);
        $this->load->view('includs/header', $data);
        $this->load->view('admin/'.$page,compact("class_data","ex_student"));
        $this->load->view('includs/footer', $data);
        $this->load->view('includs/footer_link', $data);
    }

    function student_name(){

        $postData = $this->input->post();
        $data = $this->Student_model->student_name($postData);

        echo json_encode($data);
    }

    function insert_tc(){
    	$postData = $this->input->post();
        $data = $this->Student_model->insert_tc($postData);
        $this->transfer_certificate();
    }
}
