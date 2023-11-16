<?php
    if(is_array($hanghoa)) {
        extract($hanghoa);
    }
    $hinhpath = "../upload/".$hinh;
    if(is_file($hinhpath)) {
        $hinh = "<img src='".$hinhpath."' height='80'>";
    }else {
        $hinh = "no photo";
    }
?>
<div class="row">
    <div class="col-lg-12">
        <div class="card">
            <div class="card-header text-center bg-dark text-white text-uppercase">SỬA HÀNG HÓA</div>
            <div class="card-body">

                <form action="index.php?act=updatehanghoa" method="POST" enctype="multipart/form-data">
                    <?php 
                        if(isset($thongbao)&&($thongbao!="") ) {
                            echo $thongbao;
                        }
                    ?> 
                    <div class="mb-3 mt-3">
                    <select name="maloai" class="form-select">
                        <option value="0" selected>Tất Cả</option>
                            <?php foreach($listloaihang as $loaihang) {
                                extract($loaihang);
                                if($ma_loai==$loaihang['ma_loai']){
                                    echo '<option value="'.$ma_loai.'" selected>'.$ten_loai.'</option>'; 
                                }else{
                                    echo '<option value="'.$ma_loai.'">'.$ten_loai.'</option>';
                                } 
                            } ?>
                    </select>
                    </div>
                    <div class="mb-3">
                        <label for="tenhh" class="form-label">Tên Sản Phẩm:</label>
                        <input type="text" class="form-control" id="tenhh" placeholder="Tên Sản Phẩm" name="tenhh" value="<?php if(isset($ten_hh)&&($ten_hh!="")) echo $ten_hh ?>">
                    </div>
                    <div class="mb-3">
                        <label for="gia" class="form-label">Giá:</label>
                        <input type="text" class="form-control" id="gia" placeholder="Giá" name="gia" value="<?php if(isset($don_gia)&&($don_gia!="")) echo $don_gia?>">
                    </div>
                    <div class="mb-3">
                        <label for="hinh" class="form-label">Hình ảnh:</label>
                        <input type="file" class="form-control" id="hinh" placeholder="Hình ảnh" name="hinh"  value="<?php=$hinh?>">
                        <?=$hinh?>
                    </div>
                    <div class="mb-3">
                        <label for="mota" class="form-label">Mô Tả:</label>
                        <textarea class="form-control" id="mota" name="mota"><?=$mo_ta?></textarea>
                    </div>
                        <input type="hidden" name="id" value="<?php if(isset($ma_hh)&&($ma_hh>0)) echo $ma_hh?>">
                        <input type="submit" name="capnhat" value="CẬP NHẬT" class="btn btn-primary">
                        <input type="reset" name="maloai" value="NHẬP LẠI" class="btn btn-primary">
                        <a href="index.php?act=listhanghoa"><input type="button" value="DANH SÁCH" class="btn btn-primary"></a>
            </div>
        </div>
    </div>
</div>        
