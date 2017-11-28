<div class="container admin-container">
<h3>รายงานการขาย <?php if(isset($fromDate)&&isset($toDate)){?> ระหว่างวันที่ <?php echo $fromDate; ?> ถึง  <?php echo $toDate;  } ?></h3>
<h4>เลือกประเภทและช่วงเวลาของรายงาน</h3>

<form action="<?php echo site_url("report/best-sale"); ?>" method="post">
    จากวันที่
    <input type="date" name="from_date" ><br><br>
    ถึงวันที่
    <input type="date" name="to_date" ><br><br>
<input type="submit" class="btn btn-custom-histle mb-10 pull-right" value="สร้างรายงาน">
    
</form>

</div>
<?php if($results){ ?>
<div class="panel panel-default">
<div class="panel-body">
<div class="table-responsive">
<table id="example" cellspacing="0" width="100%" class="table table-bordered table-hover table-striped">
<thead>
    <tr>
        <th>OrderID</th>
        <th>Order Date</th>
        <th>Customer Name</th>
        <th>Order Status</th>
        <th>Total Price</th>
    </tr>
</thead>
<tbody>
<?php foreach($results as $row){ ?>
<tr>
<td><?php echo $row->OrderID; ?></td>
<td><?php echo $row->OrderDate; ?></td>
<td><?php echo $row->CustomerName; ?></td>
<td><?php echo $row->OrderStatus; ?></td>
<td><?php echo $row->SumTotal; ?></td>
</tr>
<?php } ?>
</tbody>
</table>
</div>
</div>
</div>
<?php } ?>