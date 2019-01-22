<?php
defined('BASEPATH') OR exit('No direct script access allowed');
/**
* 
*/
class Online_admission_model extends CI_Model
{
	# Admission_time_date Start
	public function admission_time_date_insert($post)
	{
		$this->db->insert('admission_time_date', $post);

        
	}

	public function get_admission_time_date($id = FALSE)
    {
    	if ($id === FALSE)
    	{
	        $query = $this->db->get('admission_time_date');
	        return $query->result_array();
    	}
		    $query = $this->db->get_where('admission_time_date', array('id' => $id));
		    return $query->row_array();
    }

    public function admission_time_date_delete($id = NULL)
    {
    	$this->db->delete('admission_time_date', array('id' => $id));

    	if ( $id === FALSE ) {
    		return FALSE;
    	}
    	else
    	{
    		return TRUE;
    	}
    }

	public function admission_time_date_update($id = FALSE)
    {
		$data = array();
        $data['class_name'] = $this->input->post('class_name', true);
        $data['admission_date'] = $this->input->post('admission_date', true);
        $data['admission_time_start'] = $this->input->post('admission_time_start', true);
        $data['admission_time_end'] = $this->input->post('admission_time_end', true);

        if ($id === FALSE)
    	{
	        $query = $this->db->get('admission_time_date');
	        return $query->result_array();
    	}
		    $this->db->where('id', $id);
    		$this->db->update('admission_time_date', $data);
    }
    # Admission_time_date End

	# Admission_exam_date Start
	public function admission_exam_date_insert($data)
	{
		$this->db->insert('admission_exam_date', $data);
	}

	public function get_admission_exam_date($id = FALSE)
    {
    	if ($id === FALSE)
    	{
	        $query = $this->db->get('admission_exam_date');
	        return $query->result_array();
    	}
		    $query = $this->db->get_where('admission_exam_date', array('id' => $id));
		    return $query->row_array();
    }

    public function admission_exam_date_delete($id = NULL)
    {
    	$this->db->delete('admission_exam_date', array('id' => $id));

    	if ( $id === FALSE ) {
    		return FALSE;
    	}
    	else
    	{
    		return TRUE;
    	}
    }

	public function admission_exam_date_update($id = FALSE)
    {
        $data = array();
        $data['class_name'] = $this->input->post('class_name', true);
        $data['admission_exam_date'] = $this->input->post('admission_exam_date', true);
        $data['admission_exam_time_start'] = $this->input->post('admission_exam_time_start', true);
        $data['admission_exam_time_end'] = $this->input->post('admission_exam_time_end', true);

        if ($id === FALSE)
    	{
	        $query = $this->db->get('admission_exam_date');
	        return $query->result_array();
    	}
		    $this->db->where('id', $id);
    		$this->db->update('admission_exam_date', $data);
    }

    public function admission_test_data(){
        $query = $this->db->get('admission_time_date');
        return $query->result();
    }

    public function get_applicant_data(){
        $query = $this->db->get('online_admission');
        return $query->result();
    }

    public function applicant_data_view($id)
    {
        $query = $this->db->get_where('online_admission', array('id' => $id));
        return $query->first_row();
    }

    public function applicant_decision()
    {
        $id = $this->input->get('id');
        $decision = $this->input->get('decision');

        $this->db->where('id', $id);
        $this->db->update('online_admission', array('status' => $decision));
    }

    public function get_approved_application()
    {
        $query = $this->db->get_where('online_admission', array('status' => '1','notified' => '0'));
        return $query->result();
    }

    public function notified($post) //Here need work for SMS
    {
        foreach ($post as $id) {
            $this->db->where('id', $id);
            $this->db->update('online_admission', array('notified' => '1'));
        }
        return TRUE;
    }

    function insert_applicant_data($post){
        $curent_image = $_FILES["file"]["name"];
            
        if (!empty($curent_image)) {

            $image_name = $post['mobile'];
            $config['upload_path']          = './resource/uploaded_data/';
            $config['allowed_types']        = 'jpg|png|JPG';
            $config['max_size']             = 5000;
            $config['max_width']            = 1024;
            $config['max_height']           = 768;
            $config['file_name']            = $image_name;

            $this->load->library('upload', $config);

            if ( ! $this->upload->do_upload('file'))
            {
                return FALSE;
            }else{

                $upload_data = $this->upload->data();
                $file_ext = $upload_data['file_ext'];
            }
        }

        $fields = array(
                'ad_group' => $post['ad_group'],
                'Subj4' => $post['Subj4'],
                'Subj5' => $post['Subj5'],
                'Subj6' => $post['Subj6'],
                'optional' => $post['optional'],
                'name' => $post['name'],
                'gender' => $post['gender'],
                'bloodgroup' => $post['bloodgroup'],
                'religion' => $post['religion'],
                'nationality' => $post['nationality'],
                'dob' => $post['dob'],
                'mobile' => $post['mobile'],
                'quota' => $post['quota'],
                'father' => $post['father'],
                'mother' => $post['mother'],
                'father_profession' => $post['father_profession'],
                'mother_profession' => $post['mother_profession'],
                'father_nationalID' => $post['father_nationalID'],
                'mother_nationalID' => $post['mother_nationalID'],
                'gmobile' => $post['gmobile'],
                'email' => $post['email'],
                'postOffice' => $post['postOffice'],
                'annualincome' => $post['annualincome'],
                'localguardian' => $post['localguardian'],
                'localguardian_district' => $post['localguardian_district'],
                'yourrelation' => $post['yourrelation'],
                'thana_upojela' => $post['thana_upojela'],
                'mobileOfLG' => $post['mobileOfLG'],
                'homeaddress' => $post['homeaddress'],
                'nameOfExam' => $post['nameOfExam'],
                'examroll' => $post['examroll'],
                'passingYear' => $post['passingYear'],
                'registrationNo' => $post['registrationNo'],
                'board' => $post['board'],
                'GPA' => $post['GPA'],
                'file' => $post['mobile'].$file_ext
            );

        $this->db->insert('online_admission', $fields);

        return $fields;
    }

    function get_final_application(){
        $query = $this->db->get_where('online_admission', array('status' => '1','notified' => '1'));
        return $query->result();
    }

    function subj4($postData){
        $response = array();
        
        $query = $this->db->get_where('subject_admission_4', array('group_id_4' => $postData['sub_group_4']));
        $response = $query->result_array();

        return $response;
    }

    function subj5($postData){
        $response = array();
        
        $query = $this->db->get_where('subject_admission_5', array('group_id_5' => $postData['sub_group_5']));
        $response = $query->result_array();

        return $response;
    }

    function subj6($postData){
        $response = array();
        
        $query = $this->db->get_where('subject_admission_6', array('group_id_6' => $postData['sub_group_6']));
        $response = $query->result_array();

        return $response;
    }

    function subj7($postData){
        $response = array();
        
        $query = $this->db->get_where('subject_admission_7', array('group_id_7' => $postData['sub_group_7']));
        $response = $query->result_array();

        return $response;
    }
}