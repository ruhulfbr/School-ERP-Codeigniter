<?php
	defined('BASEPATH') OR exit('No direct script access allowed');

	class Machine_model extends CI_Model {

		function __construct(){
			parent::__construct();
		}

		function data_from_machin(){

			$f_machine = $this->db->get('machine_log');
			$machine_l_r = $f_machine->last_row();
			$l_syn_time = @$machine_l_r->sync_time;

			$dt = new DateTime();
			$start_time = $l_syn_time;
			$end_time = $dt->format('Y-m-d H:i:s');
			$device_id = "15ba-5cd8-129e-499d-28f5-676c-d929-9c02-15b1-82ea-7b0d-080c-93c3-cb9c-7e01-427d";	
			$var="start=$start_time&end=$end_time&api_token=$device_id";
			
			$curl=	curl_init('http://api-inovace360.com/api/v1/logs?');
				    curl_setopt($curl, CURLOPT_POST, true);
					curl_setopt($curl, CURLOPT_POSTFIELDS, $var);
					curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
					$result= curl_exec($curl);
					curl_close($curl);

			$response_data= json_decode($curl,true);

			if(isset($response_data['data']) && count($response_data['data']) > 0){
			    foreach ($response_data['data'] as $key=>$value){

			        $logged_time = $value['logged_time'];
			        $syn_time = $value['sync_time'];
			        $person_identifier = $value['secondary_display_text'];
			        $rfid = $value['rfid'];
			        $primary_display_text = $value['primary_display_text'];

        	$query = $this->db->get_where('machine_log', array('user_id' => $person_identifier));
        	$result = $query->last_row();
        	$p_logged_time = @$result->logged_time;

        	$n_p_logged_time =  new DateTime($p_logged_time);

        	$n_p_logged_time_w_t = $n_p_logged_time->format('Y-m-d');

        	$n_logged_time =  new DateTime($logged_time);

        	$n_logged_time_w_t = $n_logged_time->format('Y-m-d');
        	
			$current = strtotime($n_logged_time_w_t);
			$date    = strtotime($n_p_logged_time_w_t);

			$datediff = $date - $current;
			$difference = floor($datediff/(60*60*24));
			if($difference==0){
			$fields = array(
				'logged_time' => $logged_time,
				'sync_time' => $syn_time,
				'user_id' => $person_identifier,
				'id_card_num' => $rfid,
				'user_name' => $primary_display_text
			);

			$this->db->insert('machine_log', $fields);

			echo "Data Saved";
			}else{
			    $fields = array(
				'logged_time' => $logged_time,
				'sync_time' => $syn_time,
				'user_id' => $person_identifier,
				'id_card_num' => $rfid,
				'user_name' => $primary_display_text
			);

			$this->db->insert('machine_log', $fields);

			$u_name = "01906666111";
			$pass = "bd01906666111";
			$sender = "DBNLTD";
			$sms_text = "Dear%20Space";
			$number ="8801730974883"; 	
			$var="user=$u_name&password=$pass&sender=$sender&SMSText=$sms_text&GSM=$number&type=longSMS";
			
			$curl=curl_init('http://api.zaman-it.com/api/v3/sendsms/plain?');
				    curl_setopt($curl, CURLOPT_POST, true);
					curl_setopt($curl, CURLOPT_POSTFIELDS, $var);
					curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
					$result= curl_exec($curl);
					curl_close($curl);
			}}}else{
			    echo "No data found";
			}
		}

		function entry_logs(){
			$this->db->select('*');
    		$this->db->from('entry_log');
    		$this->db->join('student_info', 'entry_log.user_id = student_info.s_id');
    		$this->db->join('class', 'student_info.s_class = class.id');
		    $this->db->join('section', 'student_info.s_section = section.id');
    		$query = $this->db->get();
    		return $query->result();
		}

		function daily_logs_search($post){

			$from_date = $post['from_date'].' '."00:00:00";
			$to_date = $post['to_date'].' '."23:59:00";

			$this->db->select('*');
	        $this->db->from('daily_logs');
	        $this->db->where(' entry_time >= date("'.$from_date.'")');
			$this->db->where( 'entry_time <= date("'.$to_date.'")');
			$this->db->join('class', 'daily_logs.s_class = class.id');
		    $this->db->join('section', 'daily_logs.s_section = section.id');
			$query = $this->db->get();
			return $query->result();
		}

		function attendence_find($s_id,$from_date,$to_date){

			$this->db->select('*');
	        $this->db->from('daily_logs');
	        $this->db->where('s_id', $s_id);
	        $this->db->where(' entry_time >= date("'.$from_date.'")');
			$this->db->where( 'entry_time <= date("'.$to_date.'")');
			$this->db->join('class', 'daily_logs.s_class = class.id');
		    $this->db->join('section', 'daily_logs.s_section = section.id');
			$query = $this->db->get();
			return $query->result();
		}

		function entry_logs_search($from,$st_id){

			$this->db->select('*');
	        $this->db->from('entry_log');
	        $this->db->where('user_id', $st_id);
	        $this->db->where('DATE(logged_time)', $from);
	  		$query = $this->db->get();
			return $query->num_rows();
		}

		function attendence_time_first($from,$st_id){

			$query = $this->db->get_where('entry_log', array('user_id' => $st_id, 'DATE(logged_time)' => $from));
        	return $query->first_row();
		}

		function attendence_time_last($from,$st_id){

			$query = $this->db->get_where('entry_log', array('user_id' => $st_id, 'DATE(logged_time)' => $from));
        	return $query->last_row();
		}

		function teacher_entry_logs_search($from,$t_id){

			$this->db->select('*');
	        $this->db->from('entry_log');
	        $this->db->where('user_id', $t_id);
	        $this->db->where('DATE(logged_time)', $from);
	  		$query = $this->db->get();
			return $query->num_rows();
		}

		function today_attendence_search($today,$to_date,$student_id){

			$this->db->select('*');
	        $this->db->from('entry_log');
	        $this->db->where('user_id', $student_id);
	        $this->db->where('DATE(logged_time)', $today);
			$query = $this->db->get();
			return $query->num_rows();
		}

	}