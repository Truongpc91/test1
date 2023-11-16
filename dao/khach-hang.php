<?php
require_once 'pdo.php';

function khach_hang_add($ma_kh, $mat_khau, $ho_ten, $email, $hinh, $kich_hoat, $vai_tro){
    $sql = "INSERT INTO khach_hang(ma_kh, mat_khau, ho_ten, email, hinh, kich_hoat, vai_tro) VALUES ('$ma_kh', '$mat_khau', '$ho_ten', '$email', '$hinh', '$kich_hoat', '$vai_tro')";
    pdo_execute($sql);
}

function check_khach_hang($ma_kh, $mat_khau){
    $sql = "SELECT * FROM khach_hang WHERE ma_kh = '".$ma_kh."' AND mat_khau = '".$mat_khau."' ";
    $sp = pdo_query_one($sql);
    return $sp;
}

function khach_hang_insert($ma_kh, $mat_khau, $ho_ten,$vai_tro, $kich_hoat, $email, $hinh){
    $sql = "INSERT INTO khach_hang(ma_kh, mat_khau, ho_ten, email, hinh, vai_tro, kich_hoat) VALUES ('$ma_kh', '$mat_khau', '$ho_ten', '$email', '$hinh', '$vaitro', '$kich_hoat')";
    pdo_execute($sql);
}

function khach_hang_update($ma_kh, $kich_hoat, $vai_tro){
    $sql = "UPDATE khach_hang SET kich_hoat='$kich_hoat',vai_tro='$vai_tro' WHERE ma_kh='$ma_kh'";
    pdo_execute($sql);
}

function khach_hang_edit( $ma_kh, $ho_ten, $email){
    $sql = "UPDATE khach_hang SET  ho_ten='".$ho_ten."',email='".$email."' WHERE ma_kh='".$ma_kh."'";
    pdo_execute($sql);
}

function khach_hang_delete($ma_kh){
    $sql = "DELETE FROM khach_hang  WHERE ma_kh=$makh";
    if(is_array($ma_kh)){
        foreach ($ma_kh as $ma) {
            pdo_execute($sql, $ma);
        }
    }
    else{
        pdo_execute($sql, $ma_kh);
    }
}

function khach_hang_select_all(){
    $sql = "SELECT * FROM khach_hang";
    return pdo_query($sql);
}

function khach_hang_select_by_id($ma_kh){
    $sql = "SELECT * FROM khach_hang WHERE ma_kh='$ma_kh'";
    return pdo_query_one($sql);
}


function khach_hang_change_password($ma_kh, $mat_khau_moi){
    $sql = "UPDATE khach_hang SET mat_khau='$mat_khau_moi' WHERE ma_kh='$ma_kh'";
    pdo_execute($sql);
}