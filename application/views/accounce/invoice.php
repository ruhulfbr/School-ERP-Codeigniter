<?php foreach ($bill_data as $value){
    $s_f_name = $value->s_f_name;
    $date = new DateTime($value->curr_date);
    $inv_date = $date->format('d-m-Y');
    $dat = new DateTime($value->date);
    $due_date = $dat->format('d-m-Y');
    $status = $value->status;
    break;
} ?>
<style type="text/css" media="print">
    @page {
        size: auto;
        margin: 0;
    }
    /*.div {
            height: 842px;
            width: 595px;
    }*/

    body {
        background: rgb(204,204,204);
        margin-left: auto;
        margin-right: auto;
    }
    @media print {
      body, page {
        margin: 0;
        box-shadow: 0;
      }
    }
</style>
<page size="A4">

<body class="white-bg">
    <div class="wrapper wrapper-content p-xl">
        <div class="ibox-content p-xl">
            <div class="row">
                <div class="col-sm-6">
                    <h5>From:</h5>
                    <address>
                        <?php echo "<strong>".$school_info->name."</strong><br>".$school_info->address_1st_line."<br>".$school_info->address_2nd_line."<br><abbr>Phone:</abbr>".$school_info->phone."<br>";
                        ?>
                    </address>
                </div>

                <div class="col-sm-6 text-right">
                    <span>To:</span>
                    <address>
                        <?php echo "<strong>".$s_f_name."</strong><br>";?>
                    </address>
                    <p>
                        <span><strong>Invoice Date:</strong> <?php echo $inv_date; ?></span><br/>
                        <span><strong>Due Date:</strong> <?php echo $due_date; ?></span><br/>
                        <span><strong>Status:</strong> <?php echo $status; ?></span>
                    </p>
                </div>
            </div>

            <div class="table-responsive m-t">
                <table class="table ">
                    <thead>
                    <tr>
                        <th>#</th>
                        <th>Heads</th>
                        <th>Amount</th>
                    </tr>
                    </thead>
                    <tbody>
                        <?php $no=0;
                        $amount_full = 0;
                        foreach ($bill_data as $data) { 
                            $no++; ?>
                            <tr>
                                <td class="col-md-1"><?php echo $no; ?></td>
                                <td class="col-md-10">
                                    <div><strong><?php echo $data->head_name; ?></strong></div>
                                </td>
                                <td class="col-md-1"><?php echo $data->total_amount." TK"; 
                                $amount_full = $amount_full+$data->total_amount; ?></td>
                            </tr>
                        <?php } ?>
                    

                    </tbody>
                </table>
            </div><!-- /table-responsive -->

            <table class="table invoice-total">
                <tbody><tr>
                    <td><strong>TOTAL :</strong></td>
                    <td><?php echo $amount_full." TK"?></td>
                </tr>
                </tbody>
            </table>
        </div>

    </div>
<script type="text/javascript">
    window.print();
</script>