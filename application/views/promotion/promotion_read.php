<div class="container admin-container">
        <h2>รายละเอียดโปรโมชั่น</h2>
        <table class="table">
		 <tr><td>ชื่อโปรโมชั่น</td><td><?php echo $PromotionName; ?></td></tr>	
	    <tr><td>วันเริ่มโปรโมชั่น</td><td><?php echo $StartDate; ?></td></tr>
	    <tr><td>วันสิ้นสุดโปรโมชั่น</td><td><?php echo $EndDate; ?></td></tr>
		<tr><td>ประเภทโปรโมชั่น</td><td><?php echo $TypePromotion; ?></td></tr>
		<tr><td>ส่วนลดสินค้า</td><td><?php echo $UnitOfDiscount; ?></td></tr>
	    <tr><td>ราคาโปรโมชั่น</td><td><?php echo $Value; ?></td></tr>
		<tr><td>รายละเอียดโปรโมชั่น</td><td><?php echo $PromotionDetail; ?></td></tr>
		<tr><td>รูปภาพ</td><td><?php echo $ImagePath; ?></td></tr>
	    <tr><td></td><td><a href="<?php echo site_url('promotion') ?>" class="btn btn-custom-cancel">Cancel</a></td></tr>
	</table>
</div>
        