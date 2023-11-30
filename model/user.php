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

    function update_user($id,$role) {
        $sql = "UPDATE users SET role='".$role."' WHERE id=".$id;
        pdo_execute($sql); 
    }
?>
