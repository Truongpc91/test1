<div class="container mt-3">
    <div class="row">
        <div class="col">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="index.php">Trang chủ</a></li>
                    <li class="breadcrumb-item"><a href="view/trang-chinh/sanpham.php">Sản phẩm</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Chi tiết</li>
                </ol>
            </nav>
        </div>
    </div>
</div>
<div class="container">
    <div class="row">
        <!-- Image -->
        <div class="col-12 col-lg-6">
            <div class="card bg-light mb-3">
                <div class="card-body text-center">
                    <a href="#" data-toggle="modal" data-target="#productModal">
                        <!-- Ảnh sản phẩm -->
                        <img class="img-fluid" src="<?php echo 'upload/'.$hinh ?>" />
                    </a>
                </div>
            </div>
        </div>

        <!-- Add to cart -->
        <div class="col-12 col-lg-6 add_to_cart_block">
            <div class="card bg-light mb-3">
                <div class="card-body text-center">
                    <h4 class="card-title"><?= $ten_hh ?></h4>
                    <div class="product-price">
                        <div class="col d-flex justify-content-center align-items-center">
                            <del class="d-block"><?= number_format($don_gia, 0, ',') ?>đ</del>
                            <p class="text-danger font-weight-bold d-block ml-3 mb-0">
                                <?= number_format($don_gia - $giam_gia, 0, ',') ?>đ</p>
                        </div>
                    </div>

                    <form method="get" action="cart.html">

                        <div class="form-group">
                            <label>Số lượng :</label>
                            <div class="input-group mb-3 justify-content-center">
                                <div class="input-group-prepend">
                                    <button type="button" class="quantity-left-minus btn btn-danger btn-number"
                                        data-type="minus" data-field="">
                                        <i class="fa fa-minus"></i>
                                    </button>
                                </div>
                                <input type="text" class="text-center" id="quantity" name="quantity" min="1" max="100"
                                    value="1">
                                <div class="input-group-append">
                                    <button type="button" class="quantity-right-plus btn btn-success btn-number"
                                        data-type="plus" data-field="">
                                        <i class="fa fa-plus"></i>
                                    </button>
                                </div>
                            </div>
                        </div>
                        <a href="cart.html" class="btn btn-danger btn-lg btn-block text-uppercase">
                            <i class="fa fa-shopping-cart"></i> Thêm vào giỏ hàng
                        </a>
                    </form>
                    <div class="product_rassurance">
                        <ul class="list-inline">
                            <li class="list-inline-item"><i class="fa fa-truck fa-2x"></i><br />Giao hàng nhanh</li>
                            <li class="list-inline-item"><i class="fa fa-credit-card fa-2x"></i><br />Bảo mật
                            </li>
                            <li class="list-inline-item"><i class="fa fa-phone fa-2x"></i><br />0982084197
                            </li>
                        </ul>
                    </div>
                    <div class="reviews_product p-3 mb-2 ">
                        <i class="fa fa-star"></i>
                        <i class="fa fa-star"></i>
                        <i class="fa fa-star"></i>
                        <i class="fa fa-star"></i>
                        <i class="fa fa-star"></i>
                        (4/5)
                    </div>

                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <!-- Description -->
        <div class="col-12">
            <div class="card border-light mb-3">
                <div class="card-header bg-primary text-white text-uppercase"><i class="fa fa-align-justify"></i>
                    Mô tả sản phẩm
                </div>
                <div class="card-body">
                    <p class="card-text"><?= $mo_ta ?></p>
                </div>
            </div>
        </div>
        
        <div class="col-12">
            <div class="card border-light mb-3">
                <div class="card-header bg-primary text-white text-uppercase"><i class="fa fa-align-justify"></i>
                    Bình Luận
                </div>
                <div class="card-body">
                    <?php include "view/khach-hang/binh-luan.php"; ?>
                </div>
            </div>
        </div>

        <?php include "view/hang-hoa/hang-hoa-cung-loai.php"; ?>
    </div>
    
</div>
