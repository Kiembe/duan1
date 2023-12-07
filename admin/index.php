<?php
include("./header.php");

include "../model/pdo.php";
include "../model/categories.php";
include "../model/properties.php";
include "../model/product.php";
include "../model/user.php";
include "../model/cart.php";

if (isset($_GET['act'])) {
    $act = $_GET['act'];
    switch ($act) {
        case 'them_danh_muc' :
            if(isset($_POST['add'])&&($_POST['add'])){
                $catName = $_POST['nameCat'];
                $image= $_FILES['catIMG']['name'];
                $target_dir = "../uploads/";
                $target_file = $target_dir . basename($_FILES["catIMG"]["name"]);
                move_uploaded_file($_FILES["catIMG"]["tmp_name"],$target_file);
                insert_categories($catName,$image);
                $log = "Thêm thành công";
            }
            include "categories/add.php";
            break;
        case 'danhmuc':
            $listCategories = loadall_categories();
            include "./categories/list.php";
            break;
        case 'delete_cat' :
            if(isset($_GET['id']) && ($_GET['id']>0)){
                delete_categories($_GET['id']);
            }
            $listCategories = loadall_categories();
            include "categories/list.php";
            break;
        case 'update_cat' :
            if(isset($_GET['id']) && ($_GET['id']>0)){
                $cat=loadone_categori($_GET['id']);
            }
            include "categories/update.php";
            break;
        case 'update_listCat' :
            if(isset($_POST['update'])&&($_POST['update'])){
                $catName = $_POST['nameCat'];
                $id=$_POST['id'];
                $image= $_FILES['catIMG']['name'];
                $target_dir = "../uploads/";
                $target_file = $target_dir . basename($_FILES["catIMG"]["name"]);
                move_uploaded_file($_FILES["catIMG"]["tmp_name"],$target_file);
                if($image == ""){
                    upadate_categories_notIMG($id,$catName);
                }else{
                    upadate_categories($id,$catName,$image);
                }
                $log = "Cập nhật thành công";
            }
            $listCategories = loadall_categories();
            include "categories/list.php";
            break;
            // <-- Product -->
        case "sanpham":
            if(isset($_POST['filter'])&&($_POST['filter'])){
                // $key=$_POST['key'];
                $id_cat=$_POST['id_cat'];
            }else{
                // $key='';
                $id_cat=0;
            }
            $listCategories = loadall_categories();
            $listProduct = loadall_products($id_cat);
            include "products/list.php";
            break;
        case "them_san_pham":
            if(isset($_POST['add'])&&($_POST['add'])){
                $id_cat = $_POST['id_cat'];
                $name = $_POST['proName'];
                $price = $_POST['proPrice'];
                $image= $_FILES['proIMG']['name'];
                $des = $_POST['proDes'];
                $target_dir = "../uploads/";
                $target_file = $target_dir . basename($_FILES["proIMG"]["name"]);
                if(move_uploaded_file($_FILES["proIMG"]["tmp_name"],$target_file)) {

                }else{

                }
                
                insert_products($name,$price,$image,$des,$id_cat);
                $log = "Thêm thành công";
            }
            $listCategories = loadall_categories();
            include "./products/add.php";
            break;
        case "update_pro":
            if(isset($_GET['id']) && ($_GET['id']>0)){
                $product=loadone_products($_GET['id']);
            }
            $listCategories = loadall_categories(); 
            include "products/update.php";
            break;
        case "update_listPro":
            if(isset($_POST['update'])&&($_POST['update'])){
                $id = $_POST['id'];
                $id_cat = $_POST['id_cat'];
                $name = $_POST['proName'];
                $price = $_POST['proPrice'];
                $image= $_FILES['proIMG']['name'];
                $des = $_POST['proDes'];
                $target_dir = "../uploads/";
                $target_file = $target_dir . basename($_FILES["proIMG"]["name"]);
                if(move_uploaded_file($_FILES["proIMG"]["tmp_name"],$target_file)) {

                }else{

                }
                update_products($id,$name,$price,$image,$des,$id_cat);
                $log = "Cập nhật thành công";
            }
            $listCategories = loadall_categories();
            $listProduct = loadall_products();
            include "products/list.php";
            break;
        case "delete_pro":
            if(isset($_GET['id']) && ($_GET['id']>0)){
                delete_variantbyPRo($_GET['id']);
                delete_products($_GET['id']);
            }
            $listProduct = loadall_products();
            include "products/list.php";
            break;
        case "variant_pro":
            if(isset($_GET['id']) && ($_GET['id']>0)){
                $product=loadone_products($_GET['id']);
            }
            $listStorage = loadall_storage();
            $listCategories = loadall_categories(); 
            include"products/variant.php";
            break;
        case "add_variant";
            $listStorage = loadall_storage();
            if(isset($_POST['add'])&&($_POST['add'])){
                $i = -1;
                foreach($listStorage as $sto){
                    $i++;
                    extract($sto);
                    $id_product = $_POST['id'];
                    $id_storage = $_POST['id_sto'.$i];
                    $price = $_POST['price'.$i];
                    $quantity = $_POST['quantity'.$i];
                    if($quantity > 0){
                        insert_variant($id_product,$id_storage,$price,$quantity);
                        insert_countVariant($i+1,$_POST['id']);
                    }
                }
            }
            $listCategories = loadall_categories();
            $listProduct = loadall_products();
            include "products/list.php";
            break;
        case "variant_update":
            if(isset($_GET['id']) && ($_GET['id']>0)){
                $product=loadone_products($_GET['id']);
                $listProDetail = load_products_detail($_GET['id']);
            }
            $listStorage = loadall_storage();
            $listCategories = loadall_categories(); 
            include "products/variantUpdate.php";
            break;
        case "update_variant" :
            $listStorage = loadall_storage();
            if(isset($_POST['update'])&&($_POST['update'])){
                $i = -1;
                foreach($listStorage as $sto){
                    extract($sto);
                    // if(isset($_POST['id_detail'.$i])){
                        $i++;
                            $id_product = $_POST['id'];
                            $id_storage = $_POST['id_sto'.$i];
                            $id_detail = $_POST['id_detail'.$i];
                            $price = $_POST['price'.$i];
                            $quantity = $_POST['quantity'.$i];
                            if($id_detail == 0){
                                insert_variant($id_product,$id_storage,$price,$quantity);

                            }
                            if($quantity > 0){
                                // delete_variant($id_detail);
                                update_variant($id_product,$id_storage,$price,$quantity,$id_detail);
                                insert_countVariant($i+1,$_POST['id']);
                            }
                        }
                    // }
                }
            $listCategories = loadall_categories();
            $listProduct = loadall_products();
            include "products/list.php";
            break;
        case "reset_variant" :
            if(isset($_GET['id']) && ($_GET['id']>0)){
                delete_variant($_GET['id']);
                $product=loadone_products($_GET['idPro']);
                $listProDetail = load_products_detail($_GET['idPro']);
            }
            $listStorage = loadall_storage();
            $listCategories = loadall_categories(); 
            include "products/variantUpdate.php";
            break;
            // <-- Properties -->
        case "dungluong" :
            $listStorage = loadall_storage();
            include "./storage/list.php";
            break;
        case "them_dung_luong":
            if(isset($_POST['add'])&&($_POST['add'])){
                $capacity = $_POST['capacity'];
                $unit = $_POST['unit'];
                insert_storage($capacity,$unit);
                $log = "Thêm thành công";
            }
            include "./storage/add.php";
            break;
        case 'delete_sto' :
            if(isset($_GET['id']) && ($_GET['id']>0)){
                delete_variantbySto($_GET['id']);
                delete_storage($_GET['id']);
            }
            $listStorage = loadall_storage();
            include "./storage/list.php";
            break;
        case "update_sto":
            if(isset($_GET['id']) && ($_GET['id']>0)){
                $sto=loadone_storage($_GET['id']);
            }
            include "./storage/update.php";
            break;
        case "update_listSto":
            if(isset($_POST['update'])&&($_POST['update'])){
                $capacity = $_POST['capacity'];
                $unit = $_POST['unit'];
                $id=$_POST['id'];
                upadate_storage($id,$capacity,$unit);
                $log = "Cập nhật thành công";
            }
            $listStorage = loadall_storage();
            include "./storage/list.php";
            break;
            // br
        case "nguoidung" :
            $listUser = loadall_users();
            include "./user/list.php";
            break;
        case "update_role" :
            if(isset($_GET['id']) && ($_GET['id']>0)){
                $user=loadone_user($_GET['id']);
            }
            include "./user/updateRole.php";
            break;
        case "role_update" :
            if(isset($_POST['update'])&&($_POST['update'])){
                $id = $_POST['id'];
                $role = $_POST['role'];
                if($role != ""){
                    update_user($id,$role);
                }
            }
            $listUser = loadall_users();
            include "./user/list.php";
            break;
        case "donhang" :
            if(isset($_SESSION['name']['id'])){
                $idUser = $_POST['idUser'];
            }else{
                $idUser = 0;
            }
            $listBill = loadall_bill();
            include "./bill/list.php";
            break;
        case "update_bill":
            if(isset($_GET['id']) && ($_GET['id']>0)){
                $Bill = loadone_bill($_GET['id']);
            }
            include "./bill/statusUpdate.php";
            break;
        case "update_status" :
            if(isset($_POST['update'])&&($_POST['update'])){
                $id = $_POST['id'];
                $status = $_POST['status'];
                upadate_bill($id,$status);

            }
            $listBill = loadall_bill();
            include "./bill/list.php";
            break;
        case "view_bill" :
            if(isset($_GET['id']) && ($_GET['id']>0)){
                $Bill = load_bill_detail($_GET['id']);
                $addres = loadone_address($_GET['id_user']);
            }
            $listStorage = loadall_storage();
            include "./bill/viewBill.php";
            break;
        default:
            include "home.php";
            break;
    }
} else {
    include "home.php";
}

include("./footer.php");
?>