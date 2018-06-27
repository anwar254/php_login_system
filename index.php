<?php
session_start();

  include_once 'includes/dbh.inc.php';
  include_once 'header.php';

  $_SESSION['message'] = ''

?>

<section>
  <p><?= $_SESSION['message']; ?></p>
  <form class="form" action="includes/registration.inc.php" method="POST">
    <input type="text" name="username" placeholder="enter username" required>
    <input type="text" name="fname" placeholder="enter first name" required>
    <input type="text" name="lname" placeholder="enter last name" required>
    <input type="email" name="email" placeholder="enter email" required>
    <input type="password" name="password" placeholder="enter password" required>
    <input type="password" name="confirm_password" placeholder="confirm your password" required>
    <!-- <label>select your image</label>
    <input type="file" name="avatar" accept="image/" required> -->

    <button type="submit" name="submit">register</button>
    <div class="columns">
      <div class="column">
        <p>have an account? <a href="login.php">login here</a></p>
      </div>
    </div>
  </form>
</section>

<?php include_once 'footer.php'; ?>
