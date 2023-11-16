<?php
require_once 'pdo.php';

function hang_hoa_insert($ten_hh, $don_gia, $hinh, $mo_ta, $ma_loai){
    $sql = "INSERT INTO hang_hoa(ten_hh, don_gia, hinh, mo_ta, ma_loai) VALUES ('$ten_hh', '$don_gia', '$hinh', '$mo_ta', '$ma_loai')";
    pdo_execute($sql);
}


function hang_hoa_update($ma_hh, $ma_loai, $ten_hh, $don_gia, $hinh, $mo_ta){
    if($hinh!= "") {
        $sql = "UPDATE hang_hoa SET ten_hh='".$ten_hh."', ma_loai='".$ma_loai."', don_gia='".$don_gia."', hinh='".$hinh."', mo_ta='".$mo_ta."' WHERE ma_hh=".$ma_hh;
    }else {
        $sql = "UPDATE hang_hoa SET ten_hh='".$ten_hh."', ma_loai='".$ma_loai."', don_gia='".$don_gia."', mo_ta='".$mo_ta."' WHERE ma_hh=".$ma_hh;
    }
    pdo_execute($sql);
}

function hang_hoa_delete($ma_hh){
    $sql = "DELETE FROM hang_hoa WHERE  ma_hh=$ma_hh";
    if(is_array($ma_hh)){
        foreach ($ma_hh as $ma) {
            pdo_execute($sql, $ma);
        }
    }
    else{
        pdo_execute($sql);
    }
}

function hang_hoa_select_all($keyword="",$maloai=0){
    $sql = "SELECT * FROM hang_hoa WHERE 1";
    if($keyword != ''){
        $sql .= " AND ten_hh LIKE '%".$keyword."%'";
    }
    if($maloai > 0){
        $sql .= " AND ma_loai LIKE '%".$maloai."%'";
    }
    $sql .= " ORDER BY ma_hh DESC";
    return pdo_query($sql);
}

function hang_hoa_select_by_id($ma_hh){
    $sql = "SELECT * FROM hang_hoa WHERE ma_hh=$ma_hh";
    return pdo_query_one($sql);
}


function hang_hoa_select_top10(){
    $sql = "SELECT * FROM hang_hoa WHERE so_luot_xem > 0 ORDER BY don_gia ASC LIMIT 0, 4";
    return pdo_query($sql);
}

function hang_hoa_select_by_loai($ma_loai){
    $sql = "SELECT * FROM hang_hoa WHERE ma_loai=$ma_loai";
    return pdo_query($sql);
}

function hang_hoa_select_cung_loai($ma_loai){
    $sql = "SELECT * FROM hang_hoa WHERE ma_loai ='$ma_loai'";
    return pdo_query($sql);
}

function hang_hoa_select_keyword($keyword){
    $sql = "SELECT * FROM hang_hoa hh "
            . " JOIN loai lo ON lo.ma_loai=hh.ma_loai "
            . " WHERE ten_hh LIKE ? OR ten_loai LIKE ?";
    return pdo_query($sql, '%'.$keyword.'%', '%'.$keyword.'%');
}

function hang_hoa_select_page(){
    if(!isset($_SESSION['page_no'])){
        $_SESSION['page_no'] = 0;
    }
    // if(!isset($_SESSION['page_count'])){
    //     $row_count = pdo_query_value("SELECT count(*) FROM hang_hoa");
    //     $_SESSION['page_count'] = ceil($row_count/10.0);
    // }
    // if(exist_param("page_no")){
    //     $_SESSION['page_no'] = $_REQUEST['page_no'];
    // }
    // if($_SESSION['page_no'] < 0){
    //     $_SESSION['page_no'] = $_SESSION['page_count'] - 1;
    // }
    // if($_SESSION['page_no'] >= $_SESSION['page_count']){
    //     $_SESSION['page_no'] = 0;
    // }
    $sql = "SELECT * FROM hang_hoa ORDER BY so_luot_xem LIMIT ".$_SESSION['page_no'].", 9";
    return pdo_query($sql);
}