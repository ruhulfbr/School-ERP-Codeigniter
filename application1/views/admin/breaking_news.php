<div class="wrapper wrapper-content">
    <div class="row">
	<div class="col-lg-12">
        <div class="ibox float-e-margins">
            <div class="ibox-title">
                <h5>Breaking News</h5>
            </div>
        <div class="tabs-container">
            <ul class="nav nav-tabs">
                <li class="active"><a data-toggle="tab" href="#tab-1" aria-expanded="true"> News add</a></li>
                <li class=""><a data-toggle="tab" href="#tab-3" aria-expanded="false">News Edit</a></li>
            </ul>
            <div class="tab-content">
                <div id="tab-1" class="tab-pane active">
                    <div class="panel-body">
                        <?php echo form_open('breaking_news_insert', 'class="form-horizontal"'); ?>
                            <div class="form-group"><label class="col-sm-2 control-label">News Add</label>
                                <div class="col-sm-10">
                                    <textarea class="form-control" rows="3" name="news"></textarea>
                                </div>
                            </div>
                            <div class="hr-line-dashed"></div>  
                            <div class="form-group">
                                <div class="col-sm-4 col-sm-offset-2">
                                    <button class="btn btn-primary" type="submit">Save</button>
                                </div>
                            </div>
                        <?php echo form_close();?>
                    </div>
                </div>
                <div id="tab-3" class="tab-pane">
                    <div class="panel-body">
                        <div class="col-lg-12">
                                    <table class="table table-bordered">
                                        <thead>
                                        <tr>
                                            <th>#</th>
                                            <th>News</th>
                                            <th>Delete</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                            <?php
                                            $no=0;
                                            foreach ($breacking_news as $value) {
                                                $no++; ?>
                                                <tr>
                                                    <td><?php echo $no; ?></td>
                                                    <td><?php echo $value->news; ?></td>
                                                    <td>
                                                        <a class="btn-sm btn btn-danger" href="<?php echo base_url("breacking_news_delete/").$value->id;?>"><span class="glyphicon glyphicon-trash"></span>  Delete</a>
                                                    </td>
                                                </tr>
                                            <?php } ?>
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
    