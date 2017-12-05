
        <h2>บัญชีลูกค้า</h2>
        <div class="row" style="margin-bottom: 10px">
            <div class="col-md-4">
                <?php echo anchor(site_url('customer/create'),'Create', 'class="btn btn-primary"'); ?>
            </div>
            <div class="col-md-4 text-center">
                <div style="margin-top: 8px" id="message">
                    <?php echo $this->session->userdata('message') <> '' ? $this->session->userdata('message') : ''; ?>
                </div>
            </div>
            <div class="col-md-1 text-right">
            </div>
            <div class="col-md-3 text-right">
                <form action="<?php echo site_url('customer/index'); ?>" class="form-inline" method="get">
                    <div class="input-group">
                        <input type="text" class="form-control" name="q" value="<?php echo $q; ?>">
                        <span class="input-group-btn">
                            <?php 
                                if ($q <> '')
                                {
                                    ?>
                                    <a href="<?php echo site_url('customer'); ?>" class="btn btn-default">Reset</a>
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
		<th>Firstname</th>
		<th>Lastname</th>
		<th>Address</th>
		<th>MobilePhone</th>
		<th>Email</th>
		<th>Username</th>
		<th>Action</th>
        <th><i class="fa fa-print" aria-hidden="true"></i></th>
            </tr><?php
            foreach ($customer_data as $customer)
            {
                ?>
                <tr>
			<td width="80px"><?php echo ++$start ?></td>
			<td><?php echo $customer->Firstname ?></td>
			<td><?php echo $customer->Lastname ?></td>
			<td><?php echo $customer->Address ?></td>
			<td><?php echo $customer->MobilePhone ?></td>
			<td><?php echo $customer->Email ?></td>
			<td><?php echo $customer->Username ?></td>
			<td style="text-align:center" width="200px">
				<?php 
				echo anchor(site_url('customer/read/'.$customer->CustomerID),'Read'); 
				echo ' | '; 
				echo anchor(site_url('customer/update/'.$customer->CustomerID),'Update'); 
				echo ' | '; 
				echo anchor(site_url('customer/delete/'.$customer->CustomerID),'Delete','onclick="javasciprt: return confirm(\'Are You Sure ?\')"'); 
				?>
			</td>
            <td><a class="fa fa-print" aria-hidden="true"></a></td>
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
   