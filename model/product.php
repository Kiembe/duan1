<?php 

function insert_products($name,$price,$image,$des,$id_cat){
    $sql = "INSERT INTO products( name,price,image,description,id_cat) values ('$name','$price','$image','$des','$id_cat')";
    pdo_execute($sql);
}

function delete_products($id){
    $sql= "DELETE FROM products WHERE id =".$id;
    pdo_execute($sql);
}

function loadall_products($id_cat=0) {
    $sql = "SELECT * FROM products WHERE 1";
    if($id_cat > 0){
        $sql.=" and id_cat ='".$id_cat."'";
    }
    $sql.=" order by id desc";
    $listproducts = pdo_query($sql);
    return $listproducts;
}

// function loadall_products_home() {
//     $sql = "SELECT * FROM products WHERE 1 ORDER BY price DESC LIMIT 0,9";
//     $listproducts = pdo_query($sql);
//     return $listproducts;
// }

// function loadall_products_top10() {
//     $sql = "SELECT * FROM products WHERE 1 ORDER BY luotxem DESC LIMIT 0,5";
//     $listproducts = pdo_query($sql);
//     return $listproducts;
// }

// function loadall_products_top3() {
//     $sql = "SELECT * FROM products WHERE 1 ORDER BY id DESC LIMIT 0,3";
//     $listproducts = pdo_query($sql);
//     return $listproducts;
// }

function loadone_products($id){
    $sql = "SELECT * FROM products WHERE id=".$id;
    $product = pdo_query_one($sql);
    return $product;
}

function upadate_products($id,$tensp,$giasp,$mota,$hinh,$iddm){
    if($hinh != "")
        $sql ="UPDATE products SET name='".$tensp."', price='".$giasp."', mota='".$mota."', image='".$hinh."',id_danhmuc='".$iddm."' WHERE id=".$id;
    else
        $sql ="UPDATE products SET name='".$tensp."', price='".$giasp."', mota='".$mota."', id_danhmuc='".$iddm."' WHERE id=".$id;
    pdo_execute($sql);
}

function load_nameCat($id_cat){
    if($id_cat>0){
        $sql = "SELECT * FROM danhmuc WHERE id=".$id_cat;
        $cat = pdo_query_one($sql);
        extract($cat);
        return $name;
    }else{
        return "";
    }
}

// function load_productscungloai($id,$id_danhmuc){
//     $sql = "SELECT * FROM products WHERE id_danhmuc= ".$id_danhmuc." AND id <>".$id;
//     $listproducts = pdo_query($sql);
//     return $listproducts;
// }



?>