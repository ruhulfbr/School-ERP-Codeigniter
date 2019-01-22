<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Student_model extends CI_Model {

	function __construct(){
		parent::__construct();
	}

	function insert($post){

		$query = $this->db->get_where('student_info', array('s_id' => $post['s_id']));
        if ($query->num_rows() > 0){
	        return FALSE;
	    }else{
	    	$curent_image = $_FILES["s_image"]["name"];
	        
	        if (!empty($curent_image)) {

		    	$image_name = $post['s_id'];
				$config['upload_path']          = './resource/student_images/';
		        $config['allowed_types']        = 'jpg|png|JPG';
		        $config['max_size']             = 5000;
		        $config['max_width']            = 1024;
		        $config['max_height']           = 768;
		        $config['file_name']           	= $image_name;

		        $this->load->library('upload', $config);

		        if ( ! $this->upload->do_upload('s_image'))
		        {
		            return FALSE;
		        }else{

		        	$upload_data = $this->upload->data();
		        	$file_ext = $upload_data['file_ext'];
		        }
	        }else{
		    	$file_ext="_null";
		    }
	  		// $Caracteres = '123456789';
			// $s_id = rand(0,$Caracteres);
			
			$fields = array(
				's_f_name' => $post['s_f_name'],
				's_id' => $post['s_id'],
				's_roll' => $post['s_roll'],
				's_class' => $post['class'],
				's_section' => $post['section'],
				'fat_name' => $post['fat_name'],
				'fat_mobile' => $post['fat_mobile'],
				'mot_name' => $post['mot_name'],
				'mot_mobile' => $post['mot_mobile'],
				's_dob' => $post['s_dob'],
				's_sex' => $post['s_sex'],
				's_reli' => $post['s_reli'],
				's_per_add' => $post['s_per_add'],
				's_image' => $post['s_id'].$file_ext
				);

			$this->db->insert('student_info', $fields);
			return true;
		}
	}

	function update($post){
		$image_name = $post['s_id'];
		$curent_image = $_FILES["s_image"]["name"];
		$prev_image = $post['prev_image'];

		if ($curent_image>0) {
			if (file_exists(APPPATH.'../resource/student_images/'.$prev_image))
	        {
	        	$path = APPPATH.'../resource/student_images/'.$prev_image;
	        	
	            unlink($path);
	        }
	    
		    $config['upload_path']          = './resource/student_images/';
	        $config['allowed_types']        = 'jpg|png|JPG';
	        $config['max_size']             = 5000;
	        $config['max_width']            = 1024;
	        $config['max_height']           = 768;
	        $config['file_name']           	= $image_name;

	        $this->load->library('upload', $config);

	        if ( ! $this->upload->do_upload('s_image'))
	        {
	            return FALSE;
	        }else{

	        	$upload_data = $this->upload->data();
	        	$file_ext = $upload_data['file_ext'];
	        }
		}else{
			$ext= explode(".",$prev_image);
			foreach ($ext as $key => $value) {}
			$file_ext = '.'.$value;
		}

		$fields = array(
				's_f_name' => $post['s_f_name'],
				's_id' => $post['s_id'],
				's_roll' => $post['s_roll'],
				's_class' => $post['class'],
				's_section' => $post['section'],
				'fat_name' => $post['fat_name'],
				'fat_mobile' => $post['fat_mobile'],
				'mot_name' => $post['mot_name'],
				'mot_mobile' => $post['mot_mobile'],
				's_dob' => $post['s_dob'],
				's_sex' => $post['s_sex'],
				's_reli' => $post['s_reli'],
				's_per_add' => $post['s_per_add'],
				's_image' => $post['s_id'].$file_ext
			);
		$this->db->where(array('st_id' => $post['id']));
		$this->db->update('student_info', $fields);

		return true;
	}

	public function student_num(){
		$student_data = $this->db->get('student_info');
		return $student_data->num_rows();
	}

	public function student_data($post){
		$class_id = $post['class'];
		$section_id = $post['section'];

		$this->db->select('*');
		$this->db->from('student_info');
		$this->db->where(array('s_class' => $class_id, 's_section' => $section_id));
		$this->db->order_by("s_roll", "asc");
		$this->db->join('class', 'student_info.s_class = class.id');
		$this->db->join('section', 'student_info.s_section = section.id');
		$query = $this->db->get();
		return $query->result();
	}

	public function student_info($id){

		$this->db->select('*');
		$this->db->from('student_info');
		$this->db->where(array('s_id' => $id));
		$this->db->join('class', 'student_info.s_class = class.id');
		$this->db->join('section', 'student_info.s_section = section.id');
		$query = $this->db->get();
		return $query->result() ;

	}

	function all_student_info(){
		$class = $this->db->get('student_info');
		return $class->result();
	}

	function exam_add($post){
		if ($post['class'] == 500) {
			$class = $this->db->get('class');
			$class_name = $class->result();
			foreach ($class_name as $key => $value) {
				$class_id = $value->id;
				$fields = array(
					'term_name' => $post['exam_name'],
					'year' => $post['year'],
					'exam_date' => $post['exam_date'],
					'class_id' => $class_id
					);

				$this->db->insert('exam_term', $fields);
			}return true;
		} else {
			$fields = array(
				'term_name' => $post['exam_name'],
				'year' => $post['year'],
				'exam_date' => $post['exam_date'],
				'class_id' => $post['class']
				);

			$this->db->insert('exam_term', $fields);
			return true;
		}
	}

	public function student_data_admit_card($cl,$sec){
		$class_id = $cl;
		$section_id = $sec;

		$this->db->select('*');
		$this->db->from('student_info');
		$this->db->where(array('s_class' => $class_id, 's_section' => $section_id));
		$this->db->join('class', 'student_info.s_class = class.id');
		$this->db->join('section', 'student_info.s_section = section.id');
		$query = $this->db->get();
		return $query->result();
	}

	function student_name($postData){
        $response = array();
        $this->db->select('s_id,s_f_name');
        $this->db->where('s_section', $postData['section_id']);
        $q = $this->db->get('student_info');
        $response = $q->result_array();

        return $response;
    }

    function insert_tc($postData){
    	$this->db->insert('ex_student', $postData);
    	// $this->db->delete('mytable', array('id' => $id));
		return true;
    }

    function ex_student(){
    	$this->db->select('*');
		$this->db->from('ex_student');
		$this->db->join('student_info', 'ex_student.student_id = student_info.s_id');
		$this->db->join('class', 'ex_student.class = class.id');
		$query = $this->db->get();
		return $query->result();
    }
}