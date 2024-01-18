<?php 
    if (isset($_POST['submit'])) {
        include "connection.php";
        $username = $_POST['user'];
        $email = $_POST['email'];
        $password = $_POST['pass'];
        $cpassword = $_POST['cpass'];

        $sql = "select * from users where username = '$username'";
        $result = mysqli_query($conn, $sql);
        $user_count = mysqli_num_rows($result);

        $sql = "select * from users where email = '$email'";
        $result = mysqli_query($conn, $sql);
        $email_count = mysqli_num_rows($result);

        if ($user_count == 0 || $email_count == 0) {
          if($password == $cpassword) {
            $hash = password_hash($password, PASSWORD_DEFAULT);
            $sql = "insert into users(username, email, password) values('$username', '$email', '$hash')";
            $result = mysqli_query($conn, $sql);
            header("Location:login.php");
          }
          else{
            echo '<script>
            alert("Mật khẩu không khớp.!!!")
            window.location.href = "signup.php"
            </script>';
          }
        }
        else {
          echo '<script>
          alert("Tên hoặc email người dùng đã tồn tại.!!!")
          window.location.href = "signup.php"
          </script>';
        }
    }
?>
<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Sign up</title>
    <link rel="stylesheet" href="style.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
  </head>
  <style>
body{
    background-color:  DarkBlue;
}

h1{
    color: RoyalBlue ; 
    font-size: 35px;
}

#form{
    background-color: white;
    width: 25%;
    position: absolute;
    top: 50%;
    left: 50%;
    transform: translate(-50%, -50%);
    padding: 50px;
    box-shadow: 10px 10px 5px RoyalBlue ;
    border-radius: 5px;
}
 #btn{
    font-size: 18px;
    color: RoyalBlue ;
    background: white;
    border: 1px solid RoyalBlue ;
    border-radius: 5px;
    padding: 8px 15px;
    margin-top: 10px;
    margin-bottom: 20px;
    transition: all 0.3s;
}

#btn:hover{
    background: RoyalBlue ;
    color: white;
}

@media screen and (max-width:700px){
    #form{
        width: 65%;
        padding:40px;
    }
}

    </style>
  <body>
    <?php 
        include "navbar.php";
    ?>
    <div id = "form">
        <h1>Signup Form</h1>
        <form name="form" action="signup.php" method="POST">
            <label>Enter Username</label>
            <input type="text" id="user" name="user" required><br><br>
            <label>Enter Email</label>
            <input type="email" id="email" name="email" required><br><br>
            <label>Enter Password</label>
            <input type="password" id="pass" name="pass" required><br><br>
            <label>Retype Password</label>
            <input type="password" id="cpass" name="cpass" required><br><br>
            <input type="submit" id="btn" name="submit" value="Signup"/>
        </form>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
  </body>
</html>