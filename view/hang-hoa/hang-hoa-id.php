<div class="container">
     <div class="row">
         <div class="col">
             <nav aria-label="breadcrumb">
                 <ol class="breadcrumb">
                     <li class="breadcrumb-item"><a href="index.php">Trang chủ</a></li>
                     <li class="breadcrumb-item"><a href="view/trang-chinh/sanpham.php">Sản phẩm</a></li>
                 </ol>
             </nav>
         </div>
     </div>
 </div>
 <div class="container">
     <div class="row">
         <div class="col-12 col-sm-3">
             <div class="bg-light mb-3">
                 <?php include 'view/hang-hoa/tim-kiem.php'; ?>
                 <!-- Danh mục -->
                 <div id="accordion" role="tablist">
                     <?php include 'view/hang-hoa/danh-muc.php'; ?>
                     <?php include 'view/hang-hoa/top10sp.php'; ?>
                 </div>
             </div>

         </div>
         <!-- Sản phẩm -->
         <div class="col">
             <h5 class="alert-secondary pt-3 pb-3 pl-sm-4 shadow-sm text-center ">
                 <?= $title_site ?></h5>
             <div class="row">
                 <?php foreach ($dssp as $item) {
                        extract($item);
                        $linksp = "index.php?act=sanphamct&ma_hh=".$ma_hh;
                        $img = $UPLOAD_URL.$hinh;
                        echo '<div class="col-12 col-md-6 col-lg-3 mt-3">
                        <div class="card text-center product-card pb-2">
                            <a class="product-thumb"
                                href="'.$linksp.'" data-abc="true">
                                <img class="card-img-top product-img object-fit-contain"
                                    src="'.$img.'" alt="Ảnh sản phẩm">
                            </a>
                            <div class="card-body p-0 pt-2 px-2">
                                <h3 class="product-title mh-60">
                                    <a href="'.$linksp.'">
                                        '.$ten_hh.'
                                    </a>
                                </h3>
                                <div class="product-price">
                                    <div class="col d-flex justify-content-center align-items-center">
                                        <del class="d-block fz-14">'.$don_gia.'đ </del>
                                        <p class="text-danger font-weight-bold fz-20 d-block ml-3 mb-0">
                                        '.$don_gia.'đ</p>
                                    </div>
                                </div>
                                <div class="col m-2">
                                    <a href=""
                                        class="btn btn-outline-primary btn-sm">Add to cart</a>
                                </div>
                            </div>
                         </div>
                    </div>';
                    } ?>

             </div>
         </div>

     </div>
 </div>
 <br>

