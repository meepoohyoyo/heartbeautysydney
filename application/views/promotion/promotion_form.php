
        <h2 style="margin-top:0px">Promotion <?php echo $button ?></h2>
        <form action="<?php echo $action; ?>" method="post">
	    <div class="form-group">
            <label for="date">StartDate <?php echo form_error('StartDate') ?></label>
            <input type="text" class="form-control" name="StartDate" id="StartDate" placeholder="StartDate" value="<?php echo $StartDate; ?>" />
        </div>
	    <div class="form-group">
            <label for="date">EndDate <?php echo form_error('EndDate') ?></label>
            <input type="text" class="form-control" name="EndDate" id="EndDate" placeholder="EndDate" value="<?php echo $EndDate; ?>" />
        </div>
	    <div class="form-group">
            <label for="varchar">PromotionDetail <?php echo form_error('PromotionDetail') ?></label>
            <input type="text" class="form-control" name="PromotionDetail" id="PromotionDetail" placeholder="PromotionDetail" value="<?php echo $PromotionDetail; ?>" />
        </div>
	    <div class="form-group">
            <label for="varchar">PromotionName <?php echo form_error('PromotionName') ?></label>
            <input type="text" class="form-control" name="PromotionName" id="PromotionName" placeholder="PromotionName" value="<?php echo $PromotionName; ?>" />
        </div>
	    <div class="form-group">
            <label for="float">UnitOfDiscount <?php echo form_error('UnitOfDiscount') ?></label>
            <input type="text" class="form-control" name="UnitOfDiscount" id="UnitOfDiscount" placeholder="UnitOfDiscount" value="<?php echo $UnitOfDiscount; ?>" />
        </div>
	    <div class="form-group">
            <label for="varchar">TypePromotion <?php echo form_error('TypePromotion') ?></label>
            <input type="text" class="form-control" name="TypePromotion" id="TypePromotion" placeholder="TypePromotion" value="<?php echo $TypePromotion; ?>" />
        </div>
	    <div class="form-group">
            <label for="float">Value <?php echo form_error('Value') ?></label>
            <input type="text" class="form-control" name="Value" id="Value" placeholder="Value" value="<?php echo $Value; ?>" />
        </div>
	    <input type="hidden" name="PromotionID" value="<?php echo $PromotionID; ?>" /> 
	    <button type="submit" class="btn btn-primary"><?php echo $button ?></button> 
	    <a href="<?php echo site_url('promotion') ?>" class="btn btn-default">Cancel</a>
	</form>
    