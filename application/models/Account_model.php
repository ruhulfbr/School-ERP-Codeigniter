<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Account_model extends CI_Model {

	function __construct(){
		parent::__construct();
	}

	function insert_acc_head($post){
		$this->db->insert('accounce_head', $post);
		return true;
	}

	function acc_head_data(){
		$accounce_head = $this->db->get('accounce_head');
		return $accounce_head->result();
	}

	function account_head_income(){
	    $this->db->select('*');
		$this->db->from('accounce_head');
		$this->db->where(array('acc_type' => '1'));
		$this->db->where(array('acc_status' => '1'));
		$query = $this->db->get();
		return $query->result();
	}


	function add_stu_payment($post){

		$account = $post['account'];

		$total_amount = $post['total_amount'];

		$arr = array();

		for ($i=0; count($account)> $i; $i++) { 

			for ($j=0; count($total_amount)> $j; $j++) { 
				$fields = array(
					'rec_category' => $post['rec_category'],
					'inv_num' => $post['inv_num'],
					'curr_date' => $post['curr_date'],
					'class' => $post['class'],
					'section' => $post['section'],
					'student' => $post['student'],
					'status' => $post['status'],
					'title' => $post['title'],
					'account' => $account[$j],
					'total_amount' => $total_amount[$j],
					'pay_method' => $post['pay_method'],
					'description' => $post['description'],
					'identity' => @$post['identity'],
					'date' => $post['date']
				);
				$insert = $this->db->insert('receive_payment', $fields);
					
			}

			if ($account[$i] != @$total_amount[$j]) {
					break;
			}
		}
		
		return $insert;
	}


	function unpaid_logs(){
		$this->db->select('*');
		$this->db->from('receive_payment');
		$this->db->where(array('status' => 'Unpaid'));
		$this->db->group_by('inv_num');
		$this->db->join('accounce_head', 'receive_payment.account = accounce_head.head_id');
		$query = $this->db->get();
		return $query->result();
	}

	function get_unpaid_logs($id){
		$query = $this->db->get_where('receive_payment', array('inv_num' => $id));
        return $query->result();
	}

	function invoice_st_cng($inv_id){
		$final_date = date('d-m-y');
		$fields = array(
				'status' => 'Paid',
				'final_date' => $final_date
			);

		$this->db->where(array('inv_id' => $inv_id));
		$this->db->update('receive_payment', $fields);
		return true;
	}

	function recive_logs(){
		$this->db->select('*');
		$this->db->from('receive_payment');
		$this->db->where(array('status' => 'Paid'));
		$this->db->group_by('inv_num');
		$this->db->join('accounce_head', 'receive_payment.account = accounce_head.head_id');
		$query = $this->db->get();
		return $query->result();
	}

	function payment_logs(){
		$this->db->select('*');
		$this->db->from('payment');
		$this->db->join('accounce_head', 'payment.account = accounce_head.head_id');
		$query = $this->db->get();
		return $query->result();
	}

	function account_head_expence(){
		$this->db->select('*');
		$this->db->from('accounce_head');
		$this->db->where(array('acc_type' => '2'));
		$this->db->where(array('acc_status' => '1'));
		$query = $this->db->get();
		return $query->result();
	}

	function add_payment_pay($post){
		$this->db->insert('payment', $post);
		return true;
	}

	function head_status($id){
		$sql = "UPDATE accounce_head SET acc_status = IF(acc_status=1, 0, 1) WHERE head_id = $id";
		$this->db->query($sql);
		return true;
	}

	function invoice_details($post){
		$this->db->select('*');
        $this->db->from('receive_payment');
        $this->db->where('student',$post['student']);
        $this->db->where('curr_date',$post['curr_date']);
		$this->db->join('accounce_head', 'accounce_head.head_id = receive_payment.account');
		$this->db->join('student_info', 'student_info.s_id = receive_payment.student');
		$query = $this->db->get();
		return $query->result();
	}

}