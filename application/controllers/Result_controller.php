<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class Result_controller extends CI_Controller {

	# This __construct fisrt load after class
	public function __construct()
	{
		parent::__construct();

		$this->load->model(array('Login_model','Class_model','Student_model','Machine_model', 'Teacher_and_staff_model', 'Admin_model','Result_model'));

		if ( !$this->Login_model->is_user_logged_in() ) 
		{
			redirect('?logged_in_first');
		}

	}

	public function  result_input($page='result_input')
	{
		if ( ! file_exists(APPPATH.'views/admin/'.$page.'.php'))
	        {
	            redirect('404_override');
	        }

	       $data['title'] = ucfirst(humanize($page));

	        $class_data = $this->Class_model->getClass();
	        $this->load->view('includs/header_link', $data);
	        $this->load->view('includs/navigation', $data);
	        $this->load->view('includs/header', $data);
	        $this->load->view('admin/'.$page , compact('class_data'));
	        $this->load->view('includs/footer', $data);
	        $this->load->view('includs/footer_link', $data);
	}

	public function input_result_search($page='result_input'){
		$this->form_validation->set_rules('class', 'Class', 'required|callback_class_select');
		$this->form_validation->set_rules('section', 'Section', 'required|callback_section_select');
		$this->form_validation->set_rules('term', 'Term', 'callback_term_select');

		if ($this->form_validation->run() == FALSE){
			if ( ! file_exists(APPPATH.'views/admin/'.$page.'.php'))
	        {
	            redirect('404_override');
	        }

	       $data['title'] = ucfirst(humanize($page));

	        $class_data = $this->Class_model->getClass();
	        $this->load->view('includs/header_link', $data);
	        $this->load->view('includs/navigation', $data);
	        $this->load->view('includs/header', $data);
	        $this->load->view('admin/'.$page , compact('class_data'));
	        $this->load->view('includs/footer', $data);
	        $this->load->view('includs/footer_link', $data);
		}else{
			if ( ! file_exists(APPPATH.'views/admin/'.$page.'.php'))
	        {
	            redirect('404_override');
	        }

	    	$data['title'] = ucfirst(humanize($page));
	    	$post = $this->input->post();
	    	$term = $this->input->post('term');
			$student_data = $this->Student_model->student_data($post);
			
	        $class_data = $this->Class_model->getClass();
	        $this->load->view('includs/header_link', $data);
	        $this->load->view('includs/navigation', $data);
	        $this->load->view('includs/header', $data);
	        $this->load->view('admin/'.$page , compact('class_data','student_data','term'));
	        $this->load->view('includs/footer', $data);
	        $this->load->view('includs/footer_link', $data);
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

	public function bulk_result_input($page='bulk_result_input'){

		if ( ! file_exists(APPPATH.'views/admin/'.$page.'.php'))
	        {
	            redirect('404_override');
	        }

	    	$data['title'] = ucfirst(humanize($page));

	        $this->load->view('includs/header_link', $data);
	        $this->load->view('includs/navigation', $data);
	        $this->load->view('includs/header', $data);
	        $this->load->view('admin/'.$page );
	        $this->load->view('includs/footer', $data);
	        $this->load->view('includs/footer_link', $data);
	}

	public function download_result_sample(){
		$link = base_url('samples/Result_data_sample.zip');

		$curl_handle = curl_init();  
	    curl_setopt($curl_handle, CURLOPT_URL, $link);  
	    curl_setopt($curl_handle, CURLOPT_RETURNTRANSFER, 1); 
	    $buffer = curl_exec($curl_handle);  
	    curl_close($curl_handle);
	    $nme    =   "result_sample.zip";
		force_download($nme, $buffer);
	}

	public function bulk_result_insert(){
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
				$data_excel[$i - 1]['term_id']   = $sheets['cells'][$i][2];
				$data_excel[$i - 1]['sub_id'] = $sheets['cells'][$i][3];
				$data_excel[$i - 1]['mark'] = $sheets['cells'][$i][4];
				$data_excel[$i - 1]['grade'] = $sheets['cells'][$i][5];
			}

			$this->db->insert_batch('results', $data_excel);
			@unlink($data['full_path']);
			redirect($_SERVER['HTTP_REFERER']);
		}
	}

	public function insert_result($page='single_marks_input'){

		$term = $this->input->get('trm');
		$id = $this->input->get('sid');
		$cl = $this->input->get('cl');

		if ( ! file_exists(APPPATH.'views/admin/'.$page.'.php'))
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

				$class_data = $this->Class_model->getClass();
		        $this->load->view('includs/header_link', $data);
		        $this->load->view('includs/navigation', $data);
		        $this->load->view('includs/header', $data);
		        $this->load->view('admin/'.$page , compact('term','student_info','subject_info'));
		        $this->load->view('includs/footer', $data);
		        $this->load->view('includs/footer_link', $data);
		    }
	}

	public function result_add(){

		$post = $this->input->post();
	    $this->Result_model->result_add($post);
	    $this->result_input();
	}

	public function report_card($page='report_card_search'){
		if ( ! file_exists(APPPATH.'views/admin/'.$page.'.php'))
	        {
	            redirect('404_override');
	        }

	    	$data['title'] = ucfirst(humanize($page));

	    	$class_data = $this->Class_model->getClass();
	        $this->load->view('includs/header_link', $data);
	        $this->load->view('includs/navigation', $data);
	        $this->load->view('includs/header', $data);
	        $this->load->view('admin/'.$page , compact('class_data'));
	        $this->load->view('includs/footer', $data);
	        $this->load->view('includs/footer_link', $data);
	}

	public function report_card_search($page='report_card_search'){

		$this->form_validation->set_rules('class', 'Class', 'callback_class_select');
		$this->form_validation->set_rules('section', 'Section', 'callback_section_select');
		$this->form_validation->set_rules('term', 'Term', 'callback_term_select');

		if ($this->form_validation->run() == FALSE){

			if ( ! file_exists(APPPATH.'views/admin/'.$page.'.php'))
		        {
		            redirect('404_override');
		        }

		    	$data['title'] = ucfirst(humanize($page));

		    	$class_data = $this->Class_model->getClass();
		        $this->load->view('includs/header_link', $data);
		        $this->load->view('includs/navigation', $data);
		        $this->load->view('includs/header', $data);
		        $this->load->view('admin/'.$page , compact('class_data'));
		        $this->load->view('includs/footer', $data);
		        $this->load->view('includs/footer_link', $data);
		    }else{
		    	$post = $this->input->post();
		    	$term = $this->input->post('term');
				$student_data = $this->Student_model->student_data($post);
		    	if ( ! file_exists(APPPATH.'views/admin/'.$page.'.php'))
		        {
		            redirect('404_override');
		        }

		    	$data['title'] = ucfirst(humanize($page));

		    	$class_data = $this->Class_model->getClass();
		        $this->load->view('includs/header_link', $data);
		        $this->load->view('includs/navigation', $data);
		        $this->load->view('includs/header', $data);
		        $this->load->view('admin/'.$page , compact('class_data','student_data','term'));
		        $this->load->view('includs/footer', $data);
		        $this->load->view('includs/footer_link', $data);
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
			
			if ( ! file_exists(APPPATH.'views/admin/'.$page.'.php'))
		        {
		            redirect('404_override');
		        }

		    	$data['title'] = ucfirst(humanize($page));
				$school_info = $this->Admin_model->school_info();

		    	$class_data = $this->Class_model->getClass();
		        $this->load->view('includs/header_link', $data);
		        $this->load->view('includs/navigation', $data);
		        $this->load->view('includs/header', $data);
		        $this->load->view('admin/'.$page , compact("result_model_view","get_subject_groupdata","term_id","id","student_info","term_data","school_info") );
		        $this->load->view('includs/footer', $data);
		        $this->load->view('includs/footer_link', $data);

			}else{

				if ( ! file_exists(APPPATH.'views/admin/'.$page.'.php'))
		        {
		            redirect('404_override');
		        }

		    	$data['title'] = ucfirst(humanize($page));
				$school_info = $this->Admin_model->school_info();

		    	$class_data = $this->Class_model->getClass();
		        $this->load->view('includs/header_link', $data);
		        $this->load->view('includs/navigation', $data);
		        $this->load->view('includs/header', $data);
		        $this->load->view('admin/'.$page , compact("result_info","student_info","term_data","school_info") );
		        $this->load->view('includs/footer', $data);
		        $this->load->view('includs/footer_link', $data);
	      }
	}

	public function result_at_a_glance_print($page='result_at_a_glance_print'){
		$term_id = $this->input->get('trm');
		$id = $this->input->get('s_id');
		$class_id = $this->input->get('class_id');

		$result_info = $this->Result_model->get_result($term_id,$id);
		$student_info = $this->Student_model->student_info($id);
		$term_data = $this->Result_model->term_data($term_id);

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
				$school_info = $this->Admin_model->school_info();

		    	$class_data = $this->Class_model->getClass();
		    	$this->load->view('includs/header_link', $data);
		        $this->load->view('admin/'.$page , compact("result_model_view","get_subject_groupdata","term_id","id","student_info","term_data","school_info") );
		        $this->load->view('includs/footer_link', $data);
			}else{

				if ( ! file_exists(APPPATH.'views/admin/'.$page.'.php'))
		        {
		            redirect('404_override');
		        }

		    	$data['title'] = ucfirst(humanize($page));
				$school_info = $this->Admin_model->school_info();

		    	$class_data = $this->Class_model->getClass();
		    	$this->load->view('includs/header_link', $data);
		        $this->load->view('admin/'.$page , compact("result_info","student_info","term_data","school_info") );
		        $this->load->view('includs/footer_link', $data);
	      }
	}
	
	public function update_result($page='single_marks_update'){
		$term = $this->input->get('trm');
		$id = $this->input->get('sid');
		$cl = $this->input->get('cl');

		if ( ! file_exists(APPPATH.'views/admin/'.$page.'.php'))
	        {
	            redirect('404_override');
	        }

	    	$data['title'] = ucfirst(humanize($page));
	    	$student_info = $this->Student_model->student_info($id);
	    	$result = $this->Result_model->get_result($term,$id);

	    	$result_check = $this->Result_model->result_check($id,$term);
	    	if ($result_check>0) {
	    		$class_data = $this->Class_model->getClass();
		        $this->load->view('includs/header_link', $data);
		        $this->load->view('includs/navigation', $data);
		        $this->load->view('includs/header', $data);
		        $this->load->view('admin/'.$page , compact('term','student_info','result'));
		        $this->load->view('includs/footer', $data);
		        $this->load->view('includs/footer_link', $data);
	    	} else {

	    		$this->session->set_flashdata('error', 'No result found for update.');
    			redirect($_SERVER['HTTP_REFERER']);
    		}
    }

	function result_update(){
		$post = $this->input->post();
		$this->Result_model->result_update($post);
		$this->result_input();
	}

	function result_delet($id){
		$result_delet = $this->Result_model->result_delet($id);

		if ($result_delet == true) {
			$this->session->set_flashdata('success', 'Result delete successful.');
			redirect($_SERVER['HTTP_REFERER']);
		} else {
			$this->session->set_flashdata('error', 'Result delete unsuccessful.');
			redirect($_SERVER['HTTP_REFERER']);
		}
	}
}