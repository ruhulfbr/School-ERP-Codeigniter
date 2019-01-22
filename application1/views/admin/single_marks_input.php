<?php
    foreach ($student_info as $student_info) {
            $s_id = $student_info->s_id;
            $s_f_name = $student_info->s_f_name;
        } 
?><div class="row wrapper border-bottom white-bg page-heading">
    <div class="col-lg-10">
        <h2><?php $segment_= $this->uri->segment(2);
         echo  humanize($segment_); ?></h2>
        <ol class="breadcrumb">
            <li>
                <a href="<?php echo base_url('dashboard') ?>">Dashboard</a>
            </li>
            <li class="active">
                <strong><?php echo  humanize($segment_); ?></strong>
            </li>
        </ol>
    </div>
    <div class="col-lg-2">

    </div>
</div>
<?php echo form_open('result_add'); ?>
<div class="wrapper wrapper-content">
    
    <div class="row">

        <div class="col-lg-8">
            <div class="ibox float-e-margins">
                <div class="ibox-title">
                    <h5><?php echo $s_f_name;?></h5>
                </div>
                <div class="ibox-content">
                    
                    <table class="table">
                        <thead>
                        <tr>
                            <th style="text-align: center;">No</th>
                            <th style="text-align: left;">Subject</th>
                            <th style="text-align: center;">Marks</th>
                            <th style="text-align: center;">Subject Full Marks</th>
                        </tr>
                        </thead>
                        <tbody>
                            <input type="hidden" name="term" value="<?php echo $term;?>">
                            <input type="hidden" name="s_id" value="<?php echo $s_id;?>">
                            <?php if (@$subject_info) {
                                $no=0;
                                $i=0;

                                foreach ($subject_info as $subject_info) {
                                    $id = $i++ ?>
                                <tr>
                                    <input type="hidden" name="inde[]" value="<?php echo $s_id;?>">
                                    
                                    <input type="hidden" name="subject_id<?php echo $id; ?>" value="<?php echo $subject_info->subject_id;?>">

                                    <td style="text-align: center;"><?php echo $no=$no+1;?></td>
                                    <td style="text-align: left;"><?php echo $subject_info->subject_name;?></td>
                                    <td class="col-md-3">
                                        <input style="text-align: center;" type="text" name="mark<?php echo $id; ?>" placeholder="Marks" class="form-control">
                                    </td>
                                    <td style="text-align: center; color: red;"><?php 
                                    if ($subject_info->sub_mark==1) {
                                        echo "100";
                                    }elseif ($subject_info->sub_mark==2) {
                                        echo "70";
                                    }elseif ($subject_info->sub_mark==3) {
                                        echo "50";
                                    }elseif ($subject_info->sub_mark==4) {
                                        echo "40";
                                    }elseif ($subject_info->sub_mark==5) {
                                        echo "30";
                                    }elseif ($subject_info->sub_mark==6) {
                                        echo "25";
                                    }elseif ($subject_info->sub_mark==7) {
                                        echo "20";
                                    }elseif ($subject_info->sub_mark==8) {
                                        echo "10";
                                    } ?></td>
                                </tr>
                            <?php }} ?>
                        </tbody>
                    </table>

                </div>
            </div>
            <button class="btn btn-sm btn-primary pull-right m-t-n-xs" type="submit">
                <strong>Submit</strong>
            </button>
            <?php echo form_close(); ?>
        </div>
    </div>
</div>
