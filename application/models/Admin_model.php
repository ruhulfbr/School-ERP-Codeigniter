<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin_model extends CI_Model {

	function __construct(){
		parent::__construct();
	}

	public function get_user_data()
	{
		$query = $this->db->get_where('user', array('id' => $this->session->userdata('current_user_id')));
        return $query->first_row();
	}

	public function update_user_data($post)
	{
		$new_password = sha1($this->input->post('new_password'));

		$fields = array(
			'full_name' => $post['full_name'],
			'pass' => $new_password
		);
		$this->db->where('id', $this->session->userdata('current_user_id'));
		$this->db->update('user', $fields);

		return true;
	}

	function insert_routine($post){
		$this->db->insert('routine', $post);

		return TRUE;
	}

	function get_routine($post){
		$day= $post['day'];
		$class=$post['class'];
		$section=$post['section'];

		$this->db->select('*');
		$this->db->from('routine');
		$this->db->where(array('class' => $class,'section' => $section,'day' => $day));
		// $this->db->join('subjects', 'subjects.id = results.sub_id');
		// $this->db->join('exam_term', 'exam_term.id = results.term_id');
		$query = $this->db->get();
		return $query->result();
	}

	public function get_section_name($id){
		$query = $this->db->get_where('section', array('class_id' => $id));
        return $query->result();
	}

	function school_info(){
		$query = $this->db->get('school_info');
		return $query->last_row();
	}

	function settings_insert($post){

		$school_infos = array(
				'name' => $post['name'],
				'address_1st_line' => $post['address_1st_line'],
				'address_2nd_line' => $post['address_2nd_line'],
				'phone' => $post['phone'],
				'logo' => "school_logo.png",
				'signature' => "signature.png",
				'bannar' => "banner.jpg"
			);
		$this->db->where(array('school_info_id' => $post['school_info_id']));
		$this->db->update('school_info', $school_infos);

		$sms_infos = array(
				'user_name' => $post['user_name'],
				'password' => $post['password'],
				'sms_rate' => $post['sms_rate'],
				'sms_entry_text' => $post['sms_entry_text'],
				'sms_exit_text' => $post['sms_exit_text']
			);
		$this->db->where(array('sms_id' => $post['sms_id']));
		$this->db->update('sms', $sms_infos);

		return true;

	}
}