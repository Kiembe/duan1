
        <main>
            <div class="container">
                <h5>Danh Mục Sản Phẩm</h5>
                <table class="board board_cat">
                    <tr>
                        <th>STT</th>
                        <th>Mã Danh Mục</th>
                        <th>Tên Danh Mục</th>
                        <th>Ảnh Danh Mục</th>
                        <th>Thao Tác</th>
                    </tr>
                    <?php 
                        $i = 0;
                        if($listCategories != null) {
                            foreach($listCategories as $cat){
                                $i++;
                                extract($cat);
                                $update = "index.php?act=update_cat&id=".$id;
                                $delete = "index.php?act=delete_cat&id=".$id;
                                echo '
                                <tr>
                                    <td>'.$i.'</td>
                                    <td>'.$id.'</td>
                                    <td>'.$name.'</td>
                                    <td><img src="../uploads/'.$image.' "width="50px"></td>
                                    <td><a href="'.$update.'"><i class="fa-regular fa-pen-to-square"></i></a><a href="'.$delete.'"><i class="fa-regular fa-trash-can"></i></a></td>
                                </tr>
                                ';
                            }
                        }else{
                            echo '
                                <tr>
                                    <td colspan="4">Không Có " Danh Mục " Được Thêm</td>
                                </tr>
                            ';
                        }
                    ?>
                    
                    
                </table>

                <div class="action">
                    <a href="index.php?act=them_danh_muc"><input type="button" value="Thêm Mới"></a>
                </div>
            </div>
        </main>
    