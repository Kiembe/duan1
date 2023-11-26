<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./public/fonts/fontawesome-free-6.4.2-web/css/all.min.css">
    <link rel="stylesheet" href="./public/css/reset.css">
    <link rel="stylesheet" href="./public/css/style.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link rel="icon" type="image/x-icon" href="./public/img/Apple-logo.png">
    <link
        href="https://fonts.googleapis.com/css2?family=Public+Sans:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap"
        rel="stylesheet">
    <title>I SHOP</title>
</head>

<body>
    <div class="wrapper">
        <header>
            <div class="head">
                <a href="index.php">
                    <img src="./public/img/Apple-logo.png" class="logo">
                </a>

                <div class="action">
                    <button class="searchBtn">
                        <i class="fa-solid fa-magnifying-glass"></i>
                    </button>

                    <a href="index.php?act=view_cart">
                        <i class="fa-solid fa-cart-shopping"></i>
                    </a>

                    

                    <?php
                        if(isset($_SESSION['name']['name'])&&($_SESSION['name']['name'] != "")){
                            if($_SESSION['name']['role'] == 1){
                                echo '
                                        <div class="userName">
                                            <i class="fa-solid fa-user"></i>
                                            <p>'.$_SESSION['name']['name'].'</p>
                                            <div class="subAcc">
                                                <ul>
                                                    <a href="index.php?act=user_info">
                                                        <li>Thông Tin Tài Khoản</li>
                                                    </a>
    
                                                    <a href="./admin/">
                                                        <li>Trang Quản Trị</li>
                                                    </a>
    
                                                    <a href="index.php?act=log_out">
                                                        <li>Đăng Xuất</li>
                                                    </a>
                                                </ul>
                                            </div>
                                        </div>
                                ';
                            }else{
                                echo '
                                        <div class="userName">
                                            <i class="fa-solid fa-user"></i>
                                            <p>'.$_SESSION['name']['name'].'</p>
                                            <div class="subAcc">
                                                <ul>
                                                    <a href="index.php?act=user_info">
                                                        <li>Thông Tin Tài Khoản</li>
                                                    </a>
    
                                                    <a href="index.php?act=log_out">
                                                        <li>Đăng Xuất</li>
                                                    </a>
                                                </ul>
                                            </div>
                                        </div>
                                ';
                            }
                        }else{
                            echo '
                                <a href="index.php?act=sign_in">
                                    <i class="fa-solid fa-user"></i>
                                </a>
                            ';
                        }
                    ?>

                </div>
            </div>
        </header>

        <div class="search">
            <form action="#" class="container">
                <input type="text" name="search" placeholder="Nhập Tìm Kiếm">
                <p>Liên kết nhanh</p>
                <ul>
                    <a href="">
                        <li><i class="fa-solid fa-arrow-right"></i> iPhone</li>
                    </a>
                    <a href="">
                        <li><i class="fa-solid fa-arrow-right"></i> iPhone</li>
                    </a>
                    <a href="">
                        <li><i class="fa-solid fa-arrow-right"></i> iPhone</li>
                    </a>
                </ul>
            </form>
        </div>