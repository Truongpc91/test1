<div class="row">
    <div class="col-lg-12">
        <div class="card">
            <div class="card-header text-center bg-dark text-white text-uppercase">THÊM MỚI LOẠI HÀNG</div>
            <div class="card-body">
                <form action="index.php?act=adddm" method="POST" id="adđm">
                    <div class="mb-3">
                        <label for="maloai" class="form-label">Mã loại</label>
                        <input type="text" name="maloai" class="form-control" disabled >
                    </div>
                    <div class="mb-3">
                        <label for="tenloai" class="form-label">Tên loại</label>
                        <input type="text" name="tenloai" placeholder="Nhập tên loại" class="form-control" required >
                    </div>
                    <div class="mb-3 text-center">
                        <input type="reset" value="NHẬP LẠI" class="btn btn-danger mr-3">
                        <input type="submit" name="themmoi" value="THÊM MỚI" class="btn btn-primary mr-3">
                        <a href="index.php?act=listloaihang"><input type="button" class="btn btn-success" value="Danh sách"></a>
                    </div>
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
