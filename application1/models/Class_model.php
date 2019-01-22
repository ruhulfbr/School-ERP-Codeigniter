<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Class_model extends CI_Model{

	function __construct(){
		parent::__construct();
	}

	public function view(){
		$class = $this->db->get('class');
		return $class->result();
	}

	public function section_data(){
		$section = $this->db->get('section');
		return $section->result();
	}

	public function subject_info(){
		$subjects = $this->db->get('subjects');
		return $subjects->result();
	}
	
	public function teacher(){
		$teacher = $this->db->get('teacher');
		$teacher_data = $teacher->result();
		return $teacher_data;
	}

	public function teacher_info($teacher_id){
		$this->db->select('teacher_name');
	    $this->db->from('teacher');
	    $this->db->where('teacher_id ', $teacher_id);
	    $query = $this->db->get();
	    $teacher_info = $query->result();
		return $teacher_info;
	}

	public function insert_class($post)
	{
		$teacher_id = $this->input->post('class_teacher');

		$fields = array(
			'class_name' => $post['class_name'],
			'class_teacher' => $post['class_teacher']
		);
		$this->db->insert('class', $fields);

		return TRUE;
	}

	public function insert_section($post)
	{
		$fields = array(
			'class_id' => $post['class'],
			'section_name' => $post['section_name'],
			'section_limit' => $post['section_limit']
		);
		$this->db->insert('section', $fields);

		return TRUE;
	}

	public function get_section($cl){
		$query = $this->db->get_where('section', array('class_id' => $cl));
        return $query->result();
	}

	// Get cities
    function getClass(){

        $response = array();
        
        // Select record
        $this->db->select('*');
        $q = $this->db->get('class');
        $response = $q->result_array();

        return $response;
    }

    function get_t_Class(){
    	$response = array();
        $this->db->select('*');
		$this->db->from('teacher_class');
		$this->db->where(array('teacher_id' => $this->session->userdata('current_user_id')));
		$this->db->join('class', 'class.id = teacher_class.t_class_id');
		$query = $this->db->get();
		$response = $query->result_array();
		return $response;
    }

    // Get Section
    function getSection($postData){
        $response = array();
        
        // Select record
        $query = $this->db->get_where('section', array('class_id' => $postData['class']));
        $response = $query->result_array();

        return $response;
    }

	public function get_section_data($data){
		$query = $this->db->get_where('section', array('id' => $data));
        return $query->result();
	}

    // Get Term
    function getTerm($postData){
        $response = array();
        
        // Select record
        $this->db->select('exam_id,class_id,term_name,year');
        $this->db->where('class_id', $postData['term']);
        $q = $this->db->get('exam_term');
        $response = $q->result_array();

        return $response;
    }

	public function section_update($post){

		$fields = array(
			'section_name' => $post['section_name'],
			'section_limit' => $post['section_limit'],
			'student_number' => $post['student_number']
		);

		$this->db->where('id', $post['id']);
		$this->db->update('section', $fields);

		return true;

	}

	public function class_edit($id){
		$query = $this->db->get_where('class', array('id' => $id));
        return $query->result();
	}

	public function class_update($post){

		$fields = array(
			'class_id' => $post['class_id'],
			'class_name' => $post['class_name'],
			'class_teacher' => $post['class_teacher']
		);

		$this->db->where('id', $post['id']);
		$this->db->update('class', $fields);

		return true;

	}

	public function insert_subject($post){
		$fields = array(
			'class_id' => $post['class'],
			'subject_name' => $post['subject_name'],
			'subject_type' => $post['subject_type'],
			'full_marks' => $post['full_marks'],
			'sub_mark' => $post['sub_mark'],
			'subject_group' => $post['subject_group']
		);
		$this->db->insert('subjects', $fields);

		return TRUE;
	}

	public function subjects(){
		$this->db->select('*');
		$this->db->from('subjects');
		$this->db->join('class', 'subjects.class_id = class.id');
		$query = $this->db->get();
		return $query->result();
		
	}

	public function subject_data($id){

		$query = $this->db->get_where('subjects', array('id' => $id));
        return $query->result();

	}

	public function update_subject($post){
		$fields = array(
			'subject_code' => $post['subject_code'],
			'subject_name' => $post['subject_name'],
			'class' => $post['class'],
			'teacher' => $post['class_teacher']
		);

		$this->db->where('id', $post['id']);
		$this->db->update('subjects', $fields);

		return true;
	}

	public function get_subjects($cl){
		$query = $this->db->get_where('subjects', array('class_id' => $cl));
        return $query->result();
	}

	function exam_data(){
		$this->db->select('*');
		$this->db->from('exam_term');
		$this->db->join('class', 'exam_term.class_id = class.id');
        $query = $this->db->get();
		return $query->result() ;
	}

	function get_subject($postData){
        $response = array();
        
        // Select record
        $this->db->select('*');
        $this->db->where('class_id', $postData['subject_id']);
        $q = $this->db->get('subjects');
        $response = $q->result_array();

        return $response;
    }

}