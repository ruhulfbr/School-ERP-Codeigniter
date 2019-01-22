<div class="wrapper wrapper-content">
	
	<div class="row wrapper border-bottom white-bg page-heading">
        <div class="col-lg-10">
            <h2><?php $segment_= $this->uri->segment(1);
                    echo  humanize($segment_); ?></h2>
        </div>
    </div>
</div>
<?php if(validation_errors()){?>
    <div class="alert alert-danger alert-dismissable">
        <button aria-hidden="true" data-dismiss="alert" class="close" type="button">close</button>
        <strong><?php echo validation_errors(); ?></strong>
    </div>
<?php }?>
<div class="row">

	<div class="tab-pane">
			
            <div class="panel-body">
                <?php echo form_open('expence_insert', 'class="form-horizontal"'); ?>
                <div class="form-group">
                    <label class="col-sm-2 control-label">Date</label>
                    <div class="col-sm-6">
                        <div class="col-sm-4">
                            <select class="form-control" name="year">
                                <option value="">Select</option>
                                <option value="2018">2018</option>
                                <option value="2019">2019</option>
                                <option value="2020">2020</option>
                                <option value="2021">2021</option>
                                <option value="2022">2022</option>
                            </select>
                        </div>
                        <div class="col-sm-4">
                            <select class="form-control" name="month">
                                <option value="">Select</option>
                                <option value="1">January</option>
                                <option value="2">February</option>
                                <option value="3">March</option>
                                <option value="4">April</option>
                                <option value="5">May</option>
                                <option value="6">June</option>
                                <option value="7">July</option>
                                <option value="8">August</option>
                                <option value="9">September</option>
                                <option value="10">October</option>
                                <option value="11">November</option>
                                <option value="12">December</option>
                            </select>
                        </div>
                        <div class="col-sm-4">
                            <select class="form-control" name="day">
                                <option value="">Select</option>
                                <option value="1">1</option>
                                <option value="2">2</option>
                                <option value="3">3</option>
                                <option value="4">4</option>
                                <option value="5">5</option>
                                <option value="6">6</option>
                                <option value="7">7</option>
                                <option value="8">8</option>
                                <option value="9">9</option>
                                <option value="10">10</option>
                                <option value="11">11</option>
                                <option value="12">12</option>
                                <option value="13">13</option>
                                <option value="14">14</option>
                                <option value="15">15</option>
                                <option value="16">16</option>
                                <option value="17">17</option>
                                <option value="18">18</option>
                                <option value="19">19</option>
                                <option value="20">20</option>
                                <option value="21">21</option>
                                <option value="22">22</option>
                                <option value="23">23</option>
                                <option value="24">24</option>
                                <option value="25">25</option>
                                <option value="26">26</option>
                                <option value="27">27</option>
                                <option value="28">28</option>
                                <option value="29">29</option>
                                <option value="30">30</option>
                                <option value="31">31</option>
                            </select>
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-sm-2 control-label">Amount</label>
                    <div class="col-sm-6">
                        <input type="day" class="form-control" name="amount" placeholder="Amount">
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-sm-2 control-label">Details</label>

                    <div class="col-sm-6">
                        <textarea class="form-control" name="details"></textarea>
                    </div>
                    <div class="col-sm-4">
                        <button class="btn btn-primary" type="submit">Save</button>
                    </div>
                </div>
                <?php echo form_close(); ?>
            </div>
        </div>
</div>