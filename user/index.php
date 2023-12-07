<?php
    include "header.php";

    if (isset($_GET['act'])) {
        $act = $_GET['act'];
        switch ($act) {
            case 'update_pass' :
                include "changePass.php";
                break;
            default :
                include "info.php";
                break;
            }
        }else{
            include "info.php";
        }
?>