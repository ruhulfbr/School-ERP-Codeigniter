<?php
$ch = curl_init();
curl_setopt($ch, CURLOPT_URL,"http://sc.dbnltd.com/cron_controller/cron_daily_logs");
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
$server_output = curl_exec ($ch);
curl_close ($ch);
?>