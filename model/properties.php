<?php 

function insert_storage($capacity,$unit){
    $sql = "INSERT INTO storage(capacity,unit) values('$capacity','$unit')";
    pdo_execute($sql);
}

function loadall_storage() {
    $sql = "SELECT * FROM storage order by id desc";
    $listStorage = pdo_query($sql);
    return $listStorage;
}

function delete_storage($id){
    $sql= "DELETE FROM storage WHERE id =".$id;
    pdo_execute($sql);
}

function upadate_storage($id,$capacity,$unit){
    $sql = "UPDATE storage SET capacity='".$capacity."',unit='".$unit."' WHERE id=".$id;
    pdo_execute($sql);
}

function loadone_storage($id){
    $sql = "SELECT * FROM storage WHERE id=".$id;
    $sto = pdo_query_one($sql);
    return $sto;
}

function insert_variant($id_product,$id_storage,$price,$quantity){
    $sql = "INSERT INTO product_detail(id_product,id_storage,price,quantity) values('$id_product','$id_storage','$price','$quantity')";
    pdo_execute($sql);
}

function delete_variant($id_detail){
    $sql = "DELETE FROM product_detail WHERE id=".$id_detail;
    pdo_execute($sql);
}

function update_variant($id_product,$id_storage,$price,$quantity,$id_detail){
    $sql = "UPDATE product_detail SET id_product='".$id_product."',id_storage='".$id_storage."',price='".$price."',quantity='".$quantity."' WHERE id=".$id_detail;
    pdo_execute($sql);
}

function load_variant($id) {
    $sql = "SELECT * FROM product_detail WHERE id_product=".$id;
    $det = pdo_query($sql);
    return $det;
}

function loadone_variant($id){
    $sql = "SELECT * FROM product_detail WHERE id=".$id;
    $sto = pdo_query_one($sql);
    return $sto;
}

// function update_variant($id_product,$id_storage,$price,$quantity){
//     $sql = "INSERT INTO product_detail(id_product,id_storage,price,quantity) values('$id_product','$id_storage','$price','$quantity')";
//     pdo_execute($sql);
// }

function insert_countVariant($i,$id) {
    $sql = "UPDATE `products` SET `variant` = '".$i."' WHERE `products`.`id` =".$id;
    pdo_execute($sql);

}

?>