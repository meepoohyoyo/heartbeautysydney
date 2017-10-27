<div>
  <img src="assets/img/shop_m02.png">
</div>
<div class="table-responsive">
    <table class="table">
    <thead>
      <tr>
        <th>เลขที่ออเดอร์</th>
        <th>วันที่ออเดอร์</th>
        <th>สถานะ</th>
      </tr>
    </thead>
    <tbody>
        <?php foreach($orders as $row){ ?>
        <tr>
        <td><?php echo $row->GenerateNo; ?></td>
        <td><?php echo $row->OrderDate; ?></td>
        <td><?php echo getThaiOrder($row->OrderStatus); ?></td>
        </tr>
       <?php } ?>
    </tbody>
  </table>
</div>