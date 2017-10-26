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
        <h2 style="margin-top:0px">Orderdetail <?php echo $button ?></h2>
        <form action="<?php echo $action; ?>" method="post">
	    <div class="form-group">
            <label for="char">OrderID <?php echo form_error('OrderID') ?></label>
            <input type="text" class="form-control" name="OrderID" id="OrderID" placeholder="OrderID" value="<?php echo $OrderID; ?>" />
        </div>
	    <div class="form-group">
            <label for="char">ProductID <?php echo form_error('ProductID') ?></label>
            <input type="text" class="form-control" name="ProductID" id="ProductID" placeholder="ProductID" value="<?php echo $ProductID; ?>" />
        </div>
	    <input type="hidden" name="OrderQuantity" value="<?php echo $OrderQuantity; ?>" /> 
	    <button type="submit" class="btn btn-primary"><?php echo $button ?></button> 
	    <a href="<?php echo site_url('orderdetail') ?>" class="btn btn-default">Cancel</a>
	</form>
    </body>
</html>