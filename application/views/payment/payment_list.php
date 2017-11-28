
        <h2 style="margin-top:0px">การชำระเงิน</h2>
        <?php if($this->session->userdata('message')){ ?>
        <div class="row">
            <div class="alert alert-success text-center">
            <?php echo $this->session->userdata('message') <> '' ? $this->session->userdata('message') : ''; ?>
            </div>
        </div>
        <?php } ?>

        <?php if($this->session->userdata('error_message')){ ?>
        <div class="row">
            <div class="alert alert-danger text-center">
            <?php echo $this->session->userdata('error_message') <> '' ? $this->session->userdata('error_message') : ''; ?>
            </div>
        </div>
        <?php } ?>
        <div class="row" style="margin-bottom: 10px">
            <div class="col-md-8 text-center">

            </div>
            <div class="col-md-1 text-right">
            </div>
            <div class="col-md-3 text-right">
                <form action="<?php echo site_url('payment/index'); ?>" class="form-inline" method="get">
                    <div class="input-group">
                        <input type="text" class="form-control" name="q" value="<?php echo $q; ?>">
                        <span class="input-group-btn">
                            <?php 
                                if ($q <> '')
                                {
                                    ?>
                                    <a href="<?php echo site_url('payment'); ?>" class="btn btn-default">Reset</a>
                                    <?php
                                }
                            ?>
                          <button class="btn btn-primary" type="submit">Search</button>
                        </span>
                    </div>
                </form>
            </div>
        </div>
        <table class="table table-bordered" style="margin-bottom: 10px">
            <tr>
                <th>No</th>
		<th>วัน-เวลาการจ่ายเงิน</th>
		<th>ราคารวมสินค้า</th>
		<th>OrderID</th>
		<th>หมายเลขโทรศัทพ์</th>
		<th>ธนาคาร</th>
		<th>รูปภาพ</th>
		<th>สถานะออเดอร์</th>
        <th>ยืนยันออเดอร์</th>
        <th>ลบ</th>
            </tr><?php
            foreach ($payment_data as $payment)
            {
                ?>
                <tr>
			<td width="80px"><?php echo ++$start ?></td>
			<td><?php echo $payment->PaymentDate ?></td>
			<td><?php echo $payment->TotalPrice ?></td>
			<td><?php echo $payment->OrderID ?></td>
			<td><?php echo $payment->PhoneNum ?></td>
			<td><?php echo $payment->bank ?></td>
			<td><?php echo $payment->ImagePath ?></td>
			<td><?php echo getThaiOrder($payment->OrderStatus); ?></td>
			<td >
                <?php if($payment->OrderStatus==="wait_confirm"){ ?>
                <a href="<?php echo site_url("order/confirm/". $payment->OrderID.  "?from=payment") ?>" class="btn btn-default">ยืนยันออเดอร์ไอดี <?php echo $payment->OrderID ?></a>
                <?php } ?>
            </td>
            <td>
                <a onclick="return confirm('ยืนยันการลบ?')" href="<?php echo site_url("payment/delete/").$payment->PaymentID; ?>"><i class="fa fa-trash-o" aria-hidden="true"></i></a>
            </td>
		</tr>
                <?php
            }
            ?>
        </table>
        <div class="row">
            <div class="col-md-6">
                <a href="#" class="btn btn-primary">Total Record : <?php echo $total_rows ?></a>
	    </div>
            <div class="col-md-6 text-right">
                <?php echo $pagination ?>
            </div>
        </div>
        