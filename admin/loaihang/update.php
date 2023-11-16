
<?php
    if(is_array($loaihang)) {
        extract($loaihang);
    }
?>
<div class="row">
    <div class="col-lg-12">
        <div class="card">
            <div class="card-header text-center bg-dark text-white text-uppercase">Cập nhật danh mục</div>
            <div class="card-body">
                <form action="index.php?act=updateloaihang" method="POST" id="edit_loai">
                    <div class="mb-3">
                        <label for="maloai" class="form-label">Mã loại</label>
                        <input type="text" name="maloai" class="form-control" disabled value="<?= $ma_loai ?>">
                    </div>
                    <div class="mb-3">
                        <label for="tenloai" class="form-label">Tên loại</label>
                        <input type="text" name="tenloai" placeholder="Nhập tên loại" class="form-control" required
                            value="<?= $ten_loai ?>">
                    </div>
                    <div class="mb-3 text-center">
                        <input type="hidden" name="id" value="<?= $ma_loai ?>">
                        <input type="reset" value="NHẬP LẠI" class="btn btn-danger mr-3">
                        <input type="submit" name="capnhat" value="CẬP NHẬT" class="btn btn-primary mr-3">
                        <a href="index.php?act=listloaihang"><input type="button" class="btn btn-success" value="Danh sách"></a>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>