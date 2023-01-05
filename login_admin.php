<?php
include("connectDB.php");

if(isset($_POST['AdminEmail'])){
    $AdminEmail = $_POST['AdminEmail'];
    $AdminPass = $_POST['AdminPassword'];

    $sql = "SELECT * FROM `admin` WHERE  `adminEmail` = '$AdminEmail' and `adminPass` = '$AdminPass'";
    $query = mysqli_query($conn, $sql);
    $row = mysqli_fetch_assoc($query);

    $checkEmail = mysqli_num_rows($query);

    if ($checkEmail > 0){
        $checkPassword = $row['adminPass'];

        if($checkPassword == $AdminPass){
            $_SESSION['adminUser'] = $row;
            header("location:quantrisanpham.php");
        }else{
            echo "<script> alert('Bạn đã nhập sai mật khẩu mời bạn nhập lại') </script>";
        }
    }else {
        echo "<script> alert('Email không tồn tại') </script>";
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./css/style_login_admin.css">
    <link rel="stylesheet" href="./icon/themify-icons/themify-icons.css">
    <title>Đăng nhập quản lý</title>
</head>

<body>
    <div class="box_login">
        <div class="left_sign_in">
            <h1 class="title">TOGNOTAG</h1>
            <br>
            <h1 class="title">ADMIN</h1>
            <div class="icon_conn">
                <a class="icon_sign_in" href="./trangchu.php"><img class="logo_back_home" src="./img/Logo.jpg" alt=""></a>
            </div>

            <form action="Login_admin.php" method="post">
                <div class="text_email" style="margin-top: 20px;">
                    <input class="input_email" type="text" placeholder="Email" name="AdminEmail" require>
                </div>
                <div class="text_password">
                    <input class="input_password" type="password" placeholder="Password" name="AdminPassword" require>
                    <i id="icon_eye" class="ti-eye"></i>
                </div>
                <div class="btn_sign_in">
                    <a style="text-decoration: none;" class="forgot_pwd" href="#">
                        <p class="detail_forgot">Forgot your password ?</p>
                    </a>
                    <input class="btn_in" type="submit" value="SIGN IN">
                </div>
            </form>
        </div>

        <!-- <div class="right_sign_up">
            <div class="title_right">
                <h2 class="title_register">Hello, Friend!</h2>
            </div>
            <div class="intro_register">
                <p class="title_intro">Enter your personal details and let's go shopping</p>
            </div>
            <div class="btn_register">
                <a href="./register.php">
                    <input class="btn_up" type="button" value="SIGN UP">
                </a>
            </div>
        </div> -->
    </div>
    <script>
        var eye = document.querySelector("#icon_eye");
        eye.onclick = function() {
            var result = document.querySelector(".input_password").type;

            if (result == "password") {
                result = document.querySelector(".input_password").type = "text";
            } else {
                result = document.querySelector(".input_password").type = "password";
            }
        }
    </script>
</body>

</html>