
<style>


#loginID, 
#loginPassword {
    width: 50%;
    padding: 12px 20px;
    margin: 8px 0;
    display: inline-block;
    border: 1px solid #ccc;
    box-sizing: border-box;
}

#login-form button {
    background-color: #FC9D9C;
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
    background-color: #FC9D9C;
    border: none;
    cursor: pointer;
    color:#777;
}
.rbtn:hover{
    color:#333;
    text-decoration:none;
}

a{
    color:#777;
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
<div class="container content-container">
    <center><h2>เข้าสู่ระบบ หรือ ลงทะเบียนใหม่</h2></center>
            <?php echo $this->session->flashdata('msg'); ?>    
                <?php 
            $attributes = array("class" => "form-horizontal", "id" => "loginform", "name" => "loginform");
            echo form_open("login/index", $attributes);?>
                <form id="login-form">
                    <div style="padding-left: 25%">
                        <label><b>Username</b></label>
                        <input type="text" placeholder="Enter Username" name="username" required id="loginID">

                        <br><label><b>Password&nbsp;</b></label> 
                        <input type="password" placeholder="Enter Password" name="password" required id="loginPassword">
                        
                        <a href="#">Forgot password?</a>
                    </div>
                        <center>
                            <br><input type="submit" name="btn_login" id="btn_login" value="Login" class="rbtn" >
                            <a href="<?php echo site_url('/register');?>" type="button" class="rbtn">สมัครสมาชิก</a>
                            <br><input type="checkbox" checked="checked"> Remember me 
                        </center>
                </form>
            <?php echo form_close(); ?>
       
</div>



