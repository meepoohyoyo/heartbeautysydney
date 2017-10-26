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
        <h2 style="margin-top:0px">Orderdetail Read</h2>
        <table class="table">
	    <tr><td>OrderID</td><td><?php echo $OrderID; ?></td></tr>
	    <tr><td>ProductID</td><td><?php echo $ProductID; ?></td></tr>
	    <tr><td></td><td><a href="<?php echo site_url('orderdetail') ?>" class="btn btn-default">Cancel</a></td></tr>
	</table>
        </body>
</html>