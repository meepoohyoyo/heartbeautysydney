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
        <h2 style="margin-top:0px">Payment <?php echo $button ?></h2>
        <form action="<?php echo $action; ?>" method="post">
	    <div class="form-group">
            <label for="datetime">PaymentDate <?php echo form_error('PaymentDate') ?></label>
            <input type="text" class="form-control" name="PaymentDate" id="PaymentDate" placeholder="PaymentDate" value="<?php echo $PaymentDate; ?>" />
        </div>
	    <div class="form-group">
            <label for="float">TotalPrice <?php echo form_error('TotalPrice') ?></label>
            <input type="text" class="form-control" name="TotalPrice" id="TotalPrice" placeholder="TotalPrice" value="<?php echo $TotalPrice; ?>" />
        </div>
	    <div class="form-group">
            <label for="char">OrderID <?php echo form_error('OrderID') ?></label>
            <input type="text" class="form-control" name="OrderID" id="OrderID" placeholder="OrderID" value="<?php echo $OrderID; ?>" />
        </div>
	    <div class="form-group">
            <label for="char">PhoneNum <?php echo form_error('PhoneNum') ?></label>
            <input type="text" class="form-control" name="PhoneNum" id="PhoneNum" placeholder="PhoneNum" value="<?php echo $PhoneNum; ?>" />
        </div>
	    <div class="form-group">
            <label for="varchar">Bank <?php echo form_error('bank') ?></label>
            <input type="text" class="form-control" name="bank" id="bank" placeholder="Bank" value="<?php echo $bank; ?>" />
        </div>
	    <div class="form-group">
            <label for="varchar">ImagePath <?php echo form_error('ImagePath') ?></label>
            <input type="text" class="form-control" name="ImagePath" id="ImagePath" placeholder="ImagePath" value="<?php echo $ImagePath; ?>" />
        </div>
	    <input type="hidden" name="PaymentID" value="<?php echo $PaymentID; ?>" /> 
	    <button type="submit" class="btn btn-primary"><?php echo $button ?></button> 
	    <a href="<?php echo site_url('payment') ?>" class="btn btn-default">Cancel</a>
	</form>
    </body>
</html>