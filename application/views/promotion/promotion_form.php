<div class="container admin-container">
        <h2>เพิ่มโปรโมชั่น</h2>
        <form action="<?php echo $action; ?>" method="post">
       
        <div class="form-group">
            <label for="varchar">ชื่อโปรโมชั่น <?php echo form_error('PromotionName') ?></label>
            <input type="text" class="form-control" name="PromotionName" id="PromotionName" placeholder="ชื่อโปรโมชั่น" value="<?php echo $PromotionName; ?>" />
        </div>

        <form action="/action_page.php">
            <b>วันเริ่มโปรโมชั่น</b>
            <input type="date" name="bday" min="1800-01-01"><br><br>
            <b>วันสิ้นสุดโปรโมชั่น</b>
            <input type="date" name="bday" min="1800-01-01"><br><br>
        </form>

        <div class="form-group">
            <label for="varchar">ประเภทโปรโมชั่น <?php echo form_error('TypePromotion') ?></label>
             <br><select class="form-control" name="TypePromotion">
                <option value="ส่วนลดตามเปอร์เซ็น">ส่วนลดตามเปอร์เซ็น</option>
                <option value="ลดตามการระบุราคา">ลดตามการระบุราคา</option>
            </select>
        </div>
	    
	    <div class="form-group">
            <label for="float">ส่วนลดชนิดสินค้าt <?php echo form_error('UnitOfDiscount') ?></label>
            <input type="text" class="form-control" name="UnitOfDiscount" id="UnitOfDiscount" placeholder="ส่วนลดชนิดสินค้า เช่น 30" value="<?php echo $UnitOfDiscount; ?>" />
        </div>
        
	    <div class="form-group">
            <label for="float">ราคาโปรโมชั่น <?php echo form_error('Value') ?></label>
            <input type="text" class="form-control" name="Value" id="Value" placeholder="Value" value="<?php echo $Value; ?>" />
        </div>

        <div class="form-group">
            <label for="varchar">รายละเอียดโปรโมชั่น <?php echo form_error('PromotionDetail') ?></label>
            <input type="text" class="form-control" name="PromotionDetail" id="PromotionDetail" placeholder="ส่วนลดสินค้า 30% ต้อนรับปีใหม่" value="<?php echo $PromotionDetail; ?>" />
        </div>
	    <input type="hidden" name="PromotionID" value="<?php echo $PromotionID; ?>" /> 
	    <button type="submit" class="btn btn-custom-histle"><?php echo $button ?></button> 
	    <a href="<?php echo site_url('promotion') ?>" class="btn btn-default">Cancel</a>
    </form>
</div>
    