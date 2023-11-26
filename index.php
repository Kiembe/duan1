<?php
    session_start();
    if(!isset($_SESSION['cart'])) $_SESSION['cart'] = [];   
    include "./model/pdo.php";
    include "./model/product.php";
    include "./model/properties.php";
    include "./model/user.php";

    include "./header.php";

    if (isset($_GET['act'])) {
        $act = $_GET['act'];
        switch ($act) {
            case "prodetail" :
                if(isset($_GET['id']) && ($_GET['id']>0)){
                    $product=loadone_products($_GET['id']);
                    $listVariant = load_variant($_GET['id']);
                }
                $listStorage = loadall_storage();
                include "./views/prodetail.php";
                break;
            case "variantDetail" :
                if(isset($_GET['id']) && ($_GET['id']>0)){
                    $id_pro = $_GET['idpro'];
                    $variantOne = loadone_variant($_GET['id']);
                    $product=loadone_products($id_pro);
                    $listVariant = load_variant($id_pro);
                }
                $listStorage = loadall_storage();
                include "./views/proVariant.php";
                break;
            case "sign_up";
                include "./views/signUp.php";
                break;
            case "sign_in";
                include "./views/signIn.php";
                break;
            case "signUp":
                if(isset($_POST['signUP'])&&($_POST['signUP'])){
                    $userName = $_POST['userName'];
                    $pass = $_POST['password'];
                    $email = $_POST['email'];
                    $tel = $_POST['tel'];
                    insert_user($userName,$pass,$email,$tel);
                }
                include "./views/signIn.php";
                break;
            case "signIn":
                if(isset($_POST['signIN'])&&($_POST['signIN'])){
                    $userName = $_POST['userName'];
                    $pass = $_POST['password'];
                    $checkuser = check_user($userName,$pass);
                    if(is_array($checkuser)){
                        $_SESSION['name'] = $checkuser;
                        if($_SESSION['name']['role'] == 0){
                            header('Location: index.php');
                        }else{
                            header('Location: admin');

                        }
                    }else{
                        $log = "sai tên đăng nhập hoặc mật khẩu";
                    }
                }
                include "./views/signIn.php";
                break;
            case "log_out" :
                unset($_SESSION['name']['name']);
                unset($_SESSION['name']['password']);
                unset($_SESSION['name']['role']);
                header('Location: index.php');
            case "add_cart" :
                if(isset($_POST['add'])&&($_POST['add'])){
                    $id = $_POST['idProduct'];
                    $idVariant = $_POST['idVariant'];
                    $proName = $_POST['proName'];
                    $proImg = $_POST['proImg'];
                    $proPrice = $_POST['proPrice'];
                    $count = 1;
                    $flag = 0;

                    $i=0;
                    foreach( $_SESSION['cart'] as $item) {
                        if($item[5] == $_POST['idVariant']){
                            $newCount = $count + $item[4];
                            $_SESSION['cart'][$i][4] = $newCount;
                            $flag = 1;
                            break;
                        }
                        $i++;
                    }

                    if($flag == 0){
                        $cartItem = array($id,$proName,$proImg,$proPrice,$count,$idVariant);
                        $_SESSION['cart'][]=$cartItem;
                    }
                    // header("Location: index.php?act=cart");
                }
                include "./views/cart.php";
                break;
            case "view_cart" :
                include "./views/cart.php";
                break;
            case "delete_cart" :
                if(isset($_SESSION['cart'])) unset($_SESSION['cart']);
                include "./views/cart.php";
                break;
            default :
                $listProduct = loadall_products_home();
                include "./views/home.php";
                break;
        }
    }else{
        $listProduct = loadall_products_home();
        include "./views/home.php";
    }



    include "./footer.php";
?>