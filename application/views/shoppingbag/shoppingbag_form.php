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
        <h2 style="margin-top:0px">Shoppingbag <?php echo $button ?></h2>
        <form action="<?php echo $action; ?>" method="post">
	    <div class="form-group">
            <label for="int">CustomerID <?php echo form_error('CustomerID') ?></label>
            <input type="text" class="form-control" name="CustomerID" id="CustomerID" placeholder="CustomerID" value="<?php echo $CustomerID; ?>" />
        </div>
	    <div class="form-group">
            <label for="int">ProductID <?php echo form_error('ProductID') ?></label>
            <input type="text" class="form-control" name="ProductID" id="ProductID" placeholder="ProductID" value="<?php echo $ProductID; ?>" />
        </div>
	    <div class="form-group">
            <label for="int">Amount <?php echo form_error('amount') ?></label>
            <input type="text" class="form-control" name="amount" id="amount" placeholder="Amount" value="<?php echo $amount; ?>" />
        </div>
	    <div class="form-group">
            <label for="double">Totalprice <?php echo form_error('totalprice') ?></label>
            <input type="text" class="form-control" name="totalprice" id="totalprice" placeholder="Totalprice" value="<?php echo $totalprice; ?>" />
        </div>
	    <div class="form-group">
            <label for="varchar">Status <?php echo form_error('status') ?></label>
            <input type="text" class="form-control" name="status" id="status" placeholder="Status" value="<?php echo $status; ?>" />
        </div>
	    <input type="hidden" name="" value="<?php echo $; ?>" /> 
	    <button type="submit" class="btn btn-primary"><?php echo $button ?></button> 
	    <a href="<?php echo site_url('shoppingbag') ?>" class="btn btn-default">Cancel</a>
	</form>
    </body>
</html>