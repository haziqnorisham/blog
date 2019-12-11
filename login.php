<?php
session_start();

if(isset( $_SESSION['user_id'])){
  echo $_SESSION['user_id'];
}

if(isset( $_SESSION['flash'])){
  echo $_SESSION['flash'];
  unset($_SESSION['flash']);
}
?>
<!DOCTYPE html>
<html>
  <head>
      <style>
        table {
          border-style: double;
          margin-bottom: 10px;
        }
      </style>
  </head> 
  <body>

    <table>
      <tr>
        <td><a href="index.php">Home</a></td>
        <td><a href="login.php">Login</a></td>
        <td><a href="register.php">Register</a></td>        
      </tr>
    </table>

    <h2>Enter login Details</h2>

    <form action="login_process.php" method="POST">
      Username:<br>
      <input type="text" name="name">
      <br>
      Password:<br>
      <input type="password" name="password">
      <br><br>
      <input type="submit" value="Submit">
    </form> 

  </body>
</html>