
<!-- Mainly scripts -->
    <script src="<?php echo base_url() ?>resource/js/jquery-3.1.1.min.js"></script>
    <script src="<?php echo base_url() ?>resource/js/bootstrap.min.js"></script>
    <script src="<?php echo base_url() ?>resource/js/plugins/metisMenu/jquery.metisMenu.js"></script>
    <script src="<?php echo base_url() ?>resource/js/plugins/slimscroll/jquery.slimscroll.min.js"></script>
    <script src="<?php echo base_url() ?>resource/js/plugins/chosen/chosen.jquery.js"></script>

    <!-- Custom and plugin javascript -->
    <script src="<?php echo base_url() ?>resource/js/inspinia.js"></script>

    <script>
	var myVar = setInterval(function(){ myTimer() }, 1000);

	function myTimer() {
	    var d = new Date();
	    var t = d.toLocaleTimeString();
	    document.getElementById("time_now").innerHTML = t;
	}
	</script>
        <!-- If this page need any js, put it here -->
    <script src="<?php echo base_url() ?>resource/js/plugins/dataTables/datatables.min.js"></script>
    <!-- Page-Level Scripts -->
        <script>
            $(document).ready(function(){
                $('.dataTables-example').DataTable({
                    pageLength: 25,
                    responsive: true,
                    dom: '<"html5buttons"B>lTfgitp',
                    buttons: [
                        { extend: 'copy'},
                        {extend: 'csv'},
                        {extend: 'excel', title: 'ExampleFile'},
                        {extend: 'pdf', title: 'ExampleFile'},

                        {extend: 'print',
                         customize: function (win){
                                $(win.document.body).addClass('white-bg');
                                $(win.document.body).css('font-size', '10px');

                                $(win.document.body).find('table')
                                        .addClass('compact')
                                        .css('font-size', 'inherit');
                        }
                        }
                    ]

                });

            });

    </script>
	<script src="<?php echo base_url(); ?>script/jquery-3.0.0.js"></script>

    <script type='text/javascript'>
        // baseURL variable
        var baseURL= "<?php echo base_url();?>";
        
        $(document).ready(function(){
            
            $('#class_id').change(function(){
                var class9 = $(this).val();

                // AJAX request
                $.ajax({
                    url:'<?=base_url()?>index.php/class_controller/section_data',
                    method: 'post',
                    data: {class: class9},
                    dataType: 'json',
                    success: function(response){

                        // Remove options
                        $('#sel_section').find('option').not(':first').remove();
                        $('#sel_term').find('option').not(':first').remove();

                        // Add options
                        $.each(response,function(index,data){
                            $('#sel_section').append('<option value="'+data['id']+'">'+data['section_name']+'</option>');
                        });
                    }
                });
            });
        });
    </script>

    <script type='text/javascript'>
        // baseURL variable
        var baseURL= "<?php echo base_url();?>";
        
        $(document).ready(function(){
            
            // Term change
            $('#class_id').change(function(){
                var term = $(this).val();

                // AJAX request
                $.ajax({
                    url:'<?=base_url()?>index.php/class_controller/term_data',
                    method: 'post',
                    data: {term: term},
                    dataType: 'json',
                    success: function(response){
                        
                        // Remove options
                        $('#sel_term').find('option').not(':first').remove();

                        // Add options
                        $.each(response,function(index,data){
                            $('#sel_term').append('<option value="'+data['id']+'">'+data['term_name']+'_'+data['year']+'</option>');
                        });
                    }
                });
            });
        });
    </script>

    <script type='text/javascript'>
        // baseURL variable
        var baseURL= "<?php echo base_url();?>";
        
        $(document).ready(function(){
            
            // Subject
            $('#class_id').change(function(){
                var subject = $(this).val();

                // AJAX request
                $.ajax({
                    url:'<?=base_url()?>index.php/class_controller/subject_data',
                    method: 'post',
                    data: {subject_id: subject},
                    dataType: 'json',
                    success: function(response){
                        
                        // Remove options
                        $('#sel_subject').find('option').not(':first').remove();

                        // Add options
                        $.each(response,function(index,data){
                            $('#sel_subject').append('<option value="'+data['subject_id']+'">'+data['subject_name']+'</option>');
                        });
                    }
                });
            });
        });
    </script>

    <script type='text/javascript'>
        // baseURL variable
        var baseURL= "<?php echo base_url();?>";

        $(document).ready(function(){

            // Subject
            $('#sel_section').change(function(){
                var section = $(this).val();

                // AJAX request
                $.ajax({
                    url:'<?=base_url()?>index.php/Student_controller/student_name',
                    method: 'post',
                    data: {section_id: section},
                    dataType: 'json',
                    success: function(response){

                        // Remove options
                        $('#sel_student').find('option').not(':first').remove();

                        // Add options
                        $.each(response,function(index,data){
                            $('#sel_student').append('<option value="'+data['s_id']+'">'+data['s_f_name']+'</option>');
                        });
                    }
                });
            });
        });
    </script>

    <!-- iCheck -->
    <script src="<?php echo base_url() ?>resource/js/plugins/iCheck/icheck.min.js"></script>
    <script>
        $(document).ready(function () {
            $('.i-checks').iCheck({
                checkboxClass: 'icheckbox_square-green',
                radioClass: 'iradio_square-green',
            });
        });
    </script>

    <script>
        function toggle(source) {
            var checkboxes = document.querySelectorAll('input[type="checkbox"]');
            for (var i = 0; i < checkboxes.length; i++) {
                if (checkboxes[i] != source)
                    checkboxes[i].checked = source.checked;
            }
        }
    </script>

    <script type="text/javascript">
    $(document).ready(function(){
        var maxField = 5; //Input fields increment limitation
        var addButton = $('.add_button'); //Add button selector
        var wrapper = $('.field_wrapper'); //Input field wrapper
        var fieldHTML = '<div><select name="account[]" class="form-control chosen-select"><option value="none"> -- Select Account --</option><?php foreach ($account_head_income as $value) { ?><option value="<?php echo $value->head_id?>"><?php echo $value->head_name?><?php }?></option></select><input type="text" name="total_amount[]" class="form-control" value=""/><a href="javascript:void(0);" class="remove_button">Remove</a></div>'; //New input field html 
        var x = 1; //Initial field counter is 1
        
        //Once add button is clicked
        $(addButton).click(function(){
            //Check maximum number of input fields
            if(x < maxField){ 
                x++; //Increment field counter
                $(wrapper).append(fieldHTML); //Add field html
            }
        });
        
        //Once remove button is clicked
        $(wrapper).on('click', '.remove_button', function(e){
            e.preventDefault();
            $(this).parent('div').remove(); //Remove field html
            x--; //Decrement field counter
        });
    });
    </script>

    <script type='text/javascript'>
       
       $(document).ready(function(){
            
            $('#payment_method').change(function(){
                var payment = $(this).val();
                var wrapper = $('.fll');
                if(payment == 2){
                    // $(wrapper).remove();
                    // console.log(payment);
                    var fieldHTML = '<label class="col-sm-2 control-label">Identity</label><div class="col-sm-4"><input class="form-control" type="text" name="identity" placeholder="If payment method is Bank Check" value="<?php echo set_value('identity'); ?>"></div>';
                    $(wrapper).append(fieldHTML);
                }else if(payment == 1){
                    $(wrapper).remove();
                    // console.log(payment);
                }else {
                    $(wrapper).remove();
                }
            });
        });
    </script>
    <script type="text/javascript">
        $(document).ready(function(){
            $('.chosen-select').chosen({width: "100%"});  
           });
    </script>
	