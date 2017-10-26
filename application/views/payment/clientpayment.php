<style> 
       
        form{
            padding-left: 5%;
            padding-right: 5%;
        }

        .page-header{
            padding-left: 5%;
        }

        .table1{
            width: 100%;
        }
</style>
  
   <!-- Page Heading -->
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">
                            แจ้งหลักฐานการชำระเงิน
                        </h1>
                    </div>
                </div>
    <!-- /.row -->
       
       
        <form action="<?php echo $action; ?>" method="post">
	    <div class="form-group">
            <label for="char">เลขออเดอร์ <?php echo form_error('OrderID') ?></label>
             <select class="form-control" name="OrderID">
             <?php foreach($orders as $order){
                 echo '<option value="'.$order->OrderID.'">'.$order->OrderID . ' ('.$order->OrderDate.')'.'</option>';
             } ?>
            </select>
            <!--<input type="text" class="form-control" name="OrderID" id="OrderID" placeholder="OrderID" value="<?php echo $OrderID; ?>" />-->
        </div>

         <div class="form-group">
            <label for="varchar">ธนาคาร <?php echo form_error('bank') ?></label>
             <br><select class="form-control" name="bank">
                <option value="ธนาคารกรุงเทพ">ธนาคารกรุงเทพ</option>
                <option value="ธนาคารกรุงศรีอยุธยา">ธนาคารกรุงศรีอยุธยา</option>
                <option value="ธนาคารกสิกรไทย">ธนาคารกสิกรไทย</option>
                <option value="ธนาคารไทยพาณิชย์">ธนาคารไทยพาณิชย์</option>
                <option value="ธนาคารกรุงไทย">ธนาคารกรุงไทย</option>
                <option value="ธนาคารออมสิน">ธนาคารออมสิน</option>
                <option value="ธนาคารอื่นๆ">ธนาคารอื่น ๆ</option>
            </select>
        </div>

	    <div class="form-group">
            <label for="float">จำนวนเงิน <?php echo form_error('TotalPrice') ?></label>
            <input type="text" class="form-control" name="TotalPrice" id="TotalPrice" placeholder="TotalPrice" value="<?php echo $TotalPrice; ?>" />
        </div>

        <div class="form-group">
            <label for="datetime">วันเวลาที่โอน <?php echo form_error('PaymentDate') ?></label>
            <div class='input-group date' id='datetimepicker1'>
                <input type='text' class="form-control" name="PaymentDate" />
                <span class="input-group-addon">
                    <span class="glyphicon glyphicon-calendar"></span>
                </span>
            </div>
        </div>

	    <div class="form-group">
            <label for="char">เบอร์โทรศัพท์ <?php echo form_error('PhoneNum') ?></label>
            <input type="text" class="form-control" name="PhoneNum" id="PhoneNum" placeholder="PhoneNum" value="<?php echo $PhoneNum; ?>" />
        </div>
	   
       <div class="form-group">
         <label for="varchar">ใบบันทึกรายการ <?php echo form_error('ImagePath') ?></label>
            <br>
            <div class="fileUpload btn btn-primary">
                <input type="file" class="upload" name="ImagePath"/>
            </div>
        </div>

	    <input type="hidden" name="PaymentID" value="<?php echo $PaymentID; ?>" /> 
	    <button type="submit" class="btn btn-primary pull-right"><?php echo $button ?></button> 
	</form>
   