<main>
    <div class="container">
        <h5>Thêm Sản Phẩm</h5>
        <?php 
            if(isset($log)&&($log!=""))echo "<p>'".$log."'</p>";
        ?>
        <form action="" method="post" class="board" enctype="multipart/form-data">
            <div class="cat">
                    <select name="id_cat" >
                        <option value="0" selected>Chọn Danh Mục</option>
                        <?php 
                            foreach($listCategories as $cat) {
                                extract($cat);
                                echo '<option value="'.$id.'">'.$name.'</option>';
                            }
                        ?>
                    </select>
            </div>
            <div class="proName">
                <label for="">Tên Sản Phẩm</label><br>
                <input type="text" name="proName" placeholder="iPhone.....">
            </div>
            <div class="proPrice">
                <label for="">Giá Sản Phẩm</label><br>
                <input type="text" name="proPrice" placeholder="0">
            </div>
            <div class="proIMG">
                <div>
                <label for="">Hình Ảnh Sản Phẩm</label><br>
                <input type="file" name="proIMG">
                </div>
            </div>
            <div class="proDescription">
                <label for="">Mô Tả Sản Phẩm</label><br>
                <textarea name="proDes" id="editor" cols="30" rows="10"></textarea>
            </div>
            <div class="submit">
                <input type="submit" value="Thêm Mới" name="add">
                <a href="index.php?act=sanpham"><input type="button" value="Danh Sách"></a>
            </div>
        </form>
        
    </div>
</main>