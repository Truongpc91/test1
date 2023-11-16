<?php
 if(is_array($khachhang)) {
    extract($khachhang);
 }

?>
<div class="row">
    <div class="col-lg-12">
        <div class="card">
            <div class="card-header text-center bg-dark text-white text-uppercase">Cập nhật khách hàng</div>
            <div class="card-body">
                <form action="index.php?act=updatekhachhang" method="POST" enctype="multipart/form-data">
                    <div class="row">
                        <div class="form-group col-sm-6">
                            <label for="ma_kh" class="form-label">MÃ KHÁCH HÀNG (tên đăng nhập)</label>
                            <input type="text" name="ma_kh" id="ma_kh" class="form-control" required disabled
                                value="<?= $ma_kh ?>">
                        </div>
                        <div class="form-group col-sm-6">
                            <label for="ho_ten" class="form-label">Họ và tên</label>
                            <input type="text" name="ho_ten" id="ho_ten" class="form-control" required disabled
                                value="<?= $ho_ten ?>">
                        </div>
                    </div> 
                    <div class="row">
                        <div class="form-group col-sm-6">
                            <label>Kích hoạt?</label>
                            <div class="form-control">
                                <label class="radio-inline  mr-3">
                                    <input type="radio" value="0" name="kich_hoat"
                                        <?= !$kich_hoat ? 'checked' : '' ?>>Chưa kích
                                    hoạt
                                </label>
                                <label class="radio-inline">
                                    <input type="radio" value="1" name="kich_hoat"
                                        <?= $kich_hoat ? 'checked' : '' ?>>Kích hoạt
                                </label>
                            </div>
                        </div>
                        <div class="form-group col-sm-6">
                            <label>Kích hoạt?</label>
                            <div class="form-control">
                                <label class="radio-inline mr-3">
                                    <input type="radio" value="0" name="vai_tro" <?= !$vai_tro ? 'checked' : '' ?>>Khách
                                    hàng
                                </label>
                                <label class="radio-inline">
                                    <input type="radio" value="1" name="vai_tro" <?= $vai_tro ? 'checked' : '' ?>>Nhân
                                    viên
                                </label>
                            </div>
                        </div>
                    </div>

                    <div class="mb-3 text-center mt-3">
                        <input type="hidden" name="ma_kh" value="<?= $ma_kh ?>">
                        <input type="reset" value="Nhập lại" class="btn btn-danger mr-3">
                        <input type="submit" name="update" value="Cập nhật" class="btn btn-primary mr-3">
                        <a href="index.php?act=listkhachhang"><input type="button" class="btn btn-success" value="Danh sách"></a>
                    </div>

                </form>
            </div>
        </div>
    </div>
</div>