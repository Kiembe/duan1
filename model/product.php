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

function loadall_products_byId($id_cat) {
    $sql = "SELECT * FROM products WHERE id_cat ='".$id_cat."' order by id desc";
    $listproducts = pdo_query($sql);
    return $listproducts;
}

function loadhome_products_byId($id_cat) {
    $sql = "SELECT * FROM products WHERE id_cat ='".$id_cat."' order by id desc limit 0,6";
    $listproducts = pdo_query($sql);
    return $listproducts;
}

function loadall_products_home() {
    $sql = "SELECT * FROM products WHERE 1 ORDER BY id DESC LIMIT 0,7";
    $listproducts = pdo_query($sql);
    return $listproducts;
}

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

function load_products_detail($id) {
    $sql = "SELECT * FROM product_detail WHERE id_product=".$id;
    $listproducts = pdo_query($sql);
    return $listproducts;
}

function loadone_products_detail($id){
    $sql = "SELECT * FROM products_detail WHERE id=".$id;
    $product = pdo_query_one($sql);
    return $product;
}

function update_products($id,$name,$price,$image,$des,$id_cat){
    if($image != "")
    $sql ="UPDATE products SET name='".$name."', price='".$price."', image='".$image."', description='".$des."',id_cat='".$id_cat."' WHERE id=".$id;
    else
        $sql ="UPDATE products SET name='".$name."', price='".$price."', description='".$des."',id_cat='".$id_cat."' WHERE id=".$id;
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

function delete_variantbyPRo($id) {
    $sql = "DELETE FROM product_detail WHERE id_product=".$id;
    pdo_execute($sql);
}

function delete_variantbySto($id) {
    $sql = "DELETE FROM product_detail WHERE id_storage=".$id;
    pdo_execute($sql);
}


// function load_productscungloai($id,$id_danhmuc){
//     $sql = "SELECT * FROM products WHERE id_danhmuc= ".$id_danhmuc." AND id <>".$id;
//     $listproducts = pdo_query($sql);
//     return $listproducts;
// }



?>