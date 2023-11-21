<?php

    include "./model/pdo.php";
    include "./model/product.php";

    include "./header.php";


    $listProduct = loadall_products_home();
    include "./views/home.php";

    include "./footer.php";
?>