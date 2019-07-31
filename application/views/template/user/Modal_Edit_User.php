<?php
foreach ($getUser as $mem) {};
?>

<form method="post" action="editdata.php" role="form">
	<div class="modal-body">
		<div class="form-group">
		    <label for="id">ID</label>
		    <input type="text" class="form-control" id="id" name="id" value="<?php echo $mem['id_user'];?>" readonly="true"/>
		</div>
		<div class="form-group">
		    <label for="name">Name</label>
	            <input type="text" class="form-control" id="name" name="name" value="<?php echo $mem['nama_lengkap'];?>" />
		</div>
		<div class="form-group">
		    <label for="phone">User</label>
	            <input type="text" class="form-control" id="phone" name="phone" value="<?php echo $mem['nama_user'];?>" />
		</div>
		<div class="form-group">
		     <label for="address">Password</label>
		     <input type="text" class="form-control" id="address" name="address" value="<?php echo $mem['password_user'];?>" />
		</div>
		
		</div>
		<div class="modal-footer">
		     <input type="submit" class="btn btn-primary" name="submit" value="Update" />&nbsp;
		     <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
		</div>
	</form>
