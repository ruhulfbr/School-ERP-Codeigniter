<style type="text/css" media="print">
    @page {
        size: auto;
        margin: 0;
    }
    /*.div {
            height: 842px;
            width: 595px;
    }*/

    body {
        background: rgb(204,204,204);
        margin-left: auto;
        margin-right: auto; 
    }
    @media print {
      body, page {
        margin: 0;
        box-shadow: 0;
      }
    }
</style>
<page size="A4">
<?php foreach ($student_info as $key => $value) {
    $s_id = $value->s_id;
    $s_f_name = $value->s_f_name;
    $s_roll = $value->s_roll;
    $class_id = $value->s_class;
    $class_name = $value->class_name;
    $section_name = $value->section_name;
}?>
<body class="white-bg">
   <table style="height: auto; width:100%; ">
            <tr>
                <td colspan="3" align="center">
                    <p style="margin-top: 10px;font-size: 20px; margin-bottom: -20px;"><b>Feni Computer Institute</b></p>
                </td>
            </tr>
            <tr>
                <td colspan="3" align="center"><img src="<?php echo base_url('resource/img/').$school_info->logo; ?>" style="height: 100px; width: 100px; margin-top: 30px;"></td>       
            </tr>
            <tr>
                <td colspan="3" align="center">
                    <p style="margin-top: 14px;font-size: 20px;">1<sup>st</sup> Terminal Examination 2018</p>
                </td>
            </tr>
        </table>
        <table style="width: 100%; height: 100px; margin-left: 15px;">
            <tr>
                <td colspan="3" align="center">
                    <p style="margin-top: 14px;font-size: 20px; font-weight: bold;"><u>Academic Transcript</u></p>
                </td>
            </tr>
            <tr>
                <td align="left">
                    <p> 
                     <strong><?php echo "ID = ".$s_id;?></strong><br>
                     <strong><?php echo "Name = ".$s_f_name;?></strong><br>
                    <?php echo "Roll = ".$s_roll."<br>";?>
                    <?php echo "Class = ".$class_name."<br>";?>
                    <?php echo "Section = ".$section_name."<br>";?>
                    <?php echo "Exam Term = ".$term_data->term_name."<br>";?>
                    <?php echo "Exam Year = ".$term_data->year."<br>";?>

                    </p>

                </td>
                
                <td align="right" >
                        <img src="<?php echo base_url('resource/img/grade.png')?>" style="height: 100px; width: 100px; margin-right:30px; margin-top: -10px; ">
                </td>
            </tr>
        </table>
   <section>
        <table style="width:100%; margin-top: 10px; text-align: center;" border="1px">
            <tr>
                <td>#</td>
                <td>Subject Name</td>
                <td>Subject Marks</td>
                <td>Mark obtain</td>
                <td>Letter Grade</td>
                <td>Grade Point</td>
                <td style="width: 100px;">Grade Point Average</td>
            </tr>
                <tr>
                <td>1</td>
                <td>Bangla</td>
                <td>200</td>
                <td>160</td>
                <td>A+</td>
                <td>5.00</td>
                <td style="width: 100px; border: none;" rowspan="3"></td>
            </tr>
           
        </table>
    </section>
    <table style="width:100%; margin-top: 40px; text-align: center;" border="1px">
        <tr>
            <th>Merit Position</th>
            <th>Total Working Day</th>
            <th>Attendance</th>
            <th>Behaviour</th>
        </tr>
        <tr style="height: 100px;">
            <td>1st </td>
            <td>100</td>
            <td>100</td>
            <td>Good</td>
        </tr>       
    </table>

    <table style="width:100%; margin-top: 80px; text-align: center;" >
          <tr>
                <td style=" text-align: center;">
                    <hr style="height:2px;width:150px; background-color:#DDDDDD;" />
                     <strong>Class Teacher</strong>
                 </td>
              
                <td style=" text-align: center;">
                    <hr style="height:2px;width:100px;background-color:#DDDDDD;" />
                    <strong>Principle</strong>
                </td>
           </tr>              
                      
                       
      </table>

</body>
</page>
<script type="text/javascript">
    window.print();
</script>