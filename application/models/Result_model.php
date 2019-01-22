<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Result_model extends CI_Model {

	function __construct(){
		parent::__construct();
	}

	public function result_add($post){

	    $s_id = $this->input->post('s_id');
	    $term = $this->input->post('term');

	    $inde = $this->input->post('inde');

	    $count_ = count($inde);

	    for ($i=0; $i < $count_; $i++) { 

	        $subject_id = $this->input->post('subject_id'.$i);
	        $mark = $this->input->post('mark'.$i);

	        $fields = array(
	            's_id' => $s_id,
	            'term_id' => $term,
	            'sub_id' => $subject_id,
	            'mark' => $mark
	        );
	        $this->db->insert('results', $fields);

	    }
	    return TRUE;
	}

	public function get_result($term,$id){
		$this->db->select('*');
		$this->db->from('results');
		$this->db->where(array('term_id' => $term,'s_id' => $id));
		$this->db->join('subjects', 'subjects.subject_id = results.sub_id');
		// $this->db->join('result_calculation', 'subjects.subject_type = result_calculation.category');
		$this->db->join('exam_term', 'exam_term.exam_id = results.term_id');
		$query = $this->db->get();
		return $query->result();
	}

	public function result_update($post){

	    $s_id = $this->input->post('s_id');
	    $term = $this->input->post('term');

	    $inde = $this->input->post('inde');

	    $count_ = count($inde);

	    for ($i=0; $i < $count_; $i++) { 

	        $subject_id = $this->input->post('subject_id'.$i);
	        $mark = $this->input->post('mark'.$i);

	        $fields = array(
	            's_id' => $s_id,
	            'term_id' => $term,
	            'sub_id' => $subject_id,
	            'mark' => $mark
	        );

	        $data = array(
				'mark' => $mark
			);

			$this->db->where(array('s_id' => $s_id));
			$this->db->where(array('term_id' => $term));
			$this->db->where(array('sub_id' => $subject_id));
			$this->db->update('results', $data);

	    }
	    return TRUE;
	}

	function get_subject($cl){
		$query = $this->db->get_where('subjects', array('class_id' => $cl));
        return $query->result();
	}

	function term_data($term){
		$query = $this->db->get_where('exam_term', array('exam_id' => $term));
        return $query->first_row();
	}

	function result_check($id,$term){
		$query = $this->db->get_where('results', array('s_id' => $id,'term_id'=> $term));
        return $query->num_rows();
	}

	function result_delet($id){
		$this->db->where(array('result_id' => $id));
		$this->db->delete('results');
		return true;
	}

	function get_subject_data($val){
		$query = $this->db->get_where('subjects', array('subject_group' => $val));
        return $query->result();
	}
	function getFullMarksBySubjectGroupNo($val)
	{
		$query=$this->db->select('full_marks');
		$query=$this->db->get_where('subjects',array('subject_group'=>$val));
		return $query->result();
	}
	function get_group_result($term_id,$id,$subject_id){
		$query = $this->db->get_where('results', array('s_id' => $id,'term_id'=> $term_id,'sub_id'=> $subject_id));
		return $query->first_row();
	}

	function check_compolsary($val){
		$query = $this->db->get_where('subjects', array('subject_group' => $val));
        return $query->first_row();
	}

	public function teacher_result_add($post){

	    $subject_id = $this->input->post('subject_id');
	    $term = $this->input->post('term');

	    $indx = $this->input->post('indx');

	    $count_ = count($indx);

	    for ($i=0; $i < $count_; $i++) { 

	        $s_id = $this->input->post('student_id'.$i);
	        $mark = $this->input->post('mark'.$i);

	        $this->db->select('mark');
	        $this->db->from('results');
	        $this->db->where('s_id', $s_id);
	        $this->db->where('term_id', $term);
	        $this->db->where('sub_id', $subject_id);
			$query = $this->db->get();
			$ext_result = $query->num_rows();

			if ($ext_result>0) {
				$data = array(
					'mark' => $mark
				);

				$this->db->where(array('s_id' => $s_id));
				$this->db->where(array('term_id' => $term));
				$this->db->where(array('sub_id' => $subject_id));
				$this->db->update('results', $data);
			} else {
				$fields = array(
		            's_id' => $s_id,
		            'term_id' => $term,
		            'sub_id' => $subject_id,
		            'mark' => $mark
		        );

		        $this->db->insert('results', $fields);
			}
		}
	    return TRUE;
	}

	// function ext_result_check($stu_id,$term,$subj){
	// 	echo $stu_id;
	// 	echo $term;
	// 	echo $subj;exit();
	// }
}