<?php
session_start(); 
require "layouts/header.php";
?>
<?php 
    require "../env.php";
    require "../database/Dbh.class.php";
    require "../model/post.class.php";
    require "../controller/post.contr.php";
    $data = new PostContr($host, $user, $password, $database);
    $results = $data->showPost();
 
?>
<div class="blog-wrapper">
    <h2>Posts</h2>
    <div class="btn-holder">
      <?php 
        if (isset($_SESSION['userid'])) { ?>
          <a href="create.php">Create Post</a>
          <a style="background: red; margin-left: 20px;" class="del-btn" href="../includes/delete_user.inc.php?id=<?php echo $_SESSION['userid']; ?>" >Delete Account</a>
      <?php } ?>
    </div>
    <?php 
    if ($results > 0) {
      foreach ($results as  $data) { ?>
        <div class="posts">
          <h3><?php echo $data["title"]; ?></h3>
          <div class="text-wrap">
            <p><?php echo $data["text"]; ?></p>
          </div>
          <p>Created at: <?php echo date('d-m-Y', strtotime($data["created_at"])); ?> </p>
          <a class="read-btn" href="post.php/?id=<?php echo $data['id']; ?>">Read</a>
          <?php 
            if (isset($_SESSION['userid'])) {
              if ($_SESSION['userid'] == $data['user_id']) { ?>
                <a href="edit.php/?id=<?php echo $data['id']; ?>">Edit</a>
                <a class="del-btn" href="../includes/delete.inc.php?id=<?php echo $data['id']; ?>" >Delete</a>
            <?php }
            }?>
          <hr>
      </div>
      <?php  }
    } else {
      echo "<h2>";
      echo "Posts dosen't exists!";
      echo "</h2>";
    } ?>
    
</div>