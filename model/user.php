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
?>