<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Adidas-Hoài Đức</title>
    <link rel="stylesheet" href="css/sty1e.css">
    <script src="https://kit.fontawesome.com/509cc166d7.js" crossorigin="anonymous"></script>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@300;400;500;700;900&display=swap" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
    <link rel="icon" href="upload/logoadidas.png" type="image/gif" sizes="16x16">
    <!-- Bootstrap -->
    <link rel="stylesheet" href="css/bootstrap.min.css" type="text/css">
    <!-- Font awesome -->
    <link rel="stylesheet" href="css/all.min.css" type="text/css">
    <!-- Slick slider -->
    <link rel="stylesheet" href="css/slick.css" type="text/css">
    <link rel="stylesheet" href="css/slick-theme.css" type="text/css">

</head>

<body>
<?php
    session_start();
    include 'view/trang-chinh/header.php';
    include 'dao/hang-hoa.php';
    include 'dao/loai.php';
    include 'dao/khach-hang.php';
    include 'dao/binh-luan.php';

    if(isset($_GET['act']) && ($_GET['act']!='')) {
        $act = $_GET['act'];
        switch ($act) {
            case 'sanpham':
                $ds_loai = loai_select_all();
                if(isset($_GET['ma_loai']) && ($_GET['ma_loai']) > 0){
                    $ma_loai = $_GET['ma_loai'];
                    $name_loai = loai_select_by_id($ma_loai);
                    extract($name_loai);
                    $title_site = "Các sản phẩm thuộc loại : '<i>$ten_loai</i>' ";
                    $items = hang_hoa_select_by_loai($ma_loai);
                    if (count($items) == 0) {
                        $title_site = "Không sản phẩm nào thuộc loại :'<i>$ten_loai</i>'";
                    }
                }else if (isset($_POST['timkiem'])) {
                    $kyw = $_POST['kyw'];
                    if ($kyw == '') {
                        $title_site = "Tất cả sản phẩm";
                    } else {
                        $title_site = "Các sản phẩm có chứa từ khóa :'<i>$kyw</i>'";
                    }
                    $items = hang_hoa_select_keyword($kyw);
                    if (count($items) == 0) {
                        $title_site = "Không sản phẩm nào chứa từ khóa :'<i>$kyw</i>'";
                    }
                } else {
                    $title_site = "Tất cả sản phẩm";
                    $items = hang_hoa_select_page('so_luot_xem', 9);
                }
                include 'view/trang-chinh/sanpham.php';
                break;
            case 'sanphamct':
                if(isset($_GET['ma_hh']) && ($_GET['ma_hh']>0)) {
                    $ma_hh = $_GET['ma_hh'];
                    $_SESSION['product'] = $ma_hh;
                    $onesp = hang_hoa_select_by_id($ma_hh);
                    extract($onesp);
                    $ma_loai = $onesp['ma_loai'];
                    $hh_cung_loai = hang_hoa_select_cung_loai($ma_loai); 
                    $binh_luan_list = binh_luan_select_by_hang_hoa($ma_hh);
                    include 'view/hang-hoa/chi-tiet-ui.php';
                }else if(isset($_POST['binhluan'])){
                    $ma_kh = $_SESSION['user']['ma_kh'];
                    $noi_dung = $_POST['noi_dung'];
                    $danh_gia = $_POST['danh_gia'];
                    $ngay_bl = date("Y/m/d");
                    binh_luan_insert($ma_kh, $_SESSION['product'], $noi_dung, $ngay_bl);
                    $onesp = hang_hoa_select_by_id($_SESSION['product']);
                    extract($onesp);
                    $hh_cung_loai = hang_hoa_select_cung_loai($ma_loai, $_SESSION['product']); 
                    $binh_luan_list = binh_luan_select_by_hang_hoa($_SESSION['product']);
                    include 'view/hang-hoa/chi-tiet-ui.php';
                    include 'view/hang-hoa/hang-hoa-cung-loai.php';
                }
                break;
            case 'lienhe':
                include 'view/trang-chinh/lienhe.php';
                break;
            case 'gioithieu':
                include 'view/trang-chinh/gioithieu.php';
                break;
            case 'dangnhap':
                if(isset($_POST['dangnhap']) && ($_POST['dangnhap'])) {
                    $ma_kh = $_POST['ma_kh'];
                    $mat_khau = $_POST['mat_khau'];
                    $checkuser = check_khach_hang($ma_kh, $mat_khau);
                    if($ma_kh!=''){
                    if(is_array($checkuser)){
                        $_SESSION['user'] = $checkuser;
                        echo "<script>
                        alert('Đăng Nhập Thành Công!!!'); 
                        location.href='http://localhost:/Truongpcph43675_WD18339';
                        </script>";  
                    }
                    }else{
                        $thongbao = "<i style='color: red;'>Tài khoản hoặc mặt khẩu không tồn tại !!!</i>";
                    }
                
            }
                include 'view/khach-hang/dang-nhap.php';
                break;
            case 'edit_taikhoan':
                if(isset($_POST['capnhat']) && ($_POST['capnhat'])) {
                    $ho_ten = $_POST['ho_ten'];
                    $email = $_POST['email'];
                    $ma_kh = $_POST['ma_kh'];
                    $mat_khau = $_POST['mat_khau'];
                    khach_hang_edit($ma_kh, $ho_ten, $email);
                    echo "<script>
                    alert('Cập Nhật Tài Khoản Thành Công!!!'); 
                    location.href='http://localhost:/Truongpcph43675_WD18339';
                    </script>"; 
                }
                include 'view/khach-hang/khach-hang-edit.php';
                break;
            case 'edit_matkhau':
                if(isset($_POST['doimk']) && ($_POST['doimk'])) {
                    $ma_kh = $_POST['ma_kh'];
                    $mat_khau_moi = $_POST['mat_khau2'];
                    $mat_khau_moi2 = $_POST['mat_khau3'];
                    $thongbao = "Mật khẩu nhập không trùng nhau !!!"; 
                    khach_hang_change_password($ma_kh, $mat_khau_moi);
                    echo "<script>
                    alert('Đổi Mật Khẩu Thành Công!!!'); 
                    location.href='http://localhost:/Truongpcph43675_WD18339/index.php?act=dangnhap';
                    </script>";
                }
                include 'view/khach-hang/edit-mat-khau.php';
                break;
            case 'dangky':
                if(isset($_POST['dangky']) && ($_POST['dangky'])) {
                    $ma_kh = $_POST['ma_kh'];
                    $ho_ten = $_POST['ho_ten'];
                    $email = $_POST['email'];
                    $kich_hoat = 1;
                    $vai_tro = 0;
                    $mat_khau = $_POST['mat_khau'];
                    $mat_khau2 = $_POST['mat_khau2'];
                    $hinh = $_FILES['hinh']['name'];
                    $target_dir = "upload/";
                    $target_file = $target_dir . basename($_FILES['hinh']['name']);
                    khach_hang_insert($ma_kh, $mat_khau, $ho_ten, $vai_tro, $kich_hoat, $email, $hinh);
                    echo "<script>
                    alert('Đăng Ký Tài Khoản Thành Công!!!'); 
                    location.href='http://localhost:/Truongpcph43675_WD18339/index.php?act=dangnhap';
                    </script>";
                }
                include 'view/khach-hang/dang-ky.php';
                break;
            case 'dangxuat':
                session_unset();
                echo "<script>
                    alert('Đăng Xuất Thành Công!!!'); 
                    location.href='http://localhost:/Truongpcph43675_WD18339';
                    </script>";
                break;
            default:
                include 'view/trang-chinh/slideshow.php';
                include 'view/trang-chinh/home.php';
                include 'view/trang-chinh/top10.php';
                break;
        }
    
    }else {
        include 'view/trang-chinh/slideshow.php';
        include 'view/trang-chinh/home.php';
        include 'view/trang-chinh/top10.php';
    }
    include 'view/trang-chinh/footer.php';
?>
    <script src="js/jquery-3.6.0.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/bootstrap.bundle.min.js"></script>
    <script src="js/slick.min.js"></script>
    <script src="js/jquery.validate.js"></script>
    <script src="js/main.js"></script>
    <script src="js/validation.js"></script>