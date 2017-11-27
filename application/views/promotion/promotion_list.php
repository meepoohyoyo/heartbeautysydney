
        <h2 style="margin-top:0px">Promotion List</h2>
        <div class="row" style="margin-bottom: 10px">
            <div class="col-md-4">
                <?php echo anchor(site_url('promotion/create'),'Create', 'class="btn btn-primary"'); ?>
            </div>
            <div class="col-md-4 text-center">
                <div style="margin-top: 8px" id="message">
                    <?php echo $this->session->userdata('message') <> '' ? $this->session->userdata('message') : ''; ?>
                </div>
            </div>
            <div class="col-md-1 text-right">
            </div>
            <div class="col-md-3 text-right">
                <form action="<?php echo site_url('promotion/index'); ?>" class="form-inline" method="get">
                    <div class="input-group">
                        <input type="text" class="form-control" name="q" value="<?php echo $q; ?>">
                        <span class="input-group-btn">
                            <?php 
                                if ($q <> '')
                                {
                                    ?>
                                    <a href="<?php echo site_url('promotion'); ?>" class="btn btn-default">Reset</a>
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
        <th>ชื่อโปรโมชั่น</th>
		<th>วันเริ่มโปรโมชั่น</th>
        <th>วันสิ้นสุดโปรโมชั่น</th>
        <th>ประเภทโปรโมชั่น</th>
		<th>ส่วนลดสินค้า</th>
        <th>ราคาโปรโมชั่น</th>
        <th>รายละเอียดโปรโมชั่น</th>
        <th>รูปสินค้า</th>
		<th>Action</th>
            </tr><?php
            foreach ($promotion_data as $promotion)
            {
                ?>
                <tr>
            <td width="80px"><?php echo ++$start ?></td>
            <td><?php echo $promotion->PromotionName ?></td>
			<td><?php echo $promotion->StartDate ?></td>
			<td><?php echo $promotion->EndDate ?></td>
            <td><?php echo $promotion->TypePromotion ?></td>
            <td><?php echo $promotion->PromotionDetail ?></td>
			<td><?php echo $promotion->UnitOfDiscount ?></td>
            <td><?php echo $promotion->Value ?></td>
            <td><?php echo $promotion->ImagePath ?></td>
			<td style="text-align:center" width="200px">
				<?php 
				echo anchor(site_url('promotion/read/'.$promotion->PromotionID),'Read'); 
				echo ' | '; 
				echo anchor(site_url('promotion/update/'.$promotion->PromotionID),'Update'); 
				echo ' | '; 
				echo anchor(site_url('promotion/delete/'.$promotion->PromotionID),'Delete','onclick="javasciprt: return confirm(\'Are You Sure ?\')"'); 
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
    