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
    <?php $this->load->view("layouts/header");?>
    <div class="container-fluid">
      <div class="container"><br><br><br>
	      <?php
	        $this->load->view($template,$data);
	      ?>
      </div>
      <hr>
      <?php $this->load->view("layouts/footer");?>
    </div>
  </body>
</html>