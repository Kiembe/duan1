<?php
    function insert_cart($id_pro,$idVariant,$proName,$id_user,$proImg,$quality,$proPrice,$variant){
        $sql = "INSERT INTO cart(id_product,id_variant,pro_name,id_user,image,quantity,price,id_sto) values ('$id_pro','$idVariant','$proName','$id_user','$proImg','$quality','$proPrice','$variant')";
        pdo_execute($sql);
    }

    function loadall_cart($idUser) {
        $sql = "SELECT * FROM cart WHERE id_user='".$idUser."' order by id desc";
        $listCart = pdo_query($sql);
        return $listCart;
    }

    function delete_cart($idUser) {
        $sql= "DELETE FROM cart WHERE id_user=".$idUser;
        pdo_execute($sql);
    }

    function delete_one_cart($id) {
        $sql= "DELETE FROM cart WHERE id=".$id;
        pdo_execute($sql);
    }

    function upadate_cart($id,$quanlity){
        $sql = "UPDATE cart SET quantity='".$quanlity."' WHERE id=".$id;
        pdo_execute($sql);
    }

    function check_cart($id_pro,$idVariant,$idUser) {
        $sql = "SELECT * FROM cart WHERE id_product='".$id_pro."' AND id_variant ='".$idVariant."' AND id_user='".$idUser."'";
        $pro = pdo_query_one($sql);
        return $pro;
    }

    function insert_bill($idUser,$name_user,$bill_code,$pay_method,$time) {
        $sql = "INSERT INTO bill(id_user,name_user,bill_code,pay_method,time) VALUES ('$idUser','$name_user','$bill_code','$pay_method','$time') ";
        pdo_execute($sql);
    }

    function loadall_bill() {
        $sql = "SELECT * FROM bill order by id desc";
        $listBill = pdo_query($sql);
        return $listBill;
    }

    function loadone_bill($id) {
        $sql = "SELECT * FROM bill WHERE id=".$id;
        $listBill = pdo_query($sql);
        return $listBill;
    }

    function loadone_bill_user($id_user) {
        $sql = "SELECT * FROM bill WHERE id_user=".$id_user;
        $listBill = pdo_query($sql);
        return $listBill;
    }

    function upadate_bill($id,$status){
        $sql = "UPDATE bill SET bill_status='".$status."' WHERE id=".$id;
        pdo_execute($sql);
    }

    function insert_bill_detail($id_bill,$id_product,$id_variant,$pro_name,$id_user,$image,$quantity,$proPrice,$id_sto){
        $sql = "INSERT INTO bill_detail(id_bill,id_product,id_variant,pro_name,id_user,image,quantity,price,id_sto) values ('$id_bill','$id_product','$id_variant','$pro_name','$id_user','$image','$quantity','$proPrice','$id_sto')";
        pdo_execute($sql);
    }

    function load_bill_detail($id_bill) {
        $sql = "SELECT * FROM bill_detail WHERE id_bill='".$id_bill."' order by id desc";
        $listCart = pdo_query($sql);
        return $listCart;
    }
?>