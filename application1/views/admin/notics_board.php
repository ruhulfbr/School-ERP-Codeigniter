<div class="wrapper wrapper-content">
    <div class="row">
    <div class="col-lg-12">
        <div class="ibox float-e-margins">
            <div class="ibox-title">
                <h5>Notics Board</h5>
            </div>
        <div class="tabs-container">
            <ul class="nav nav-tabs">
                <li class="active"><a data-toggle="tab" href="#tab-1" aria-expanded="true"> Notics</a></li>
                <li class=""><a data-toggle="tab" href="#tab-2" aria-expanded="false">Notics add</a></li>
            </ul>
            <div class="tab-content">
                <div id="tab-2" class="tab-pane">
                    <div class="panel-body">
                       <?php echo form_open('notice_insert', 'class="form-horizontal"');?>
                        <div class="form-group"><label class="col-sm-2 control-label">Notics Title</label>
                            <div class="col-sm-10">
                                <input class="form-control" type="text" name="title" required>
                            <p>Maximum 28 caracter</p>
                            </div>
                        </div>
                        <div class="hr-line-dashed"></div>
                        <div class="form-group"><label class="col-sm-2 control-label">Notics Add</label>
                            <div class="col-sm-10">
                                <textarea class="form-control" name="details" required></textarea>
                                <p>Maximum 1000 caracter</p>
                            </div>
                        </div>                                                                
                        <div class="hr-line-dashed"></div>    
                        <div class="form-group">
                            <div class="col-sm-4 col-sm-offset-2">
                                <button class="btn btn-primary" type="submit">Save</button>
                            </div>
                        </div>
                       </form>
                    </div>
                </div>
                <div id="tab-1" class="tab-pane active">
                    <div class="panel-body">
                        <div class="col-lg-12">
                                    <table class="table table-bordered">
                                        <thead>
                                        <tr>
                                            <th>#</th>
                                            <th>Notics</th>
                                            <th>Details</th>
                                            <th>Delete</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        <?php if(@$notice){
                                            $no=0;
                                            foreach($notice as $value){
                                                $no=$no+1;?>
                                            <tr>
                                                <td><?php echo $no;?></td>
                                                <td><?php echo $value->title;?></td>
                                                <td><?php echo $value->details;?></td>
                                                <td>
                                                    <a href="<?php echo base_url('notice_delete/').$value->id;?>"  class="btn-sm btn btn-danger"><span class="glyphicon glyphicon-trash"></span> Delete</a>
                                                </td>
                                            </tr>
                                            <?php }}?>
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