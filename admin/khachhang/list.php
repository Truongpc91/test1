<div class="container">
    <div class="page-title">
      <div class="card-header text-center bg-dark text-white ">DANH SÁCH KHÁCH HÀNG</div>
    </div>
    <div class="box box-primary">
        <div class="box-body">
            <form action="?btn_delete_all" method="post" class="table-responsive">
                <table width="100%" class="table table-hover table-bordered text-center">
                    <thead class="thead-dark">
                        <tr>
                            <th>Mã KH</th>
                            <th>Họ và tên</th>
                            <th>Địa chỉ email</th>
                            <th>Ảnh</th>
                            <th>Vai trò</th>
                            <th>Kích hoạt</th>
                            <th><a href="index.php?act=addkhachhang" class="btn btn-success text-white">Thêm mới
                                    <i class="fas fa-plus-circle"></i></a></th>
                        </tr>
                    </thead>
                    <tbody>

                    <?php 
                        foreach ($listkhachhang as $khachhang) {
                            extract($khachhang);
                            $suakhachhang = "index.php?act=suakhachhang&id=".$ma_kh;
                            $xoakhachhang = "index.php?act=xoakhachhang&id=".$ma_kh;
                            $checkvaitro;
                            $checkkichhoat;
                            //Kiểm tra vai trò
                            if ($vai_tro == 1){
                                $checkvaitro = "Nhân viên";
                            }else {
                                $checkvaitro =  "Khách hàng";
                            }
                            //Kiểm tra kích hoạt
                            if ($kich_hoat == 1){
                                $checkkichhoat = "Rồi";
                            }else {
                                $checkkichhoat =  "Chưa";
                            }
                            echo '<tr>
                                <td>'.$ma_kh.'</td>
                                <td>'.$ho_ten.'</td>
                                <td>'.$email.'</td>
                                <td>'.$hinh.'</td>
                                <td>'.$checkvaitro.'</td>
                                <td>'.$checkkichhoat.'</td>
                                <td class="text-end">
                                    <a href="'.$suakhachhang.'" class="btn btn-outline-info btn-rounded"><i
                                            class="fas fa-pen"></i></a>
                                    <a href="'.$xoakhachhang.'" class="btn btn-outline-danger btn-rounded"
                                            "><i class="fas fa-trash"></i></a>
                                </td>
                                </tr>';
                        } ?>
                    </tbody>

                </table>
            </form>
        </div>
    </div>
</div>