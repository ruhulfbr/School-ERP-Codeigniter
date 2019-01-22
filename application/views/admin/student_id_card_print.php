        <?php include 'header_link.php'; ?>
        
            
            <style type="text/css">
                .id-card-holder {
                    width: 225px;
                    padding: 4px;
                    margin: 0 auto;
                    background-color: #1f1f1f;
                    border-radius: 5px;
                    position: relative;
                }
                .id-card-holder:after {
                    content: '';
                    width: 7px;
                    display: block;
                    background-color: #0a0a0a;
                    height: 100px;
                    position: absolute;
                    top: 105px;
                    border-radius: 0 5px 5px 0;
                }
                .id-card-holder:before {
                    content: '';
                    width: 7px;
                    display: block;
                    background-color: #0a0a0a;
                    height: 100px;
                    position: absolute;
                    top: 105px;
                    left: 222px;
                    border-radius: 5px 0 0 5px;
                }
                .id-card {
                    
                    background-color: #fff;
                    padding: 10px;
                    border-radius: 10px;
                    text-align: center;
                    box-shadow: 0 0 1.5px 0px #b9b9b9;
                }
                .id-card img {
                    margin: 0 auto;
                }
                .header img {
                    width: 100px;
                    margin-top: 15px;
                }
                .id-card-photo img {
                    width: 80px;
                    margin-top: 15px;
                }
                .id-card-h2 {
                    font-size: 15px;
                    margin: 5px 0;
                }
                .id-card-h3 {
                    font-size: 12px;
                    margin: 2.5px 0;
                    font-weight: 300;
                }
                .id-card-qr-code img {
                    width: 50px;
                }
                .id-card-p {
                    font-size: 5px;
                    margin: 2px;
                }
            </style>
            <body class="white-bg">
                <div class="wrapper wrapper-content  animated fadeInRight">
                    <div class="ibox-content">
                        <div class="row">
                            <div class="id-card-holder">
                            <div class="id-card">
                                <div class="header">
                                    <img src="<?php echo base_url() ?>resource/img/id-card-logo.png">
                                </div>
                                <div class="id-card-photo">
                                    <img src="<?php echo base_url() ?>resource/img/id-card-picture.png">
                                </div>
                                <h2 class="id-card-h2">Mohammad Siam Ahmed</h2>
                                <div class="id-card-qr-code">
                                    <img src="<?php echo base_url() ?>resource/img/id-card-barcode.png">
                                </div>
                                <h3 class="id-card-h3">www.dbnltd.com</h3>
                                <hr>

                                <p class="id-card-p"><strong>DBN LTD.</strong>House-75, Flat-6B, Shah Mukhdum Avenue, <p class="id-card-p">
                                <p class="id-card-p">Sector-12 Uttara, Dhaka-1230</p>
                                <p class="id-card-p">Ph: +880-190-655-0000 | E-mail: info@dbnltd.com</p>

                            </div>
                        </div>
                    </div>
                </div>
            </div>

    <script type="text/javascript">
        window.print();
    </script>
    <?php include 'footer_link.php'; ?>
