<div class="container content-container">

        <table class="table">
			<tr><td>ชื่อ</td><td><?php echo $Firstname; ?></td></tr>
			<tr><td>นามสกุล</td><td><?php echo $Lastname; ?></td></tr>
			<tr><td>ที่อยู่</td><td><?php echo $Address; ?></td></tr>
			<tr><td>หมายเลขโทรศัพท์</td><td><?php echo $MobilePhone; ?></td></tr>
			<tr><td>Email</td><td><?php echo $Email; ?></td></tr>
			<tr><td>Username</td><td><?php echo $Username; ?></td></tr>
			<tr><td></td><td><a href="<?php echo site_url('/') ?>" class="btn btn-default">Cancel</a></td></tr>
		</table>
</div>