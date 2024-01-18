<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Bootstrap demo</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <style>
      body{
        background: url(assets/background1.webp);
        background-repeat: no-repeat;
        background-size: cover;
        width: 100vw;
        height: 100vh;
      }
      h1{
        color: DarkViolet   ; 
        font-size: 45px;
        }
      #form{
          background-color: white;
          width: 30%;
          position: absolute;
          top: 40%;
          left: 50%;
          transform: translate(-50%, -50%);
          padding: 50px;
          box-shadow: 10px 10px 5px DarkViolet ;
          border-radius: 5px;
          text-align: center;
      }
    </style>
  </head>
  <body>
  
    <?php 
        include "navbar.php";
    ?>
  
    <?php
            if (isset($_SESSION['name'])) {
              echo "
              <div id='form'>
              <h1>Welcome {$_SESSION['name']} </h1>
              </div>";
            }
    ?>
  
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
  </body>
</html>