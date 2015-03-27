<nav id="myNavbar" class="navbar navbar-default navbar-inverse navbar-fixed-top" role="navigation">
  <div class="container-fluid">
    <div class="navbar-header">
      <a class="navbar-brand" href="#">PHP-CI</a>
      <a class="navbar-brand" href="#">User</a>
    </div>
  </div>
  <div class="div-login" style="margin-right: -980px !important;">
    <li>
      <div class="btn-group navbar-btn">
        <button class="btn btn-info">Action</button>
        <button data-toggle="dropdown" class="btn btn-info dropdown-toggle"><span class="caret"></span></button>
        <ul class="dropdown-menu">
        <li><a href="">Profile</a></li>
          <li class="divider"></li>
          <li><a href="<?php echo base_url("index.php/logout"); ?>">Logout</a></li>
        </ul>
      </div>
    </li>
  </div>
</nav>