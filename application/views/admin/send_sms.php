<?php include 'header_link.php'; ?>

    <?php include 'navigation.php'; ?>

        <?php include 'header.php'; ?>
            <link href="<?php echo base_url() ?>resource/css/plugins/dataTables/datatables.min.css" rel="stylesheet">
            <style type="text/css">
                .time p small
                {
                    padding-left: 10px;
                }
            </style>

            <div class="wrapper wrapper-content">

                <?php echo form_open('send_sms'); ?>
                <div class="col-sm-3">
                    <label>Message</label>
                    <input type="text" class="form-control m-b" name="message_body">
                </div>
                <div class="col-sm-3">
                    <label>Number</label>
                    <input type="text" class="form-control m-b" name="number">
                </div>
                <div class="col-sm-3">
                    <br>
                    <button class="btn btn-primary" type="submit">Send</button>
                </div>
                <?php echo form_close(); ?>

            </div>
            <?php include 'footer.php'; ?>

        </div>
        
        <?php include 'right-sidebar.php'; ?>

    </div>
    <?php include 'footer_link.php'; ?>

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
 
</body>
</html>


