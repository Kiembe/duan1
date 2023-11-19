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

// break
function insert_color($name,$code){
    $sql = "INSERT INTO color(name,code) values('$name','$code')";
    pdo_execute($sql);
}

function loadall_color() {
    $sql = "SELECT * FROM color order by id desc";
    $listColor = pdo_query($sql);
    return $listColor;
}

function delete_color($id){
    $sql= "DELETE FROM color WHERE id =".$id;
    pdo_execute($sql);
}

function upadate_color($id,$name,$code){
    $sql = "UPDATE color SET name='".$name."',code='".$code."' WHERE id=".$id;
    pdo_execute($sql);
}

function loadone_color($id){
    $sql = "SELECT * FROM color WHERE id=".$id;
    $color = pdo_query_one($sql);
    return $color;
}


?>