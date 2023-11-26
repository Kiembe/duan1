<?php 
    if(is_array($product)){
        extract($product);
    }

    $idPro = $id;
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
        <form action="index.php?act=add_variant" method="post" class="board boardVariant" enctype="multipart/form-data">
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
                <label >Sản Phẩm</label><br>
                <p><i class="fa-solid fa-angles-right"></i> <?=$proName?></p>
            </div>

            <table class="capacity">
                <tr>
                        <th>Dung Lượng</th>
                        <th>Giá</th>
                        <th>Số Lượng</th>
                </tr>
                <?php
                    $i=-1;
                    foreach($listStorage as $sto){
                        $i++;
                        extract($sto);
                        echo '
                            <tr>
                                <td>'.$capacity.' '.$unit.'
                                    <input type="hidden" name="id_sto'.$i.'" value="'.$id.'">
                                </td>
                                <td>
                                    <input type="number" name="price'.$i.'" min="0" >
                                </td>
                                <td>
                                    <input type="number" name="quantity'.$i.'" min="0" >
                                </td>
                            </tr>
                        ';
                        echo $id;
                    }
                ?>
            </table>
            
            <div class="submit">
                <input type="hidden" name="id" value="<?=$idPro?>">
                <input type="submit" name="add" value="Thêm">
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