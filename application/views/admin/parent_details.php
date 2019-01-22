<?php include 'header_link.php'; ?>
    <?php include 'navigation.php'; ?>
        <?php include 'header.php'; ?>
		    <div class="wrapper wrapper-content">
		    	
                <div class="col-sm-6">
                    <select class="form-control m-b" name="account">
                        <option>Select Class</option>
                        <option>option 2</option>
                        <option>option 3</option>
                        <option>option 4</option>
                    </select>
                </div>
                <div class="col-sm-6">
                    <select class="form-control m-b" name="account">
                        <option>Select Section</option>
                        <option>option 2</option>
                        <option>option 3</option>
                        <option>option 4</option>
                    </select>
                </div>
                <!-- <div class="col-sm-2">
                    <a data-toggle="modal" class="btn btn-primary" href="#modal-form">Add Routine</a>
                </div> -->
                <div id="modal-form" class="modal fade" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-body">
                                <div class="row">
                                    <div class="col-sm-12 b-r"><h3 class="m-t-none m-b">Add Routine</h3>

                                        <form role="form">
                                            <div class="form-group"><label>Date</label> <input type="date" class="form-control"></div>
                                            <div class="form-group"><label>Day</label>
                                                <select class="form-control m-b" >
                                                <option>Select Date</option>
                                                <option>Sunday</option>
                                                <option>Monday</option>
                                                <option>Tusday</option>
                                                <option>Wednesday</option>
                                                <option>Thursday</option>
                                                <option>Friday</option>
                                                <option>Saturday</option>
                                            </select>
                                            </div>
                                            <div class="form-group">
                                                <div class="col-sm-2">
                                                    <label>Time</label>
                                                </div>
                                                <div class="col-sm-5">
                                                    <input type="time" class="form-control">
                                                </div>
                                                <div class="col-sm-5">
                                                    <input type="time" class="form-control">
                                                </div>
                                            </div>
                                            <div class="form-group"><label>Teacher</label>
                                            <select class="form-control m-b" >
                                                <option>Select Teacher</option>
                                                <option>option 2</option>
                                                <option>option 3</option>
                                                <option>option 4</option>
                                            </select>
                                            </div>
                                            <div>
                                                <button class="btn btn-sm btn-primary pull-right m-t-n-xs" type="submit"><strong>Save</strong></button>
                                                <!-- <label> <input type="checkbox" class="i-checks"> Remember me </label> -->
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-lg-12">
                        <div class="contact-box">
                            
                            <div class="col-sm-4">
                                <div class="text-center">
                                    <img alt="image" class="img-circle m-t-xs img-responsive" src="<?php echo base_url() ?>resource/img/a2.jpg">
                                    <div class="m-t-xs font-bold"></div>
                                </div>
                            </div>
                            <div class="col-sm-8">
                                <h3><strong>John Smith</strong></h3>
                                <p><i class="fa fa-map-marker"></i> Riviera State 32/106</p>
                                <address>
                                    <strong>Twitter, Inc.</strong><br>
                                    795 Folsom Ave, Suite 600<br>
                                    San Francisco, CA 94107<br>
                                    <abbr title="Phone">P:</abbr> (123) 456-7890
                                </address>
                            </div>
                            <div class="clearfix"></div>
                        </div>
                    </div>
                </div>
                
		    </div>

		    

            <?php include 'footer.php'; ?>
        </div>
		<?php include 'right-sidebar.php'; ?>
    </div>
<?php include 'footer_link.php'; ?>


