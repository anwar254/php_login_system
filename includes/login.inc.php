<?php
session_start();
include_once 'dbh.inc.php';

  if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    if (isset($_POST['submit'])) {
      $username = mysqli_real_escape_string($conn, $_POST['username']);
      $pass = mysqli_real_escape_string($conn, $_POST['password']);

      $query = "SELECT username, password FROM `users` WHERE username = '$username';";
      $result = mysqli_query($conn, $query);
      $resultCheck = mysqli_num_rows($result);

      if ($resultCheck < 1) {
        $_SESSION['message']="There is no user with that username found";
        header("Location: ../login.php?login=error");
        die();
      }else {
        if ($row = mysqli_fetch_assoc($result)) {
          $loginPass = md5($pass);

          if ($loginPass != $row['password']) {
            $_SESSION['message']="Are you sure you are the real user";
            header("Location: ../login.php?login=error");
            die();
          }else {
            $_SESSION['id'] = $row['id'];
            $_SESSION['username'] = $row['username'];
            $_SESSION['fname'] = $row['fname'];
            $_SESSION['lname'] = $row['lname'];
            $_SESSION['email'] = $row['email'];

            header("Location: ../dashboard.php");
            die();
          }
        }
      }

    }else {
      header("Location: ../login.php?login=error");
      die();
    }
  }

?>
