<?php 

function insert_categories($catName,$image){
    $sql = "INSERT INTO categories(name,image) values('$catName','$image')";
    pdo_execute($sql);
}

function loadall_categories() {
    $sql = "SELECT * FROM categories order by id asc";
    $listCategories = pdo_query($sql);
    return $listCategories;
}

function delete_categories($id){
    $sql= "DELETE FROM categories WHERE id =".$id;
    pdo_execute($sql);
}

function upadate_categories($id,$catName,$image){
    $sql = "UPDATE categories SET name='".$catName."',image='".$image."' WHERE id=".$id;
    pdo_execute($sql);
}

function upadate_categories_notIMG($id,$catName){
    $sql = "UPDATE categories SET name='".$catName."' WHERE id=".$id ;
    pdo_execute($sql);
}

function loadone_categori($id){
    $sql = "SELECT * FROM categories WHERE id=".$id;
    $cat = pdo_query_one($sql);
    return $cat;
}


?>