<div class="container admin-container">
        <h2>เพิ่มโปรโมชั่น</h2>
        <form action="<?php echo $action; ?>" method="post">
       
        <div class="form-group">
            <label for="varchar">ชื่อโปรโมชั่น <?php echo form_error('PromotionName') ?></label>
            <input type="text" class="form-control" name="PromotionName" id="PromotionName" placeholder="ชื่อโปรโมชั่น" value="<?php echo $PromotionName; ?>" />
        </div>

        <div class="form-group">
            <label for="varchar">วันเริ่มโปรโมชั่น<?php echo form_error('StartDate') ?></label>
            <input type="date" name="StartDate" min="1800-01-01">
        </div>

        <div class="form-group">
            <label for="varchar">วันสิ้นสุดโปรโมชั่น<?php echo form_error('EndDate') ?></label>
            <input type="date" name="EndDate" min="1800-01-01"><br><br>
        </div>

        <div class="form-group">
            <label for="varchar">ประเภทโปรโมชั่น<?php echo form_error('TypePromotion') ?></label>
             <br><select class="form-control" name="TypePromotion">
                <option value="ส่วนลดตามเปอร์เซ็น">ส่วนลดตามเปอร์เซ็น</option>
                <option value="ลดตามการระบุราคา">ลดตามการระบุราคา</option>
            </select>
        </div>
	    
	    <div class="form-group">
            <label for="float">ส่วนลดสินค้า<?php echo form_error('UnitOfDiscount') ?></label>
            <input type="text" class="form-control" name="UnitOfDiscount" id="UnitOfDiscount" placeholder="ส่วนลดสินค้า เช่น 30" value="<?php echo $UnitOfDiscount; ?>" />
        </div>

        <div class="form-group">
            <label for="varchar">รายละเอียดโปรโมชั่น <?php echo form_error('PromotionDetail') ?></label>
            <input type="text" class="form-control" name="PromotionDetail" id="PromotionDetail" placeholder="ส่วนลดสินค้า 30% ต้อนรับปีใหม่" value="<?php echo $PromotionDetail; ?>" />
        </div>
        <div class="form-group">
            <label for="varchar">รูปโปรโมชั่น <?php echo form_error('ImagePath') ?></label>
            <br>
            <div class="fileUpload btn btn-custom-histle">
                <input type="file" class="upload" name="ImagePath"/>
            </div>
        </div>
        <div class="form-group">
            <label for="promotionproduct_error"><?php echo form_error('promotionproduct') ?></label>            
        </div>        
        <div class="form-group">
            <label for="promotionproduct">เลือกสินค้าสำหรับโปรโมชันนี้</label>
            <select id="promotionproduct" name="promotionproduct[]" multiple="multiple">
                <?php foreach($products as $product){ ?>
                    <option value="<?php echo $product->ProductID ?>"><?php echo $product->ProductName ?></option>
                <?php }?>
            </select>
        </div>

	    <input type="hidden" name="PromotionID" value="<?php echo $PromotionID; ?>" /> 
	    <input type="submit" class="btn btn-custom-histle" value="<?php echo $button ?>">
	    <a href="<?php echo site_url('promotion') ?>" class="btn btn-default">Cancel</a>
    </form>
</div>
    