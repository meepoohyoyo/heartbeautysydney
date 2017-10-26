<!doctype html>
<html>
    <head>
        <title>harviacode.com - codeigniter crud generator</title>
        <link rel="stylesheet" href="<?php echo base_url('assets/bootstrap/css/bootstrap.min.css') ?>"/>
        <style>
            body{
                padding: 15px;
            }
        </style>
    </head>
    <body>
        <h2 style="margin-top:0px">Promotionproduct <?php echo $button ?></h2>
        <form action="<?php echo $action; ?>" method="post">
	    <div class="form-group">
            <label for="int">PromotionID <?php echo form_error('PromotionID') ?></label>
            <input type="text" class="form-control" name="PromotionID" id="PromotionID" placeholder="PromotionID" value="<?php echo $PromotionID; ?>" />
        </div>
	    <div class="form-group">
            <label for="int">ProductID <?php echo form_error('ProductID') ?></label>
            <input type="text" class="form-control" name="ProductID" id="ProductID" placeholder="ProductID" value="<?php echo $ProductID; ?>" />
        </div>
	    <div class="form-group">
            <label for="datetime">PPDate <?php echo form_error('PPDate') ?></label>
            <input type="text" class="form-control" name="PPDate" id="PPDate" placeholder="PPDate" value="<?php echo $PPDate; ?>" />
        </div>
	    <input type="hidden" name="" value="<?php echo $; ?>" /> 
	    <button type="submit" class="btn btn-primary"><?php echo $button ?></button> 
	    <a href="<?php echo site_url('promotionproduct') ?>" class="btn btn-default">Cancel</a>
	</form>
    </body>
</html>