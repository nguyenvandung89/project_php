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
?>
<!DOCTYPE html>
<html lang="en">
  <head>
  <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
  <link rel="stylesheet" href="<?php echo base_url("assets/css/bootstrap.css"); ?>" />
  <script type="text/javascript" src="<?php echo base_url("assets/js/jquery-1.10.2.js"); ?>"></script>
  <script type="text/javascript" src="<?php echo base_url("assets/js/bootstrap.js"); ?>"></script>
  <title><?php echo $title; ?></title>
  </head>
  <body>
    <div class="container-fluid">
      <div class="container"><br><br><br>
        <h3 align='center'>Login user</h3>
        <br>
        <form class="form-horizontal" name="frm-authen" action="authen" method="POST">
          <div class="form-group">
            <label for="inputEmail" class="control-label col-xs-2">Username</label>
            <div class="col-xs-10">
              <?php echo form_input($username);?>
            </div>
          </div>
          <div class="form-group">
            <label for="inputPassword" class="control-label col-xs-2">Password</label>
            <div class="col-xs-10">
              <?php echo form_password($password);?>
            </div>
          </div>
          <div class="form-group">
            <div class="col-xs-offset-2 col-xs-10">
              <div class="checkbox">
                <label><input type="checkbox"> Remember me</label>
              </div>
            </div>
          </div>
          <div class="form-group">
            <div class="col-xs-offset-2 col-xs-10">
              <button type="submit" class="btn btn-primary">Login</button>
            </div>
          </div>
        </form>
      </div>
      <hr>
      <?php $this->load->view("layouts/footer");?>
    </div>
  </body>
</html>


