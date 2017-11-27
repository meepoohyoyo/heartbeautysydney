<div class="container admin-container">
        <h2 style="margin-top:0px">Product Read</h2>
        <table class="table">
	    <tr><td>ชื่อสินค้า</td><td><?php echo $ProductName; ?></td></tr>
	    <tr><td>ราคาสินค้า</td><td><?php echo $ProductPrice; ?></td></tr>
	    <tr><td>รูปภาพ</td><td><?php echo $ImagePath; ?></td></tr>
	    <tr><td>รายละเอียดสินค้า</td><td><?php echo $ProductDetail; ?></td></tr>
	    <tr><td>ราคาต้นทุน</td><td><?php echo $Cost; ?></td></tr>
	    <tr><td></td><td><a href="<?php echo site_url('product') ?>" class="btn btn-custom-cancel">Cancel</a></td></tr>
	</table>
</div>  