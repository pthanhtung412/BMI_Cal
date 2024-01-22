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
    background-color:  ForestGreen   ;
}

h1{
    color: MediumSeaGreen     ; 
    font-size: 35px;
}

#form{
    background-color: white;
    width: 80%;
    position: absolute;
    margin-top: 40px;
    left: 50%;
    transform: translate(-50%, 0);
    padding: 50px;
    box-shadow: 10px 10px 5px MediumSeaGreen     ;
    border-radius: 5px;
    font-size: 20px;

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
        <?php 
          echo "<h1>BMI History of {$_SESSION['name']}:</h1>"
        ?>
    <div class="container my-4">
    <table class="table">
    <thead>
      <tr>
        <th>HEIGHT</th>
        <th>WEIGHT</th>
        <th>BMI</th>
        <th>TIME</th>
      </tr>
    </thead>
    <tbody>
      <?php
        include "connection.php";
        $sql = "SELECT * FROM bmi_his WHERE username = '{$_SESSION['name']}' ORDER BY TIME DESC";
        $result = $conn->query($sql);
        if(!$result){
          die("Invalid query!");
        }
        while($row=$result->fetch_assoc()){
          echo "
      <tr>
        <td>$row[height]</td>
        <td>$row[weight]</td>
        <td>$row[BMI]</td>
        <td>$row[TIME]</td>
      </tr>
      ";
        }
      ?>
    </tbody>
  </table>
      </div>
    </div>
    
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
  </body>
</html>