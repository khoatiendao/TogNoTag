<?php
    include "connectDB.php";

    if(isset($_POST['name'])){
        $name = $_POST['name'];
        $number = $_POST['number'];
        $address = $_POST['address'];
        $email = $_POST['email'];
        $password = $_POST['password'];
        $rePassword = $_POST['rePassword'];

        $err = [];
        if($password != $rePassword){
            $err['rePassword'] = 'Enter incorrect password please re-enter';
        }else {
            $sql = "INSERT INTO `users`(`name`, `number`, `address`, `email`, `password`) VALUES ('$name','$number','$address','$email','$password')";
            $query = mysqli_query($conn, $sql);
            header('location:Login.php');
        }
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./icon/themify-icons/themify-icons.css">
    <link rel="stylesheet" href="./css/style_register.css">
    <title>Đăng ký</title>
</head>
<body>
    <div class="box_register">
        <div class="left_logo">
            <img class="logo_img" src="./img/logo.jpg" alt="hình logo">
        </div>
        <div class="right_sign_up">
            <div class="title_register">
                <h1 class="text_register">TOGNOTAG</h1>
            </div>
            <form action="" method="post">
                <div class="text_name">
                    <input class="input_name" type="text" placeholder="Name" required name="name">
                </div>
                <div class="text_number">
                    <input class="input_number" type="text" placeholder="Number" required name="number">
                </div>
                <div class="text_address">
                    <input class="input_address" type="text" placeholder="Address" required name="address">
                </div>
                <div class="text_email">
                    <input class="input_email" type="text" placeholder="Email" required name="email">
                </div>
                <div class="text_password">
                    <input class="input_password" type="password" placeholder="Password" required name="password">
                    <i id="icon_eye" class="ti-eye"></i>
                </div>
                <div class="text_repassword">
                    <input class="input_repassword" type="password" placeholder="Re-enter password" required name="rePassword">
                    <i id="icon_eye2" class="ti-eye"></i>
                    <div class="error_text_repassword">
                        <span class="text_error"><?php echo (isset($err['rePassword']))?$err['rePassword']:'' ?></span>
                    </div>
                </div>
                <div class="button_register">
                    <a href="./Login.php">
                    <input class="btn_submit_register" type="submit" value="Sign up">
                    </a>
                </div>
            </form>
        </div>
    </div>
    <script>
        var eye = document.querySelector("#icon_eye");
        eye.onclick = function(){
            var result = document.querySelector(".input_password").type;

            if (result == "password"){
                result = document.querySelector(".input_password").type = "text";
            }else {
                result = document.querySelector(".input_password").type = "password";
            }
        }

        var eye2 = document.querySelector("#icon_eye2");
        eye2.onclick = function(){
            var result = document.querySelector(".input_repassword").type;

            if (result == "password"){
                result = document.querySelector(".input_repassword").type = "text";
            }else {
                result = document.querySelector(".input_repassword").type = "password";
            }
        }
    </script>
</body>
</html>