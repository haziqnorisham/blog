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
      <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
      <script>
        $(document).ready(function(){
          $("#name").change(function(){
            var txt = $("#name").val();
            $.post("name_check.php", {name: txt}, function(data,status){
              
              if (data == "1") {
                document.getElementById("myspan").textContent="Username Available";
                document.getElementById("myBtn").disabled = false;
              } else {
                document.getElementById("myspan").textContent="Username Taken";
                document.getElementById("myBtn").disabled = true;
              }
            });            
          });
        });
      </script>
  </head> 
  <body>

    <table>
      <tr>
        <td><a href="index.php">Home</a></td>
        <td><a href="login.php">Login</a></td>
        <td><a href="register.php">Register</a></td>        
      </tr>
    </table>

    <h2>Enter Registration Details.</h2>

    <form action="register_process.php" method="POST">
      Username:<br>
      <input type="text" name="name" id="name">
      <span id="myspan"></span>
      <br>
      Password:<br>
      <input type="password" name="password">
      <br><br>
      <input type="submit" value="Submit" id="myBtn">
    </form> 

  </body>
</html>