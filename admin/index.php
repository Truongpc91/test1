

<?php
    session_start();
    include '../dao/pdo.php';
    include 'header.php';
    include '../dao/loai.php';
    include '../dao/hang-hoa.php';
    include '../dao/khach-hang.php';
    include '../dao/thong-ke.php';
    include '../dao/binh-luan.php';

    //controler 

    if(isset($_GET['act'])) {
        $act = $_GET['act'];
       switch ($act) {
        case 'adddm':
            //kiểm tra xem người dùng có nhấm add hay không 
            if(isset($_POST['themmoi']) && ($_POST['themmoi'])) {
                $tenloai = $_POST['tenloai'];
                loai_insert($tenloai);
                $thongbao = "Thêm thành công !!!";
            }
            include 'loaihang/add.php';
            break;

        case 'listloaihang':
            $listloaihang = loai_select_all();
            include 'loaihang/list.php';
            break;
           
        case 'xoaloaihang':
            if(isset($_GET['id']) && ($_GET['id'])>0 ) {
                loai_delete($_GET['id']);
            }
            $listloaihang = loai_select_all();
            include 'loaihang/list.php';
            break;
        
        case 'sualoaihang' :
            if(isset($_GET['id']) && ($_GET['id'])>0 ) {
               
                $loaihang = loai_select_by_id($_GET['id']);
            }
            include 'loaihang/update.php';
            break;

        case 'updateloaihang' :
            if(isset($_POST['capnhat']) && ($_POST['capnhat'])) {
                $tenloai = $_POST['tenloai'];
                $id = $_POST['id'];
                loai_update($id, $tenloai);
                echo "<script>
                alert('Cập Nhật Loại Hàng Thành Công!!!'); 
                location.href='http://localhost/Truongpcph43675_WD18339/admin/index.php?act=listloaihang';
                </script>";
            }
            $listloaihang =  loai_select_all();
            include 'loaihang/list.php';
            break;

        case 'addhanghoa':
            if(isset($_POST['themmoi']) && ($_POST['themmoi'])) {
                $maloai = $_POST['maloai'];
                $tensp = $_POST['tenhh'];
                $gia = $_POST['gia'];
                $mota = $_POST['mota'];
                $hinh = $_FILES['hinh']['name'];
                $target_dir = "../upload/";
                $target_file = $target_dir . basename($_FILES['hinh']['name']);
                if (move_uploaded_file($_FILES["hinh"]["tmp_name"], $target_file)) {
                   // echo "The file ". htmlspecialchars( basename( $_FILES["hinh"]["name"])). " has been uploaded.";
                } else {
                   // echo "Sorry, there was an error uploading your file.";
                }
                hang_hoa_insert($tensp, $gia, $hinh, $mota, $maloai);
                echo "<script>
                alert('Thêm Sản Phẩm Thành Công!!!'); 
                location.href='http://localhost/Truongpcph43675_WD18339/admin/index.php?act=listhanghoa';
                </script>";
            }
            $listloaihang = loai_select_all();
            include 'sanpham/add.php';
            break;

        case 'listhanghoa':
            if(isset($_POST['listok']) && ($_POST['listok'])) {
                $keyword = $_POST['keyword'];
                $maloai = $_POST['maloai'];
            }
            else {
                $keyword = '';
                $maloai = 0;
            }
            $listloaihang = loai_select_all();
            $listhanghoa = hang_hoa_select_all($keyword,$maloai);
            include 'sanpham/list.php';
            break;

        case 'suahanghoa' :
            if(isset($_GET['id']) && ($_GET['id'])>0 ) {
                   
                $hanghoa = hang_hoa_select_by_id($_GET['id']);
            }
            $listloaihang = loai_select_all();
            include 'sanpham/update.php';
            break;
    
        case 'updatehanghoa' :
            if(isset($_POST['capnhat']) && ($_POST['capnhat'])) {
                $id = $_POST['id'];
                $maloai = $_POST['maloai'];
                $tensp = $_POST['tenhh'];
                $gia = $_POST['gia'];
                $mota = $_POST['mota'];
                $hinh = $_FILES['hinh']['name'];
                $_FILES['hinh']['name'];
                $target_dir = "../upload/";
                $target_file = $target_dir . basename($_FILES['hinh']['name']);
                if (move_uploaded_file($_FILES["hinh"]["tmp_name"], $target_file)) {
                   // echo "The file ". htmlspecialchars( basename( $_FILES["hinh"]["name"])). " has been uploaded.";
                } else {
                   // echo "Sorry, there was an error uploading your file.";
                }
                hang_hoa_update($id, $maloai, $tensp, $gia, $hinh, $mota);
                echo "<script>
                alert('Sửa Sản Phẩm Thành Công!!!'); 
                </script>"; 
            }
            $listloaihang = loai_select_all();
            $listhanghoa = hang_hoa_select_all();
            include 'sanpham/list.php';
            break;

        case 'xoahanghoa': 
            if(isset($_GET['id']) && ($_GET['id'])>0 ) {
                hang_hoa_delete($_GET['id']);
                echo "<script>
                alert('Xóa Sản Phẩm Thành Công!!!'); 
                </script>";
            }
            $listhanghoa = hang_hoa_select_all("",0);
            include 'sanpham/list.php';
            break;
        
        case 'listkhachhang':
            $listkhachhang = khach_hang_select_all();
            include 'khachhang/list.php';
            break;  
        case 'addkhachhang':
            if(isset($_POST['themmoi']) && ($_POST['themmoi'])) {
                $ma_kh = $_POST['ma_kh'];
                $ho_ten = $_POST['ho_ten'];
                $mat_khau = $_POST['mat_khau'];
                $email = $_POST['email'];
                $kich_hoat = 1;
                $vai_tro = 1;
                $hinh = $_FILES['hinh']['name'];
                $target_dir = "../upload/";
                $target_file = $target_dir . basename($_FILES['hinh']['name']);
                if (move_uploaded_file($_FILES["hinh"]["tmp_name"], $target_file)) {
                   // echo "The file ". htmlspecialchars( basename( $_FILES["hinh"]["name"])). " has been uploaded.";
                } else {
                   // echo "Sorry, there was an error uploading your file.";
                }
                khach_hang_add($ma_kh, $mat_khau, $ho_ten, $email, $hinh, $kich_hoat, $vai_tro);
                echo "<script>
                alert('Thêm Nhân Viên Thành Công!!!'); 
                location.href='http://localhost/Truongpcph43675_WD18339/admin/index.php?act=listkhachhang';
                </script>"; 
            }
            include 'khachhang/add.php';
            break;
        case 'suakhachhang' :
            if(isset($_GET['id']) && ($_GET['id'])>0 ) {
                       
                $khachhang = khach_hang_select_by_id($_GET['id']);
            }
            include 'khachhang/update.php';
            break;
        case 'updatekhachhang': 
            if(isset($_POST['update']) && ($_POST['update'])) {
                $ma_kh = $_POST['ma_kh'];
                $kich_hoat = $_POST['kich_hoat'];
                $vai_tro = $_POST['vai_tro'];
                khach_hang_update($ma_kh, $kich_hoat, $vai_tro);
                echo "<script>
                alert('Sửa Khách Hàng Thành Công!!!'); 
                location.href='http://localhost/Truongpcph43675_WD18339/admin/index.php?act=listkhachhang';
                </script>"; 
            }
            $listkhachhang = khach_hang_select_all();
            include 'khachhang/update.php';
            break;
        case 'xoakhachhang': 
            if(isset($_GET['id']) && ($_GET['id'])>0 ) {
                khach_hang_delete($_GET['id']);
                echo "<script>
                alert('Đã Xóa Thành Công!!!'); 
                location.href='http://localhost/Truongpcph43675_WD18339/admin/index.php?act=listkhachhang';
                </script>";
            }
            $listkhachhang = khach_hang_select_all();
            include 'khachhang/list.php';
            break;
        case 'listbinhluan' :
            $listbinhluan = thong_ke_binh_luan();
            include 'binhluan/list.php';
            break;
        case 'listblct' :
            if(isset($_GET['ma_hh'])){
                $listbinhluanct = binh_luan_select_by_hang_hoa($_GET['ma_hh']);
            }
            include 'binhluan/listblct.php';
            break;
        case 'xoabinhluan' :
            if(isset($_GET['ma_bl'])){
                binh_luan_delete($_GET['ma_bl']);
                echo "<script>
                alert('Đã Xóa Thành Công!!!'); 
                location.href='http://localhost/Truongpcph43675_WD18339/admin/index.php?act=listbinhluan';
                </script>";
            }
            $listbinhluan = thong_ke_binh_luan();
            include 'binhluan/list.php';
            break;
        case 'thongke' :
            $listthongke = thong_ke_hang_hoa();
            include 'thongke/list.php';
            break;
        case 'bieudo' :
            $listthongke = thong_ke_hang_hoa();
            include 'thongke/bieudo.php';
            break;
        default:
            include 'home.php';
            break;
       }
    }else {
        include 'home.php';
    }
    
    include 'footer.php';
?>
