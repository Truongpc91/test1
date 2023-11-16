<div class="container mt-3">
  <h2>Danh Sách Hàng Hóa</h2>
  <form action="index.php?act=listhanghoa" method="POST">
    <select name="maloai" class="form-select">
        <option value="0" selected>Tất Cả</option>
        <?php foreach($listloaihang as $loaihang) {
            extract($loaihang);
            echo '<option value="'.$ma_loai.'">'.$ten_loai.'</option>'; 
        } ?>
    </select>
    <input type="text" name="keyword" class="form-control">
    <input type="submit" value="OK" name="listok" class="btn btn-outline-secondary" >
  </form>
  <table class="table">
    <thead class="table-dark">
      <tr>
        <th>Mã Loại</th>
        <th>Tên Hàng Hóa</th>
        <th>Hình</th>
        <th>Giá</th>
        <th>Lượt Xem</th>
        <th><a href="index.php?act=addhanghoa" class="btn btn-success text-white">Thêm mới
                                    <i class="fas fa-plus-circle"></i></a></th>
      </tr>
    </thead>
    <tbody>
    <?php 
        foreach ($listhanghoa as $hanghoa) {
            extract($hanghoa);
            $suahanghoa = "index.php?act=suahanghoa&id=".$ma_hh;
            $xoahanghoa = "index.php?act=xoahanghoa&id=".$ma_hh;
            $hinhpath = "../upload/".$hinh;
            if(is_file($hinhpath)) {
                $hinh = "<img src='".$hinhpath."' height='80'>";
            }else {
                $hinh = "no photo";
            }
            echo '<tr>
                    <td>'.$ma_hh.'</td>
                    <td>'.$ten_hh.'</td>
                    <td>'.$hinh.'</td>
                    <td>'.$don_gia.'</td>
                    <td>'.$so_luot_xem.'</td>
                    <td>
                      <a href="'.$suahanghoa.'"><input type="button" value="Sửa" class="btn btn-outline-secondary"></a>
                      <a href="'.$xoahanghoa.'"><input type="button" value="Xóa" class="btn btn-outline-secondary"></a>
                    </td>
                  </tr>';
        } ?>
    </tbody>
    </table>
</div>