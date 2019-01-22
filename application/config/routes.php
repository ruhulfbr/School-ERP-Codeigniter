<?php
defined('BASEPATH') OR exit('No direct script access allowed');


$route['default_controller'] = 'Web_frontend_controller';
$route['404_override'] = 'Error_handel';
$route['translate_uri_dashes'] = FALSE;

/* Website */

$route['website'] = 'Web_frontend_controller/index';
$route['our_motiv'] = 'Web_frontend_controller/our_motiv';
$route['accadamic'] = 'Web_frontend_controller/accadamic';
$route['rulls'] = 'Web_frontend_controller/rulls';
$route['help_study'] = 'Web_frontend_controller/help_study';
$route['facility'] = 'Web_frontend_controller/facility';
$route['prize'] = 'Web_frontend_controller/prize';

$route['photo'] = 'Web_frontend_controller/photo_gallery';
$route['photo/(:num)'] = 'Web_frontend_controller/photo_gallery';
$route['video'] = 'Web_frontend_controller/video_gallery';
$route['video/(:num)'] = 'Web_frontend_controller/video_gallery';
$route['single_speach/(:num)'] = 'Web_frontend_controller/single_speach/$1';
$route['single_notice/(:num)'] = 'Web_frontend_controller/single_notice/$1';
$route['all_notics'] = 'Web_frontend_controller/all_notics';
$route['admission_form'] = 'Web_frontend_controller/admission_form';
$route['admission_form_filup'] = 'Web_frontend_controller/insert_applicant_data';



$route['slider_add'] = 'Web_controller/slider_add';
$route['slider_insert'] = 'Web_controller/slider_insert';
$route['slider_delete/(:num)'] = 'Web_controller/slider_delete/$1';
$route['menu_bar'] = 'web_controller/menu_bar';
$route['menu_insert'] = 'web_controller/menu_insert';
$route['breaking_news'] = 'web_controller/breaking_news';
$route['breaking_news_insert'] = 'web_controller/breaking_news_insert';
$route['breacking_news_delete/(:num)'] = 'web_controller/breacking_news_delete/$1';
$route['speech'] = 'web_controller/speech';
$route['speech_edit/(:num)'] = 'web_controller/speech_edit/$1';
$route['speech_update'] = 'web_controller/speech_update';
$route['notics_board'] = 'web_controller/notics_board';
$route['notice_insert'] = 'web_controller/notice_insert';
$route['notice_delete/(:any)'] = 'web_controller/notice_delete/$1';
$route['photo_gallery'] = 'web_controller/photo_gallery';
$route['photo_gallery/(:num)'] = 'web_controller/photo_gallery';
$route['image_gallery_insert'] = 'web_controller/image_gallery_insert';
$route['gallary_photo_delete/(:num)'] = 'web_controller/gallary_photo_delete/$1';
$route['video_gallery'] = 'web_controller/video_gallery';
$route['add_video'] = 'web_controller/add_video';
$route['video_insert'] = 'web_controller/video_insert';




$route['online_admission_add'] = 'Online_admission_controller/admission_time_date';
$route['admission_time_date_insert'] = 'Online_admission_controller/admission_time_date_insert';

$route['new_application'] = 'Online_admission_controller/new_application';
$route['applicant_information/(:num)'] = 'Online_admission_controller/applicant_information/$1';
$route['applicant_decision'] = 'Online_admission_controller/applicant_decision';
$route['approved_application'] = 'Online_admission_controller/approved_application';
$route['confirm_applicants'] = 'Online_admission_controller/confirm_applicants';
$route['final_application'] = 'Online_admission_controller/final_application';


/* URL NAME CHANGE */
$route['login'] = 'Login_controller/index';
$route['login_post'] = 'Login_controller/login';
$route['logout'] = 'Login_controller/logout';

$route['dashboard'] = 'Admin_controller/dashboard';

/* Cron route */
$route['pull_data'] = 'Cron_controller/pulldata';


$route['dashboard'] = 'Admin_controller/dashboard';
$route['profile/(:num)'] = 'Admin_controller/profile/$1';
$route['update_user_data'] = 'Admin_controller/update_user_data';

$route['add_teacher'] = 'Teacher_and_staff_controller/add_teacher';
$route['teacher_view/(:num)'] = 'Teacher_and_staff_controller/teacher_view/$1';
$route['teacher_edit/(:num)'] = 'Teacher_and_staff_controller/teacher_edit/$1';
$route['update_teacher'] = 'Teacher_and_staff_controller/update_teacher';
$route['teacher_data_delete/(:num)'] = 'Teacher_and_staff_controller/teacher_data_delete/$1';

$route['manage_class'] = 'admin_controller/manage_class';
$route['insert_class'] = 'Class_controller/insert_class';
$route['insert_section'] = 'Class_controller/insert_section';

$route['manage_subject'] = 'Admin_controller/manage_subject';
$route['insert_subject'] = 'Class_controller/insert_subject';
// $route['add_subject'] = 'Class_controller/add_subject';

$route['class_routin'] = 'admin_controller/class_routin';
$route['routin_search'] = 'admin_controller/routin_search';
$route['add_routine'] = 'admin_controller/add_routin';
$route['insert_routine'] = 'admin_controller/insert_routine';

$route['student_admission'] = 'Admin_controller/student_admission';
$route['student_insert'] = 'Student_controller/insert';
$route['student_information'] = 'Admin_controller/student_information';
$route['student_search'] = 'Student_controller/student_search';
$route['student_info/(:num)'] = 'Student_controller/student_info/$1';
$route['student_edit/(:num)'] = 'Student_controller/student_edit/$1';
$route['bulk_student_input'] = 'Student_controller/bulk_student_input';
$route['download_student_sample'] = 'Student_controller/download_student_sample';
$route['bulk_student_insert'] = 'Student_controller/bulk_student_insert';
$route['transfer_certificate'] = 'Student_controller/transfer_certificate';
$route['insert_tc'] = 'Student_controller/insert_tc';

$route['managment_exam'] = 'Admin_controller/exam_managment';
$route['exam_search'] = 'Student_controller/exam_search';
$route['exam_add'] = 'Student_controller/exam_add';

$route['admit_card'] = 'Admin_controller/admit_card';
$route['get_admit_card'] = 'Admin_controller/get_admit_card';
// $route['print_admit'] = 'Admin_controller/print_admit';
// $route['single_admit_card_print_view'] = 'Admin_controller/single_admit_card_print_view';

$route['entry_logs'] = 'Manage_attendance_controller/entry_logs';
$route['daily_logs'] = 'Manage_attendance_controller/daily_logs';
$route['daily_logs_search'] = 'Manage_attendance_controller/daily_logs_search';

$route['attendence'] = 'Manage_attendance_controller/attendence';
$route['attendence_search'] = 'Manage_attendance_controller/attendence_search';
$route['today_attendence'] = 'Manage_attendance_controller/today_attendence';
$route['today_attendence_search'] = 'Manage_attendance_controller/today_attendence_search';

$route['download_result_sample'] = 'Result_controller/download_result_sample';
$route['bulk_result_insert'] = 'Result_controller/bulk_result_insert';
$route['bulk_result_input'] = 'Result_controller/bulk_result_input';
$route['result_input'] = 'Result_controller/result_input';
$route['input_result_search'] = 'Result_controller/input_result_search';
$route['result_add'] = 'Result_controller/result_add';
$route['report_card'] = 'Result_controller/report_card';
$route['report_card_search'] = 'Result_controller/report_card_search';
$route['result_update'] = 'Result_controller/result_update';

$route['result_at_a_glance'] = 'Result_controller/result_at_a_glance';
$route['result_at_a_glance_print'] = 'Result_controller/result_at_a_glance_print';

$route['sms_page'] = 'Sms_controller/sms';
$route['send_sms'] = 'Sms_controller/send_sms';
$route['user_role'] = 'User_role_controller/index';
$route['settings'] = 'Admin_controller/settings';
$route['settings_insert'] = 'Admin_controller/settings_insert';
$route['logo_insert'] = 'Admin_controller/logo_upload';
$route['signature_insert'] = 'Admin_controller/signature_upload';
$route['bannar_insert'] = 'Admin_controller/bannar_upload';
$route['student_search_role'] = 'User_role_controller/student_search_role';
$route['access_restore/(:num)'] = 'User_role_controller/access_restore/$1';


// Student role section
$route['student_dashboard'] = 'Student_role_controller';
$route['student_report_card_search'] = 'Student_role_controller/student_report_card_search';
$route['student_class_routine'] = 'Student_role_controller/student_class_routine';
$route['student_report_card'] = 'Student_role_controller/student_report_card';
$route['student_daily_logs'] = 'Student_role_controller/student_daily_logs';

// Teacher role section
$route['teacher_dashboard'] = 'Teacher_role_controller';
$route['teacher_profile/(:num)'] = 'Teacher_role_controller/profile/$1';
$route['update_teacher_profile'] = 'Teacher_role_controller/update_teacher_profile';
$route['teacher_input_result_search'] = 'Teacher_role_controller/input_result_search';
$route['teacher_result_input'] = 'Teacher_role_controller/teacher_result_input';
$route['teacher_result_add'] = 'Teacher_role_controller/result_add';
$route['teacher_result_submit'] = 'Teacher_role_controller/teacher_result_submit';
$route['teacher_result_update'] = 'Teacher_role_controller/result_update';
$route['teacher_bulk_result_input'] = 'Teacher_role_controller/bulk_result_input';
$route['teacher_report_card'] = 'Teacher_role_controller/report_card';
$route['teacher_report_card_search'] = 'Teacher_role_controller/report_card_search';
$route['teacher_class_routine'] = 'Teacher_role_controller/teacher_class_routine';
$route['teacher_daily_logs'] = 'Teacher_role_controller/teacher_daily_logs';
$route['teacher_attendence'] = 'Teacher_role_controller/attendence';
$route['teacher_single_attendence'] = 'Teacher_role_controller/teacher_single_attendence';
$route['teacher_single_attendence_search'] = 'Teacher_and_staff_controller/teacher_single_attendence_search';
// $route['teacher_attendence_search'] = 'Teacher_role_controller/attendence_search';

//Account role section
$route['account_dashboard'] = 'Account_controller';
$route['st_payment'] = 'Account_controller/st_payment';
$route['add_stu_payment'] = 'Account_controller/add_stu_payment';
$route['other_payment'] = 'Account_controller/other_payment';
$route['add_other_payment'] = 'Account_controller/add_other_payment';
$route['recive_logs'] = 'Account_controller/recive_logs';
$route['unpaid_logs'] = 'Account_controller/unpaid_logs';
$route['invoice_st_cng/(:any)'] = 'Account_controller/invoice_st_cng/$1';
$route['payment_pay'] = 'Account_controller/payment_pay';
$route['add_payment_pay'] = 'Account_controller/add_payment_pay';
$route['pay_logs'] = 'Account_controller/pay_logs';

$route['accounce_head'] = 'Account_controller/accounce_head';
$route['insert_acc_head'] = 'Account_controller/insert_acc_head';
$route['head_status/(:num)'] = 'Account_controller/head_status/$1';
$route['salary'] = 'Account_controller/salary';


//School admin role section
$route['school_admin_dashboard'] = 'School_admin_roll_controller/school_admin_dashboard';
$route['teacher_and_staff'] = 'Teacher_and_staff_controller/teacher_and_staff';
$route['add_teacher_data'] = 'Teacher_and_staff_controller/insert_teacher_data';
$route['teacher_attendence'] = 'Teacher_and_staff_controller/teacher_attendence';
$route['teacher_attendence_search'] = 'Teacher_and_staff_controller/teacher_attendence_search';