<?php
	$student = $Student_model_view->student_data($post);
	foreach ($student as $student) {
		$student_id = $student->s_id;

		$dt = new DateTime();
		$today = $dt->format('Y-m-d');
		$t_date = explode("-", $today);
		$array = array();
		foreach ($t_date as $value) {
			array_push($array, $value);
		}
		$day = $value+'1';
		$to_date = $array['0'].'-'.$array['1'].'-'.$day;

		echo $attendence = $Machine_model_view->today_attendence_search($today,$to_date,$student_id)."<br>";
	}
?>