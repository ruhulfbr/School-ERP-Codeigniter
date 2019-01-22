<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class Cron_controller extends CI_Controller {

	public function __construct()
	{
		parent::__construct();

		$this->load->model(array('Cron_model','Sms_model'));
		
	}

	public function pulldata(){
		$sms_data = $this->Sms_model->sms_data();
		$this->Cron_model->entry_logs($sms_data);	
	}

	public function cron_daily_logs(){
		$sms_data = $this->Sms_model->sms_data();
		$cron_daily_logs = $this->Cron_model->cron_daily_logs($sms_data);
	}

}