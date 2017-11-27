
        <h2 style="margin-top:0px">ออเดอร์สินค้า</h2>
        <div class="row" style="margin-bottom: 10px">
          
            <div class="col-md-8 text-center">
                <div style="margin-top: 8px" id="message">
                    <?php echo $this->session->userdata('message') <> '' ? $this->session->userdata('message') : ''; ?>
                </div>
            </div>
            <div class="col-md-1 text-right">
            </div>
            <div class="col-md-3 text-right">
                <form action="<?php echo site_url('order/index'); ?>" class="form-inline" method="get">
                    <div class="input-group">
                        <input type="text" class="form-control" name="q" value="<?php echo $q; ?>">
                        <span class="input-group-btn">
                            <?php 
                                if ($q <> '')
                                {
                                    ?>
                                    <a href="<?php echo site_url('order'); ?>" class="btn btn-default">Reset</a>
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
                <th>ID</th>
		<th>หมายเลขออเดอร์</th>
		<th>เวลาสั่งสินค้า</th>
		<th>สถานะ</th>
		<th>รหัสลูกค้า</th>
        <th>ยืนยันออเดอร์</th>
        <th>ยืนยันการจัดส่ง</th>
		<th>ลบ</th>
            </tr>
            <?php
            foreach ($order_data as $order)
            {
                ?>
                <tr>
			<td width="80px"><?php echo ++$start ?></td>
			<td><?php echo $order->GenerateNo ?></td>
			<td><?php echo $order->OrderDate ?></td>
			<td><?php echo getThaiOrder($order->OrderStatus) ?></td>
			<td><?php echo $order->CustomerID ?></td>
            <td><a href="#" class="btn btn-default">ยืนยันออเดอร์</a></td>
            <td><a href="#" class="btn btn-default">ยืนยันจัดส่ง</a></td>
			<td>
                <a onclick="return confirm('ยืนยันการลบ?')" href="<?php echo site_url("order/delete").$order->OrderID; ?>"><i class="fa fa-trash-o" aria-hidden="true"></i></a>
			</td>
		</tr>
                <?php
            }
            ?>
        </table>
        <div class="row">
            <div class="col-md-6">
                <a href="#" class="btn btn-primary">Total Record : <?php echo $total_rows ?></a>
	    
    