<div class="container admin-container">
        <h2 style="margin-top:0px">การจ่ายเงิน</h2>
        <table class="table">
	    <tr><td>วัน-เวลาการจ่ายเงิน</td><td><?php echo $PaymentDate; ?></td></tr>
	    <tr><td>รวมทั้งหมด</td><td><?php echo $TotalPrice; ?></td></tr>
	    <tr><td>OrderID</td><td><?php echo $OrderID; ?></td></tr>
	    <tr><td>หมายเลขโทรศัพท์</td><td><?php echo $PhoneNum; ?></td></tr>
	    <tr><td>ธนาคาร</td><td><?php echo $bank; ?></td></tr>
	    <tr><td>รูปภาพ</td><td><?php echo $ImagePath; ?></td></tr>
	    <tr><td></td><td><a href="<?php echo site_url('payment') ?>" class="btn btn-default">Cancel</a></td></tr>
	</table>
</div>