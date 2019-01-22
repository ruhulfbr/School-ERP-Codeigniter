<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Student_role_model extends CI_Model {

	function __construct(){
		parent::__construct();
	}

	public function isAdmin()
	{
		$query = $this->db->get_where('user', array('id' => $this->session->userdata('current_user_id')));
        return TRUE;
	}

	public function term_data(){
		$query = $this->db->get_where('exam_term', array('class_id' => $this->session->userdata('student_class_id')));
		return $query->result();
	}

	function student_result(){
	// function student_result($term){
		// $query = $this->db->get_where('results', 
		// 	array(
		// 		's_id' => $this->session->userdata('current_user_id'),
		// 		'term_id' => $term
		// 	)
		// );
		// return $query->result();

		$data = array(
				's_section' => 9
			);

		$this->db->where(array('s_section' => 32));
		$this->db->update('student_info', $data);
	}
}