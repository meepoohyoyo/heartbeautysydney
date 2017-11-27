<div class="container admin-container">
        <h2 style="margin-top:0px">เพิ่มสินค้า </h2>
        <form action="<?php echo $action; ?>" method="post" enctype="multipart/form-data">
	    <div class="form-group">
            <label for="varchar">ชื่อสินค้า <?php echo form_error('ProductName') ?></label>
            <input type="text" class="form-control" name="ProductName" id="ProductName" placeholder="ชื่อสินค้า" value="<?php echo $ProductName; ?>" />
        </div>
	    <div class="form-group">
            <label for="float">ราคาสินค้า <?php echo form_error('ProductPrice') ?></label>
            <input type="text" class="form-control" name="ProductPrice" id="ProductPrice" placeholder="ราคาสินค้า" value="<?php echo $ProductPrice; ?>" />
        </div>
	    <div class="form-group">
            <label for="varchar">รูปภาพสินค้า <?php echo form_error('ImagePath') ?></label>
            <br>
            <div class="fileUpload btn btn-custom-histle">
                <input type="file" class="upload" name="ImagePath"/>
            </div>
        </div>
	    <div class="form-group">
            <label for="varchar">รายละเอียดสินค้า <?php echo form_error('ProductDetail') ?></label>
            <input type="text" class="form-control" name="ProductDetail" id="ProductDetail" placeholder="รายละเอียดสินค้า" value="<?php echo $ProductDetail; ?>" />
        </div>
	    <div class="form-group">
            <label for="float">ราคาต้นทุน <?php echo form_error('Cost') ?></label>
            <input type="text" class="form-control" name="Cost" id="Cost" placeholder="ราคาต้นทุน" value="<?php echo $Cost; ?>" />
        </div>
	    <div class="form-group">
            <label for="char">หมวดสินค้า <?php echo form_error('TypeID') ?></label>
            <select class="form-control" name="TypeID">
            <?php
            foreach($product_type as $type){
                echo '<option value="'.$type->TypeID.'" '.($type->typeID===$TypeID?'selected':'').'>'.$type->TypeName.'</option>';
            }
             ?>
            </select>
        </div>
	    <input type="hidden" name="ProductID" value="<?php echo $ProductID; ?>" /> 
	    <button type="submit" class="btn btn-custom-histle"><?php echo $button ?></button> 
	    <a href="<?php echo site_url('product') ?>" class="btn btn-custom-cancel">Cancel</a>
    </form>
</div>