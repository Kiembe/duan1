<main>
    <div class="container">
        <h5>Thêm Danh Mục Sản Phẩm</h5>
        <form action="" method="post" class="board">
            <div class="capacity">
                <label for="">Dung lượng</label><br>
                <input type="text" name="capacity" placeholder="0...">
            </div>
            <div class="init">
                <label for="">Tên danh mục</label><br>
                <input type="text" name="unit" placeholder="GB or TB...">
            </div>
            <div class="submit">
                <input type="submit" value="Thêm Mới" name="add">
                <a href="index.php?act=dungluong"><input type="button" value="Danh Mục"></a>
            </div>
        </form>
        <?php 
            if(isset($log)&&($log!=""))echo "<p>'".$log."'</p>";
        ?>
    </div>
</main>