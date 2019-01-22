<div class="wrapper wrapper-content">
    <div class="row">
    <div class="col-lg-12">
        <?php if (@$speech) { ?>
        <div class="ibox float-e-margins">
            <div class="ibox-title">
                <h5>Speech</h5>
                <div class="ibox-tools">
                    <a class="collapse-link">
                        <i class="fa fa-chevron-up"></i>
                    </a>
                </div>
            </div>
            <div class="ibox-content" style="">

                <table class="table table-bordered">
                    <thead>
                    <tr>
                        <th>#</th>
                        <th>Identifier</th>
                        <th>Image</th>
                        <th>Title</th>
                        <th>Action</th>
                    </tr>
                    </thead>
                    <tbody>
                        <?php if (@$speech) { $no=0;
                            foreach ($speech as $value) {
                                $no=$no+1; ?>
                                <tr>
                                    <td><?php echo $no;?></td>
                                    <td><?php echo $value->identifier;?></td>
                                    <td><img src="<?php echo base_url('web_resource/speech/').$value->image; ?>" height="42" width="42"></td>
                                    <td><?php echo $value->title;?></td>
                                    <td><a href="<?php echo base_url('speech_edit/').$value->id; ?>">EDIT</a></td>
                                </tr>
                         <?php }} ?>
                    </tbody>
                </table>

            </div>
        </div>
        <?php }elseif(@$speech_single){ ?>
        <div class="panel-body">
           <?php echo form_open_multipart('speech_update', 'class="form-horizontal"'); ?>
           <input type="hidden" name="id" value="<?php echo $speech_single->id; ?>">
           <input type="hidden" name="prev_image" value="<?php echo $speech_single->image; ?>">
            <div class="form-group"><label class="col-sm-2 control-label">Title</label>
                <div class="col-sm-10">
                    <input class="form-control" type="text" name="title" value="<?php echo $speech_single->title?>">
                </div>
            </div>
            <div class="hr-line-dashed"></div>
            <div class="form-group"><label class="col-sm-2 control-label">Speech</label>
                <div class="col-sm-10">
                    <textarea class="form-control" name="speech"><?php echo $speech_single->speech?></textarea>
                </div>
            </div>
            <div class="hr-line-dashed"></div>                                    
            <div class="form-group"><label class="col-sm-2 control-label">Picture</label>
                <div class="col-sm-10">
                    <input type="file" id="fileUpload" name="image">
                    <div id="image-holder"></div>
                </div>
            </div>                                                                
            <div class="hr-line-dashed"></div>    
            <div class="form-group">
                <div class="col-sm-4 col-sm-offset-2">
                    <button class="btn btn-primary" type="submit">Save changes</button>
                </div>
            </div>
           <?php echo form_close()?>
        </div>
        <?php }?>
    </div>
    </div>
</div>