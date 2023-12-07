<?php 
    function insert_user($userName,$pass,$email,$tel) {
        $sql = "INSERT INTO users(name,password,email,tel) VALUES ('$userName','$pass','$email','$tel')";
        pdo_execute($sql);
    }

    function check_user($userName,$pass){
        $sql = "SELECT * FROM users WHERE name='".$userName."' AND password='".$pass."'";
        $user = pdo_query_one($sql);
        return $user;
    }

    function loadall_users() {
        $sql = "SELECT * FROM users order by id DESC";
        $listUser = pdo_query($sql);
        return $listUser;
    }

    function loadone_user($id){
        $sql = "SELECT * FROM users WHERE id=".$id;
        $user = pdo_query_one($sql);
        return $user;
    }

    function update_user_info($id,$name,$email,$tel) {
        $sql = "UPDATE users SET name='".$name."',email='".$email."',tel='".$tel."' WHERE id=".$id;
        pdo_execute($sql); 
    }

    function update_user_pass($id,$password) {
        $sql = "UPDATE users SET password='".$password."' WHERE id=".$id;
        pdo_execute($sql); 
    }

    function update_user($id,$role) {
        $sql = "UPDATE users SET role='".$role."' WHERE id=".$id;
        pdo_execute($sql); 
    }

    function insert_address($idUser,$fullName,$phoneNumb,$address) {
        $sql = "INSERT INTO addres(id_user,full_name,tel,address) VALUES ('$idUser','$fullName','$phoneNumb','$address')";
        pdo_execute($sql);
    }

    function loadall_address() {
        $sql = "SELECT * FROM addres order by id asc " ;
        $listUser = pdo_query($sql);
        return $listUser;
    }

    function loadone_address($idUser) {
        $sql = "SELECT * FROM addres WHERE id_user=".$idUser;
        $listUser = pdo_query_one($sql);
        return $listUser;
    }

    function update_address($idUser,$fullName,$phoneNumb,$address) {
        $sql = "UPDATE addres SET full_name='".$fullName."',tel='".$phoneNumb."',address='".$address."' WHERE id_user=".$idUser;
        pdo_execute($sql);
    }
?>
