<main>
    <div class="container">
        <h5>Thêm Danh Mục Sản Phẩm</h5>
        <form action="" method="post" class="board">
            <div class="capacity">
                <label for="">Tên màu sắc</label><br>
                <input type="text" name="name" placeholder="Xanh, Đỏ ....">
            </div>
            <div class="init">
                <label for="">Mã màu sắc</label><br>
                <input type="text" name="code" placeholder="#fff, rgb()....">
            </div>
            <div class="submit">
                <input type="submit" value="Thêm Mới" name="add">
                <a href="index.php?act=mausac"><input type="button" value="Danh Mục"></a>
            </div>
        </form>
        <?php 
            if(isset($log)&&($log!=""))echo "<p>'".$log."'</p>";
        ?>
    </div>
</main>