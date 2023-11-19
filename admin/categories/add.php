<main>
    <div class="container">
        <h5>Thêm Danh Mục Sản Phẩm</h5>
        <form action="" method="post" class="board">
            <div class="nameCat">
                <label for="">Tên danh mục</label><br>
                <input type="text" name="nameCat" placeholder="iPhone.....">
            </div>
            <div class="submit">
                <input type="submit" value="Thêm Mới" name="add">
                <a href="index.php?act=danhmuc"><input type="button" value="Danh Mục"></a>
            </div>
        </form>
        <?php 
            if(isset($log)&&($log!=""))echo "<p>'".$log."'</p>";
        ?>
    </div>
</main>