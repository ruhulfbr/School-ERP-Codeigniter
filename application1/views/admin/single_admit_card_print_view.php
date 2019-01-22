<?php

$pdf = new TCPDF(PDF_PAGE_ORIENTATION, PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);

$pdf->SetCreator(PDF_CREATOR);

$pdf->setHeaderFont(Array(PDF_FONT_NAME_MAIN, '', PDF_FONT_SIZE_MAIN));
$pdf->setFooterFont(Array(PDF_FONT_NAME_DATA, '', PDF_FONT_SIZE_DATA));

$pdf->SetDefaultMonospacedFont(PDF_FONT_MONOSPACED);

$pdf->SetMargins(PDF_MARGIN_LEFT, PDF_MARGIN_RIGHT);
// $pdf->SetHeaderMargin(PDF_MARGIN_HEADER);
// $pdf->SetFooterMargin(PDF_MARGIN_FOOTER);

// $pdf->SetAutoPageBreak(TRUE, PDF_MARGIN_BOTTOM);

$pdf->setImageScale(PDF_IMAGE_SCALE_RATIO);

$pdf->SetFont('helvetica', '', 10);


$pdf->AddPage('P', 'A4');

foreach ($student_info as $student_info) {
  $s_f_name = $student_info->s_f_name;
  $s_roll = $student_info->s_roll;
  $s_id = $student_info->s_id;
  $s_class = $student_info->s_class;
  $class_name = $student_info->class_name;
  $section_name = $student_info->section_name;
}

$school_logo = base_url('resource/img/').$school_info->logo;
$student_image = base_url("resource/student_images/").$student_info->s_image;
$signature = base_url("resource/img/").$school_info->signature;

$html = <<<EOF
<style type="text/css">
        table{
   background-image: none;
    font-family: Arial, sans-serif;
    font-size: 12px;
    font-weight: normal;
    font-style: normal;
    text-decoration: none;
    color: #333333;
    padding: 5px 4px;
}

.tbl-head tr td{
  font-size: 20px;
  height:100px;
  border:1px solid black;  
}
.stu_info{
  margin-left:100px;
}
.stu_info tr td{
  font-size: 12px;
  height: 30px;
  width:120px;
}
.stu_info tr th{
  font-size: 12px;
  height: 30px;
  width:80px;
}
.subject{
text-align: center;
}
.subject tr th{
  border:1px solid black;
   height: 20px;
  width:159px;
}
.subject tr td{
  border:1px solid black;
  height: 20px;
  width:159px;
}
.footer{
  height: 100px;
  margin-left: 107px;
  border:1px solid black;
}
</style>
<table>
<table style="border:1px solid black;" >
<table class="tbl-head">
<tr>
    <td style="width: 105px;"> 
    <img style="width:150px; height:150px;" src="$school_logo" class="image">
    </td>
    <td style="width:428px; text-align: center;"><p>
            $school_info->name<br>
            $school_info->address_1st_line, $school_info->address_2nd_line<br>
            Admit Card

    </p>
    </td>
    <td style="width: 105px;">
      <img style="width:300px; height:300px;" src="$student_image" class="image">
    </td>
</tr>
</table>    
<table class="stu_info">
<tr>
    <th>Name:</th>
    <td>$s_f_name</td>
    <th>Class:</th>
    <td>$class_name</td>
    <th></th>
    <td></td>
</tr>
<tr>
    <th>Roll:</th>
    <td>$s_roll</td>
    <th>Section:</th>
    <td>$section_name</td>
    <th>Exam Date:</th>
    <td>$term_data->exam_date</td>
</tr>
</table>

<table class="footer">
    <tr>
        <td style="float: left; width: 477px; border:1px solid black;">
            <p>Direction</p>
            <ul>
                <li>Need to carry admit card to exam hall</li>
                <li>Enter 15 miniute before to exam hall</li>
                <li>Crime is restricted</li>
            </ul>
        </td>
        <td style="float: left; width: 159px; border:1px solid black;" align="center">
            <img style="width:100px; height:20px;" src="$signature" class="image">
            <p style="text-align: center;">
            <hr width="60px" style="margin-bottom:5px;">
            Principal <br>
            $school_info->name <br>
            $school_info->address_1st_line, $school_info->address_2nd_line
            </p>
        </td>
    </tr>
</table>
</table>
<table>
<tr>
<td>............................................................................................................................................................................................</td>

</tr>
</table>
</table>
EOF;
$pdf->writeHTML($html, true, false, true, false, '');


// - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - -


// reset pointer to the last page
$pdf->lastPage();

// ---------------------------------------------------------

//Close and output PDF document
$pdf->Output('Single_admit_card.pdf', 'I');