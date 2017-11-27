
        <h2 style="margin-top:0px">Order Read</h2>
        <table class="table">
	    <tr><td>OrderDate</td><td><?php echo $OrderDate; ?></td></tr>
	    <tr><td>OrderStatus</td><td><?php echo $OrderStatus; ?></td></tr>
	    <tr><td>CustomerID</td><td><?php echo $CustomerID; ?></td></tr>
	    <tr><td></td><td><a href="<?php echo site_url('order') ?>" class="btn btn-custom-cancel">Cancel</a></td></tr>
	</table>
       