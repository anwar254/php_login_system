<?php
session_start();
include_once 'includes/dbh.inc.php';
?>
<section>
  <?php if (isset($_SESSION['username'])) :?>
    <form class="form" action="includes/logout.inc.php" method="POST">
      <button type="submit" name="submit">logout</button>
    </form>
    <p>this is the dashboard</p>
    <p>welcome <?= $_SESSION['username'] ?> we are glad to have you back</p>
  <?php endif  ?>
  <p>you must be logged in</p>
</section>
