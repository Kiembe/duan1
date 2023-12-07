
<main class="main_list">
    <div class="container">
        <h5 class="titleList">Danh Sách Sản Phẩm</h5>
        <div class="listPro">
            <?php
                foreach($listPro as $pro){
                    extract($pro);
                    echo '
                        <a href="index.php?act=prodetail&id='.$id.'" class="pro">
                            <img src="./uploads/'.$image.'">
                            <div class="del">
                                <div class="infor">
                                    <p>'.$name.'</p>
                                </div>
                                <div class="act">
                                    <button>Mua</button>
                                </div>
                            </div>
                        </a>
                    ';
                }
            ?>
        </div>
    </div>
</main>