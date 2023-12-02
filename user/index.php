<?php
    include "header.php";

    if (isset($_GET['act'])) {
        $act = $_GET['act'];
        switch ($act) {
            case 'donhang' :
                echo 0;
                break;
            default :
                include "info.php";
                break;
            }
        }else{
            include "info.php";
        }
?>