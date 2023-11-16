<div class="container">
    <div class="page-title">
      <div class="card-header text-center bg-dark text-white ">Danh Sách Loại Hàng</div>
    </div>
    <div class="box box-primary">
        <div class="box-body">
            <form action="?btn_delete_all" method="post" class="table-responsive">
                <table width="100%" class="table table-hover table-bordered text-center">
                    <thead class="thead-dark">
                        <tr>
                            <th>Mã loại</th>
                            <th>Tên loại</th>
                            <th><a href="index.php?act=adddm" class="btn btn-success text-white">Thêm mới
                                    <i class="fas fa-plus-circle"></i></a></th>
                        </tr>
                    </thead>
                    <tbody>

                    <?php 
                        foreach ($listloaihang as $loaihang) {
                            extract($loaihang);
                            $sualoaihang = "index.php?act=sualoaihang&id=".$ma_loai;
                            $xoaloaihang = "index.php?act=xoaloaihang&id=".$ma_loai;
                            echo '<tr>
                                    <td>'.$ma_loai.'</td>
                                    <td>'.$ten_loai.'</td>
                                    <td>
                                      <a href="'.$sualoaihang.'"   class="btn btn-outline-info btn-rounded">
                                        <i class="fas fa-pen"></i></a>
                                      <a href="'.$xoaloaihang.'" class="btn btn-outline-danger btn-rounded" onclick="return checkDelete()">
                                        <i class="fas fa-trash"></i></a>
                                    </td>
                                  </tr>';
                        } ?>
                    </tbody>

                </table>
            </form>
        </div>
    </div>
</div>