
        <h2 style="margin-top:0px">Order <?php echo $button ?></h2>
        <form action="<?php echo $action; ?>" method="post">
	    <div class="form-group">
            <label for="date">OrderDate <?php echo form_error('OrderDate') ?></label>
            <input type="text" class="form-control" name="OrderDate" id="OrderDate" placeholder="OrderDate" value="<?php echo $OrderDate; ?>" />
        </div>
	    <div class="form-group">
            <label for="varchar">OrderStatus <?php echo form_error('OrderStatus') ?></label>
            <input type="text" class="form-control" name="OrderStatus" id="OrderStatus" placeholder="OrderStatus" value="<?php echo $OrderStatus; ?>" />
        </div>
	    <div class="form-group">
            <label for="char">CustomerID <?php echo form_error('CustomerID') ?></label>
            <input type="text" class="form-control" name="CustomerID" id="CustomerID" placeholder="CustomerID" value="<?php echo $CustomerID; ?>" />
        </div>
	    <input type="hidden" name="OrderID" value="<?php echo $OrderID; ?>" /> 
	    <button type="submit" class="btn btn-primary"><?php echo $button ?></button> 
	    <a href="<?php echo site_url('order') ?>" class="btn btn-default">Cancel</a>
	</form>
    