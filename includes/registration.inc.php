<?php
session_start();
include_once 'dbh.inc.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
  if (isset($_POST['submit'])) {
    $username = mysqli_real_escape_string($conn, $_POST['username']);
    $fname = mysqli_real_escape_string($conn, $_POST['fname']);
    $lname = mysqli_real_escape_string($conn, $_POST['lname']);
    $email = mysqli_real_escape_string($conn, $_POST['email']);
    $pwd = md5($_POST['password']);

    if ($_POST['password'] != $_POST['confirm_password']) {
      $_SESSION['message'] = "Passwords do not match";
      header("Location: ../index.php?registration=pwdmatch");
      exit();
    }else {
      $sql = "SELECT * FROM users WHERE username = $username";
      $results = mysqli_query($conn, $sql);
      $resultsCheck = mysqli_num_rows($results);

      if ($resultsCheck > 0) {
        $_SESSION['message'] = "the user exists";
        header("Location: ../index.php?registration=identicaluser");
        exit();
      }else{
        $_SESSION['username'] = $username;
        $_SESSION['fname'] = $fname;
        $_SESSION['lname'] = $lname;
        $_SESSION['email'] = $email;

        $query ="INSERT INTO `users`(username, fname, lname, email, password) VALUES('$username', '$fname', '$lname', '$email', '$pwd')";

        if (mysqli_query($conn, $query)) {
          $_SESSION['message'] = "Registration success";
          header("Location: ../dashboard.php");
          exit();
        }else{
          $_SESSION['message'] = "Mysql error";
          header("Location: ../index.php?registration=mysqlerror");
          exit();
        }
      }

    }

  }else {
    header("Location: index.php?registration=error");
    exit();
  }
}

?>
