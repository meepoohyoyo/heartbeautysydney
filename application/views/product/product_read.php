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
        <h2 style="margin-top:0px">Product Read</h2>
        <table class="table">
	    <tr><td>ProductName</td><td><?php echo $ProductName; ?></td></tr>
	    <tr><td>ProductPrice</td><td><?php echo $ProductPrice; ?></td></tr>
	    <tr><td>ImagePath</td><td><?php echo $ImagePath; ?></td></tr>
	    <tr><td>ProductDetail</td><td><?php echo $ProductDetail; ?></td></tr>
	    <tr><td>Cost</td><td><?php echo $Cost; ?></td></tr>
	    <tr><td>TypeID</td><td><?php echo $TypeID; ?></td></tr>
	    <tr><td></td><td><a href="<?php echo site_url('product') ?>" class="btn btn-default">Cancel</a></td></tr>
	</table>
        </body>
</html>