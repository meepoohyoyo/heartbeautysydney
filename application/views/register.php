<div class="container content-container">
    <h1 class="text-center uppercase">สมัครสมาชิก </h1>
            <form action="<?php echo $action; ?>" method="post">
            <div class="form-group">
                <label for="varchar">ชื่อ <?php echo form_error('Firstname') ?></label>
                <input type="text" class="form-control" name="Firstname" id="Firstname" placeholder="ชื่อจริง" value="<?php echo $Firstname; ?>" />
            </div>
            <div class="form-group">
                <label for="varchar">นามสกุล <?php echo form_error('Lastname') ?></label>
                <input type="text" class="form-control" name="Lastname" id="Lastname" placeholder="นามสกุล" value="<?php echo $Lastname; ?>" />
            </div>
            <div class="form-group">
                <label for="varchar">ที่อยู่ในการจัดส่งสินค้า <?php echo form_error('Address') ?></label>
                <input type="text" class="form-control" name="Address" id="Address" placeholder="ที่อยู่ในการจัดส่งสินค้า" value="<?php echo $Address; ?>" />
            </div>
            <div class="form-group">
                <label for="char">หมายเลขโทรศัพท์ <?php echo form_error('MobilePhone') ?></label>
                <input type="text" class="form-control" name="MobilePhone" id="MobilePhone" placeholder="หมายเลขโทรศัพท์" value="<?php echo $MobilePhone; ?>" />
            </div>
            <div class="form-group">
                <label for="varchar">Email <?php echo form_error('Email') ?></label>
                <input type="text" class="form-control" name="Email" id="Email" placeholder="Email" value="<?php echo $Email; ?>" />
            </div>
            <div class="form-group">
                <label for="varchar">Username <?php echo form_error('Username') ?></label>
                <input type="text" class="form-control" name="Username" id="Username" placeholder="Username" value="<?php echo $Username; ?>" />
            </div>
            <div class="form-group">
                <label for="varchar">Password <?php echo form_error('Password') ?></label>
                <input type="text" class="form-control" name="Password" id="Password" placeholder="Password" value="<?php echo $Password; ?>" />
            </div>
            <input type="hidden" name="CustomerID" value="<?php echo $CustomerID; ?>" /> 
            <button type="submit" class="btn btn-custom-pink"><?php echo $button ?></button> 
            <a href="<?php echo site_url('customer') ?>" class="btn btn-custom-pink">Cancel</a>
        </form>
</div>