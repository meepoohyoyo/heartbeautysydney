
        <h2 style="margin-top:0px">เพิ่มหมวดสินค้า </h2>
        <form action="<?php echo $action; ?>" method="post">
	    <div class="form-group">
            <label for="varchar">ชื่อหมวดสินค้า <?php echo form_error('TypeName') ?></label>
            <input type="text" class="form-control" name="TypeName" id="TypeName" placeholder="TypeName" value="<?php echo $TypeName; ?>" />
        </div>
	    <input type="hidden" name="TypeID" value="<?php echo $TypeID; ?>" /> 
	    <button type="submit" class="btn btn-primary"><?php echo $button ?></button> 
	    <a href="<?php echo site_url('producttype') ?>" class="btn btn-default">Cancel</a>
	</form>
    