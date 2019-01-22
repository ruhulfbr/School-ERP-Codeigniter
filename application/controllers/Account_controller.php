<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class Account_controller extends CI_Controller {

	# This __construct fisrt load after class
	public function __construct()
	{
		parent::__construct();

		$this->load->model(array('Login_model','Class_model','Student_model','Machine_model', 'Teacher_and_staff_model', 'Admin_model','Result_model','Account_model'));

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

	public function index($page='accounce_dashboard')
	{
		if ( ! file_exists(APPPATH.'views/accounce/'.$page.'.php'))
	        {
	            redirect('404_override');
	        }

	        $data['title'] = ucfirst(humanize($page)); // Capitalize the first letter

	        $this->load->view('accounce/includs/header_link', $data);
	        $this->load->view('accounce/includs/navigation', $data);
	        $this->load->view('accounce/includs/header', $data);
	        $this->load->view('accounce/'.$page);
	        $this->load->view('accounce/includs/footer', $data);
	        $this->load->view('accounce/includs/footer_link', $data);
	}

	function st_payment($page='st_payment'){
		if ( ! file_exists(APPPATH.'views/accounce/'.$page.'.php'))
	        {
	            redirect('404_override');
	        }

	        $data['title'] = ucfirst(humanize($page));
	        $class_data = $this->Class_model->getClass();
	        $account_head_income = $this->Account_model->account_head_income();

	        $this->load->view('accounce/includs/header_link', $data);
	        $this->load->view('accounce/includs/navigation', $data);
	        $this->load->view('accounce/includs/header', $data);
	        $this->load->view('accounce/'.$page, compact("class_data","account_head_income"));
	        $this->load->view('accounce/includs/footer', $data);
	        $this->load->view('accounce/includs/footer_link', $data);
	}

	function add_stu_payment($page='st_payment'){

		$this->form_validation->set_rules('class', 'Class', 'required|callback_class_select');
		$this->form_validation->set_rules('section', 'Section', 'required|callback_section_select');
		$this->form_validation->set_rules('student', 'Student', 'callback_student_select');
		$this->form_validation->set_rules('title', 'Title', 'required');
		$this->form_validation->set_rules('date', 'Date', 'trim|required');
		// $this->form_validation->set_rules('account', 'Account', 'callback_select_account');
		$this->form_validation->set_rules('total_amount[]', 'Total amount', 'trim|required');
		$this->form_validation->set_rules('status', 'Status', 'callback_select_status');
		$this->form_validation->set_rules('pay_method', 'Payment method', 'callback_select_pay_method');

		if ($this->form_validation->run() == FALSE){
			if ( ! file_exists(APPPATH.'views/accounce/'.$page.'.php'))
	        {
	            redirect('404_override');
	        }

	        $data['title'] = ucfirst(humanize($page));
	        $class_data = $this->Class_model->getClass();
	        $account_head_income = $this->Account_model->account_head_income();

	        $this->load->view('accounce/includs/header_link', $data);
	        $this->load->view('accounce/includs/navigation', $data);
	        $this->load->view('accounce/includs/header', $data);
	        $this->load->view('accounce/'.$page, compact("account_head_income","class_data"));
	        $this->load->view('accounce/includs/footer', $data);
	        $this->load->view('accounce/includs/footer_link', $data);
		}else{
			$post = $this->input->post();
			$this->Account_model->add_stu_payment($post);
			$bill_data = $this->Account_model->invoice_details($post);
			$this->invoice($bill_data);
		}

	}

	function other_payment($page='other_payment'){
		if ( ! file_exists(APPPATH.'views/accounce/'.$page.'.php'))
	        {
	            redirect('404_override');
	        }

	        $data['title'] = ucfirst(humanize($page));
	        $account_head_income = $this->Account_model->account_head_income();

	        $this->load->view('accounce/includs/header_link', $data);
	        $this->load->view('accounce/includs/navigation', $data);
	        $this->load->view('accounce/includs/header', $data);
	        $this->load->view('accounce/'.$page, compact("account_head_income"));
	        $this->load->view('accounce/includs/footer', $data);
	        $this->load->view('accounce/includs/footer_link', $data);
	}

	function add_other_payment($page='other_payment'){

		$this->form_validation->set_rules('name', 'Name', 'required');
		$this->form_validation->set_rules('account', 'Account', 'callback_select_account');
		$this->form_validation->set_rules('phone', 'Phone', 'required');
		$this->form_validation->set_rules('total_amount', 'Total amount', 'trim|required');
		$this->form_validation->set_rules('title', 'Title', 'required');
		$this->form_validation->set_rules('pay_method', 'Payment method', 'callback_select_pay_method');
		$this->form_validation->set_rules('date', 'Date', 'trim|required');
		

		if ($this->form_validation->run() == FALSE){
			if ( ! file_exists(APPPATH.'views/accounce/'.$page.'.php'))
	        {
	            redirect('404_override');
	        }

	        $data['title'] = ucfirst(humanize($page));
	        $account_head_income = $this->Account_model->account_head_income();

	        $this->load->view('accounce/includs/header_link', $data);
	        $this->load->view('accounce/includs/navigation', $data);
	        $this->load->view('accounce/includs/header', $data);
	        $this->load->view('accounce/'.$page, compact("account_head_income"));
	        $this->load->view('accounce/includs/footer', $data);
	        $this->load->view('accounce/includs/footer_link', $data);
		}else{
			$post = $this->input->post();
			$this->Account_model->add_stu_payment($post);
			redirect('account_dashboard');
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

	public function student_select(){
		if ($this->input->post('student') === 'none')  {

			$this->form_validation->set_message('student_select', 'You have to select a student.');

            return FALSE;
        }else{
            return TRUE;
        }
	}

	public function select_account(){
		if ($this->input->post('account') === 'none')  {

			$this->form_validation->set_message('select_account', 'You have to select a account.');

            return FALSE;
        }else{
            return TRUE;
        }
	}

	public function select_status(){
		if ($this->input->post('status') === 'none')  {

			$this->form_validation->set_message('select_status', 'You have to select a status.');

            return FALSE;
        }else{
            return TRUE;
        }
	}

	public function select_pay_method(){
		if ($this->input->post('pay_method') === 'none')  {

			$this->form_validation->set_message('select_pay_method', 'You have to select a payment method.');

            return FALSE;
        }else{
            return TRUE;
        }
	}

	function recive_logs($page='recive_logs'){
		if ( ! file_exists(APPPATH.'views/accounce/'.$page.'.php'))
	        {
	            redirect('404_override');
	        }

	        $data['title'] = ucfirst(humanize($page));
	        $recive_logs = $this->Account_model->recive_logs();
	        // $account_array=array();
	        // foreach ($recive_logs as $value) {
	        // 	$account_head = explode(',', $value->account);
	        	
	        // 	foreach ($account_head as $data) {
	        // 		$account_head_data = $this->Account_model->account_head_data($data);
	        // 		array_push($account_array, $account_head_data);
	        // 	}
	        // }

	        // print_r($account_array);exit();


	        $this->load->view('accounce/includs/header_link', $data);
	        $this->load->view('accounce/includs/navigation', $data);
	        $this->load->view('accounce/includs/header', $data);
	        $this->load->view('accounce/'.$page, compact("recive_logs") );
	        $this->load->view('accounce/includs/footer', $data);
	        $this->load->view('accounce/includs/footer_link', $data);
	}

	function unpaid_logs($page='unpaid_logs'){
		if ( ! file_exists(APPPATH.'views/accounce/'.$page.'.php'))
	        {
	            redirect('404_override');
	        }

	        $data['title'] = ucfirst(humanize($page));
	        $unpaid_logs = $this->Account_model->unpaid_logs();

	        $this->load->view('accounce/includs/header_link', $data);
	        $this->load->view('accounce/includs/navigation', $data);
	        $this->load->view('accounce/includs/header', $data);
	        $this->load->view('accounce/'.$page, compact("unpaid_logs") );
	        $this->load->view('accounce/includs/footer', $data);
	        $this->load->view('accounce/includs/footer_link', $data);
	}

	function invoice_st_cng($id){
		$unpaids = $this->Account_model->get_unpaid_logs($id);
		foreach ($unpaids as $value) {
			$inv_id = $value->inv_id;
			$this->Account_model->invoice_st_cng($inv_id);
		}
		
		redirect ('account_dashboard');
	}

	function payment_pay($page='payment_pay'){
		if ( ! file_exists(APPPATH.'views/accounce/'.$page.'.php'))
	        {
	            redirect('404_override');
	        }

	        $data['title'] = ucfirst(humanize($page));
	        $account_head_expence = $this->Account_model->account_head_expence();

	        $this->load->view('accounce/includs/header_link', $data);
	        $this->load->view('accounce/includs/navigation', $data);
	        $this->load->view('accounce/includs/header', $data);
	        $this->load->view('accounce/'.$page, compact("account_head_expence"));
	        $this->load->view('accounce/includs/footer', $data);
	        $this->load->view('accounce/includs/footer_link', $data);
	}

	function add_payment_pay($page='payment_pay'){
		$this->form_validation->set_rules('title', 'Title', 'required');
		$this->form_validation->set_rules('account', 'Account', 'callback_select_account');
		$this->form_validation->set_rules('amount', 'Amount', 'required');
		$this->form_validation->set_rules('pay_method', 'Payment method', 'callback_select_pay_method');
		

		if ($this->form_validation->run() == FALSE){
			if ( ! file_exists(APPPATH.'views/accounce/'.$page.'.php'))
	        {
	            redirect('404_override');
	        }

	        $data['title'] = ucfirst(humanize($page));
	        $account_head_expence = $this->Account_model->account_head_expence();

	        $this->load->view('accounce/includs/header_link', $data);
	        $this->load->view('accounce/includs/navigation', $data);
	        $this->load->view('accounce/includs/header', $data);
	        $this->load->view('accounce/'.$page, compact("account_head_expence"));
	        $this->load->view('accounce/includs/footer', $data);
	        $this->load->view('accounce/includs/footer_link', $data);
		}else{
			$post = $this->input->post();
			$this->Account_model->add_payment_pay($post);
			redirect('account_dashboard');
		}
	}

	function pay_logs($page='pay_logs'){
		if ( ! file_exists(APPPATH.'views/accounce/'.$page.'.php'))
	        {
	            redirect('404_override');
	        }

	        $data['title'] = ucfirst(humanize($page));
	        $payment_logs = $this->Account_model->payment_logs();

	        $this->load->view('accounce/includs/header_link', $data);
	        $this->load->view('accounce/includs/navigation', $data);
	        $this->load->view('accounce/includs/header', $data);
	        $this->load->view('accounce/'.$page, compact("payment_logs"));
	        $this->load->view('accounce/includs/footer', $data);
	        $this->load->view('accounce/includs/footer_link', $data);
	}

	function accounce_head($page='accounce_head'){
		if ( ! file_exists(APPPATH.'views/accounce/'.$page.'.php'))
	        {
	            redirect('404_override');
	        }

	        $data['title'] = ucfirst(humanize($page));
			$heads = $this->Account_model->acc_head_data();

	        $this->load->view('accounce/includs/header_link', $data);
	        $this->load->view('accounce/includs/navigation', $data);
	        $this->load->view('accounce/includs/header', $data);
	        $this->load->view('accounce/'.$page, compact("heads"));
	        $this->load->view('accounce/includs/footer', $data);
	        $this->load->view('accounce/includs/footer_link', $data);
	}

	function insert_acc_head(){

		$post = $this->input->post();
		$acc_head = $this->Account_model->insert_acc_head($post);

		$this->accounce_head();
	}

	function head_status($id){
		$this->Account_model->head_status($id);
		redirect('accounce_head');
	}

	function invoice($bill_data,$page='invoice'){
		if ( ! file_exists(APPPATH.'views/accounce/'.$page.'.php'))
	        {
	            redirect('404_override');
	        }

	        $data['title'] = ucfirst(humanize($page));
	        $school_info = $this->Admin_model->school_info();

	        $this->load->view('accounce/includs/header_link', $data);
	        $this->load->view('accounce/'.$page, compact("school_info","bill_data"));
	        $this->load->view('accounce/includs/footer_link', $data);
	}

	function salary($page='salary'){
		if ( ! file_exists(APPPATH.'views/accounce/'.$page.'.php'))
	        {
	            redirect('404_override');
	        }

	        $data['title'] = ucfirst(humanize($page));
	        $school_info = $this->Admin_model->school_info();

	        $this->load->view('accounce/includs/header_link', $data);
	        $this->load->view('accounce/'.$page, compact("school_info"));
	        $this->load->view('accounce/includs/footer_link', $data);
	}
}	