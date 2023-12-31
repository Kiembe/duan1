<?php
    session_start();   
    include "./model/pdo.php";
    include "./model/product.php";
    include "./model/categories.php";
    include "./model/properties.php";
    include "./model/user.php";
    include "./model/cart.php";

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
                $_SESSION['name']['id'] = 0;
                header('Location: index.php');
            case "user_info":
                $info = loadone_user($_SESSION['name']['id']);
                include "./user/index.php";
                break;
            case "update_info" :
                if(isset($_POST['update'])&&($_POST['update'])){
                    $id = $_POST['id'];
                    $name = $_POST['name'];
                    $email = $_POST['email'];
                    $tel = $_POST['tel'];
                    
                    update_user_info($id,$name,$email,$tel);
                    $log = 'Cập Nhật Thông Tin Thành Công';
                }
                $info = loadone_user($_SESSION['name']['id']);
                include "./user/index.php";
                break;
            case "update_pass":
                $info = loadone_user($_SESSION['name']['id']);
                include "./user/changePass.php";
                break;
            case "change_pass" :
                $info = loadone_user($_SESSION['name']['id']);
                if(isset($_POST['update'])&&($_POST['update'])){
                    $id = $_POST['id'];
                    $this_pass = $_POST['pass'];
                    $new_pass = $_POST['newPass'];
                    $confim_pass = $_POST['confimPass'];
                    extract($info);
                    if($this_pass != $password){
                        $log = 'Sai Mật Khẩu Hiện Tại';
                        $info = loadone_user($_SESSION['name']['id']);
                        include "./user/changePass.php";
                    }
                    if($confim_pass != $new_pass){
                        $log = 'Mật Khẩu Xác Nhận Không Trùng Khớp';
                        $info = loadone_user($_SESSION['name']['id']);
                        include "./user/changePass.php";
                    }
                    if($this_pass == $password && $confim_pass == $new_pass){
                        update_user_pass($id,$new_pass);
                        $log = 'Cập Nhật Thành Công';
                    }
                }
                $info = loadone_user($_SESSION['name']['id']);
                include "./user/changePass.php";
                break;
            case "check_my_bill" :
                $listBill = loadone_bill_user($_SESSION['name']['id']);
                include "./user/listBill.php";
                break;
            case "bill_detail" :{
                if(isset($_GET['id'])&& $_GET['id']){
                    $Bill = load_bill_detail($_GET['id']);
                }
                $listStorage = loadall_storage();
                include "./user/viewBill.php";
                break;
            }
            case "cancel_bill" :
                if(isset($_GET['id'])&& $_GET['id']){
                    $status = 4;
                    upadate_bill($_GET['id'],$status);
                }
                $listBill = loadone_bill_user($_SESSION['name']['id']);
                include "./user/listBill.php";
                break;
                //
            case "add_cart" :
                if(isset($_POST['add'])&&($_POST['add'])){
                    if(isset($_POST['idUser'])){
                        $idUser = $_POST['idUser'];
                    }else{
                        $idUser = 0;
                    }
                    $id_pro = $_POST['idProduct'];
                    $idVariant = $_POST['idVariant'];
                    $proName = $_POST['proName'];
                    $proImg = $_POST['proImg'];
                    $proPrice = $_POST['proPrice'];
                    $variant = $_POST['idSto'];
                    $flag = 0;

                    if(isset($_POST['quality'])&&$_POST['quality'] > 1){
                        $quality = $_POST['quality'];
                    }else{
                        $quality = 1;
                    }
                    $listCart = loadall_cart($idUser);
                    $proCart = check_cart($id_pro,$idVariant,$idUser);

                    if($listCart != null){
                            if(is_array($proCart)){
                                    $quaUp = $proCart['quantity'] + $quality;
                                    upadate_cart($proCart['id'],$quaUp);
                                }
                                else{
                                    insert_cart($id_pro,$idVariant,$proName,$idUser,$proImg,$quality,$proPrice,$variant);
                                }
                        
                    }else{
                        insert_cart($id_pro,$idVariant,$proName,$idUser,$proImg,$quality,$proPrice,$variant);
                    }
                
                }
                $listCart = loadall_cart($idUser);
                $listStorage = loadall_storage();
                include "./views/cart.php";
                break;
            case "view_cart" :
                if(isset($_SESSION['name']['id'])){
                    $listCart = loadall_cart($_SESSION['name']['id']); 
                }else{
                    $listCart = loadall_cart(0); 
                }
                $listStorage = loadall_storage();
                include "./views/cart.php";
                break;
            case "deleteOnePro_cart" :
                if(isset($_GET['id']) && ($_GET['id']>=0)){
                    delete_one_cart($_GET['id']);
                }
                if(isset($_SESSION['name']['id'])){
                    $listCart = loadall_cart($_SESSION['name']['id']);
                }else{
                    $listCart = loadall_cart(0);
                }
                $listStorage = loadall_storage();
                include "./views/cart.php";
                break;
            case "delete_cart" :
                if(isset($_SESSION['name']['id'])){
                    delete_cart($_SESSION['name']['id']);
                    $listCart = loadall_cart($_SESSION['name']['id']);
                }else{
                    delete_cart(0);
                    $listCart = loadall_cart(0);
                }
                include "./views/cart.php";
                break;
            case "pay";
                if(isset($_SESSION['name']['id'])){
                    $listCart = loadall_cart($_SESSION['name']['id']);
                    $addres = loadone_address($_SESSION['name']['id']);
                }else{
                    $listCart = loadall_cart(0);
                    $addres = loadone_address(0);
                }
                
                $listStorage = loadall_storage();
                include "./views/bill.php";
                break;
            case "addInfo" :
                include "./views/addInfo.php";
                break;
            case "infoAdd" :
                if(isset($_POST['update'])&&($_POST['update'])){
                    if(isset($_SESSION['name']['id'])){
                        $idUser = $_POST['idUser'];
                    }else{
                        $idUser = 0;
                    }
                    $fullName = $_POST['name'];
                    $phoneNumb = $_POST['tel'];
                    $address = $_POST['address'];

                    insert_address($idUser,$fullName,$phoneNumb,$address);
                }
                if(isset($_SESSION['name']['id'])){
                    $listCart = loadall_cart($_SESSION['name']['id']);
                    $addres = loadone_address($_SESSION['name']['id']);
                }else{
                    $listCart = loadall_cart(0);
                    $addres = loadone_address(0);
                }
                $listStorage = loadall_storage();
                include "./views/bill.php";
                break;
            case "updateInfo" :
                if(isset($_SESSION['name']['id'])){
                    $addres = loadone_address($_SESSION['name']['id']);
                }else{
                    $addres = loadone_address(0);
                }
                include "./views/updateInfo.php";
                break;
            case "infoUpdate" :
                if(isset($_POST['update'])&&($_POST['update'])){
                    $idUser = $_POST['idUser'];
                    $fullName = $_POST['name'];
                    $phoneNumb = $_POST['tel'];
                    $address = $_POST['address'];

                    update_address($idUser,$fullName,$phoneNumb,$address) ;
                }
                if(isset($_SESSION['name']['id'])){
                    $listCart = loadall_cart($_SESSION['name']['id']);
                    $addres = loadone_address($_SESSION['name']['id']);
                }else{
                    $listCart = loadall_cart(0);
                    $addres = loadone_address(0);
                }
                $listStorage = loadall_storage();
                include "./views/bill.php";
                break;
            case "addbill":
                if(isset($_POST['add'])&&($_POST['add'])){
                    if(isset($_SESSION['name']['id']) && ($_SESSION['name']['id'] >0)){
                        $idUser = $_POST['idUser'];
                    }else{
                        $idUser = 0;
                    }
                    
                    $pay_method = $_POST['pay'];
                    $name_user = $_POST['nameUser'];
                    $total = $_POST['total'];
                    $bill_code = "#".rand(1000,9999);
                    insert_bill($idUser,$name_user,$bill_code,$pay_method,$total);

                    $bill = loadone_bill_user($idUser);
                    extract($bill);
                    $id_bill = $bill[0]['id'];
                    if(isset($_SESSION['name']['id'])){
                        $listCart = loadall_cart($_SESSION['name']['id']);
                        $addres = loadone_address($_SESSION['name']['id']);
                    }else{
                        $listCart = loadall_cart(0);
                        $addres = loadone_address(0);
                    }

                    foreach($listCart as $cart){
                        extract($cart);
                        insert_bill_detail($id_bill,$id_product,$id_variant,$pro_name,$id_user,$image,$quantity,$price,$id_sto);
                    }


                    
                    delete_cart($idUser);
                }
                include "./views/billSucces.php";
                break;
            case "list" :
                if(isset($_GET['id']) && ($_GET['id'])){
                    $listPro = loadall_products_byId($_GET['id']);
                }
                include "./views/list.php";
                break;
            default :
                $listCat = loadall_categories();
                $listProduct = loadall_products_home();
                include "./views/home.php";
                break;
        }
    }else{
        $listCat = loadall_categories();
        $listProduct = loadall_products_home();
        include "./views/home.php";
    }



    include "./footer.php";
?>