<div class="nav-bar">
  <?php 
		if (isset($_SESSION['userid'])) { ?>
			<p>Welcome: <?php  echo $_SESSION['name'];?></p>
  <?php } ?>
  <ul>
    <li><a class="active" href="../index.php">Home</a></li>
    <li><a href="../views/blog.php">Blog</a></li>
    <?php 
		if (isset($_SESSION['userid'])) { ?>
			<li><a href="../includes/logout.inc.php">Logout</a></li>
  <?php } else { ?>
    <li><a href="../views/login.php">Login</a></li>
  <?php } ?>
  </ul>
</div>
<div class="nav-bar-mobile">
    <div class="icon-wrap">
      <i class="fa fa-bars fa-2x bars-icon" aria-hidden="true"></i>
      <i class="fa fa-times fa-2x close-icon" aria-hidden="true"></i>
    </div>
    <div class="dropdown-menu">
      <?php 
      if (isset($_SESSION['userid'])) { ?>
        <p class="welcome-text">Welcome: <?php  echo $_SESSION['name'];?></p>
      <?php } ?>
      <ul>
        <li><a class="active" href="../index.php">Home</a></li>
        <li><a href="../views/blog.php">Blog</a></li>
        <?php 
        if (isset($_SESSION['userid'])) { ?>
          <li><a href="../includes/logout.inc.php">Logout</a></li>
        <?php } else { ?>
        <li><a href="../views/login.php">Login</a></li>
        <?php } ?>
      </ul>
    </div>
</div>