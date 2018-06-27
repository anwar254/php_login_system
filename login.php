<?php
session_start();
include_once 'header.php';
?>

<section>
  <div class="heading">
    <h1 class="title">sign in</h1>
    welcome back user
  </div>

  <div class="am-form">
    <p><?= $_SESSION['message'] ?></p>
    <form class="form" action="includes/login.inc.php" method="POST">
      <input type="text" name="username" placeholder="enter username">
      <input type="password" name="password" placeholder="enter password">

      <button type="submit" name="submit">Login</button>
    </form>
    <div class="columns">
      <div class="column">
        <p>Dont have an account? <a href="index.php">signup here</a></p>
      </div>
    </div>
  </div>
</section>

<?php include_once 'footer.php'; ?>
