
<style>
form{
    width: 100%;
    background: none;
    padding: 0 3% 0;
    background-color: #FFF868;
    margin-top: 3%;
}

input[type=text], input[type=password] {
    width: 50%;
    padding: 12px 20px;
    margin: 8px 0;
    display: inline-block;
    border: 1px solid #ccc;
    box-sizing: border-box;
    
}

button {
    background-color: #53E889;
    color: #000000;
    padding: 14px 20px;
    margin: 8px 0;
    border: none;
    cursor: pointer;
    width: 20%;
}

.rbtn {
    width: 30%;
    padding: 14px 20px;
    margin: 8px 0;
    background-color: #5B99FF;
    color: #000000;
}

}

img.avatar {
    width: 40%;
    border-radius: 50%;
}


/* Change styles for span and cancel button on extra small screens */
@media screen and (max-width: 300px) {
    span.psw {
       display: block;
       float: none;
    }
    
    .rbtn {
       width: 100%;

    }
}

</style>

<center><h2>เข้าสู่ระบบ หรือ ลงทะเบียนใหม่</h2></center>

    <div class="container">
          <?php echo $this->session->flashdata('msg'); ?>    
              <?php 
          $attributes = array("class" => "form-horizontal", "id" => "loginform", "name" => "loginform");
          echo form_open("login/index", $attributes);?>
                <div style="padding-left: 25%">
                    <label><b>Username</b></label>
                    <input type="text" placeholder="Enter Username" name="username" required>

                    <br><label><b>Password&nbsp;</b></label> 
                    <input type="password" placeholder="Enter Password" name="password" required>
                    
                    <a href="#">Forgot password?</a>
                </div>
                    <center>
                        <br><input type="submit" name="btn_login" id="btn_login" value="Login" class="rbtn" >
                        <a href="<?php echo site_url('/register');?>" type="button" class="rbtn">สมัครสมาชิก</a>
                        <br><input type="checkbox" checked="checked"> Remember me 
                    </center>
          <?php echo form_close(); ?>
    </div>




