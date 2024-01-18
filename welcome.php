<?php 
    session_start();
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
    width: 23%;
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
        <h1>Welcome <?php echo $_SESSION['name'] ?></h1> 
        
        </form>
    </div>
</body>
</html>