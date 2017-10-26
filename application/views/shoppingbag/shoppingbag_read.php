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
        <h2 style="margin-top:0px">Shoppingbag Read</h2>
        <table class="table">
	    <tr><td>CustomerID</td><td><?php echo $CustomerID; ?></td></tr>
	    <tr><td>ProductID</td><td><?php echo $ProductID; ?></td></tr>
	    <tr><td>Amount</td><td><?php echo $amount; ?></td></tr>
	    <tr><td>Totalprice</td><td><?php echo $totalprice; ?></td></tr>
	    <tr><td>Status</td><td><?php echo $status; ?></td></tr>
	    <tr><td></td><td><a href="<?php echo site_url('shoppingbag') ?>" class="btn btn-default">Cancel</a></td></tr>
	</table>
        </body>
</html>