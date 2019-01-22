<?php include 'header_link.php'; ?>
    <?php include 'navigation.php'; ?>
        <?php include 'header.php'; ?>
   		    <div class="wrapper wrapper-content">
                <div class="row">
				<div class="col-lg-12">
                    <div class="ibox float-e-margins">
                        <div class="ibox-title">
                            <h5>
                                Website Banner Change
                                  <font color="blue">
                                      <?php
                                     
                                     $ProductInformation = $this->session->userdata('success');
                                     if(isset($ProductInformation))
                                     {
                                         
                                         echo $ProductInformation;
                                         $this->session->unset_userdata('success');
                                     }
                                     
                                     ?>
                                  </font>                               
                            </h5>
                        </div>
                        <div class="ibox-content">
                            <?php echo form_open('/web_controller/banner_insert', 'class="form-horizontal" enctype="multipart/form-data"'); ?>                                
                                <div class="form-group"><label class="col-sm-2 control-label">Banner Update</label>
                                    <div class="col-sm-10">
                                    	<input type="file" name="image" id="exampleInputFile" required="">
                                        <p class="help-block">Upload Image width-1180, height-180</p>
                                    </div>
                                </div>                                                                
                                <div class="hr-line-dashed"></div>  

                                <div class="form-group"><label class="col-sm-2 control-label">Banner</label>
                                    <div class="col-sm-10">
                                        <img src="<?php echo base_url();?>web/img/banner/<?php echo $banner_img->images;?>" style="width:240px;" required="">
                                    </div>
                                </div>                                                                
                                <div class="hr-line-dashed"></div>                                  								  
                                <div class="form-group">
                                    <div class="col-sm-4 col-sm-offset-2">
                                        <button class="btn btn-primary" type="submit">Save changes</button>
                                    </div>
                                </div>
                            <?php echo form_close(); ?>
                        </div>
                    </div>
                </div>
                </div>
            </div>
            <?php include 'footer.php'; ?>
        </div>
		<?php include 'right-sidebar.php'; ?>
    </div>
<?php include 'footer_link.php'; ?>
    