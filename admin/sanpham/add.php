<div class="row">
    <div class="col-lg-12">
        <div class="card">
            <div class="card-header text-center bg-dark text-white text-uppercase">THÊM MỚI HÀNG HOÁ</div>
            <div class="card-body">
                <form action="index.php?act=addhanghoa" method="POST" enctype="multipart/form-data">
                <div class="mb-3 mt-3">
                        <label for="maloai" class="form-label">Loại Sản Phẩm:</label>
                        <select name="maloai" class="form-select">
                            <?php foreach($listloaihang as $loaihang) {
                                extract($loaihang);
                                echo '<option value="'.$ma_loai.'">'.$ten_loai.'</option>'; 
                            } ?>
                        </select>
                    </div>
                    <div class="mb-3">
                        <label for="tenhh" class="form-label">Tên Sản Phẩm:</label>
                        <input type="text" class="form-control" id="tenhh" placeholder="Tên Sản Phẩm" name="tenhh">
                    </div>
                    <div class="mb-3">
                        <label for="gia" class="form-label">Giá:</label>
                        <input type="text" class="form-control" id="gia" placeholder="Giá" name="gia">
                    </div>
                    <div class="mb-3">
                        <label for="hinh" class="form-label">Hình ảnh:</label>
                        <input type="file" class="form-control" id="hinh" placeholder="Hình ảnh" name="hinh">
                    </div>
                    <div class="mb-3">
                        <label for="mota" class="form-label">Mô Tả:</label>
                        <textarea class="form-control" id="mota" name="mota"></textarea>
                    </div>
                        <input type="submit" name="themmoi" value="THÊM MỚI" class="btn btn-primary">
                        <input type="reset" name="maloai" value="NHẬP LẠI" class="btn btn-primary">
                        <a href="index.php?act=listhanghoa"><input type="button" value="DANH SÁCH" class="btn btn-primary"></a>
                    <?php 
                        if(isset($thongbao)&&($thongbao!="") ) {
                            echo $thongbao;
                        }
                    ?> 
                </form>
            </div>
        </div>
    </div>
</div>        
