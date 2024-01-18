<!DOCTYPE html>
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7"> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8"> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9"> <![endif]-->
<!--[if gt IE 8]>      <html class="no-js"> <!--<![endif]-->
<html>
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <title>BMI Calculator</title>
        <meta name="description" content="">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <!-- <link rel="stylesheet" href="bmistyle.css"> -->
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <style>
*{
    margin: 0;
    padding: 0;
    box-sizing: border-box;
}

body{
    background: rgb(61, 133, 221);
    
}

h2{
    color: rgba(10, 78, 236, 0.843);
    text-align: center;
    line-height: 2.5;
    font-size: 25px;
}

.wrapper{
    width: 500px;
    height: 420px;
    background: white;
    padding: 30px;
    border-radius: 10px;
    position: absolute;
    top: 50%;
    left: 50%;
    transform: translate(-50%, -50%)
    
}

.section2 input {
    margin-left: 2px
}

form .section1 input, .section2 input {
    width: 200px;
    border: 1px solid rgb(4, 92, 159);
    outline: none;
    border-radius: 5px;
    font-size: 22px;
    color: rgba(102, 102, 102, 0.904);
}

form label{
    color:rgb(100, 100, 100);
    font-size: 18px;
    font-weight:500;
}

form .submit input {
    padding: 5px 10px;
    font-size: 18px;
    margin-top: 15px;
    margin-bottom: 20px;
    border: 1px solid rgb(4, 92, 159);
    color: rgb(4, 92, 159);
    background: white;
    border-radius: 5px;
    transition: all 0.2s;
}

form .submit input:hover {
    color: white;
    background: rgb(4, 92, 159);
}

.pass {
    color:rgba(10, 78, 236, 0.843);
    font-size: 18px;
}

.one, .two, .three, .four, .five, .six{
    width: 90px;
    height: 170px;
    float: right;
    margin-top: -100px;
    margin-right: -20px;
}

    </style>
    </head>
    <body>
 <?php 
    include "navbar.php";
?>
<?php 

$errh = $errw = "";
$height = $weight = "";
$bmipass = "";

if ($_SERVER['REQUEST_METHOD'] == "POST") {
    if (empty($_POST['height'])) {
        $errh = "<span style = 'color:#ed4337; font-size:17px; display:block'>Yêu cầu nhập chiều cao</span>";
    }
    else {
        $height = validation($_POST['height']);
    }

    if (empty($_POST['weight'])) {
        $errw =  "<span style = 'color:#ed4337; font-size:17px; display:block'>Yêu cầu nhập cân nặng</span>";
    }
    else {
        $weight = validation($_POST['weight']);
        
    }

    if (empty($_POST['weight'] && $_POST['height'])) {
        echo '';
    }
    else {
        $bmi = ($weight / ($height * $height));
        $bmipass = $bmi;
    }

}

function validation($data) {
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}

?>
<div class="wrapper">
<h2>Tính toán chỉ số BMI:</h2>
            <form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']);?>" method="post">
                <div class="section1">
                    <label>Nhập chiều cao của bạn:</label>
                    <input type="text" placeholder="m" name="height" autocomplete="off">
                    <?php echo $errh;?>
                </div>
                
                <div class="section2">
                    <label>Nhập cân nặng của bạn:</label>
                    <input type="text" placeholder="kg" name="weight" autocomplete="off">
                    <?php echo $errw;?>
                </div>
                <div class="submit">
                    <input type="submit" value="Nhập" name="submit">
                    <input type="reset" value="Xóa">
                </div>
            </form>

<?php
    error_reporting(0);
        echo "<span class='pass'>BMI của bạn là : ". number_format($bmipass , 2) ."</span>";
    if (isset($_POST['submit'])){
        if ($bmipass >= 13.6 && $bmipass <= 18.5) {
            echo "<span style='color:#00203FFF; display:block; margin-top:5px ;margin-right:70px'> Trọng lượng cơ thể thấp. Bạn cần tăng cân bằng cách ăn uống điều độ.</span>";?>
            <img src="assets/thieu can.png" class="one" width="30" height="70"><?php
        } elseif ($bmipass > 18.5 && $bmipass < 25) {
            echo "<span style='color:#00203FFF; display:block; margin-top:5px;margin-right:70px'> Tiêu chuẩn của sức khỏe tốt. Tiếp tục giữ chế độ sinh hoạt.</span>";?>
            <img src="assets/binh thuong.png" class="two" width="30" height="70"><?php
        } elseif ($bmipass >= 25 && $bmipass < 30) {
            echo "<span style='color:#00203FFF; display:block; margin-top:5px;margin-right:70px'> Trọng lượng cơ thể dư thừa. Cần tập thể dục để giảm trọng lượng dư thừa.</span>";?>
            <img src="assets/thua can (1).png" class="three" width="30" height="70"><?php
        } elseif ($bmipass >= 30.0 && $bmipass < 35) {
            echo "<span style='color:#00203FFF; display:block; margin-top:5px;margin-right:70px'> Giai đoạn đầu tiên của béo phì. Cần thiết chọn thực phẩm kĩ càng và tập thể dục.</span>";?>
            <img src="assets/thua can (2).png" class="four" width="30" height="70"><?php
        } elseif ($bmipass >= 35) {
            echo "<span style='color:#00203FFF; display:block; margin-top:5px;margin-right:70px'> Béo phì nguy hiểm. Cần có chế độ ăn uống và tập thể dục phù hợp, cần có thêm sự tư vấn của bác sĩ.</span>";?>
            <img src="assets/thua can (3).png" class="five" width="30" height="70"><?php
        }
    } else {
        echo "";
    }
?>
      </div>
    </body>
</html>