
        <h2 style="margin-top:0px">รายการสินค้า</h2>
        <div class="row" style="margin-bottom: 10px">
            <div class="col-md-4">
                <?php echo anchor(site_url('product/create'),'Create', 'class="btn btn-primary"'); ?>
            </div>
            <div class="col-md-4 text-center">
                <div style="margin-top: 8px" id="message">
                    <?php echo $this->session->userdata('message') <> '' ? $this->session->userdata('message') : ''; ?>
                </div>
            </div>
            <div class="col-md-1 text-right">
            </div>
            <div class="col-md-3 text-right">
                <form action="<?php echo site_url('product/index'); ?>" class="form-inline" method="get">
                    <div class="input-group">
                        <input type="text" class="form-control" name="q" value="<?php echo $q; ?>">
                        <span class="input-group-btn">
                            <?php 
                                if ($q <> '')
                                {
                                    ?>
                                    <a href="<?php echo site_url('product'); ?>" class="btn btn-default">Reset</a>
                                    <?php
                                }
                            ?>
                          <button class="btn btn-primary" type="submit">Search</button>
                        </span>
                    </div>
                </form>
            </div>
        </div>
        <table class="table table-bordered" style="margin-bottom: 10px">
            <tr>
                <th>No</th>
		<th>ชื่อสินค้า</th>
		<th>ราคาสินค้า</th>
		<th>รูปสินค้า</th>
		<th>รายละเอียดสินค้า</th>
		<th>ราคาต้นทุน</th>
		<th>หมวดสินค้า</th>
		<th>Action</th>
            </tr><?php
            foreach ($product_data as $product)
            {
                ?>
                <tr>
			<td width="80px"><?php echo ++$start ?></td>
			<td><?php echo $product->ProductName ?></td>
			<td><?php echo $product->ProductPrice ?></td>
			<td><?php echo $product->ImagePath ?></td>
			<td><?php echo $product->ProductDetail ?></td>
			<td><?php echo $product->Cost ?></td>
			<td><?php echo $product->TypeID ?></td>
			<td style="text-align:center" width="200px">
				<?php 
				echo anchor(site_url('product/read/'.$product->ProductID),'Read'); 
				echo ' | '; 
				echo anchor(site_url('product/update/'.$product->ProductID),'Update'); 
				echo ' | '; 
				echo anchor(site_url('product/delete/'.$product->ProductID),'Delete','onclick="javasciprt: return confirm(\'Are You Sure ?\')"'); 
				?>
			</td>
		</tr>
                <?php
            }
            ?>
        </table>
        <div class="row">
            <div class="col-md-6">
                <a href="#" class="btn btn-primary">Total Record : <?php echo $total_rows ?></a>
	    </div>
            <div class="col-md-6 text-right">
                <?php echo $pagination ?>
            </div>
        </div>
