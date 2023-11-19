<?php 

function insert_categories($catName){
    $sql = "INSERT INTO categories(name) values('$catName')";
    pdo_execute($sql);
}

function loadall_categories() {
    $sql = "SELECT * FROM categories order by id desc";
    $listCategories = pdo_query($sql);
    return $listCategories;
}

function delete_categories($id){
    $sql= "DELETE FROM categories WHERE id =".$id;
    pdo_execute($sql);
}

function upadate_categories($id,$catName){
    $sql = "UPDATE categories SET name='".$catName."' WHERE id=".$id;
    pdo_execute($sql);
}

function loadone_categori($id){
    $sql = "SELECT * FROM categories WHERE id=".$id;
    $cat = pdo_query_one($sql);
    return $cat;
}


?>