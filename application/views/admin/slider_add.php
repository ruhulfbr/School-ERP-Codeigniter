        <div class="wrapper wrapper-content">
            <div class="row">
                <?php if($this->session->flashdata('success')){?>
                    <div class="alert alert-success alert-dismissable">
                        <button aria-hidden="true" data-dismiss="alert" class="close" type="button">close</button>
                        <strong><?php echo $this->session->flashdata('success'); ?></strong>
                    </div>
                <?php }elseif($this->session->flashdata('error')){?>
                    <div class="alert alert-danger alert-dismissable">
                        <button aria-hidden="true" data-dismiss="alert" class="close" type="button">close</button>
                        <strong><?php echo $this->session->flashdata('error'); ?></strong>
                    </div>
                <?php }?>
                <?php if($this->session->flashdata('success_delete')){?>
                    <div class="alert alert-success alert-dismissable">
                        <button aria-hidden="true" data-dismiss="alert" class="close" type="button">close</button>
                        <strong><?php echo $this->session->flashdata('success_delete'); ?></strong>
                    </div>
                <?php }elseif($this->session->flashdata('error_delete')){?>
                    <div class="alert alert-danger alert-dismissable">
                        <button aria-hidden="true" data-dismiss="alert" class="close" type="button">close</button>
                        <strong><?php echo $this->session->flashdata('error_delete'); ?></strong>
                    </div>
                <?php } ?>
                <div class="col-lg-12">
                    <div class="ibox float-e-margins">
                        
                    <div class="tabs-container">
                        <ul class="nav nav-tabs">
                            <li class="active"><a data-toggle="tab" href="#tab-1" aria-expanded="true"> Slider add</a></li>
                            <li class=""><a data-toggle="tab" href="#tab-3" aria-expanded="false">Slider Edit</a></li>
                        </ul>
                        <div class="tab-content">
                            <div id="tab-1" class="tab-pane active">
                                <div class="panel-body">
                            <?php echo form_open_multipart('slider_insert', 'class="form-horizontal"'); ?>
                                        <div class="form-group"><label class="col-sm-2 control-label">Slider Title</label>
                                            <div class="col-sm-10">
                                                <input class="form-control" name="title" type="text" required="">
                                            </div>
                                        </div>
                                        <div class="hr-line-dashed"></div>
                                        <div class="form-group"><label class="col-sm-2 control-label">Slider Image Add</label>
                                            <div class="col-sm-10">
                                               <input type="file" name="image" id="fileUpload" required="">
                                               <p>Image Height : 430, Width : 748, size : 3MB</p>
                                               <div id="image-holder"></div>
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
                            <div id="tab-3" class="tab-pane">
                                <div class="panel-body">
                                    <div class="col-lg-12">
                                                <table class="table table-bordered">
                                                    <thead>
                                                    <tr>
                                                        <th>#</th>
                                                        <th>Slider Title</th>
                                                        <th>Image</th>
                                                        <th>Delete</th>
                                                    </tr>
                                                    </thead>
                                               
                                                  <tbody>
                                                    <?php 
                                                      
                                                      foreach ($slider_img as $value) {
                                                                             
                                                    ?> 
                                                    <tr>
                                                        <td><?php echo $value->id;?></td>
                                                        <td><?php echo $value->title;?></td>
                                                        <td><img src="<?php echo base_url('web_resource/slider/').$value->image;?>" style="width:40px;" ></td>
                                                        <td>
                                                            <a href="<?php echo base_url('slider_delete/').$value->id;?>" class="btn-sm btn btn-danger" >
                                                               <span class="glyphicon glyphicon-trash"></span> Delete
                                                            </a>
                                                        </td>
                                                    </tr>                      
                                                      <?php  }  ?>
                                                    </tbody>
                                                </table>
                                    </div>
                                </div>
                            </div>                            
                        </div>
                        </div>
                    </div>
                </div>
                </div>
            </div>
