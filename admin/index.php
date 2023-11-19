<?php
include("./header.php");

include "../model/pdo.php";
include "../model/categories.php";
include "../model/properties.php";
include "../model/product.php";

if (isset($_GET['act'])) {
    $act = $_GET['act'];
    switch ($act) {
        case 'them_danh_muc' :
            if(isset($_POST['add'])&&($_POST['add'])){
                $catName = $_POST['nameCat'];
                insert_categories($catName);
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
                upadate_categories($id,$catName);
                $log = "Cập nhật thành công";
            }
            $listCategories = loadall_categories();
            include "categories/list.php";
            break;
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
        case "thuoctinh" :
            $listColor = loadall_color();
            $listStorage = loadall_storage();
            include "./properties/list.php";
            break;
        case "dungluong" :
            $listStorage = loadall_storage();
            include "./properties/storage/list.php";
            break;
        case "them_dung_luong":
            if(isset($_POST['add'])&&($_POST['add'])){
                $capacity = $_POST['capacity'];
                $unit = $_POST['unit'];
                insert_storage($capacity,$unit);
                $log = "Thêm thành công";
            }
            include "./properties/storage/add.php";
            break;
        case 'delete_sto' :
            if(isset($_GET['id']) && ($_GET['id']>0)){
                delete_storage($_GET['id']);
            }
            $listStorage = loadall_storage();
            include "./properties/storage/list.php";
            break;
        case "update_sto":
            if(isset($_GET['id']) && ($_GET['id']>0)){
                $sto=loadone_storage($_GET['id']);
            }
            include "./properties/storage/update.php";
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
            include "./properties/storage/list.php";
            break;
            // br
        case "mausac" :
            $listColor = loadall_color();
            include "./properties/color/list.php";
            break;
        case "them_mau_sac":
            if(isset($_POST['add'])&&($_POST['add'])){
                $name = $_POST['name'];
                $code = $_POST['code'];
                insert_color($name,$code);
                $log = "Thêm thành công";
            }
            include "./properties/color/add.php";
            break;
        case 'delete_color' :
            if(isset($_GET['id']) && ($_GET['id']>0)){
                delete_color($_GET['id']);
            }
            $listColor = loadall_color();
            include "./properties/color/list.php";
            break;
        case "update_color":
            if(isset($_GET['id']) && ($_GET['id']>0)){
                $color=loadone_color($_GET['id']);
            }
            include "./properties/color/update.php";
            break;
        case "update_listColor":
            if(isset($_POST['update'])&&($_POST['update'])){
                $name = $_POST['name'];
                $code = $_POST['code'];
                $id=$_POST['id'];
                upadate_color($id,$name,$code);
                $log = "Cập nhật thành công";
            }
            $listColor = loadall_color();
            include "./properties/color/list.php";
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