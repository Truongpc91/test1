<div class="container">
    <div class="page-title">
        <div class="card-header text-center bg-dark text-white ">DANH SÁCH BÌNH LUẬN CHI TIẾT</div>
    </div>
    <div class="box box-primary">
        <div class="box-body">
            <form action="" method="post" class="table-responsive">
                <table width="100%" class="table table-hover table-bordered text-center">
                    <thead class="thead-dark">
                        <tr>
                            <th>Đánh giá</th>
                            <th>Nội dung</th>
                            <th>Ngày BL</th>
                            <th>Người BL</th>
                            <th></th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        foreach ($listbinhluanct as $binhluan) {
                            extract($binhluan);
                        ?>
                        <tr>
                            <td><?= $danh_gia ?> sao</td>
                            <td><?= $noi_dung ?></td>
                            <td><?= $ngay_bl ?></td>
                            <td><?= $ma_kh ?></td>
                            <td class="text-end">
                                <a href="index.php?act=xoabinhluan&ma_bl=<?= $ma_bl ?>&ma_hh=<?= $ma_hh ?>"
                                    class="btn btn-outline-danger btn-rounded"><i
                                        class="fas fa-trash"></i></a>
                            </td>
                        </tr>
                        <?php } ?>
                    </tbody>

                </table>
                <a class="btn btn-dark" href="index.php?act=listbinhluan">Quay lại</a>
            </form>
        </div>
    </div>
</div>