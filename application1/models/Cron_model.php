<?php
	defined('BASEPATH') OR exit('No direct script access allowed');

	class Cron_model extends CI_Model {

		function __construct(){
			parent::__construct();
		}

		function entry_logs($sms_data){
			$machine_query = $this->db->get('entry_log');
			$machine_query_result = $machine_query->last_row();
			$start_time = $machine_query_result->sync_time;

			$dt = new DateTime();
			$end_time = $dt->format('Y-m-d H:i:s');

			$device_id = "86b2-20a0-c5fd-e094-5294-4db1-eacd-a0c0-dd72-ee5c-84b5-eff2-ba0c-24c7-eced-bf7a";	
			$var='start='.$start_time.'&end='.$end_time.'&api_token='.$device_id.'&per_page=500';
			
			$api = 'http://api-inovace360.com/api/v1/logs?';

			$curl_handle = curl_init();  
		    curl_setopt($curl_handle, CURLOPT_URL, $api.$var);  
		    curl_setopt($curl_handle, CURLOPT_RETURNTRANSFER, 1); 
		    $entry_logs = curl_exec($curl_handle);  
		    curl_close($curl_handle);

			$response_data = json_decode($entry_logs,true);

			if(isset($response_data['data']) && count($response_data['data']) > 0){
				foreach ($response_data['data'] as $key=>$value){
					$user_id = $value['secondary_display_text'];
					$id_card_num = $value['rfid'];
					$logged_time = $value['logged_time'];
					$sync_time = $value['sync_time'];

					$query = $this->db->get_where('entry_log', array(
					'user_id' => $user_id
					));
					$result = $query->last_row();
					if ($result==null) {
						$last_log_date_time = "2018-02-26 20:39:00";
					} else {
						$last_log_date_time = $result->logged_time;
					}

					$fields = array(
						'user_id' => $user_id,
						'id_card_number' => $id_card_num,
						'logged_time' => $logged_time,
						'sync_time' => $sync_time
					);
					$this->db->insert('entry_log', $fields);
					
	        		

	        		$last_log_date_time_n =  new DateTime($last_log_date_time);
	        		$last_log_date = $last_log_date_time_n->format('Y-m-d ');
	        		$unix_last_log_date_time = strtotime($last_log_date);

	        		$logged_time_n =  new DateTime($logged_time);
	        		$today_log_date = $logged_time_n->format('Y-m-d ');
	        		$unix_today_log_date_time = strtotime($today_log_date);
	        		
	        		$datediff = $unix_last_log_date_time - $unix_today_log_date_time;
					$difference = floor($datediff/(60*60*24));
					if($difference==0){
					    // echo 'Today';
					 }else{
					    // echo 'Yesterday';

						$query = $this->db->get_where('student_info', array(
							's_id' => $user_id
							));
						$result = $query->last_row();

						if ($result!=null) {

							// $s_f_name = $result->s_f_name;
							// $contact_num = $result->fat_mobile;
							// $message = $s_f_name.' '.$sms_data->sms_entry_text.' '.$logged_time;
							// $user_name = $sms_data->user_name;
	      //   				$password = $sms_data->password;
	      //   				$sender = $sms_data->sender;
							// $sms_text = urlencode($message);
							// $number =$contact_num; 	
							// $api = 'http://api.zaman-it.com/api/v3/sendsms/plain?';
							// $var='user='.$user_name.'&password='.$password.'&sender='.$sender.'&SMSText='.$sms_text.'&GSM='.$number.'&type=longSMS';
							
							// $curl_handle = curl_init();  
						 //    curl_setopt($curl_handle, CURLOPT_URL, $api.$var);  
						 //    curl_setopt($curl_handle, CURLOPT_RETURNTRANSFER, 1); 
						 //    $buffer = curl_exec($curl_handle);  
						 //    curl_close($curl_handle);
						 //    return true;
						}
					 } 

					
				}
			}
			return TRUE;
		}

		function cron_daily_logs($sms_data)
		{
        		$student_info = $this->db->get('student_info');
				$daily_logs = $student_info->result();

				foreach ($daily_logs as $value) {
					$user_id = $value->s_id;
	                $first_name = $value->s_f_name;
	                $s_class = $value->s_class;
	                $s_section = $value->s_section;

	                $date = new DateTime("now");
					$curr_date = $date->format('Y-m-d ');

            		$daily_logs = $this->db->get_where('entry_log', array(
							'DATE(logged_time)' => $curr_date,
							'user_id' => $value->s_id
						));

            		$result = $daily_logs->first_row();
            		if ( !$result == 0 ) {
            			$entry_time = $result->logged_time;
            		} else {
            			$entry_time = "Absent";
            		}

            		$date = new DateTime("now");
					$curr_date = $date->format('Y-m-d ');

            		$daily_logs = $this->db->get_where('entry_log', array(
							'DATE(logged_time)' => $curr_date,
							'user_id' => $value->s_id
						));

            		$result = $daily_logs->last_row();
            		if ( !$result == 0 ) {
            			$exit_time = $result->logged_time;
            		} else {
            			$exit_time = "Absent";
            		}

            		if($entry_time == $exit_time){
            			$exit_time = "Absent";
            		}

            		$daily_logs_find = $this->db->get_where('daily_logs', array(
							'DATE(entry_time)' => $curr_date,
							's_id' => $value->s_id
						));

            		$daily_logs_find_result = $daily_logs_find->num_rows();

            		if ($daily_logs_find_result > 0) {

            			return true;
            			
            		}elseif ($daily_logs_find_result < 1) {
            			
            			$fields = array(
							's_id' => $user_id,
							's_name' => $first_name.' '.@$nick_name,
							's_class' => $s_class,
							's_section' => $s_section,
							'entry_time' => $entry_time,
							'exit_time' => $exit_time
						);

						$this->db->insert('daily_logs', $fields);

						$query = $this->db->get_where('student_info', array(
								's_id' => $user_id
								));
						$result = $query->first_row();
						// $s_f_name = $result->s_f_name;
						// $contact_num = $result->fat_mobile;
						// $message = $s_f_name.' '.$sms_data->sms_entry_text.$exit_time;

						// $user_name = $sms_data->user_name;
	    	// 			$password = $sms_data->password;
	    	// 			$sender = $sms_data->sender;
						// $sms_text = urlencode($message);
						// $number =$contact_num; 	
						// $api = 'http://api.zaman-it.com/api/v3/sendsms/plain?';
						// $var='user='.$user_name.'&password='.$password.'&sender='.$sender.'&SMSText='.$sms_text.'&GSM='.$number.'&type=longSMS';
						
						// $curl_handle = curl_init();  
					 //    curl_setopt($curl_handle, CURLOPT_URL, $api.$var);  
					 //    curl_setopt($curl_handle, CURLOPT_RETURNTRANSFER, 1); 
					 //    $buffer = curl_exec($curl_handle);  
					 //    curl_close($curl_handle);
						// return true;
					}
            	}
		}
}