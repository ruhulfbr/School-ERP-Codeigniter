<?php
	defined('BASEPATH') OR exit('No direct script access allowed');

	class Login_model extends CI_Model {

		function __construct(){
			parent::__construct();
		}

		function is_user_logged_in()
		{
			$ses_data = $this->session->all_userdata('user_data');
			return $user_roll = @$ses_data['current_user_id'] != FALSE;
			
		}

		function check_admin(){
			if ($this->session->userdata('user_roll')==1) {
				return TRUE;
			} else {
				return FALSE;
			}
			
		}

		function login_check($post){

			$u_name = $this->input->post('u_name');
			$password = $this->input->post('pass');

			$pass = sha1($password);
			
			$attr = array
			(
				'u_name' => $u_name,
				'pass' => $pass
			);

			$query = $this->db->get_where('user', $attr);

			if ( $query->num_rows() == 1 ) {
        		
        		$db_pass = $query->row(3)->pass;
        		$roll = $query->row(4)->roll;

	        	if ($db_pass == $pass) {
	        		$user_data = array
					(
						'current_user_id' => $query->row(0)->id,
						'name' => $query->row(1)->full_name,
						'current_user_name' => $query->row(2)->u_name,
						'user_roll' => $query->row(3)->roll,
						'avatar' => $query->row(4)->avatar
					);

					$this->session->set_userdata($user_data);

					return TRUE;
	        	} else {
	        		return FALSE;
	        	}
        	}else{
        		$student = array
				(
					's_id' => $u_name,
					'pass' => $pass
				);
        		$query = $this->db->get_where('student_info', $student);
        		if ( $query->num_rows() == 1 ) {
        		
	        		$db_pass = $query->row(15)->pass;
	        		$roll = 3;

		        	if ($db_pass == $pass) {
		        		$user_data = array
						(
							'current_user_id' => $query->row(2)->s_id,
							'student_class_id' => $query->row(3)->s_class,
							'name' => $query->row(1)->s_f_name,
							'user_roll' => $roll,
							'avatar' => $query->row(14)->s_image
						);

						$this->session->set_userdata($user_data);

						return TRUE;
		        	} else {
		        		return FALSE;
		        	}
	        	}else{
	        		$teacher = array
					(
						'teacher_id' => $u_name,
						't_password' => $pass
					);
	        		$query = $this->db->get_where('teacher', $teacher);
	        		if ( $query->num_rows() == 1 ) {
	        		
		        		$db_pass = $query->row(9)->t_password;
		        		$roll = 2;

			        	if ($db_pass == $pass) {
			        		$user_data = array
							(
								'current_user_id' => $query->row(1)->teacher_id,
								'name' => $query->row(2)->t_name,
								'user_roll' => $roll,
								'avatar' => $query->row(10)->t_image_path
							);

							$this->session->set_userdata($user_data);

							return TRUE;
			        	} else {
			        		return FALSE;
			        	}
			        }
	        	}
        	}
		}
	}