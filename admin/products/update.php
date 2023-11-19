<?php 
    if(is_array($product)){
        extract($product);
    }

    $proName = $name;


    $imgPath = "../uploads/".$image;
    if(is_file($imgPath)){
        $img="<img src='".$imgPath."' height='80' >";
    }else{
        $img="no photo";
    }
?>
<main>
    <div class="container">
        <h5>Sửa Sản Phẩm</h5>
        <?php 
            if(isset($log)&&($log!=""))echo "<p>'".$log."'</p>";
        ?>
        <form action="index.php?act=update_listPro" method="post" class="board" enctype="multipart/form-data">
            <div class="cat">
                    <select name="id_cat" >
                        <option value="0" selected>- Chọn Danh Mục -</option>
                        <?php 
                            foreach($listCategories as $cat) {
                                extract($cat);
                                if($id_cat!=$id){
                                    echo '<option value="' . $id . '">' . $name . '</option>';
                                }else{
                                    echo '<option value="' . $id . '" selected >' . $name . '</option>';
                                }
                            }
                        ?>
                    </select>
            </div>
            <div class="proName">
                <label for="">Tên Sản Phẩm</label><br>
                <input type="text" name="proName" placeholder="iPhone....." value="<?=$proName?>">
            </div>
            <div class="proPrice">
                <label for="">Giá Sản Phẩm</label><br>
                <input type="text" name="proPrice" placeholder="0" value="<?=$price?>">
            </div>
            <div class="proIMG">
                <div>
                <label for="">Hình Ảnh Sản Phẩm</label><br>
                <input type="file" name="proIMG">
                </div>
                <?=$img?>
            </div>
            <div class="proDescription">
                <label for="">Mô Tả Sản Phẩm</label><br>
                <textarea name="proDes" id="editor" cols="30" rows="10" ><?=$description?></textarea>
            </div>
            <div class="submit">
                <input type="submit" value="Cập Nhật" name="update">
                <a href="index.php?act=sanpham"><input type="button" value="Quay Lại"></a>
            </div>
        </form>
        
    </div>
</main>

<script>
    document.addEventListener('DOMContentLoaded', function () {
      // Dữ liệu từ PHP được chuyển thành JavaScript
      var phpData = <?php echo $des ?>

      ClassicEditor
        .create(document.querySelector('#editor'))
        .then(editor => {
          // Đổ dữ liệu từ PHP vào CKEditor bằng phương thức setData
          editor.setData(phpData);
        })
        .catch(error => {
          console.error(error);
        });
    });
  </script>