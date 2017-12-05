<div class="container content-container">
  <div>
    <h1><i class="fa fa-sticky-note-o"></i>สรุปรายการสั่งซื้อ</h1>
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
          <td><?php echo date("d-m-Y",strtotime($row->OrderDate)); ?></td>
          <td><?php echo getThaiOrder($row->OrderStatus); ?></td>
          </tr>
        <?php } ?>
      </tbody>
    </table>
  </div>
</div>