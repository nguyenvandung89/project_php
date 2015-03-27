<?php
	$username = array(
		"name"  => "username",
		"id"    => "username",
		"class" => "form-control",
		"size"  => "30",
		"placeholder"=>"Username",
		"value" => set_value("username"),
	);
	$password = array(
		"name"  => "password",
		"id"    => "password",
		"class" => "form-control",
		"size"  => "30",
		"placeholder"=>"Password",
		"value" => set_value("password"),
	);
	$repassword = array(
		"name"  => "repassword",
		"id"    => "repassword",
		"size"  => "30",
		"class" => "form-control",
		"placeholder"=>"Re-Password",
		"value" => set_value("repassword"),
	);
?>
<h3 align='center'>Create user</h3>
<div class="error">
  <ul>
    <?php
      echo validation_errors('<li>','</li>');
      if($error!="" && !empty($error))
        echo $error;
    ?>
  </ul>
</div>
<form class="form-horizontal" name="frmEdit" id="frmEdit" action="add_user" method="post" enctype="multipart-formdata">
  <div class="form-group">
  	<label class="control-label col-xs-2">Username</label>
    <div class="col-xs-10">
        <?php echo form_input($username);?>
    </div>
  </div>
  <div class="form-group">
    <label class="control-label col-xs-2">Password</label>
    <div class="col-xs-10">
      <?php echo form_password($password);?>
    </div>
  </div>
  <div class="form-group">
    <label class="control-label col-xs-2">Re-Password</label>
    <div class="col-xs-10">
      <?php echo form_password($repassword);?>
    </div>
  </div>
  <div class="form-group">
    <div class="col-xs-offset-2 col-xs-10">
    	<input type="submit" name="ok" class="btn btn-primary" value="Register" />
    </div>
  </div>
</form>

<a href="/project_php/index.php/users">Back</a>