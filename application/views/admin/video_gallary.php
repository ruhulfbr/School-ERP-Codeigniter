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
    <div class="col-lg-2"><br><br>
        <a class="btn btn-primary" href="<?php echo base_url('add_video');?>">Add Video</a>
    </div>
</div>
<div class="wrapper wrapper-content animated fadeInRight">
    <div class="row">
        <?php if(@$video_list){
            foreach ($video_list as $value) { ?>
                
            <div class="col-lg-6">
                <div class="ibox float-e-margins">
                    <div class="ibox-title">
                        <h5><?php echo $value->video_title; ?></h5>
                        <div class="ibox-tools">
                            <a class="collapse-link">
                                <i class="fa fa-chevron-up"></i>
                            </a>
                        </div>
                    </div>
                    <div class="ibox-content">
                        <video width="400" controls>
                          <source src="<?php echo base_url('web_resource/video/').$value->video_link; ?>" type="video/mp4">
                          Your browser does not support HTML5 video.
                        </video>
                    </div>
                </div>
            </div>

        <?php }} elseif (@$add_video) { ?>
        <div class="panel-body">
           <?php echo form_open_multipart('video_insert', 'class="form-horizontal"'); ?>

            <div class="form-group"><label class="col-sm-2 control-label">Title</label>
                <div class="col-sm-6">
                    <input class="form-control" type="text" name="video_title" >
                </div>
            </div>
            <div class="hr-line-dashed"></div>
            <div class="form-group"><label class="col-sm-2 control-label">Video</label>
                <div class="col-sm-6">
                    <input type="text" class="form-control" name="video_link">
                </div>
            </div>                                                              
            <div class="hr-line-dashed"></div>    
            <div class="form-group">
                <div class="col-sm-4 col-sm-offset-2">
                    <button class="btn btn-primary" type="submit">Save</button>
                </div>
            </div>
           <?php echo form_close()?>

        </div>
        <?php } ?>
    </div>
</div>