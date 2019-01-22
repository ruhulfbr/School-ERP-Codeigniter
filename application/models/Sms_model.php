<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Sms_model extends CI_Model {

	function __construct(){
		parent::__construct();
	}

	function sms_data(){
		$query = $this->db->get('sms');
		return $query->last_row();
	}

	function sms_balence($sms_data){
        $user_name = @$sms_data->user_name;
        $password = @$sms_data->password;
        $api = 'http://api.zaman-it.com/api/command?';
        $var = 'username='.$user_name.'&password='.$password.'&cmd=Credits';

        $curl_handle = curl_init();  
	    curl_setopt($curl_handle, CURLOPT_URL, $api.$var);  
	    curl_setopt($curl_handle, CURLOPT_RETURNTRANSFER, 1); 
	    $buffer = curl_exec($curl_handle);  
	    curl_close($curl_handle);

	    $result = explode(".",$buffer);

	    $first = true;
		foreach ($result as $key => $value) {

		    if ( $first ){
		        $balence = $value;
		        $first = false;
		    }
		}

		$sms_available = $balence / $sms_data->sms_rate;
		return $sms_available;

	}

	function send_sms($post,$sms_data){
		$user_name = @$sms_data->user_name;
        $password = @$sms_data->password;
        $sender = $sms_data->sender;
		// $lng = $this->input->post('lng');
		$receiver = $this->input->post('receiver');
		$sms_text = urlencode($this->input->post('message_body'));

		if ($receiver==1) {
			$all_student_num = $this->Student_model->all_student_info();
			foreach ($all_student_num as $key => $value) {
				$number = $value->fat_mobile;
				// $api = 'http://api.zaman-it.com/api/v3/sendsms/plain?';
				// $var='user='.$user_name.'&password='.$password.'&sender='.$sender.'&SMSText='.$sms_text.'&GSM='.$number.'&type=longSMS';

		  //       $curl_handle = curl_init();  
			 //    curl_setopt($curl_handle, CURLOPT_URL, $api.$var);  
			 //    curl_setopt($curl_handle, CURLOPT_RETURNTRANSFER, 1); 
			 //    $buffer = curl_exec($curl_handle);  
			 //    curl_close($curl_handle);
			}
			return true;
		} elseif ($receiver==2) {
			$all_teacher_num = $this->Teacher_and_staff_model->view();
			foreach ($all_teacher_num as $key => $value) {
				$number = $value->t_phone;
				// $api = 'http://api.zaman-it.com/api/v3/sendsms/plain?';
				// $var='user='.$user_name.'&password='.$password.'&sender='.$sender.'&SMSText='.$sms_text.'&GSM='.$number.'&type=longSMS';

		  //       $curl_handle = curl_init();  
			 //    curl_setopt($curl_handle, CURLOPT_URL, $api.$var);  
			 //    curl_setopt($curl_handle, CURLOPT_RETURNTRANSFER, 1); 
			 //    $buffer = curl_exec($curl_handle);  
			 //    curl_close($curl_handle);
			}
			return true;
		} elseif ($receiver==3) {
			$number = $this->input->post('number');
			$api = 'http://api.zaman-it.com/api/v3/sendsms/plain?';
			$var='user='.$user_name.'&password='.$password.'&sender='.$sender.'&SMSText='.$sms_text.'&GSM='.$number.'&type=longSMS';

	        $curl_handle = curl_init();  
		    curl_setopt($curl_handle, CURLOPT_URL, $api.$var);  
		    curl_setopt($curl_handle, CURLOPT_RETURNTRANSFER, 1); 
		    $buffer = curl_exec($curl_handle);  
		    curl_close($curl_handle);
		    return true;
		}
	}

}