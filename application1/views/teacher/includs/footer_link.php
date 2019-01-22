
<!-- Mainly scripts -->
    <script src="<?php echo base_url() ?>resource/js/jquery-3.1.1.min.js"></script>
    <script src="<?php echo base_url() ?>resource/js/bootstrap.min.js"></script>
    <script src="<?php echo base_url() ?>resource/js/plugins/metisMenu/jquery.metisMenu.js"></script>
    <script src="<?php echo base_url() ?>resource/js/plugins/slimscroll/jquery.slimscroll.min.js"></script>

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
                            $('#sel_term').append('<option value="'+data['exam_id']+'">'+data['term_name']+'_'+data['year']+'</option>');
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

    <!-- Full Calendar -->
    <script src="<?php echo base_url() ?>resource/js/plugins/fullcalendar/moment.min.js"></script>
    <script src="<?php echo base_url() ?>resource/js/plugins/jquery-ui/jquery-ui.min.js"></script>
    <script src="<?php echo base_url() ?>resource/js/plugins/fullcalendar/fullcalendar.min.js"></script>

    <script>

        $(document).ready(function() {

                $('.i-checks').iCheck({
                    checkboxClass: 'icheckbox_square-green',
                    radioClass: 'iradio_square-green'
                });

            /* initialize the external events
             -----------------------------------------------------------------*/


            $('#external-events div.external-event').each(function() {

                // store data so the calendar knows to render an event upon drop
                $(this).data('event', {
                    title: $.trim($(this).text()), // use the element's text as the event title
                    stick: true // maintain when user navigates (see docs on the renderEvent method)
                });

                // make the event draggable using jQuery UI
                $(this).draggable({
                    zIndex: 1111999,
                    revert: true,      // will cause the event to go back to its
                    revertDuration: 0  //  original position after the drag
                });

            });


            /* initialize the calendar
             -----------------------------------------------------------------*/
            var date = new Date();
            var d = date.getDate();
            var m = date.getMonth();
            var y = date.getFullYear();

            $('#calendar').fullCalendar({
                header: {
                    left: 'prev,next today',
                    center: 'title',
                    right: 'month,agendaWeek,agendaDay'
                },
                editable: true,
                droppable: true, // this allows things to be dropped onto the calendar
                drop: function() {
                    // is the "remove after drop" checkbox checked?
                    if ($('#drop-remove').is(':checked')) {
                        // if so, remove the element from the "Draggable Events" list
                        $(this).remove();
                    }
                }
            });


        });

    </script>
	