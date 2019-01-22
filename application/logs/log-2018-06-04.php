<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>

ERROR - 2018-06-04 12:30:21 --> Query error: Unknown column 'is_active' in 'field list' - Invalid query: UPDATE accounce_head SET is_active = IF(is_active=1, 0, 1) WHERE head_id = 3
ERROR - 2018-06-04 12:30:38 --> Query error: Unknown column 'is_active' in 'field list' - Invalid query: UPDATE accounce_head SET head_id = IF(is_active=1, 0, 1) WHERE head_id = 3
ERROR - 2018-06-04 12:30:52 --> Query error: Duplicate entry '1' for key 'PRIMARY' - Invalid query: UPDATE accounce_head SET head_id = IF(head_id=1, 0, 1) WHERE head_id = 3
ERROR - 2018-06-04 12:35:34 --> Severity: Notice --> Undefined property: stdClass::$id F:\xampp_5.6\htdocs\s_erp\application\views\accounce\st_payment.php 47
ERROR - 2018-06-04 12:35:34 --> Severity: Notice --> Undefined property: stdClass::$id F:\xampp_5.6\htdocs\s_erp\application\views\accounce\st_payment.php 47
ERROR - 2018-06-04 12:38:23 --> Query error: Unknown column 'accounce_head.id' in 'on clause' - Invalid query: SELECT *
FROM `receive_payment`
JOIN `accounce_head` ON `receive_payment`.`account` = `accounce_head`.`id`
WHERE `status` = 'Paid'
ERROR - 2018-06-04 12:38:52 --> Severity: Notice --> Undefined property: stdClass::$id F:\xampp_5.6\htdocs\s_erp\application\views\accounce\other_payment.php 39
ERROR - 2018-06-04 12:39:26 --> Query error: Unknown column 'accounce_head.id' in 'on clause' - Invalid query: SELECT *
FROM `receive_payment`
JOIN `accounce_head` ON `receive_payment`.`account` = `accounce_head`.`id`
WHERE `status` = 'Paid'
ERROR - 2018-06-04 12:40:43 --> Query error: Unknown column 'accounce_head.id' in 'on clause' - Invalid query: SELECT *
FROM `receive_payment`
JOIN `accounce_head` ON `receive_payment`.`account` = `accounce_head`.`id`
WHERE `status` = 'Unpaid'
ERROR - 2018-06-04 12:44:55 --> Severity: Notice --> Undefined property: stdClass::$id F:\xampp_5.6\htdocs\s_erp\application\views\accounce\payment_pay.php 37
ERROR - 2018-06-04 12:45:04 --> Severity: Notice --> Undefined property: stdClass::$id F:\xampp_5.6\htdocs\s_erp\application\views\accounce\payment_pay.php 37
ERROR - 2018-06-04 12:45:10 --> Severity: Notice --> Undefined property: stdClass::$id F:\xampp_5.6\htdocs\s_erp\application\views\accounce\payment_pay.php 37
