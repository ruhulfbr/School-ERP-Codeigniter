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
    <?php echo form_open_multipart('image_gallery_insert'); ?>
    <div class="col-lg-2"><br><br>
        <input type="file" name="image_gallery">
    <p><strong>Resolution must be at least 1024x768</strong></p>
    </div>
    <div class="col-lg-2 form-group"><br><br>
        <input type="submit"  class="btn btn-primary" name="submit" value="Upload">
    </div>
    <?php echo form_close(); ?>
</div>
<div class="wrapper wrapper-content">
    <div class="row">
        <div class="col-lg-12">
            <div class="ibox float-e-margins">

                <div class="ibox-content">
                    
                    <div class="lightBoxGallery">
                        <?php if (@$photo_gallery) {
                            foreach ($photo_gallery as $value) { ?>
                                <a href="<?php echo base_url('web_resource/photo_gallary/').$value->image; ?>" data-gallery=""><img src="<?php echo base_url('web_resource/photo_gallary/').$value->image; ?>" height="250" width="300"></a>
                                <a href="<?php echo base_url('gallary_photo_delete/').$value->id; ?>"><i class="glyphicon glyphicon-trash"></i></a>
                        <?php }} ?>
                        <div class="row">
                            <center>
                                <?= $this->pagination->create_links(); ?>
                            </center>       
                        </div>  

                        <div id="blueimp-gallery" class="blueimp-gallery">
                            <div class="slides"></div>
                            <h3 class="title"></h3>
                            <a class="prev">‹</a>
                            <a class="next">›</a>
                            <a class="close">×</a>
                            <a class="play-pause"></a>
                            <ol class="indicator"></ol>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>