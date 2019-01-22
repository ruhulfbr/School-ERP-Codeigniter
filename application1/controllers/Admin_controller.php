<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin_controller extends CI_Controller {

	# This __construct fisrt load after class
	public function __construct()
	{
		parent::__construct();

		$this->load->model(array('Login_model','Class_model','Student_model','Machine_model', 'Teacher_and_staff_model', 'Admin_model','Result_model','Sms_model'));

		# This check is_user_logged_in!
		if ( !$this->Login_model->is_user_logged_in() ) 
		{
			redirect('?logged_in_first');
		}

		if ( !$this->Login_model->check_admin() ) 
		{
			redirect($_SERVER['HTTP_REFERER']);
		}

	}
	
	public function index()
	{
		if ( $this->Login_model->is_user_logged_in() ) 
		{
			redirect ('admin_controller/dashboard');
		}
	}
	
	public function dashboard($page = 'dashboard')
	{
		if ( ! file_exists(APPPATH.'views/admin/'.$page.'.php'))
	        {
	            redirect('404_override');
	        }

	        $data['title'] = ucfirst($page); // Capitalize the first letter

	        $Teacher_num = $this->Teacher_and_staff_model->teacher_num();
			$Student_num = $this->Student_model->student_num();
			$sms_data = $this->Sms_model->sms_data();
			$sms_balence = $this->Sms_model->sms_balence($sms_data);

	        $this->load->view('includs/header_link', $data);
	        $this->load->view('includs/navigation', $data);
	        $this->load->view('includs/header', $data);
	        $this->load->view('admin/'.$page,compact("Teacher_num","Student_num","data","sms_balence"));
	        $this->load->view('includs/footer', $data);
	        $this->load->view('includs/footer_link', $data);
	}

	public function profile($id, $page = 'profile')
	{
		if ( ! file_exists(APPPATH.'views/admin/'.$page.'.php'))
	        {
	            redirect('404_override');
	        }
	    $data['title'] = ucfirst(humanize($page));

	    $User_data = $this->Admin_model->get_user_data($id);

	    $page_data['u_name'] = $User_data->u_name;
		$page_data['full_name'] = $User_data->full_name;

		$this->load->view('includs/header_link', $data);
        $this->load->view('includs/navigation', $data);
        $this->load->view('includs/header', $data);
        $this->load->view('admin/'.$page, $page_data);
        $this->load->view('includs/footer', $data);
        $this->load->view('includs/footer_link', $data);
	}

	public function update_user_data()
	{
		$this->form_validation->set_rules('full_name', 'Full Name', 'trim|xss_clean|min_length[3]');
		$this->form_validation->set_rules('u_name', 'User Name', 'trim|xss_clean|min_length[3]');
		$this->form_validation->set_rules('old_password', 'Old Password', 'trim|xss_clean|min_length[3]');
		$this->form_validation->set_rules('new_password', 'New Password', 'trim|xss_clean|min_length[3]');
		$this->form_validation->set_rules('confirm_password', 'Confirm Password', 'trim|xss_clean|min_length[3]|matches[new_password]');

		if ($this->form_validation->run() == FALSE){

			$user_data = $this->Admin_model->get_user_data();

			$page = "Profile";
			$data['title'] = ucfirst($page);
	    
			$this->load->view('includs/header_link', $data);
	        $this->load->view('includs/navigation', $data);
	        $this->load->view('includs/header', $data);
	        $this->load->view('admin/'.$page,compact("user_data"));
	        $this->load->view('includs/footer', $data);
	        $this->load->view('includs/footer_link', $data);
		}else{
			$post = $this->input->post();
			$this->Admin_model->update_user_data($post);
			$sess_destroy = $this->session->sess_destroy();
			redirect ($sess_destroy);
		}
	}
	# ISMAIL START
	public function manage_class()
	{
		$page = 'manage_class';
		
		if ( ! file_exists(APPPATH.'views/admin/'.$page.'.php'))
	        {
	            redirect('404_override');
	        }

	        $title['title'] = ucfirst(humanize($page)); // Capitalize the first letter

	        $data = $this->Class_model->view();
			$teacher_data = $this->Class_model->teacher();

			$this->load->view('includs/header_link', $title);
	        $this->load->view('includs/navigation', $title);
	        $this->load->view('includs/header', $title);
	        $this->load->view('admin/'.$page , compact("data","teacher_data"));
	        $this->load->view('includs/footer', $title);
	        $this->load->view('includs/footer_link', $title);
	}

	public function get_section_name($id)
	{
		$section_name = $this->Admin_model->get_section_name($id);

		echo '<div class="modal-header">';
			
			echo '<button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">' . '&times;' . '</span><span class="sr-only">' . 'Close' . '</span></button>';

			echo '<h4 class="modal-title">'.'Section'.'</h4>';

		echo '</div>';

		echo '<div class="modal-body">';

			foreach ($section_name as $value) {

				echo '<table class="table table-bordered">';
					echo '<thead>';
						echo '<tr>';
							echo '<th>';
								echo '<center>Section code : ', $value->id,'<h3>', $value->section_name, '</h3></center>';
							echo '</th>';
						echo '</tr>';
					echo '</thead>';
				echo '</table>';

			}

		echo '</div>';

		echo '<div class="modal-footer">';

			echo '<button type="button" class="btn btn-primary" data-dismiss="modal">' . 'Close' . '</button>';

		echo '</div>';
	}



	public function manage_subject($page = 'subjects')
	{
		if ( ! file_exists(APPPATH.'views/admin/'.$page.'.php'))
	        {
	            redirect('404_override');
	        }

	        $data['title'] = ucfirst(humanize($page));

	        $class_data = $this->Class_model->view();
	        $subjects = $this->Class_model->subjects();

	        $this->load->view('includs/header_link', $data);
	        $this->load->view('includs/navigation', $data);
	        $this->load->view('includs/header', $data);
	        $this->load->view('admin/'.$page , compact("class_data","subjects","data"));
	        $this->load->view('includs/footer', $data);
	        $this->load->view('includs/footer_link', $data);
		
	}

	public function student_admission($page='student_admission')
	{
		
		if ( ! file_exists(APPPATH.'views/admin/'.$page.'.php'))
	        {
	            redirect('404_override');
	        }

	        $data['title'] = "Admission"; // Capitalize the first letter

	        $class_data = $this->Class_model->getClass();
	        $this->load->view('includs/header_link', $data);
	        $this->load->view('includs/navigation', $data);
	        $this->load->view('includs/header', $data);
	        $this->load->view('admin/'.$page , compact("class_data","data"));
	        $this->load->view('includs/footer', $data);
	        $this->load->view('includs/footer_link', $data);
	}

	public function  student_information($page='student_information')
	{
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
	}

	public function  import_data(){
		$this->form_validation->set_rules('table_f_up', 'Table Name', 'required|callback_table_f_up');
		$this->form_validation->set_rules('csv_file', 'File');
		
		if ($this->form_validation->run() == FALSE){
			$this->load->view('admin/manage_student_export_import');
		}else{
			$post = $this->input->post();

			if ($post['table_f_up']==1) {
				$table_name = "student_info";

				if(isset($_POST["import"])){
			 	$filename=$_FILES["csv_file"]["tmp_name"];
			     if($_FILES["csv_file"]["size"] > 0){
			     	$file = fopen($filename, "r");
			     	fgets($file);
			        while (($importdata = fgetcsv($file, 10000, ",")) !== FALSE){
			        	$data = array(
			        	    'id' => $importdata[0],
			                's_f_name' => $importdata[1],
			               	's_id' =>$importdata[2],
			               	's_class' =>$importdata[3],
			               	's_section' =>$importdata[4],
			               	's_roll' =>$importdata[5],
			               	'fat_name' =>$importdata[6],
			               	'fat_mobile' =>$importdata[7],
			               	's_image' =>$importdata[8],
			               	
			               );
			        $this->db->insert($table_name, $data);
			        }                    
			        fclose($file);
			        $this->load->view('admin/manage_student_export_import');
			   }
			}

			}elseif ($post['table_f_up']==2) {
				$table_name = "teacher";
			}

			 
		}
	}

	public function table_f_up(){
		if ($this->input->post('table_f_up') === 'none')  {

			$this->form_validation->set_message('table_f_up', 'You have to select a table form upload.');

            return FALSE;
        }else{
            return TRUE;
        }
	}

	public function class_routin($page='class_routin'){
		
		if ( ! file_exists(APPPATH.'views/admin/'.$page.'.php'))
	        {
	           redirect('404_override');
	        }

	        $data['title'] = ucfirst(humanize($page));

	        $class_data = $this->Class_model->getClass();
	        $this->load->view('includs/header_link', $data);
	        $this->load->view('includs/navigation', $data);
	        $this->load->view('includs/header', $data);
	        $this->load->view('admin/'.$page , compact("class_data","data"));
	        $this->load->view('includs/footer', $data);
	        $this->load->view('includs/footer_link', $data);
	}

	public function routin_search($page='class_routin'){

		$this->form_validation->set_rules('day', 'Day', 'callback_day_select');
		$this->form_validation->set_rules('class', 'Class', 'callback_class_select');
		$this->form_validation->set_rules('section', 'Section', 'callback_section_select');

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
	        $this->load->view('admin/'.$page , compact("class_data","data"));
	        $this->load->view('includs/footer', $data);
	        $this->load->view('includs/footer_link', $data);
	      }else{

	      	if ( ! file_exists(APPPATH.'views/admin/'.$page.'.php'))
	        {
	            redirect('404_override');
	        }

	        $data['title'] = ucfirst(humanize($page));
	        $post = $this->input->post();
	        $routine = $this->Admin_model->get_routine($post);
	        foreach ($routine as $key => $value) {
	        	if ($value->day==1) {
	        		echo "Sunday"." ";
	        	}elseif ($value->day==2) {
	        		echo "Monday"." ";
	        	}
	        	if ($value->time==1) {
	        		echo "9:00 AM - 10:00 AM"." ";
	        	}elseif ($value->time==2) {
	        		echo "10:00 AM - 11:00 AM"." ";
	        	}elseif ($value->time==3) {
	        		echo "11:00 AM - 12:00 PM"." ";
	        	}elseif ($value->time==4) {
	        		echo "12:00 PM - 13:00 PM"." ";
	        	}elseif ($value->time==5) {
	        		echo "13:00 PM - 14:00 PM"." ";
	        	}elseif ($value->time==6) {
	        		echo "14:00 PM - 15:00 PM"." ";
	        	}
	        	if ($value->subject==48) {
	        		echo "Bangla"."<br>";
	        	}elseif ($value->subject==49) {
	        		echo "English"."<br>";
	        	}elseif ($value->subject==50) {
	        		echo "Math"."<br>";
	        	}elseif ($value->subject==51) {
	        		echo "Religion"."<br>";
	        	}
	        }
	        exit();

	        $class_data = $this->Class_model->getClass();
	        $this->load->view('includs/header_link', $data);
	        $this->load->view('includs/navigation', $data);
	        $this->load->view('includs/header', $data);
	        $this->load->view('admin/'.$page , compact("class_data","data"));
	        $this->load->view('includs/footer', $data);
	        $this->load->view('includs/footer_link', $data);

	      }
	}

	function add_routin($page='add_routin'){
		if ( ! file_exists(APPPATH.'views/admin/'.$page.'.php'))
	        {
	            redirect('404_override');
	        }

	        $data['title'] = ucfirst(humanize($page));

	        $class_data = $this->Class_model->getClass();
	        $teacher = $this->Teacher_and_staff_model->view();
	        $subject_info = $this->Class_model->subject_info();
	        
	        $this->load->view('includs/header_link', $data);
	        $this->load->view('includs/navigation', $data);
	        $this->load->view('includs/header', $data);
	        $this->load->view('admin/'.$page , compact("class_data","data","teacher","subject_info"));
	        $this->load->view('includs/footer', $data);
	        $this->load->view('includs/footer_link', $data);
	}

	function insert_routine($page='add_routin'){
		$this->form_validation->set_rules('day', 'Day', 'callback_day_select');
		$this->form_validation->set_rules('class', 'Class', 'callback_class_select');
		$this->form_validation->set_rules('section', 'Section', 'callback_section_select');
		$this->form_validation->set_rules('time', 'Time', 'callback_time_select');
		$this->form_validation->set_rules('subject', 'Subject', 'callback_subject_select');
		$this->form_validation->set_rules('teacher', 'Teacher', 'callback_teacher_select');

		if ($this->form_validation->run() == FALSE){
			if ( ! file_exists(APPPATH.'views/admin/'.$page.'.php'))
	        {
	            redirect('404_override');
	        }

	        $data['title'] = ucfirst(humanize($page));

	        $class_data = $this->Class_model->getClass();
	        $teacher = $this->Teacher_and_staff_model->view();
	        $subject_info = $this->Class_model->subject_info();

	        $this->load->view('includs/header_link', $data);
	        $this->load->view('includs/navigation', $data);
	        $this->load->view('includs/header', $data);
	        $this->load->view('admin/'.$page , compact("class_data","data","teacher","subject_info"));
	        $this->load->view('includs/footer', $data);
	        $this->load->view('includs/footer_link', $data);
	    }else{
	    	$post = $this->input->post();
	    	$this->Admin_model->insert_routine($post);
			redirect ('class_routin');
	    }
	}

	function day_select(){
		if ($this->input->post('day') === 'none')  {

            $this->form_validation->set_message('day_select', 'You have to select a day.');
            return FALSE;
        }
        else {
            return TRUE;
        }
	}

	function class_select(){
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

	function time_select(){
		if ($this->input->post('time') === 'none')  {

			$this->form_validation->set_message('time_select', 'You have to select a time.');

            return FALSE;
        }else{
            return TRUE;
        }
	}

	function subject_select(){
		if ($this->input->post('subject') === 'none')  {

			$this->form_validation->set_message('subject_select', 'You have to select a subject.');

            return FALSE;
        }else{
            return TRUE;
        }
	}

	function teacher_select(){
		if ($this->input->post('teacher') === 'none')  {

			$this->form_validation->set_message('teacher_select', 'You have to select a teacher.');

            return FALSE;
        }else{
            return TRUE;
        }
	}

	public function parent_details(){
		
		$this->load->view('admin/parent_details');
	}

	public function  exam_managment($page='exam_managment')
	{
		if ( ! file_exists(APPPATH.'views/admin/'.$page.'.php'))
	        {
	            redirect('404_override');
	        }

	        $data['title'] = ucfirst(humanize($page));

	        $class_data = $this->Class_model->getClass();
	        $exam_data = $this->Class_model->exam_data();

	        $this->load->view('includs/header_link', $data);
	        $this->load->view('includs/navigation', $data);
	        $this->load->view('includs/header', $data);
	        $this->load->view('admin/'.$page, compact("class_data",'exam_data'));
	        $this->load->view('includs/footer', $data);
	        $this->load->view('includs/footer_link', $data);
	}

	public function admit_card($page='admit_card'){
		
		if ( ! file_exists(APPPATH.'views/admin/'.$page.'.php'))
	        {
	            redirect('404_override');
	        }

	        $data['title'] = ucfirst(humanize($page));
	        $class_data = $this->Class_model->getClass();

	        $this->load->view('includs/header_link', $data);
	        $this->load->view('includs/navigation', $data);
	        $this->load->view('includs/header', $data);
	        $this->load->view('admin/'.$page, compact('class_data'));
	        $this->load->view('includs/footer', $data);
	        $this->load->view('includs/footer_link', $data);
	}

	function get_admit_card($page='admit_card'){
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
	        $this->load->view('admin/'.$page, compact('class_data'));
	        $this->load->view('includs/footer', $data);
	        $this->load->view('includs/footer_link', $data);
	    }else{
	    	$post = $this->input->post();
	    	$term_id = $this->input->post('term');
	    	$class_id = $this->input->post('class');
	    	$section_id = $this->input->post('section');
			$student_data = $this->Student_model->student_data($post);
			if ( ! file_exists(APPPATH.'views/admin/'.$page.'.php')){
	            redirect('404_override');
	        }

	        $data['title'] = ucfirst(humanize($page));
	        $class_data = $this->Class_model->getClass();

	        $this->load->view('includs/header_link', $data);
	        $this->load->view('includs/navigation', $data);
	        $this->load->view('includs/header', $data);
	        $this->load->view('admin/'.$page, compact('class_data','student_data','term_id','class_id','section_id'));
	        $this->load->view('includs/footer', $data);
	        $this->load->view('includs/footer_link', $data);
	    }
	}

	function print_all_admit($page='all_admit_card'){
		$cl = $this->input->get('cl');
		$sec = $this->input->get('sec');
		$term_id = $this->input->get('term_id');
		$term_data = $this->Result_model->term_data($term_id);
		$student_info = $this->Student_model->student_data_admit_card($cl,$sec);
		if ( ! file_exists(APPPATH.'views/admin/'.$page.'.php')){
	            redirect('404_override');
	        }

	        $data['title'] = ucfirst(humanize($page));
	        $school_info = $this->Admin_model->school_info();

	        $this->load->library('Pdf');
			$this->load->view('admin/'.$page, compact('student_info','term_data','school_info'));
	}

	function term_select(){

		if ($this->input->post('term') === 'none')  {

			$this->form_validation->set_message('term_select', 'You have to select a term.');

            return FALSE;
        }else{
            return TRUE;
        }
	}

	public function single_admit_card_print_view($page='single_admit_card_print_view'){
		
		$id = $this->input->get('s_id');
		$cl = $this->input->get('cl');
		$term_id = $this->input->get('term_id');
		if ( ! file_exists(APPPATH.'views/admin/'.$page.'.php')){
	            redirect('404_override');
	        }

        $data['title'] = ucfirst(humanize($page));
        $student_info = $this->Student_model->student_info($id);
        $term_data = $this->Result_model->term_data($term_id);
        $school_info = $this->Admin_model->school_info();

        $this->load->library('Pdf');
		$this->load->view('admin/'.$page, compact('student_info','term_data','school_info'));
	}

	public function settings($page='settings'){
		
	if ( ! file_exists(APPPATH.'views/admin/'.$page.'.php')){
            redirect('404_override');
        }

        $data['title'] = ucfirst(humanize($page));
        $school_info = $this->Admin_model->school_info();
        $sms_info = $this->Sms_model->sms_data();

        $this->load->view('includs/header_link', $data);
        $this->load->view('includs/navigation', $data);
        $this->load->view('includs/header', $data);
        $this->load->view('admin/'.$page, compact("school_info","sms_info"));
        $this->load->view('includs/footer', $data);
        $this->load->view('includs/footer_link', $data);
	}

	function settings_insert($page='settings'){
		$this->form_validation->set_rules('name', 'Institution Name', 'required');
		$this->form_validation->set_rules('address_1st_line', 'Address 1st Line', 'required');
		$this->form_validation->set_rules('address_2nd_line', 'Address 2nd Line', 'required');
		$this->form_validation->set_rules('user_name', 'Sms User Nmae', 'required');
		$this->form_validation->set_rules('password', 'Sms Password', 'required');
		$this->form_validation->set_rules('sms_rate', 'Sms Rate', 'required');
		$this->form_validation->set_rules('sms_entry_text', 'Sms Entry Text', 'required');
		$this->form_validation->set_rules('sms_exit_text', 'Sms Exit Text', 'required');

		if ($this->form_validation->run() == FALSE){
			if ( ! file_exists(APPPATH.'views/admin/'.$page.'.php'))
	        {
	            redirect('404_override');
	        }
	        $data['title'] = ucfirst(humanize($page));
        	$school_info = $this->Admin_model->school_info();

	        $this->load->view('includs/header_link', $data);
	        $this->load->view('includs/navigation', $data);
	        $this->load->view('includs/header', $data);
	        $this->load->view('admin/'.$page, compact(""));
	        $this->load->view('includs/footer', $data);
	        $this->load->view('includs/footer_link', $data);
	    }else{
	    	$post = $this->input->post();
			$student_data = $this->Admin_model->settings_insert($post);
			redirect('dashboard');
	    }
	}

	function logo_upload(){

		$post = $this->input->post();
		$logo = $_FILES["logo"]["name"];
	        
        if (!empty($logo)) {

        	if (file_exists(APPPATH.'../resource/img/'.$post['previous_logo']))
	        {
	        	$logo_path = APPPATH.'../resource/img/'.$post['previous_logo'];
	        	
	            unlink($logo_path);
	        }

	    	$config_logo['upload_path']          = './resource/img/';
	        $config_logo['allowed_types']        = 'jpg|png|JPG';
	        $config_logo['max_size']             = 5000;
	        $config_logo['max_width']            = 1024;
	        $config_logo['max_height']           = 768;
	        $config_logo['file_name']           	= 'school_logo.png';

	        $this->load->library('upload', $config_logo);

	        if ( ! $this->upload->do_upload('logo'))
	        {
	            return FALSE;
	        }else{

	        	$upload_data = $this->upload->data();
	        	$file_ext = $upload_data['file_ext'];
	        }
	        redirect('settings');
        }
	}

	function signature_upload(){
		$post = $this->input->post();
		$signature = $_FILES["signature"]["name"];
	        
        if (!empty($signature)) {

        	if (file_exists(APPPATH.'../resource/img/'.$post['previous_signature']))
	        {
	        	$signature_path = APPPATH.'../resource/img/'.$post['previous_signature'];
	        	
	            unlink($signature_path);
	        }

	    	$config_signature['upload_path']          = './resource/img/';
	        $config_signature['allowed_types']        = 'jpg|png|JPG';
	        $config_signature['max_size']             = 5000;
	        $config_signature['max_width']            = 1024;
	        $config_signature['max_height']           = 768;
	        $config_signature['file_name']           	= 'signature.png';

	        $this->load->library('upload', $config_signature);

	        if ( ! $this->upload->do_upload('signature'))
	        {
	            return FALSE;
	        }else{

	        	$upload_data = $this->upload->data();
	        	$file_ext = $upload_data['file_ext'];
	        }
	        redirect('settings');
        }
	}

	function bannar_upload(){
		$post = $this->input->post();
		$bannar = $_FILES["bannar"]["name"];
	        
        if (!empty($bannar)) {

        	if (file_exists(APPPATH.'../web_resource/banar/'.$post['previous_bannar']))
	        {
	        	$banar_path = APPPATH.'../web_resource/banar/'.$post['previous_bannar'];
	        	
	            unlink($banar_path);
	        }

	    	$config_bannar['upload_path']          = './web_resource/banar/';
	        $config_bannar['allowed_types']        = 'jpg|png|JPG';
	        $config_bannar['max_size']             = 5000;
	        $config_bannar['max_width']            = 1024;
	        $config_bannar['max_height']           = 768;
	        $config_bannar['file_name']           	= 'banner.jpg';

	        $this->load->library('upload', $config_bannar);

	        if ( ! $this->upload->do_upload('bannar'))
	        {
	            return FALSE;
	        }else{

	        	$upload_data = $this->upload->data();
	        	$file_ext = $upload_data['file_ext'];
	        }
	        redirect('settings');
        }
	}

}
