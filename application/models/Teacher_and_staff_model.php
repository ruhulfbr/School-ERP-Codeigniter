<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Teacher_and_staff_model extends CI_Model{

	function __construct(){
		parent::__construct();
	}

	public function view(){
		$teacher_view = $this->db->get('teacher');
		return $teacher_view->result();
	}

	public function insert_teacher_data($post)
	{
		$query = $this->db->get_where('teacher', array('teacher_id' => $post['teacher_id']));
        if ($query->num_rows() > 0){
        	$this->session->set_flashdata('error', 'Teacher ID must be unique.');
        	return FALSE;
	    }else{

	    	$curent_image = $_FILES["t_image_path"]["name"];
	        
	        if (!empty($curent_image)) {

			    $config['upload_path']          = './resource/teacher_and_staff_images/';
		        $config['allowed_types']        = 'jpg|png|JPG';
		        $config['max_size']             = 5000;
		        $config['max_width']            = 1024;
		        $config['max_height']           = 768;
		        $config['file_name']           	= $post['teacher_id'];

		        $this->load->library('upload', $config);

		        if ( ! $this->upload->do_upload('t_image_path'))
		        {
		        	$this->session->set_flashdata('error', 'Failed to upload image; Image format or resolution or size does not match.');
		        	return FALSE;
		        }else{

		        	$upload_data = $this->upload->data();
		        	$file_ext = $upload_data['file_ext'];
		        }
		    }else{
		    	$file_ext="_null";
		    }

		    foreach ($post['t_class'] as $value) {

		    	$fiel = array(
		    		'teacher_id' => $post['teacher_id'],
					't_class_id' => $value
				);

		    	$this->db->insert('teacher_class', $fiel);
		    }
		    
			$fields = array(
				't_name' => $post['t_name'],
				'teacher_id' => $post['teacher_id'],
				't_dob' => $post['t_dob'],
				't_sex' => $post['t_sex'],
				't_religion' => $post['t_religion'],
				't_blood_group' => $post['t_blood_group'],
				't_present_address' => $post['t_present_address'],
				't_phone' => $post['t_phone'],
				't_salary' => $post['t_salary'],
				't_image_path' => $post['teacher_id'].$file_ext
				);
			$this->db->insert('teacher', $fields);
			return true;
		}
	}

	public function update_teacher($post)
	{
		$pre_image = $post['prev_image'];

		$curent_image = $_FILES["t_image_path"]["name"];

		if (!empty($curent_image)) {
			if (file_exists(APPPATH.'../resource/teacher_and_staff_images/'.$pre_image))
	        {
	        	$path = APPPATH.'../resource/teacher_and_staff_images/'.$pre_image;
	            unlink($path);
	        }
		    $config['upload_path']          = './resource/teacher_and_staff_images/';
	        $config['allowed_types']        = 'jpg|png|JPG';
	        $config['max_size']             = 5000;
	        $config['max_width']            = 1024;
	        $config['max_height']           = 768;
	        $config['file_name']           	= $post['teacher_id'];

	        $this->load->library('upload', $config);

	        if ( ! $this->upload->do_upload('t_image_path'))
	        {
	            return FALSE;
	        }else{

	        	$upload_data = $this->upload->data();
	        	$file_ext = $upload_data['file_ext'];
	        }
	    }else{
			$ext= explode(".",$pre_image);
			foreach ($ext as $key => $value) {}
			$file_ext = '.'.$value;
		}
		
		$fields = array(
			't_name' => $post['t_name'],
			'teacher_id' => $post['teacher_id'],
			't_dob' => $post['t_dob'],
			't_sex' => $post['t_sex'],
			't_religion' => $post['t_religion'],
			't_blood_group' => $post['t_blood_group'],
			't_present_address' => $post['t_present_address'],
			't_phone' => $post['t_phone'],
			't_image_path' => $post['teacher_id'].$file_ext
			);
		$this->db->where(array('id' => $post['tt_id']));
		$this->db->update('teacher', $fields);

		return true;
	}

	public function teacher_view($id)
	{
		$query = $this->db->get_where('teacher', array('id' => $id));
        return $query->first_row();
	}

    public function teacher_data_delete($id = NULL)
    {
    	$this->db->delete('teacher', array('id' => $id));

    	if ( $id === FALSE ) {
    		return FALSE;
    	}
    	else
    	{
    		return TRUE;
    	}
    }

    public function teacher_num()
    {
    	$teacher_data = $this->db->get('teacher');
		return $teacher_data->num_rows();
    }

    public function teacher_data_view()
	{
		$query = $this->db->get_where('teacher', array('teacher_id' => $this->session->userdata('current_user_id')));
        return $query->first_row();
	}

}