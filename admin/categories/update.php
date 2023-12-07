<?php 
    if(is_array($cat)){
        extract($cat);
    }

    $imgPath = "../uploads/".$image;
    if(is_file($imgPath)){
        $img="<img src='".$imgPath."' height='80' >";
    }else{
        $img="no photo";
    }
?>
<main>
    <div class="container">
        <h5>Thêm Danh Mục Sản Phẩm</h5>
        <form action="index.php?act=update_listCat" method="post" class="board" enctype="multipart/form-data">
            <div class="nameCat">
                <label for="">Tên danh mục</label><br>
                <input type="text" name="nameCat" placeholder="iPhone....." value="<?php if(isset($name)&&($name != ""))echo $name; ?>">
            </div>
            <div class="proIMG">
                <div>
                <label for="">Hình Ảnh Danh Mục</label><br>
                <input type="file" name="catIMG">
            </div>
            <?=$img?>
            </div>
            <div class="submit">
                <input type="hidden" name="id" value="<?php if(isset($id)&&($id > 0))echo $id; ?>">
                <input type="submit" name="update" value="Cập Nhật">
                <a href="index.php?act=danhmuc"><input type="button" value="Quay lại"></a>
            </div>
        </form>

    </div>
</main>