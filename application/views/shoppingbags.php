<div>
  <img src="assets/img/shop_m02.png">
</div>
<div class="table-responsive">
    <table class="table">
    <thead>
      <tr>
        <th>ชื่อ</th>
        <th>ราคา</th>
        <th>จำนวน</th>
        <th>รวม (บาท)</th>
        <th>ลบ</th>
      </tr>
    </thead>
    <tbody id="shoppingbag-table">
        <?php foreach($items as $row){ ?>
        <tr>
        <td><?php echo $row->ProductName; ?></td>
        <td><?php echo $row->ProductPrice; ?></td>
        <td>
            <a href="#" class="delete-amount-btn"><span class="glyphicon glyphicon-minus"></span></a>
            <input type="hidden" id="input-shopping-bag-id" value="<?php echo $row->id; ?>">
            <input type="number" min="1" value="<?php echo $row->amount; ?>" name="amount">
            <input type="hidden" id="price" value="<?php echo $row->ProductPrice; ?>">
            <a href="#" class="add-amount-btn"><span class="glyphicon glyphicon-plus"></span></a>
        </td>
        <td><p name="totalprice" ><?php echo $row->totalprice; ?></p></td>
        <td><a onclick="return confirm('ยืนยันการลบ?')" href="<?php echo site_url("bagdelete")."/". $row->id; ?>"><i class="fa fa-trash-o" aria-hidden="true"></i></a></td>
      </tr>
       <?php } ?>
    </tbody>
  </table>
<center>
<table style="font-size: 16px">
  <tbody>
    <tr>
      <td style="text-align: right;"><strong>จำนวนเงินสุทธิ</strong></td>
      <td style="padding-left: 25px;"><strong id="sum-amount-all"></strong><strong> บาท</strong></td>
    </tr>
  </tbody>    
</table>

<a href="javascript:void(0);" id="submit-first-form" class="submit_paynow" style="text-decoration: none; cursor: auto;"><img src="assets/img/bt_shop01.png" style="cursor: auto;" onmouseover="this.setAttribute('src', 'assets/img/bt_shop01p.png');" onmouseout="this.setAttribute('src', 'assets/img/bt_shop01.png');"></a>
</center>
<form class="hidden"  method="post" action="<?php echo site_url("submitbag"); ?>" id="first-form">
</form>
</div>