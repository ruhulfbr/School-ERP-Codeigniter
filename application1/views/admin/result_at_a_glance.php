<?php foreach ($student_info as $key => $value) {
    $s_id = $value->s_id;
    $s_f_name = $value->s_f_name;
    $s_roll = $value->s_roll;
    $class_id = $value->s_class;
    $class_name = $value->class_name;
    $section_name = $value->section_name;
}
// $class_id=8;
?>
<div class="row wrapper border-bottom white-bg page-heading">
    <div class="col-lg-8">
        <h2><?php $segment_= $this->uri->segment(1);
                    echo  humanize($segment_); ?></h2>
        <ol class="breadcrumb">
            <li>
                <a href="<?php echo base_url('dashboard');?>">Dashboard</a>
            </li>
            <li class="active">
                <strong><?php echo  humanize($segment_); ?></strong>
            </li>
        </ol>
    </div>
    <div class="col-lg-4">
        <div class="title-action">
            <a href="<?php echo base_url('Result_controller/result_at_a_glance_print?s_id=');echo $s_id;echo "&trm=";echo $term_data->exam_id;echo "&class_id=";echo $value->s_class;?>" target="_blank" class="btn btn-primary"><i class="fa fa-print"></i> Print </a>
        </div>
    </div>
</div>
<div class="row">

<div class="col-sm-3">
    <table class="table table-bordered">
        <tr>
            <th>ID</th>
            <td><?php echo $s_id;?></td>
        </tr>
        <tr>
            <th>Name</th>
            <td><?php echo $s_f_name;?></td>
        </tr>
        <tr>
            <th>Class</th>
            <td> <?php echo $class_name;?></td>
        </tr>
        <tr>
            <th>Section</th>
            <td> <?php echo $section_name;?></td>
        </tr>
        <tr>
            <th>Roll</th>
            <td> <?php echo $s_roll;?></td>
        </tr>
    </table>
</div>
<div class="col-sm-6">
    <div class="row">
        <div class="col-sm-2">
            <img src="<?php echo base_url('resource/img/').$school_info->logo; ?>"">
        </div>
        <div class="col-sm-10 text-center">
            <h1><?php echo $school_info->name;?></h1>
            <h4><?php echo $school_info->address_1st_line;?></h4>
        </div>
    </div>
    <br>
    <div class="row">
        <di class="col-sm-12 text-center">
            <h3 style="border: 1px solid black;">Progress Report:  <?php echo $term_data->term_name;?></h3>
        </di>
    </div>
</div>
<div class="col-sm-3">
   <table class="table-bordered">
        <tr>
        <th>Range</th>
        <th>Grade</th>
        <th>Point</th>
        <th>Remarks</th>
    </tr>
    <tr>
        <td>80-100</td>
        <td>A+</td>
        <td>5</td>
        <td>Excellent</td>
    </tr>
    <tr>
        <td>70-79</td>
        <td>A</td>
        <td>4</td>
        <td>Outstanding</td>
    </tr>
    <tr>
        <td>60-69</td>
        <td>A-</td>
        <td>3.5</td>
        <td>Very Good</td>
    </tr>
    <tr>
        <td>50-59</td>
        <td>B</td>
        <td>3</td>
        <td>Good</td>
    </tr>
    <tr>
        <td>40-49</td>
        <td>C</td>
        <td>2</td>
        <td>Average</td>
    </tr>
    <tr>
        <td>33-39</td>
        <td>D</td>
        <td>1</td>
        <td>Pass</td>
    </tr>
    <tr>
        <td>0-32</td>
        <td>F</td>
        <td>0</td>
        <td>Fail</td>
    </tr>
   </table>
</div>

</div>

<div class="row">
    <div class="col-sm-12">
         <?php if ($class_id==1||$class_id==2||$class_id==3||$class_id==4||$class_id==5||$class_id==6||$class_id==7) { ?>
        <table class="table table-bordered">
            <tr>
                <td>#</td>
                <td>Subject Name</td>
                <!-- <td>Tutorial</td> -->
                <td>Subject Marks</td>
                <td>Mark obtain</td>
                <td>Letter Grade</td>
                <td>Grade Point</td>
                <td style="width: 100px;">Grade Point Average</td>
            </tr>
            <tbody>
                <?php $no=0;
                    $total_point=0;
                    $compolsary=0;
                    foreach ($result_info as $key => $value) { ?>

                <tr>
                <td><?php echo $no =$no+1;?></td>
                <td><?php echo $value->subject_name;?></td>
                <!-- <td>50</td> -->
                <td>
                    <?php 
                        if ($value->full_marks==1) {
                             echo "100";
                            }elseif ($value->full_marks==2) {
                              echo "50";
                            } ?>
                </td>
                <td><?php echo $value->mark;?></td>
                <td>
                    <?php
                            
                                if ($value->subject_type==1) {
                                    $compolsary++;

                                    if ($value->full_marks==1) {
                                        if ( in_array($value->mark, range(80,100)) ) {
                                            echo 'A+';
                                            $point='5';
                                        }elseif( in_array($value->mark, range(70,79)) ){
                                            echo 'A';
                                            $point='4';
                                        }elseif( in_array($value->mark, range(60,69)) ){
                                            echo 'A-';
                                            $point='3.5';
                                        }elseif( in_array($value->mark, range(50,59)) ){
                                            echo 'B';
                                            $point='3';
                                        }elseif( in_array($value->mark, range(40,49)) ){
                                            echo 'C';
                                            $point='2';
                                        }elseif( in_array($value->mark, range(30,39)) ){
                                            echo 'D';
                                            $point='1';
                                        }elseif( in_array($value->mark, range(0,32)) ){
                                            echo 'F';
                                            $point='0';
                                        }else{
                                            echo 'Incorect';
                                            $point='0';
                                        }
                                    }elseif($value->full_marks==2){

                                        if ( in_array($value->mark, range(40,50)) ) {
                                        echo 'A+';
                                        $point='5';
                                        }elseif( in_array($value->mark, range(35,39)) ){
                                            echo 'A';
                                            $point='4';
                                        }elseif( in_array($value->mark, range(30,34)) ){
                                            echo 'A-';
                                            $point='3.5';
                                        }elseif( in_array($value->mark, range(25,29)) ){
                                            echo 'B';
                                            $point='3';
                                        }elseif( in_array($value->mark, range(20,24)) ){
                                            echo 'C';
                                            $point='2';
                                        }elseif( in_array($value->mark, range(17,19)) ){
                                            echo 'D';
                                            $point='1';
                                        }elseif( in_array($value->mark, range(0,16)) ){
                                            echo 'F';
                                            $point='0';
                                        }else{
                                            echo 'Incorect';
                                            $point='0';
                                        }
                                    }
                                    $total_point=$total_point+$point;
                                }elseif ($value->subject_type==2) {

                                    if ($value->full_marks==1) {
                                        if ( in_array($value->mark, range(80,100)) ) {
                                            echo 'A+';
                                            $point='5';
                                        }elseif( in_array($value->mark, range(70,79)) ){
                                            echo 'A';
                                            $point='4';
                                        }elseif( in_array($value->mark, range(60,69)) ){
                                            echo 'A-';
                                            $point='3.5';
                                        }elseif( in_array($value->mark, range(50,59)) ){
                                            echo 'B';
                                            $point='3';
                                        }elseif( in_array($value->mark, range(40,49)) ){
                                            echo 'C';
                                            $point='2';
                                        }elseif( in_array($value->mark, range(30,39)) ){
                                            echo 'D';
                                            $point='1';
                                        }elseif( in_array($value->mark, range(0,32)) ){
                                            echo 'F';
                                            $point='0';
                                        }else{
                                            echo 'Incorect';
                                            $point='0';
                                        }
                                    }elseif($value->full_marks==2){

                                        if ( in_array($value->mark, range(40,50)) ) {
                                            echo 'A+';
                                            $point='5';
                                            }elseif( in_array($value->mark, range(35,39)) ){
                                                echo 'A';
                                                $point='4';
                                            }elseif( in_array($value->mark, range(30,34)) ){
                                                echo 'A-';
                                                $point='3.5';
                                            }elseif( in_array($value->mark, range(25,29)) ){
                                                echo 'B';
                                                $point='3';
                                            }elseif( in_array($value->mark, range(20,24)) ){
                                                echo 'C';
                                                $point='2';
                                            }elseif( in_array($value->mark, range(17,19)) ){
                                                echo 'D';
                                                $point='1';
                                            }elseif( in_array($value->mark, range(0,16)) ){
                                                echo 'F';
                                                $point='0';
                                            }else{
                                            echo 'Incorect';
                                            $point='0';
                                        }
                                    }

                                }
                             ?>
                </td>
                <td><?php echo $point; ?></td>
                <td style="width: 100px; border: none;" rowspan="3"></td>
            </tr>
               <?php } ?>
        </tbody>
        </table>
        <?php }elseif($class_id==8||$class_id==9||$class_id==10||$class_id==11||$class_id==12||$class_id==13||$class_id==14){ 
            $total_point=0; ?>
            <table class="table table-bordered">
                <thead>
            <tr>
                <td>#</td>
                <td>Subject Name</td>
                <td>Creative</td>
                <td>MCCQ</td>
                <td>Total Mark</td>
                <td>Grade</td>
                <td style="width: 100px;">Grade Point Average</td>
            </tr>
            </thead>
            <tbody>
                  <?php $no=0;
                        
                        $arr = array();
                        foreach ($get_subject_groupdata as $value) {
                                $arr[] = $value->subject_group;
                            }

                        $unique_data = array_unique($arr);
                        $compolsary=0;
                        foreach($unique_data as $val) { ?>
                <tr>
                    <td><?php echo $no =$no+1;?></td>
                    <td><?php  
                            if($val==601||$val==701||$val==801||$val==901||$val==1001){
                                echo "Bangla";
                            }elseif($val==602||$val==702||$val==802||$val==902||$val==1002){
                                echo "English";
                            }elseif($val==603||$val==703||$val==803||$val==903||$val==1003) {
                                echo "Math";
                            }elseif($val==604||$val==704||$val==804||$val==904||$val==1004){
                                echo "Religion";
                            }elseif($val==605||$val==705||$val==805){
                                echo "General Knowledge";
                            }elseif($val==606||$val==706||$val==806||$val==905||$val==1005){
                                echo "Social Science";
                            }elseif($val==607||$val==707||$val==807){
                                echo "Agriculture";
                            }elseif($val==608||$val==708||$val==808||$val==906||$val==1006){
                                echo "ICT";
                            }elseif($val==609||$val==709||$val==809||$val==1009){
                                echo "Work and Life Education";
                            }elseif($val==610||$val==710||$val==810||$val==911||$val==1011){
                                echo "Physical education";
                            }elseif($val==611||$val==711||$val==811){
                                echo "Drawing";
                            }elseif($val==907||$val==1007){
                                echo "Physics";
                            }elseif($val==908||$val==1008){
                                echo "Chemistry";
                            }elseif($val==909||$val==1009){
                                echo "Biology";
                            }elseif($val==910||$val==1010){
                                echo "H.M/Agri";
                            }elseif($val==912||$val==1012){
                                echo "Career";
                            }elseif($val==913||$val==1013){
                                echo "Accounting";
                            }elseif($val==914||$val==1014){
                                echo "Finance and Banking";
                            }elseif($val==915||$val==1015){
                                echo "Business Enterprise";
                            }
                            ?>
                                
                            </td>
                        
                           <?php 
                        $get_subject_data = $result_model_view->get_subject_data($val);

                            $count_sub_mark = count($get_subject_data);
                            $total_mark=0;
                            if ($count_sub_mark==2||$count_sub_mark==3) {
                                foreach ($get_subject_data as $key) {
                                    $subject_id = $key->subject_id;
                                    $get_result = $result_model_view->get_group_result($term_id,$id,$subject_id);
                                    ?>
                                   <td style="width: 10%; text-align: center;"><?php echo $get_result->mark; ?></td>
                                    echo $key->subject_name." = ".$get_result->mark."<br>";
                                    <?php $mark = $get_result->mark;
                                    $total_mark = $total_mark+$mark;
                                } 
                                
                            }elseif ($count_sub_mark==4) { ?>
                           <td style="width: 10%; text-align: center;">
                                <?php foreach ($get_subject_data as $key) {
                                    $subject_id = $key->subject_id;
                                    $get_result = $result_model_view->get_group_result($term_id,$id,$subject_id);
                                    // echo $get_result->mark."&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;";
                                    $mark = $get_result->mark;
                                    $total_mark = $total_mark+$mark;
                                } ?>
                                </td>
                                <td></td>
                            <?php }?>
                   
                    <td>
                        <?php echo $total_mark;

                           $com_check = $result_model_view->check_compolsary($val);
                           
                           if ($com_check->full_marks==1) {

                            if ( in_array($total_mark, range(80,100)) ) {
                                $grade="A+";
                                $point='5';
                                }elseif( in_array($total_mark, range(70,79)) ){
                                    $grade="A";
                                    $point='4';
                                }elseif( in_array($total_mark, range(60,69)) ){
                                    $grade="A-";
                                    $point='3.5';
                                }elseif( in_array($total_mark, range(50,59)) ){
                                    $grade="B";
                                    $point='3';
                                }elseif( in_array($total_mark, range(40,49)) ){
                                    $grade="C";
                                    $point='2';
                                }elseif( in_array($total_mark, range(33,39)) ){
                                    $grade="D";
                                    $point='1';
                                }elseif( in_array($total_mark, range(0,32)) ){
                                    $grade="F";
                                    $point='0';
                                }else{
                                $grade="Incorect";
                                $point='0';
                            }
                        }elseif($com_check->full_marks==2){

                            if ( in_array($total_mark, range(40,50)) ) {
                                $grade="A+";
                                $point='5';
                                }elseif( in_array($total_mark, range(35,39)) ){
                                    $grade="A";
                                    $point='4';
                                }elseif( in_array($total_mark, range(30,34)) ){
                                    $grade="A-";
                                    $point='3.5';
                                }elseif( in_array($total_mark, range(25,29)) ){
                                    $grade="B";
                                    $point='3';
                                }elseif( in_array($total_mark, range(20,24)) ){
                                    $grade="C";
                                    $point='2';
                                }elseif( in_array($total_mark, range(17,19)) ){
                                    $grade="D";
                                    $point='1';
                                }elseif( in_array($total_mark, range(0,16)) ){
                                    $grade="F";
                                    $point='0';
                                }else{
                                    $grade="Incorect";
                                    $point='0';
                                }
                            }elseif($com_check->full_marks==3){

                            if ( in_array($total_mark, range(125,150)) ) {
                                $grade="A+";
                                $point='5';
                                }elseif( in_array($total_mark, range(110,124)) ){
                                    $grade="A";
                                    $point='4';
                                }elseif( in_array($total_mark, range(95,109)) ){
                                    $grade="A-";
                                    $point='3.5';
                                }elseif( in_array($total_mark, range(80,94)) ){
                                    $grade="B";
                                    $point='3';
                                }elseif( in_array($total_mark, range(65,79)) ){
                                    $grade="C";
                                    $point='2';
                                }elseif( in_array($total_mark, range(50,69)) ){
                                    $grade="D";
                                    $point='1';
                                }elseif( in_array($total_mark, range(0,49)) ){
                                    $grade="F";
                                    $point='0';
                                }else{
                                    $grade="Incorect";
                                    $point='0';
                                }
                            }elseif($com_check->full_marks==4){
                                $total_mark_up=round($total_mark/2,0);

                                if ( in_array($total_mark_up, range(80,100)) ) {
                                    $grade="A+";
                                    $point='5';
                                    }elseif( in_array($total_mark_up, range(70,79)) ){
                                        $grade="A";
                                        $point='4';
                                    }elseif( in_array($total_mark_up, range(60,69)) ){
                                        $grade="A-";
                                        $point='3.5';
                                    }elseif( in_array($total_mark_up, range(50,59)) ){
                                        $grade="B";
                                        $point='3';
                                    }elseif( in_array($total_mark_up, range(40,49)) ){
                                        $grade="C";
                                        $point='2';
                                    }elseif( in_array($total_mark_up, range(33,39)) ){
                                        $grade="D";
                                        $point='1';
                                    }elseif( in_array($total_mark_up, range(0,32)) ){
                                        $grade="F";
                                        $point='0';
                                    }else{
                                    $grade="Incorect";
                                    $point='0';
                                }
                            }
                           ?>
                    </td>
                    <td><?php echo $grade; ?>+</td>
                    <td style="width: 100px; border: none;" rowspan="3"><?php echo $point; ?></td>
            </tr>
             <?php 
                    if ($com_check->subject_type==1) {
                            $compolsary++;
                            $total_point = $point+$total_point; 
                        } } ?>
             </tbody>
        </table>
    <?php }?>
    </div>
</div>
<div class="row">
    <div class="col-sm-8">
       
        <table class=" table table-bordered">
            <tbody>
        <tr>
            <th>Class Merit</th>
            <th>Section Merit</th>
            <th>Working Days</th>
            <th>Attendence</th>
            <th>Absent</th>
            <th>Discipline</th>
            <th>Cleaniness</th>
        </tr>
        <tr style="height: 100px; height: 70px;">
            <td>3 out of 100 </td>
            <td>1 out of 50</td>
            <td>0 days</td>
            <td>Days</td>
            <td>Days</td>
            <td> </td>
            <td> </td>
        </tr>      
        </tbody> 
    </table>

    </div>
    <div class="col-sm-4 text-center">
        <table class="table table-bordered">
            <tr>
                <th style="text-align: center;">Interpretation</th>
            </tr>
            <tr>
                <td height="70px;">
                    
                </td>
            </tr>
        </table>
    </div>
</div>
<div class="row">
    <div class="col-sm-12">
        <table class="table ">
          <tr>
                <td style=" text-align: center;">
                    <hr style="height:2px;width:150px; background-color:#DDDDDD;" />
                     <strong> Signature of Class Teacher</strong>
                 </td>
              
                <td style=" text-align: center;">
                    <hr style="height:2px;width:100px;background-color:#DDDDDD;" />
                    <strong> Signature of Coordinator</strong>
                </td>
                <td style=" text-align: center;">
                    <hr style="height:2px;width:100px;background-color:#DDDDDD;" />
                    <strong>Signature of HeadMaster</strong>
                </td>
           </tr>              
                      
                       
      </table>
    </div>
</div>
  <!--    <div class="col-lg-12">
       <div class="wrapper wrapper-content animated fadeInRight">
    <div class="ibox-content p-xl">
            <div class="row">
                <div class="col-sm-12" align="center" style="padding: 20px;">
                    <img src="<?php echo base_url('resource/img/').$school_info->logo; ?>">
                    <h4 class="text-navy"><?php echo $school_info->name;?></h4>
                </div>
            </div>
            <div class="row">
                <div class="col-sm-6" style="padding: 20px;">
                    <strong><?php echo "ID = ".$s_id;?></strong><br>
                    <strong><?php echo "Name = ".$s_f_name;?></strong><br>
                        <?php echo "Roll = ".$s_roll."<br>";?>
                        <?php echo "Class = ".$class_name."<br>";?>
                        <?php echo "Section = ".$section_name."<br>";?>
                        <?php echo "Exam Term = ".$term_data->term_name."<br>";?>
                        <?php echo "Exam Year = ".$term_data->year."<br>";?>
                </div>
            </div>

            <div class="table-responsive m-t">
                <?php if ($class_id==1||$class_id==2||$class_id==3||$class_id==4||$class_id==5||$class_id==6||$class_id==7) { ?>
                <table class="table invoice-table">
                    <thead>
                        <th style="width: 5%;text-align: center;">#</th>
                        <th style="width: 20%; text-align: center;">Subject</th>
                        <th style="width: 20%; text-align: center;">Subject Mark</th>
                        <th style="width: 20%; text-align: center;">Mark Obtain</th>
                        <th style="width: 20%; text-align: center;">Grade</th>
                        <th style="width: 15%; text-align: center;">Point</th>
                    </thead>
                    <tbody>
                    <?php $no=0;
                    $total_point=0;
                    $compolsary=0;
                    foreach ($result_info as $key => $value) { ?>
                        <tr>
                            <td style="width: 5%; text-align: center;"><?php echo $no =$no+1;?></td>
                            <td style="width: 20%; text-align: center;"><?php echo $value->subject_name;?></td>
                            <td style="width: 20%; text-align: center;"><?php 
                                if ($value->full_marks==1) {
                                    echo "100";
                                }elseif ($value->full_marks==2) {
                                    echo "50";
                                } ?></td>
                            <td style="width: 20%; text-align: center;"><?php echo $value->mark;?></td>
                            <td style="width: 20%; text-align: center;"><?php
                            
                                if ($value->subject_type==1) {
                                    $compolsary++;

                                    if ($value->full_marks==1) {
                                        if ( in_array($value->mark, range(80,100)) ) {
                                            echo 'A+';
                                            $point='5';
                                        }elseif( in_array($value->mark, range(70,79)) ){
                                            echo 'A';
                                            $point='4';
                                        }elseif( in_array($value->mark, range(60,69)) ){
                                            echo 'A-';
                                            $point='3.5';
                                        }elseif( in_array($value->mark, range(50,59)) ){
                                            echo 'B';
                                            $point='3';
                                        }elseif( in_array($value->mark, range(40,49)) ){
                                            echo 'C';
                                            $point='2';
                                        }elseif( in_array($value->mark, range(30,39)) ){
                                            echo 'D';
                                            $point='1';
                                        }elseif( in_array($value->mark, range(0,32)) ){
                                            echo 'F';
                                            $point='0';
                                        }else{
                                            echo 'Incorect';
                                            $point='0';
                                        }
                                    }elseif($value->full_marks==2){

                                        if ( in_array($value->mark, range(40,50)) ) {
                                        echo 'A+';
                                        $point='5';
                                        }elseif( in_array($value->mark, range(35,39)) ){
                                            echo 'A';
                                            $point='4';
                                        }elseif( in_array($value->mark, range(30,34)) ){
                                            echo 'A-';
                                            $point='3.5';
                                        }elseif( in_array($value->mark, range(25,29)) ){
                                            echo 'B';
                                            $point='3';
                                        }elseif( in_array($value->mark, range(20,24)) ){
                                            echo 'C';
                                            $point='2';
                                        }elseif( in_array($value->mark, range(17,19)) ){
                                            echo 'D';
                                            $point='1';
                                        }elseif( in_array($value->mark, range(0,16)) ){
                                            echo 'F';
                                            $point='0';
                                        }else{
                                            echo 'Incorect';
                                            $point='0';
                                        }
                                    }
                                    $total_point=$total_point+$point;
                                }elseif ($value->subject_type==2) {

                                    if ($value->full_marks==1) {
                                        if ( in_array($value->mark, range(80,100)) ) {
                                            echo 'A+';
                                            $point='5';
                                        }elseif( in_array($value->mark, range(70,79)) ){
                                            echo 'A';
                                            $point='4';
                                        }elseif( in_array($value->mark, range(60,69)) ){
                                            echo 'A-';
                                            $point='3.5';
                                        }elseif( in_array($value->mark, range(50,59)) ){
                                            echo 'B';
                                            $point='3';
                                        }elseif( in_array($value->mark, range(40,49)) ){
                                            echo 'C';
                                            $point='2';
                                        }elseif( in_array($value->mark, range(30,39)) ){
                                            echo 'D';
                                            $point='1';
                                        }elseif( in_array($value->mark, range(0,32)) ){
                                            echo 'F';
                                            $point='0';
                                        }else{
                                            echo 'Incorect';
                                            $point='0';
                                        }
                                    }elseif($value->full_marks==2){

                                        if ( in_array($value->mark, range(40,50)) ) {
                                            echo 'A+';
                                            $point='5';
                                            }elseif( in_array($value->mark, range(35,39)) ){
                                                echo 'A';
                                                $point='4';
                                            }elseif( in_array($value->mark, range(30,34)) ){
                                                echo 'A-';
                                                $point='3.5';
                                            }elseif( in_array($value->mark, range(25,29)) ){
                                                echo 'B';
                                                $point='3';
                                            }elseif( in_array($value->mark, range(20,24)) ){
                                                echo 'C';
                                                $point='2';
                                            }elseif( in_array($value->mark, range(17,19)) ){
                                                echo 'D';
                                                $point='1';
                                            }elseif( in_array($value->mark, range(0,16)) ){
                                                echo 'F';
                                                $point='0';
                                            }else{
                                            echo 'Incorect';
                                            $point='0';
                                        }
                                    }

                                }
                             ?></td>
                            <td style="width: 15%; text-align: center;"><?php echo $point; ?></td>
                        </tr>
                    <?php }?>
                    </tbody>
                </table>
                <?php }elseif($class_id==8||$class_id==9||$class_id==10||$class_id==11||$class_id==12||$class_id==13||$class_id==14){ 
                    $total_point=0; ?>
                <table class="table invoice-table">
                    <thead>
                        <th style="width: 5%;text-align: center;">#</th>
                        <th style="width: 20%; text-align: center;">Subject</th>
                        <th style="width: 20%; text-align: center;">Subjective</th>
                        <th style="width: 20%; text-align: center;">Objective</th>
                        <th style="width: 20%; text-align: center;">Total Mark</th>
                        <th style="width: 20%; text-align: center;">Grade</th>
                        <th style="width: 15%; text-align: center;">Point</th>
                    </thead>
                    <tbody>
                        <?php $no=0;
                        
                        $arr = array();
                        foreach ($get_subject_groupdata as $value) {
                                $arr[] = $value->subject_group;
                            }

                        $unique_data = array_unique($arr);
                        $compolsary=0;
                        foreach($unique_data as $val) { ?>
                        <tr>
                            <td style="width: 5%; text-align: center;"><?php echo $no =$no+1;?></td>
                            <td style="width: 10%; text-align: center;"><?php  
                            if($val==601||$val==701||$val==801||$val==901||$val==1001){
                                echo "Bangla";
                            }elseif($val==602||$val==702||$val==802||$val==902||$val==1002){
                                echo "English";
                            }elseif($val==603||$val==703||$val==803||$val==903||$val==1003) {
                                echo "Math";
                            }elseif($val==604||$val==704||$val==804||$val==904||$val==1004){
                                echo "Religion";
                            }elseif($val==605||$val==705||$val==805){
                                echo "General Knowledge";
                            }elseif($val==606||$val==706||$val==806||$val==905||$val==1005){
                                echo "Social Science";
                            }elseif($val==607||$val==707||$val==807){
                                echo "Agriculture";
                            }elseif($val==608||$val==708||$val==808||$val==906||$val==1006){
                                echo "ICT";
                            }elseif($val==609||$val==709||$val==809||$val==1009){
                                echo "Work and Life Education";
                            }elseif($val==610||$val==710||$val==810||$val==911||$val==1011){
                                echo "Physical education";
                            }elseif($val==611||$val==711||$val==811){
                                echo "Drawing";
                            }elseif($val==907||$val==1007){
                                echo "Physics";
                            }elseif($val==908||$val==1008){
                                echo "Chemistry";
                            }elseif($val==909||$val==1009){
                                echo "Biology";
                            }elseif($val==910||$val==1010){
                                echo "H.M/Agri";
                            }elseif($val==912||$val==1012){
                                echo "Career";
                            }elseif($val==913||$val==1013){
                                echo "Accounting";
                            }elseif($val==914||$val==1014){
                                echo "Finance and Banking";
                            }elseif($val==915||$val==1015){
                                echo "Business Enterprise";
                            }
                            ?></td>
                        
                        <?php 
                        $get_subject_data = $result_model_view->get_subject_data($val);

                            $count_sub_mark = count($get_subject_data);
                            $total_mark=0;
                            if ($count_sub_mark==2||$count_sub_mark==3) {
                                foreach ($get_subject_data as $key) {
                                    $subject_id = $key->subject_id;
                                    $get_result = $result_model_view->get_group_result($term_id,$id,$subject_id);
                                    ?>
                                   <td style="width: 10%; text-align: center;"><?php echo $get_result->mark; ?></td>
                                    echo $key->subject_name." = ".$get_result->mark."<br>";
                                    <?php $mark = $get_result->mark;
                                    $total_mark = $total_mark+$mark;
                                } 
                                
                            }elseif ($count_sub_mark==4) { ?>
                           <td style="width: 10%; text-align: center;">
                                <?php foreach ($get_subject_data as $key) {
                                    $subject_id = $key->subject_id;
                                    $get_result = $result_model_view->get_group_result($term_id,$id,$subject_id);
                                    // echo $get_result->mark."&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;";
                                    $mark = $get_result->mark;
                                    $total_mark = $total_mark+$mark;
                                } ?>
                                </td>
                                <td></td>
                            <?php }?>
                           <td style="width: 10%; text-align: center;"><?php echo $total_mark;

                           $com_check = $result_model_view->check_compolsary($val);
                           
                           if ($com_check->full_marks==1) {

                            if ( in_array($total_mark, range(80,100)) ) {
                                $grade="A+";
                                $point='5';
                                }elseif( in_array($total_mark, range(70,79)) ){
                                    $grade="A";
                                    $point='4';
                                }elseif( in_array($total_mark, range(60,69)) ){
                                    $grade="A-";
                                    $point='3.5';
                                }elseif( in_array($total_mark, range(50,59)) ){
                                    $grade="B";
                                    $point='3';
                                }elseif( in_array($total_mark, range(40,49)) ){
                                    $grade="C";
                                    $point='2';
                                }elseif( in_array($total_mark, range(33,39)) ){
                                    $grade="D";
                                    $point='1';
                                }elseif( in_array($total_mark, range(0,32)) ){
                                    $grade="F";
                                    $point='0';
                                }else{
                                $grade="Incorect";
                                $point='0';
                            }
                        }elseif($com_check->full_marks==2){

                            if ( in_array($total_mark, range(40,50)) ) {
                                $grade="A+";
                                $point='5';
                                }elseif( in_array($total_mark, range(35,39)) ){
                                    $grade="A";
                                    $point='4';
                                }elseif( in_array($total_mark, range(30,34)) ){
                                    $grade="A-";
                                    $point='3.5';
                                }elseif( in_array($total_mark, range(25,29)) ){
                                    $grade="B";
                                    $point='3';
                                }elseif( in_array($total_mark, range(20,24)) ){
                                    $grade="C";
                                    $point='2';
                                }elseif( in_array($total_mark, range(17,19)) ){
                                    $grade="D";
                                    $point='1';
                                }elseif( in_array($total_mark, range(0,16)) ){
                                    $grade="F";
                                    $point='0';
                                }else{
                                    $grade="Incorect";
                                    $point='0';
                                }
                            }elseif($com_check->full_marks==3){

                            if ( in_array($total_mark, range(125,150)) ) {
                                $grade="A+";
                                $point='5';
                                }elseif( in_array($total_mark, range(110,124)) ){
                                    $grade="A";
                                    $point='4';
                                }elseif( in_array($total_mark, range(95,109)) ){
                                    $grade="A-";
                                    $point='3.5';
                                }elseif( in_array($total_mark, range(80,94)) ){
                                    $grade="B";
                                    $point='3';
                                }elseif( in_array($total_mark, range(65,79)) ){
                                    $grade="C";
                                    $point='2';
                                }elseif( in_array($total_mark, range(50,69)) ){
                                    $grade="D";
                                    $point='1';
                                }elseif( in_array($total_mark, range(0,49)) ){
                                    $grade="F";
                                    $point='0';
                                }else{
                                    $grade="Incorect";
                                    $point='0';
                                }
                            }elseif($com_check->full_marks==4){
                                $total_mark_up=round($total_mark/2,0);

                                if ( in_array($total_mark_up, range(80,100)) ) {
                                    $grade="A+";
                                    $point='5';
                                    }elseif( in_array($total_mark_up, range(70,79)) ){
                                        $grade="A";
                                        $point='4';
                                    }elseif( in_array($total_mark_up, range(60,69)) ){
                                        $grade="A-";
                                        $point='3.5';
                                    }elseif( in_array($total_mark_up, range(50,59)) ){
                                        $grade="B";
                                        $point='3';
                                    }elseif( in_array($total_mark_up, range(40,49)) ){
                                        $grade="C";
                                        $point='2';
                                    }elseif( in_array($total_mark_up, range(33,39)) ){
                                        $grade="D";
                                        $point='1';
                                    }elseif( in_array($total_mark_up, range(0,32)) ){
                                        $grade="F";
                                        $point='0';
                                    }else{
                                    $grade="Incorect";
                                    $point='0';
                                }
                            }
                           ?></td>
                           <td style="width: 10%; text-align: center;"><?php echo $grade; ?></td>
                           <td style="width: 5%; text-align: center;"><?php echo $point; ?></td>
                       </tr>
                        <?php 
                            if ($com_check->subject_type==1) {
                                $compolsary++;
                                $total_point = $point+$total_point; 
                            } } ?>
                        
                    </tbody>
                </table>
                <?php } ?>
            </div>

            <table class="table invoice-total">
                <tbody>
                <tr>
                    <td><strong>GPA :</strong></td>
                    <td style="width: 10%; text-align: center;">
                        <?php 
                        $final_gpa = @$total_point/@$compolsary;
                        echo round(@$final_gpa,2);
                        ?>
                    </td>
                </tr>
                </tbody>
            </table>

            <div style="margin-top: 80px;"></div><br><br><br><br><br>

            <div class="row">
                <div class="col-sm-2 text-center">
                    <hr style="height:2px;background-color:#DDDDDD;" /><strong>Class Teacher</strong>
                </div>

                <div class="col-sm-8"></div>

                <div class="col-sm-2 text-center">
                    <hr style="height:2px;background-color:#DDDDDD;" /><strong>Principle</strong>
                </div>

            </div>
        </div>
</div> -->
    
</div>