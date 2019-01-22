<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User_role_model extends CI_Model {

	function __construct(){
		parent::__construct();
	}

	function student_search_role($post){
		$class_id = $post['class'];
		$section_id = $post['section'];

		$this->db->select('*');
		$this->db->from('student_info');
		$this->db->where(array('s_class' => $class_id, 's_section' => $section_id));
		$this->db->join('class', 'student_info.s_class = class.id');
		$this->db->join('section', 'student_info.s_section = section.id');
		$student_info = $this->db->get();
		return $student_info->result();
	}

	function access_restore($id){
		$pass = sha1('12345');
		$this->db->where(array('s_id' => $id));
		$this->db->update('student_info', array('pass' => $pass));
		return true;
	}

}