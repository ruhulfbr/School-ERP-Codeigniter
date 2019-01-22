<div class="row wrapper border-bottom white-bg page-heading">
    <div class="col-lg-10">
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
    <div class="col-lg-2">

    </div>
</div>
<div class="wrapper wrapper-content">
                
    <div class="row">
        <?php 
            if($this->session->flashdata('error_term')){?>
            <div class="alert alert-danger alert-dismissable">
                <button aria-hidden="true" data-dismiss="alert" class="close" type="button">close</button>
                <strong><?php echo $this->session->flashdata('error_term'); ?></strong>
            </div>
        <?php }?>

        <div class="col-lg-12">
            <div class="ibox">
                <?php echo form_open('student_report_card_search'); ?>

                <div class="col-sm-2">
                    <select id="sel_term" name="term" class="form-control m-b">
                        <option value="none">-- Select term --</option>
                        <?php foreach($term_data as $term_info){ ?>
                            <?php
                            echo "<option value='".$term_info->exam_id."'>".$term_info->term_name."_".$term_info->year."</option>";
                            ?>
                        <?php } ?>
                    </select>
                </div>

                <div class="col-sm-2">
                    <input type="submit" class="btn btn-primary" name="submit" value="Get Result">
                </div>
                <?php echo form_close(); ?>
            </div>

        </div>

        <div class="col-lg-12">

            
        
        </div>

    </div>
</div>


