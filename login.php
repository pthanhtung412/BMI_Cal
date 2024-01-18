<?php 
    if (isset($_POST['submit'])) {
        include "connection.php";
        $username = $_POST['user'];
        $password = $_POST['pass'];
        $sql = "SELECT * FROM users WHERE username = '$username' OR email = '$username'";
        $result = mysqli_query($conn, $sql);
        $count = mysqli_num_rows($result);

        if ($count > 0) {
            $row = mysqli_fetch_assoc($result);
            $hashed_password = $row['password'];

            if (password_verify($password, $hashed_password)) {
                $sql = "SELECT username FROM users WHERE username = '$username' OR email = '$username'";
                $r = mysqli_fetch_assoc(mysqli_query($conn, $sql)); 
                session_start();
                $_SESSION['name'] = $r['username'];
                header("Location:index.php");
                echo "Đăng nhập thành công!";
            } else {
                echo '<script>
                window.location.href = "login.php";
                alert("Login failed. Wrong password!!!")
                </script>';
            }
        } else {
            echo '<script>
                window.location.href = "login.php";
                alert("Login failed. Invalid username or email!!!")
            </script>';
        }

    }
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="style.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <style>
body{
    background-color:  #5CDB95;;
}

h1{
    color: teal; 
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
    box-shadow: 10px 10px 5px teal;
    border-radius: 5px;
}
 #btn{
    font-size: 18px;
    color: teal;
    background: white;
    border: 1px solid teal;
    border-radius: 5px;
    padding: 8px 15px;
    margin-top: 10px;
    margin-bottom: 20px;
    transition: all 0.3s;
}

#btn:hover{
    background: teal;
    color: white;
}

@media screen and (max-width:700px){
    #form{
        width: 65%;
        padding:40px;
    }
}

    </style>
</head>
<body>
    <?php 
        include "navbar.php";
    ?>
    <div id="form">
        <h1>Login Form</h1>
        <form name="form" action="login.php" method="post" onsubmit="return isvalid()">
            <label for="">Username/ Email: </label>
            <input type="text" id="user" name="user" required><br><br>
            <label for="">Password:</label required>
            <input type="password" id="pass" name="pass"><br><br>
            <input type="submit" id="btn" value="login" name="submit">
        </form>
    </div>
    <script>
            function isvalid(){
                var user = document.form.user.value;
                var pass = document.form.pass.value;
                if(user.length=="" && pass.length==""){
                    alert(" Username and password field is empty!!!");
                    return false;
                }
                else if(user.length==""){
                    alert(" Username field is empty!!!");
                    return false;
                }
                else if(pass.length==""){
                    alert(" Password field is empty!!!");
                    return false;
                }
                
            }
    </script>
</body>
</html>