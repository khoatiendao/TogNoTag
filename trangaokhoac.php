<?php
include("connectDB.php");
$sql = "SELECT * FROM `products`";
$query = mysqli_query($conn, $sql);

$user = $_SESSION['user'];
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>TRANG ÁO KHOÁC</title>
    <script src="https://kit.fontawesome.com/e85e8facb0.js" crossorigin="anonymous"></script>
    <!-- <link rel="stylesheet" href="header.css"> -->
    <link rel="stylesheet" href="./css/style_trangaokhoac.css">
    <link rel="shortcut icon" href="./img/Logo.jpg" type="image/x-icon">


</head>

<body>
    <header>
        <div>
            <input type="checkbox" name="" id="toggler">
            <label for="toggler" class="fas fa-bars"></label>
            <div class="logo_header">
                <img class="logo_tognotag" src="./img/Logo.jpg" alt="">
            </div>
            <a href="./trangchu.php" class="logo">TognotagShop<span>.</span></a>
        </div>

        <nav class="navbar">
            <a href="./trangchu.php">Trang chủ</a>
            <a href="./trangao.php">Áo</a>
            <a href="./trangquan.php">Quần</a>
            <a href="./tranghoodie.php">Hoodie</a>
            <a href="./trangsweater.php">Sweater</a>
            <a href="./trangaokhoac.php">Áo khoác</a>
        </nav>

        <div class="box">
            <div class="container">
                <span class="icon"><i class="fa fa-search"></i></span>
                <input type="search" style="padding: 5px;" id="search" placeholder="Search..." />
            </div>
        </div>

        <div class="icons">
            <a href="./login_admin.php" class="fas fa-heart"></a>
            <a href="#" class="fas fa-shopping-cart notification_done">
                <div class="navbar_notification">
                    <img class="cart_clear" src="https://bizweb.dktcdn.net/100/368/179/themes/738982/assets/empty-cart.png?1655829755743" alt="">
                    <p class="text_cart_clear">Bạn chưa có sản phẩm trong giỏ hàng</p>
                </div>
            </a>
            <a href="./Login.php" class="fas fa-user">&nbsp;&nbsp;<?php if ($user == true) {
                echo $user['name'] ?><?php }else{ echo "";}?></a>
        </div>
    </header>





    <div class="CONTAINER">
        <div class="title_product">
            <h2 class="all">Các sản phẩm</h2>
        </div>
        <div class="body3">
            <div class="box4-body3">
                <img src="./img/7-aokhoac.jpg" class="hinh-pho" alt="">
                <ul class="nut-sp">
                    <li class="box-nutsp"><a href="">Mua hàng</a></li>
                    <li class="box-nutsp"><a href="">Giỏ hàng</a></li>
                    <li class="box-nutsp"><a href="">Chi tiết</a></li>
                </ul>
                <h2 class="box-motasp">Áo khoác</h2>
                <p class="gia">120.000 <sup>đ</sup></p>
            </div>

            <div class="box4-body3">
                <img src="./img/9-aokhoac.jpg" class="hinh-pho" alt="">
                <ul class="nut-sp">
                    <li class="box-nutsp"><a href="">Mua hàng</a></li>
                    <li class="box-nutsp"><a href="">Giỏ hàng</a></li>
                    <li class="box-nutsp"><a href="">Chi tiết</a></li>
                </ul>
                <h2 class="box-motasp">Áo khoác</h2>
                <p class="gia">120.000 <sup>đ</sup></p>
            </div>

            <div class="box4-body3">
                <img src="./img/8-aokhoac.jpg" class="hinh-pho" alt="">
                <ul class="nut-sp">
                    <li class="box-nutsp"><a href="">Mua hàng</a></li>
                    <li class="box-nutsp"><a href="">Giỏ hàng</a></li>
                    <li class="box-nutsp"><a href="">Chi tiết</a></li>
                </ul>
                <h2 class="box-motasp">Áo khoác</h2>
                <p class="gia">120.000 <sup>đ</sup></p>
            </div>

            <div class="box4-body3">
                <img src="./img/10-aokhoac.jpg" class="hinh-pho" alt="">
                <ul class="nut-sp">
                    <li class="box-nutsp"><a href="">Mua hàng</a></li>
                    <li class="box-nutsp"><a href="">Giỏ hàng</a></li>
                    <li class="box-nutsp"><a href="">Chi tiết</a></li>
                </ul>
                <h2 class="box-motasp">Áo khoác</h2>
                <p class="gia">120.000 <sup>đ</sup></p>
            </div>
        </div>

        <div class="body3">
            <?php
            while ($row = mysqli_fetch_array($query)) {
            ?>
                <div class="box1-body3">
                    <img src="./img/<?= $row["imgURL"] ?>" class="hinh-pho" alt="">
                    <ul class="nut-sp">
                        <li class="box-nutsp"><a href="">Mua hàng</a></li>
                        <li class="box-nutsp"><a href="">Giỏ hàng</a></li>
                        <li class="box-nutsp"><a href="">Chi tiết</a></li>
                    </ul>
                    <h2 class="box-motasp"><?= $row["tensp"] ?></h2>
                    <p class="gia"><?= $row["gia"] ?>&nbsp;<sup>đ</sup></p>
                </div>
            <?php } ?>
        </div>
    </div>



    <footer>
        <div class="footer">
            <div class="container-2">
                <div class="column">
                    <h3>Follow us</h3>
                    <div class="button">
                        <a href="https://www.instagram.com/tognotag/?fbclid=IwAR2pKiE-4vZ-54hS_zn3LO9_W18qDhTzkDsC60Hnls8_HUX82jxOuQTpQO4" class="kihieu">
                            <i class="fa-brands fa-instagram"></i>
                        </a>
                        <a href="https://www.facebook.com/doxuatkhauxuatdu" class="kihieu">
                            <i class="fa-brands fa-facebook-f"></i>
                        </a>

                    </div>
                </div>

                <div class="column" style="padding-left:100px ;">
                    <h3>Hướng dẫn</h3>
                    <ul style="margin-top: 10px">
                        <li>
                            <a href="./html/dieukhoang.html" class="ef">Điều khoản</a>
                        </li>
                        <li>
                            <a href="./html/HDMH.html" class="ef">Hướng dẫn mua hàng</a>
                        </li>
                        <li>
                            <a href="./html/CSTT.html" class="ef">Chính sách đổi trả hàng</a>
                        </li>
                        <li>
                            <a href="./html/BMTT.html" class="ef">Bảo mật thông tin khách hàng</a>
                        </li>
                        <li>
                            <a href="./html/CSTT.html" class="ef">Chính sách thanh toán</a>
                        </li>

                    </ul>
                </div>
                <div class="column" style="margin-right: 0;">
                    <h3>Contact</h3>
                    <p>Hẻm 69/68 Đ. Đặng Thuỳ Trâm, Phường 13, Bình Thạnh, Thành phố Hồ Chí Minh 70000</p>
                    <div class="phoneContact">
                        <p> <i class="fa-solid fa-phone-volume"></i>09123456789</p>
                    </div>
                    <div class="line">
                        <p style="padding-bottom:0 ;">info@TognoTag.com</p>
                        <div class="line" style="border-top:1px solid var(--maincolor) ;"></div>
                    </div>
                </div>
                <div class="logo_footer">
                    <img class="logo_footer_tognotag" src="./img/Logo.jpg" alt="">
                </div>
            </div>

        </div>

    </footer>
</body>

</html>