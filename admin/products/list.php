<main>
    <div class="container">
        <h5>Danh Mục Sản Phẩm</h5>

        <div class="board">
            <form action="index.php?act=sanpham" method="post" class="type">
                <select name="id_cat">
                    <option value="0" selected>- Tất Cả -</option>
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
                <input type="submit" name="filter" value="Lọc">
            </form>

            <table class="board_pro">
                <tr>
                    <th>STT</th>
                    <th>Tên SP</th>
                    <th>Hình SP</th>
                    <th>Giá SP</th>
                    <th>Biến Thể</th>
                    <th>Thêm Biến Thể</th>
                    <th>Thao Tác</th>
                </tr>
                <?php 
                        $i = 0;
                        if($listProduct != null) {
                            foreach($listProduct as $pro){
                                $i++;
                                extract($pro);
                                $update = "index.php?act=update_pro&id=".$id;
                                $delete = "index.php?act=delete_pro&id=".$id;
                                echo '
                                <tr>
                                    <td>'.$i.'</td>
                                    <td>'.$name.'</td>
                                    <td><img src="../uploads/'.$image.'"></td>
                                    <td>'.$price.'</td>
                                    <td>0</td>
                                    <td>
                                        <a href="'.$update.'" class="more"><i class="fa-solid fa-puzzle-piece"></i></a>
                                    </td>
                                    <td><a href="'.$update.'"><i class="fa-regular fa-pen-to-square"></i></a><a href="'.$delete.'"><i class="fa-regular fa-trash-can"></i></a></td>
                                </tr>
                                ';
                            }
                        }else{
                            echo '
                                <tr>
                                    <td colspan="7">Không Có " Sản Phẩm " Được Thêm</td>
                                </tr>
                            ';
                        }
                    ?>


            </table>
        </div>
        <div class="action">
                <a href="index.php?act=them_san_pham"><input type="button" value="Thêm Mới"></a>
            </div>
    </div>
</main>