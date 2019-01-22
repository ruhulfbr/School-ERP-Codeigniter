<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class Class_controller extends CI_Controller {

	public function __construct(){
		parent::__construct();

		$this->load->model(array('Login_model','Class_model','Student_model'));

		if ( !$this->Login_model->is_user_logged_in() ) 
		{
			redirect('?logged_in_first');
		}
	}

	public function insert_class($page = 'manage_class'){

		$this->form_validation->set_rules('class_name', 'Class Name', 'required|alpha_numeric_spaces');
		$this->form_validation->set_rules('class_teacher', 'Class teacher', 'required|callback_teacher_select');

		if ($this->form_validation->run() == FALSE){
			if ( ! file_exists(APPPATH.'views/admin/'.$page.'.php'))
	        {
	            redirect('404_override');
	        }

	        $data['title'] = ucfirst($page); // Capitalize the first letter

	        $data = $this->Class_model->view();
			$teacher_data = $this->Class_model->teacher();
			
	        $this->load->view('includs/header_link', $data);
	        $this->load->view('includs/navigation', $data);
	        $this->load->view('includs/header', $data);
	        $this->load->view('admin/'.$page , compact("data","teacher_data"));
	        $this->load->view('includs/footer', $data);
	        $this->load->view('includs/footer_link', $data);
		}else{

			$post = $this->input->post();
			$this->Class_model->insert_class($post);
			redirect ('manage_class');
		}


	}

	public function teacher_select(){

		if ($this->input->post('class_teacher') === 'none')  {

            $this->form_validation->set_message('teacher_select', 'You have to select a teacher.');
            return FALSE;
        }
        else {
            return TRUE;
        }
	}

	public function insert_section($page = 'manage_class'){

		$this->form_validation->set_rules('class', 'Class', 'required|callback_class_select');
		$this->form_validation->set_rules('section_name', 'Section Name', 'required|alpha_numeric_spaces');
		$this->form_validation->set_rules('section_limit', 'Section limit', 'required|numeric');

		if ($this->form_validation->run() == FALSE){
			if ( ! file_exists(APPPATH.'views/admin/'.$page.'.php'))
	        {
	            redirect('404_override');
	        }

	        $data['title'] = ucfirst($page); // Capitalize the first letter

	        $data = $this->Class_model->view();
			$teacher_data = $this->Class_model->teacher();
			
	        $this->load->view('includs/header_link', $data);
	        $this->load->view('includs/navigation', $data);
	        $this->load->view('includs/header', $data);
	        $this->load->view('admin/'.$page , compact("data","teacher_data"));
	        $this->load->view('includs/footer', $data);
	        $this->load->view('includs/footer_link', $data);
		}else{
			$post = $this->input->post();
			$this->Class_model->insert_section($post);
			redirect ('admin_controller/manage_class');
		}


	}

	public function class_select(){
		if ($this->input->post('class') === 'none')  {

            $this->form_validation->set_message('class_select', 'You have to select a class.');
            return FALSE;
        }
        else {
            return TRUE;
        }
	}

	public function section_data(){

		$postData = $this->input->post();
		$data = $this->Class_model->getSection($postData);

		echo json_encode($data);
	}

	public function term_data(){

		$postData = $this->input->post();
		$data = $this->Class_model->getTerm($postData);

		echo json_encode($data);
	}

	public function edit_sestion($id){
		$sestion_data = $this->Class_model->get_section_data($id);

		foreach ($sestion_data as $value) {
			$section_id = $value->id;
			$class_id = $value->class_id;
			$section_name = $value->section_name;
			$section_limit = $value->section_limit;
			$section_student_number = $value->student_number;
		}

		$page_data['section_id'] = $section_id;
		$page_data['class_id'] = $class_id;
		$page_data['section_name'] = $section_name;
		$page_data['section_limit'] = $section_limit;
		$page_data['section_student_number'] = $section_student_number;

		$this->load->view('admin/sections_edit',$page_data);
	}

	public function edit_section(){
		$this->form_validation->set_rules('section_name', 'Section name', 'required');
		$this->form_validation->set_rules('section_limit', 'Section student limit', 'required|numeric');
		$this->form_validation->set_rules('student_number', 'Student number', 'required|numeric');

		if ($this->form_validation->run() == FALSE){
			$this->load->view('admin/sections_edit');
		}else{
			$post = $this->input->post();
			$this->Class_model->section_update($post);
			redirect ('Class_controller/section_data/'.$post['class_id']);
		}
	}

	public function delet_sestion($id){
		$this->db->where('id', $id);
		$this->db->delete('section');

		$this->session->set_flashdata('section_delet', 'Section delet successful.');

		redirect($_SERVER['HTTP_REFERER']);
	}

	public function class_edit($id){
		$class_data = $this->Class_model->class_edit($id);

		$teacher_data = $this->Class_model->teacher();

		foreach ($class_data as $value) {
			$id = $value->id;
			$class_id = $value->class_id;
			$class_name = $value->class_name;
			$class_teacher = $value->class_teacher;
		}

		$page_data['id'] = $id;
		$page_data['class_id'] = $class_id;
		$page_data['class_name'] = $class_name;
		$page_data['class_teacher'] = $class_teacher;
		$page_data['teacher_data'] = $teacher_data;

		$this->load->view('admin/class_edit',$page_data);
	}

	public function update_class(){
		$this->form_validation->set_rules('class_id', 'Class ID', 'trim|required|alpha_numeric');
		$this->form_validation->set_rules('class_name', 'Class Name', 'required|alpha_numeric_spaces');
		$this->form_validation->set_rules('class_teacher', 'Class teacher', 'required|callback_teacher_select');

		if ($this->form_validation->run() == FALSE){
			$data = $this->Class_model->view();
			$teacher_data = $this->Class_model->teacher();
			$this->load->view('admin/class_edit',compact("data","teacher_data"));
		}else{
			$post = $this->input->post();
			$this->Class_model->class_update($post);
			redirect ('admin_controller/manage_class');
		}
	}

	public function insert_subject(){
		$this->form_validation->set_rules('class', 'Class', 'required|callback_class_select');
		$this->form_validation->set_rules('subject_name', 'Subject name', 'required');
		$this->form_validation->set_rules('subject_type', 'Subject Type', 'required|callback_subject_type_select');
		$this->form_validation->set_rules('full_marks', 'Full Marks', 'required|callback_full_marks_select');
		


		if ($this->form_validation->run() == FALSE){
			$this->session->set_flashdata('validation_errors', validation_errors());
			redirect ('manage_subject');
		}else{
			$post = $this->input->post();
			$this->Class_model->insert_subject($post);
			redirect ('manage_subject');
		}
	}

	function subject_type_select(){
		if ($this->input->post('subject_type') === 'none')  {

			$this->form_validation->set_message('subject_type_select', 'You have to select a subject type.');

            return FALSE;
        }else{
            return TRUE;
        }
	}

	function full_marks_select(){
		if ($this->input->post('full_marks') === 'none')  {

			$this->form_validation->set_message('full_marks_select', 'You have to select full mark.');

            return FALSE;
        }else{
            return TRUE;
        }
	}

	public function subject_delet($id){
		$this->db->where('subject_id', $id);
		$this->db->delete('subjects');

		$this->session->set_flashdata('subject_delet', 'Subject delet successful.');

		redirect($_SERVER['HTTP_REFERER']);
	}

	public function subject_update(){
		$this->form_validation->set_rules('subject_code', 'Subject Code', 'trim|required|alpha_numeric');
		$this->form_validation->set_rules('subject_name', 'Subject Name', 'required|alpha_numeric_spaces');
		$this->form_validation->set_rules('class', 'Class', 'required|callback_class_select');
		$this->form_validation->set_rules('class_teacher', 'Teacher', 'required|callback_teacher_select');

		if ($this->form_validation->run() == FALSE){
			$teacher_data = $this->Class_model->teacher();
			$class_data = $this->Class_model->view();
			$this->load->view('admin/subject_edit',compact("teacher_data","class_data"));
		}else{
			$post = $this->input->post();
			$this->Class_model->update_subject($post);
			$this->session->set_flashdata('subject_update', 'Subject update successful.');
			redirect ('admin_controller/manage_subject');
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

	public function subject_data(){

		$postData = $this->input->post();
		$data = $this->Class_model->get_subject($postData);

		echo json_encode($data);
	}

	// public function cl_change(){
		// $year=22;
		// $month=20;
		// $query = $this->db->get_where('student_info', array('s_class' => $year,'s_section' => $month));
	 //    $ch = $query->result();
	 //    var_dump($ch);

	//     $data = array(
	// 		's_class' => 25,
	// 		's_section' =>24
	// 	);

	//     $this->db->where(array('s_class' => $year));
	// 	$this->db->where(array('s_section' => $month));
	// 	$this->db->update('student_info', $data);
	// }

}