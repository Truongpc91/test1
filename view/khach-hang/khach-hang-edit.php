<div class="card mb-4 mx-auto mt-3" style="max-width: 800px;">
<article class="card-body">
    <div class="boxtrain">
        <header class="mb-4">
             <h4 class="alert-dark my-3 py-3 shadow-sm text-center">Cập Nhật Thông Tin</h4>
         </header>
         <?php
            if(isset($_SESSION['user']) && is_array($_SESSION['user'])){
                extract($_SESSION['user']);
            }
        ?>
        <div class="row m-1 pb-5">
            <div class="col-lg-6 col-md p-6">
                <img src="./upload/<?=$hinh?>" width="400" style="text-aline:center;">
            </div>
            <div class="col-lg-6 col-md">
                <form action="index.php?act=edit_taikhoan" method="post" enctype="multipart/form-data">
                    <div class="form-group">
                        Tên đăng nhập<input type="text" name="ma_kh" class="form-control" value="<?= $ma_kh ?>" readonly>
                    </div>
                    <div class="form-group">
                        Họ và tên<input type="text" name="ho_ten" class="form-control" value="<?= $ho_ten ?>">
                    </div>
                    <div class="form-group">
                        Email<input type="email" name="email" class="form-control" value="<?= $email ?>">
                    </div>
                    <!-- <div class="form-group">
                        Ảnh đại diện<input type="file" name="hinh" id="hinh" class="form-control"><br>
                    </div> -->
                    <div class="form-group">
                        <input type="hidden" name="ma_kh" value="<?= $ma_kh ?>">
                        <input type="hidden" name="mat_khau" value="<?= $mat_khau ?>">
                        <input type="submit" name="capnhat" value="Cập Nhật" class="btn btn-primary btn-block">
                        <input type="reset" value="Nhập Lại" class="btn btn-primary btn-block">
                    </div>
                </form>
                <?php 
                    if(isset($thongbao)&&($thongbao!="") ) { 
                        echo '<script>alert("Cập Nhật thông tin thành công!!!")</script>'; 
                    } 
                ?>
            </div>
        </div>
    </div>
</article>
</div>