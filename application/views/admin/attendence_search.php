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


$pdf->AddPage('L', 'A4');

$table_data='';

if (@$student_model_view) {

  $month = $this->input->post('month');
  $year = $this->input->post('year');

  $student = @$student_model_view->student_data($post);
  foreach ($student as $student) { 
    $st_id =  $student->s_id;
   $data='';
   $array = array(
    "foo" => "bar",
    "bar" => "foo",
);



    $table_data .='
        <tr style="height: 30px;" >
            <td>'.$student->s_roll.'</td>
            '..'
        </tr>
    ';

}
/*for($i=0;$<=10;$i++){
               
              }*/

$count = <<<EOF

      <table style="height: 100px; width: 100%;font-weight:bold; align-content: center;">
            <tr>
              <td style="text-align:right;">Class:</td>
              <td style="text-align:left;">test-class</td>
              <td style="text-align:right;">Section:</td>
              <td style="text-align:left;">test-section</td>
               <td style="text-align:right;">Year:</td>
              <td style="text-align:left;">2018</td>
            </tr>
            <br>
            <tr>
              <td colspan="6"></td>
            </tr>
         
        </table>

    <table  style="height:auto; width: 100%; background: white;" border="1px">
      <tr style="height: 30px;">
        <td>Roll</td>
        
        <td>1</td>
        <td>2</td>
        <td>3</td>
        <td>4</td>
        <td>5</td>
        <td>6</td>
        <td>7</td>
        <td>8</td>
        <td>9</td>
        <td>10</td>
        <td>11</td>
        <td>12</td>
        <td>13</td>
        <td>14</td>
        <td>15</td>
        <td>16</td>
        <td>17</td>
        <td>18</td>
        <td>19</td>
        <td>20</td>
        <td>21</td>
        <td>22</td>
        <td>23</td>
        <td>24</td>
        <td>25</td>
        <td>26</td>
        <td>27</td>
        <td>28</td>
        <td>29</td>
        <td>30</td>
        <td>31</td>
      </tr>
      $table_data
    </table>

EOF;
    
$pdf->writeHTML($count, true, false, true, false, '');


}

// - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - -


// reset pointer to the last page
$pdf->lastPage();

// ---------------------------------------------------------

//Close and output PDF document
$pdf->Output('Single_admit_card.pdf', 'I');