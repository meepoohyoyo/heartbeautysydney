<div class="container content-container">
  <div>
    <h1 class="text-center uppercase"><i class="fa fa-shopping-basket"></i>ตะกร้าสินค้า</h1>
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
            <?php if($row->is_promotion){ ?>
              <label for=""><?php echo $row->amount ?> (สินค้าโปรโมชั่น)</label>
            <?php }else{ ?>
              <a href="#" class="delete-amount-btn"><span class="glyphicon glyphicon-minus"></span></a>
              <input type="hidden" id="input-shopping-bag-id" value="<?php echo $row->id; ?>">
              <input type="number" min="1" value="<?php echo $row->amount; ?>" name="amount">
              <input type="hidden" id="price" value="<?php echo $row->ProductPrice; ?>">
              <a href="#" class="add-amount-btn"><span class="glyphicon glyphicon-plus"></span></a>
            <?php } ?>
          </td>
          <td><p name="totalprice" ><?php echo (int)$row->totalprice; ?></p></td>
          <td>
            <?php if($row->is_promotion){ ?>
              <a onclick="return confirm('ยืนยันการลบทั้งโปรโมชัน?')" href="<?php echo site_url("promotionbagdelete")."/". $row->id; ?>"><i class="fa fa-trash-o" aria-hidden="true"></i></a>              
            <?php }else{ ?>
              <a onclick="return confirm('ยืนยันการลบ?')" href="<?php echo site_url("bagdelete")."/". $row->id; ?>"><i class="fa fa-trash-o" aria-hidden="true"></i></a>
            <?php } ?>
          </td>
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
    <button id="submit-first-form" class="mt-10 mb-10 submit_paynow btn btn-custom-histle">ตกลงการสั่งซื้อ</button>
  </center>
  <form class="hidden"  method="post" action="<?php echo site_url("submitbag"); ?>" id="first-form">
  </form>
  </div>
<Div>