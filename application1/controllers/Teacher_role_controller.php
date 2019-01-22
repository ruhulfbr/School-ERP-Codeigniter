<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class Teacher_role_controller extends CI_Controller {

	# This __construct fisrt load after class
	public function __construct()
	{
		parent::__construct();

		$this->load->model(array('Login_model','Class_model','Student_model','Result_model','Admin_model','Machine_model','Teacher_and_staff_model'));

		# This check is_user_logged_in!
		if ( !$this->Login_model->is_user_logged_in() ) 
		{
			redirect('?logged_in_first');
		}

		// if ( !$this->Login_model->check_admin() ) 
		// {
		// 	redirect($_SERVER['HTTP_REFERER']);
		// }

	}
	
	public function index($page='teacher_dashboard')
	{
		if ( ! file_exists(APPPATH.'views/teacher/'.$page.'.php'))
	        {
	            redirect('404_override');
	        }

	        $data['title'] = ucfirst(humanize($page));

	        $this->load->view('teacher/includs/header_link', $data);
	        $this->load->view('teacher/includs/navigation', $data);
	        $this->load->view('teacher/includs/header', $data);
	        $this->load->view('teacher/'.$page);
	        $this->load->view('teacher/includs/footer', $data);
	        $this->load->view('teacher/includs/footer_link', $data);
	}
	
	public function report_card($page='report_card_search'){
		if ( ! file_exists(APPPATH.'views/teacher/'.$page.'.php'))
	        {
	            redirect('404_override');
	        }

	    	$data['title'] = ucfirst(humanize($page));

	    	$class_data = $this->Class_model->get_t_Class();
	        $this->load->view('teacher/includs/header_link', $data);
	        $this->load->view('teacher/includs/navigation', $data);
	        $this->load->view('teacher/includs/header', $data);
	        $this->load->view('teacher/'.$page , compact('class_data'));
	        $this->load->view('teacher/includs/footer', $data);
	        $this->load->view('teacher/includs/footer_link', $data);
	}

	public function report_card_search($page='report_card_search'){

		$this->form_validation->set_rules('class', 'Class', 'callback_class_select');
		$this->form_validation->set_rules('section', 'Section', 'callback_section_select');
		$this->form_validation->set_rules('term', 'Term', 'callback_term_select');

		if ($this->form_validation->run() == FALSE){

			if ( ! file_exists(APPPATH.'views/teacher/'.$page.'.php'))
		        {
		            redirect('404_override');
		        }

		    	$data['title'] = ucfirst(humanize($page));

		    	$class_data = $this->Class_model->get_t_Class();
		        $this->load->view('teacher/includs/header_link', $data);
		        $this->load->view('teacher/includs/navigation', $data);
		        $this->load->view('teacher/includs/header', $data);
		        $this->load->view('teacher/'.$page , compact('class_data'));
		        $this->load->view('teacher/includs/footer', $data);
		        $this->load->view('teacher/includs/footer_link', $data);
		    }else{
		    	$post = $this->input->post();
		    	$term = $this->input->post('term');
				$student_data = $this->Student_model->student_data($post);
		    	if ( ! file_exists(APPPATH.'views/teacher/'.$page.'.php'))
		        {
		            redirect('404_override');
		        }

		    	$data['title'] = ucfirst(humanize($page));

		    	$class_data = $this->Class_model->get_t_Class();
		        $this->load->view('teacher/includs/header_link', $data);
		        $this->load->view('teacher/includs/navigation', $data);
		        $this->load->view('teacher/includs/header', $data);
		        $this->load->view('teacher/'.$page , compact('class_data','student_data','term'));
		        $this->load->view('teacher/includs/footer', $data);
		        $this->load->view('teacher/includs/footer_link', $data);
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

	function section_select(){
		if ($this->input->post('section') === 'none')  {

			$this->form_validation->set_message('section_select', 'You have to select a section.');

            return FALSE;
        }else{
            return TRUE;
        }
	}

	function term_select(){

		if ($this->input->post('term') === 'none')  {

			$this->form_validation->set_message('term_select', 'You have to select a term.');

            return FALSE;
        }else{
            return TRUE;
        }
	}

	function sub_select(){

		if ($this->input->post('subj') === 'none')  {

			$this->form_validation->set_message('sub_select', 'You have to select a subject.');

            return FALSE;
        }else{
            return TRUE;
        }
	}

	public function report_card_view($page='result_at_a_glance'){
		$term_id = $this->input->get('trm');
		$id = $this->input->get('s_id');
		$class_id = $this->input->get('class_id');

		$result_info = $this->Result_model->get_result($term_id,$id);
		$student_info = $this->Student_model->student_info($id);
		$term_data = $this->Result_model->term_data($term_id);

		if (empty($result_info)) {
			$this->session->set_flashdata('error', 'No result found this term.');
    		redirect($_SERVER['HTTP_REFERER']);
		}

		$get_subject_groupdata = $this->Result_model->get_subject($class_id);
		
		
		foreach ($get_subject_groupdata as $value) {
			 if ($value->subject_group==0) {
			 	$activity_high=FALSE;
			 	break;
			 }
			 $activity_high=TRUE;
		}

		if ($activity_high) {

			$result_model_view = $this->Result_model;
			// $page = 'blank';
			if ( ! file_exists(APPPATH.'views/admin/'.$page.'.php'))
		        {
		            redirect('404_override');
		        }

		    	$data['title'] = ucfirst(humanize($page));

		    	$class_data = $this->Class_model->get_t_Class();
		        $this->load->view('teacher/includs/header_link', $data);
		        $this->load->view('teacher/includs/navigation', $data);
		        $this->load->view('teacher/includs/header', $data);
		        $this->load->view('admin/'.$page , compact("result_model_view","get_subject_groupdata","term_id","id","student_info","term_data") );
		        $this->load->view('teacher/includs/footer', $data);
		        $this->load->view('teacher/includs/footer_link', $data);

			}else{

				if ( ! file_exists(APPPATH.'views/admin/'.$page.'.php'))
		        {
		            redirect('404_override');
		        }

		    	$data['title'] = ucfirst(humanize($page));

		    	$class_data = $this->Class_model->get_t_Class();
		        $this->load->view('teacher/includs/header_link', $data);
		        $this->load->view('teacher/includs/navigation', $data);
		        $this->load->view('teacher/includs/header', $data);
		        $this->load->view('admin/'.$page , compact("result_info","student_info","term_data") );
		        $this->load->view('teacher/includs/footer', $data);
		        $this->load->view('teacher/includs/footer_link', $data);
	      }
	}
	
	public function teacher_class_routine($page = 'class_routine')
	{
		if ( ! file_exists(APPPATH.'views/teacher/'.$page.'.php'))
	        {
	            redirect('404_override');
	        }

	        $data['title'] = ucfirst(humanize($page)); // Capitalize the first letter

	        $this->load->view('includs/header_link', $data);
	        $this->load->view('includs/navigation', $data);
	        $this->load->view('includs/header', $data);
	        $this->load->view('teacher/'.$page);
	        $this->load->view('includs/footer', $data);
	        $this->load->view('includs/footer_link', $data);
	}

	public function profile($id, $page = 'profile'){

		if ( ! file_exists(APPPATH.'views/teacher/'.$page.'.php'))
	        {
	            redirect('404_override');
	        }
	    $data['title'] = ucfirst(humanize($page));

	    $teacher_info = $this->Teacher_and_staff_model->teacher_data_view();

		$this->load->view('teacher/includs/header_link', $data);
        $this->load->view('teacher/includs/navigation', $data);
        $this->load->view('teacher/includs/header', $data);
        $this->load->view('teacher/'.$page, compact("teacher_info"));
        $this->load->view('teacher/includs/footer', $data);
        $this->load->view('teacher/includs/footer_link', $data);
	}
	
	public function teacher_daily_logs($page = 'daily_logs')
	{
		if ( ! file_exists(APPPATH.'views/teacher/'.$page.'.php'))
	        {
	            redirect('404_override');
	        }

	        $data['title'] = ucfirst(humanize($page)); // Capitalize the first letter

	        $this->load->view('includs/header_link', $data);
	        $this->load->view('includs/navigation', $data);
	        $this->load->view('includs/header', $data);
	        $this->load->view('teacher/'.$page);
	        $this->load->view('includs/footer', $data);
	        $this->load->view('includs/footer_link', $data);
	}

	public function  teacher_result_input($page='result_input')
	{
		if ( ! file_exists(APPPATH.'views/teacher/'.$page.'.php'))
	        {
	            redirect('404_override');
	        }

	       $data['title'] = ucfirst(humanize($page));

	        $class_data = $this->Class_model->get_t_Class();
	        
	        $this->load->view('teacher/includs/header_link', $data);
	        $this->load->view('teacher/includs/navigation', $data);
	        $this->load->view('teacher/includs/header', $data);
	        $this->load->view('teacher/'.$page , compact('class_data'));
	        $this->load->view('teacher/includs/footer', $data);
	        $this->load->view('teacher/includs/footer_link', $data);
	}

	public function input_result_search($page='result_input'){
		$this->form_validation->set_rules('class', 'Class', 'required|callback_class_select');
		$this->form_validation->set_rules('section', 'Section', 'required|callback_section_select');
		$this->form_validation->set_rules('term', 'Term', 'callback_term_select');

		if ($this->form_validation->run() == FALSE){
			if ( ! file_exists(APPPATH.'views/teacher/'.$page.'.php'))
	        {
	            redirect('404_override');
	        }

	       $data['title'] = ucfirst(humanize($page));

	        $class_data = $this->Class_model->get_t_Class();
	        $this->load->view('teacher/includs/header_link', $data);
	        $this->load->view('teacher/includs/navigation', $data);
	        $this->load->view('teacher/includs/header', $data);
	        $this->load->view('teacher/'.$page , compact('class_data'));
	        $this->load->view('teacher/includs/footer', $data);
	        $this->load->view('teacher/includs/footer_link', $data);
		}else{
			if ( ! file_exists(APPPATH.'views/teacher/'.$page.'.php'))
	        {
	            redirect('404_override');
	        }

	    	$data['title'] = ucfirst(humanize($page));
	    	$post = $this->input->post();
	    	$term = $this->input->post('term');
			$student_data = $this->Student_model->student_data($post);
			
	        $class_data = $this->Class_model->get_t_Class();
	        $this->load->view('teacher/includs/header_link', $data);
	        $this->load->view('teacher/includs/navigation', $data);
	        $this->load->view('teacher/includs/header', $data);
	        $this->load->view('teacher/'.$page , compact('class_data','student_data','term'));
	        $this->load->view('teacher/includs/footer', $data);
	        $this->load->view('teacher/includs/footer_link', $data);
		}
	}

	public function bulk_result_input($page='bulk_result_input'){

		if ( ! file_exists(APPPATH.'views/admin/'.$page.'.php'))
	        {
	            redirect('404_override');
	        }

	    	$data['title'] = ucfirst(humanize($page));

	        $this->load->view('teacher/includs/header_link', $data);
	        $this->load->view('teacher/includs/navigation', $data);
	        $this->load->view('teacher/includs/header', $data);
	        $this->load->view('admin/'.$page );
	        $this->load->view('teacher/includs/footer', $data);
	        $this->load->view('teacher/includs/footer_link', $data);
	}

	public function insert_result($page='single_marks_input'){

		$term = $this->input->get('trm');
		$id = $this->input->get('sid');
		$cl = $this->input->get('cl');

		if ( ! file_exists(APPPATH.'views/teacher/'.$page.'.php'))
	        {
	            redirect('404_override');
	        }

	    	$data['title'] = ucfirst(humanize($page));
	    	$post = $this->input->post();
	    	$student_info = $this->Student_model->student_info($id);
	    	$result_check = $this->Result_model->result_check($id,$term);
	    	if ($result_check>0) {
	    		$this->session->set_flashdata('error', 'Result already exists. If want, then you need to update.');
    			redirect($_SERVER['HTTP_REFERER']);
	    	} else {
	    	
		    	$subject_info = $this->Class_model->get_subjects($cl);

				$class_data = $this->Class_model->get_t_Class();
		        $this->load->view('teacher/includs/header_link', $data);
		        $this->load->view('teacher/includs/navigation', $data);
		        $this->load->view('teacher/includs/header', $data);
		        $this->load->view('teacher/'.$page , compact('term','student_info','subject_info'));
		        $this->load->view('teacher/includs/footer', $data);
		        $this->load->view('teacher/includs/footer_link', $data);
		    }
	}


	public function update_result($page='single_marks_update'){
		$term = $this->input->get('trm');
		$id = $this->input->get('sid');
		$cl = $this->input->get('cl');

		if ( ! file_exists(APPPATH.'views/teacher/'.$page.'.php'))
	        {
	            redirect('404_override');
	        }

	    	$data['title'] = ucfirst(humanize($page));
	    	$student_info = $this->Student_model->student_info($id);
	    	$result = $this->Result_model->get_result($term,$id);

	    	$result_check = $this->Result_model->result_check($id,$term);
	    	if ($result_check>0) {
	    		$class_data = $this->Class_model->get_t_Class();
		        $this->load->view('teacher/includs/header_link', $data);
		        $this->load->view('teacher/includs/navigation', $data);
		        $this->load->view('teacher/includs/header', $data);
		        $this->load->view('teacher/'.$page , compact('term','student_info','result'));
		        $this->load->view('teacher/includs/footer', $data);
		        $this->load->view('teacher/includs/footer_link', $data);
	    	} else {

	    		$this->session->set_flashdata('error', 'No result found for update.');
    			redirect($_SERVER['HTTP_REFERER']);
    		}
    }

    function result_update(){
		$post = $this->input->post();
		$this->Result_model->result_update($post);
		$this->teacher_result_input();
	}

	function result_add($page='result_input'){
		$this->form_validation->set_rules('class', 'Class', 'required|callback_class_select');
		$this->form_validation->set_rules('section', 'Section', 'required|callback_section_select');
		$this->form_validation->set_rules('term', 'Term', 'callback_term_select');
		$this->form_validation->set_rules('subj', 'Subject', 'callback_sub_select');

		if ($this->form_validation->run() == FALSE){
			if ( ! file_exists(APPPATH.'views/teacher/'.$page.'.php'))
	        {
	            redirect('404_override');
	        }

	       $data['title'] = ucfirst(humanize($page));

	        $class_data = $this->Class_model->get_t_Class();
	        $result_model_view = $this->Result_model;

	        $this->load->view('teacher/includs/header_link', $data);
	        $this->load->view('teacher/includs/navigation', $data);
	        $this->load->view('teacher/includs/header', $data);
	        $this->load->view('teacher/'.$page , compact('class_data','result_model_view'));
	        $this->load->view('teacher/includs/footer', $data);
	        $this->load->view('teacher/includs/footer_link', $data);
		}else{
			if ( ! file_exists(APPPATH.'views/teacher/'.$page.'.php'))
	        {
	            redirect('404_override');
	        }

	    	$data['title'] = ucfirst(humanize($page));
	    	$post = $this->input->post();
	    	$term = $this->input->post('term');
	    	$subj = $this->input->post('subj');
			$student_data = $this->Student_model->student_data($post);
			
	        $class_data = $this->Class_model->get_t_Class();
	        $this->load->view('teacher/includs/header_link', $data);
	        $this->load->view('teacher/includs/navigation', $data);
	        $this->load->view('teacher/includs/header', $data);
	        $this->load->view('teacher/'.$page , compact('class_data','student_data','term','subj'));
	        $this->load->view('teacher/includs/footer', $data);
	        $this->load->view('teacher/includs/footer_link', $data);
		}
	}

	function teacher_result_submit(){
		$post = $this->input->post();
	    $this->Result_model->teacher_result_add($post);
	    $this->teacher_result_input();
	}

	function attendence($page = 'attendence')
	{
		if ( ! file_exists(APPPATH.'views/teacher/'.$page.'.php'))
        {
            redirect('404_override');
        }

        $title['title'] = ucfirst($page);
        $class_data = $this->Class_model->get_t_Class();

        $this->load->view('teacher/includs/header_link', $title);
        $this->load->view('teacher/includs/navigation', $title);
        $this->load->view('teacher/includs/header', $title);
        $this->load->view('teacher/'.$page, compact('class_data'));
        $this->load->view('teacher/includs/footer', $title);
        $this->load->view('teacher/includs/footer_link', $title);
	}

	public function attendence_search($page = 'attendence')
	{
		$this->form_validation->set_rules('class', 'Class', 'required|callback_class_select');
		$this->form_validation->set_rules('section', 'Section', 'required|callback_section_select');
		$this->form_validation->set_rules('month', 'Month', 'required|callback_month_select');
		$this->form_validation->set_rules('year', 'Month', 'required|callback_year_select');
		if ($this->form_validation->run() == FALSE){
			if ( ! file_exists(APPPATH.'views/teacher/'.$page.'.php'))
	        {
	            redirect('404_override');
	        }

	        $title['title'] = ucfirst($page);
	        $class_data = $this->Class_model->get_t_Class();

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

	        $student_model_view = $this->Student_model;
	        $machine_model_view = $this->Machine_model;

  		    
	        $class_data = $this->Class_model->get_t_Class();

	        $this->load->view('teacher/includs/header_link', $title);
	        $this->load->view('teacher/includs/navigation', $title);
	        $this->load->view('teacher/includs/header', $title);
	        $this->load->view('teacher/'.$page, compact('student_model_view','machine_model_view','class_data','post'));
	        $this->load->view('teacher/includs/footer', $title);
	        $this->load->view('teacher/includs/footer_link', $title);
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

	function teacher_single_attendence($page = 'teacher_single_attendence'){
		if ( ! file_exists(APPPATH.'views/teacher/'.$page.'.php'))
        {
            redirect('404_override');
        }

        $title['title'] = ucfirst($page);
        $class_data = $this->Class_model->get_t_Class();

        $this->load->view('teacher/includs/header_link', $title);
        $this->load->view('teacher/includs/navigation', $title);
        $this->load->view('teacher/includs/header', $title);
        $this->load->view('teacher/'.$page, compact('class_data'));
        $this->load->view('teacher/includs/footer', $title);
        $this->load->view('teacher/includs/footer_link', $title);
	}
}
