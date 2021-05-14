
    <div class="shop_title">
        <h1><?php echo isset($category['name']) ? $category['name'] : "Hàng mới về" ?></h1>
    </div>
    <div class="shop_toolbar_wrapper">
        <div class="shop_toolbar_btn">
            <button data-role="grid_3" type="button" class="active btn-grid-3" data-toggle="tooltip" title="3"></button>
<!--            <button data-role="grid_list" type="button" class=" btn-list" data-toggle="tooltip" title="List"></button>-->
        </div>
        <div class="page_amount">
            <p><?php echo $countProduct; ?> Sản phẩm</p>
        </div>
    </div>
    <!--shop toolbar end-->

    <div class="row no-gutters shop_wrapper grid_4">
        <?php if(!empty($products)):
            foreach ($products as $product):
                $product_title = $product['title'];
                $product_slug = Helper::getSlug($product_title);
                $product_id = $product['id'];
                $product_link = "chi-tiet-san-pham/$product_slug/$product_id";
                ?>
                <div class=" col-4 ">
                    <div class="single_product">
                        <div class="product_thumb">
                            <a href="<?php echo $product_link; ?>"><img src="Assets/Uploads/products/<?php echo $product['avatar']; ?>" alt=""></a>
                            <?php if($product['discount'] > 0): ?>
                                <div class="label_product">
                                    <span class="label_sale"><?php echo $product['discount'] ?> %</span>
                                </div>
                            <?php endif; ?>
                            <div class="quick_button">
                                <a href="#" data-toggle="modal" data-target="#modal<?php echo $product['id'] ?>"  title="Xem nhanh sản phẩm"> <i class="zmdi zmdi-eye"></i></a>
                            </div>
                        </div>
                        <div class="product_content grid_content">
                            <div class="product_name">
                                <h3><a href="<?php echo $product_link; ?>"><?php echo $product['title']; ?></a></h3>
                            </div>
                            <div class="product_rating">
                                <ul>
                                    <?php
                                    $rating=0;
                                    if($product["total_rating"] > 0)
                                    {
                                        $rating=round($product["total_number_rating"]/ $product["total_rating"],2);
                                    }
                                    ?>
                                    <?php for($i=1;$i<=5;$i++): ?>
                                        <li><a href=""><i class="zmdi <?php if( $i <= $rating) echo "zmdi-star"; else  echo "zmdi-star-outline" ?>"></i></a></li>
                                    <?php endfor; ?>
                                    <?php if(!empty($product['total_rating'])): ?>
                                        <span style="margin-left: 20px;font-size: 15px;"> (<?php echo $product['total_rating']; ?>) đánh giá</span>
                                    <?php endif; ?>
                                </ul>
                            </div>
                            <div class="price_box">
                                <?php if($product["discount"] > 0): ?>
                                    <span class="current_price">  <?php echo number_format($product["price"] - ($product["price"] * ($product["discount"] / 100))); ?> VNĐ</span>
                                    <span class="old_price"> <?php echo number_format($product["price"]); ?>VNĐ</span>
                                <?php else: ?>
                                    <span class="current_price">  <?php echo number_format($product["price"]); ?> VNĐ</span>
                                <?php endif; ?>
                            </div>
                            <div class="action_links">
                                <ul>
                                    <?php if($product["quality"] > 0): ?>
                                        <li class="wishlist"><a href="" onclick="HeartProduct(<?php echo $product_id; ?>)"  title="Yêu thích"><i class="fa fa-heart-o" aria-hidden="true"></i></a></li>
                                        <li class="add_to_cart"><a href="them-vao-gio-hang/<?php echo $product['id']; ?>" title="Thêm vào giỏ hàng"><i class="zmdi zmdi-shopping-cart-plus"></i>Mua ngay</a></li>
                                        <li class="compare"><a href="<?php echo $product_link; ?>" title="Xem chi tiết sản phẩm"><i class="zmdi zmdi-swap"></i></a></li>
                                    <?php else: ?>
                                        <li class="wishlist"><a href="" onclick="HeartProduct(<?php echo $product_id; ?>)"  title="Yêu thích"><i class="fa fa-heart-o" aria-hidden="true"></i></a></li>
                                        <li class="add_to_cart"><a href="tel:0395679339" title="Liên hệ với cửa hàng"><i class="zmdi zmdi-phone-bluetooth"></i>Liên hệ</a></li>
                                        <li class="compare"><a href="<?php echo $product_link; ?>" title="Xem chi tiết sản phẩm"><i class="zmdi zmdi-swap"></i></a></li>
                                    <?php endif; ?>
                                </ul>
                            </div>
                        </div>
                        <div class="product_content list_content">
                            <div class="product_name">
                                <h3><a href="<?php echo $product_link; ?>"><?php echo $product['title'] ?></a></h3>
                            </div>
                            <div class="product_rating">
                                <ul>
                                    <li><a href="#"><i class="zmdi zmdi-star-outline"></i></a></li>
                                    <li><a href="#"><i class="zmdi zmdi-star-outline"></i></a></li>
                                    <li><a href="#"><i class="zmdi zmdi-star-outline"></i></a></li>
                                    <li><a href="#"><i class="zmdi zmdi-star-outline"></i></a></li>
                                    <li><a href="#"><i class="zmdi zmdi-star-outline"></i></a></li>
                                </ul>
                            </div>
                            <div class="price_box">
                                <?php if($product["discount"] > 0): ?>
                                    <span class="current_price">  <?php echo number_format($product["price"] - ($product["price"] * ($product["discount"] / 100))); ?> VNĐ</span>
                                    <span class="old_price"> <?php echo number_format($product["price"]); ?>VNĐ</span>
                                <?php else: ?>
                                    <span class="current_price">  <?php echo number_format($product["price"]); ?> VNĐ</span>
                                <?php endif; ?>
                            </div>
                            <?php if(!empty($product['present'])): ?>
                                <div class="product_desc" style="margin-bottom: 20px">
                                    <label>Khuyến mại đặc biệt :</label>
                                    <ul>
                                        <?php echo $product['present']; ?>
                                    </ul>
                                </div>
                            <?php endif; ?>
                            <div class="action_links">
                                <ul>
                                    <?php if($product["quality"] > 0): ?>
                                        <li class="wishlist"><a href="" onclick="HeartProduct(<?php echo $product_id; ?>)"  title="Yêu thích"><i class="fa fa-heart-o" aria-hidden="true"></i></a></li>
                                        <li class="add_to_cart"><a href="them-vao-gio-hang/<?php echo $product['id']; ?>" title="Thêm vào giỏ hàng"><i class="zmdi zmdi-shopping-cart-plus"></i>Mua ngay</a></li>
                                        <li class="compare"><a href="<?php echo $product_link; ?>" title="Xem chi tiết sản phẩm"><i class="zmdi zmdi-swap"></i></a></li>
                                    <?php else: ?>
                                        <li class="wishlist"><a href="" onclick="HeartProduct(<?php echo $product_id; ?>)"  title="Yêu thích"><i class="fa fa-heart-o" aria-hidden="true"></i></a></li>
                                        <li class="add_to_cart"><a href="tel:0395679339" title="Liên hệ với cửa hàng"><i class="zmdi zmdi-phone-bluetooth"></i>Liên hệ</a></li>
                                        <li class="compare"><a href="<?php echo $product_link; ?>" title="Xem chi tiết sản phẩm"><i class="zmdi zmdi-swap"></i></a></li>
                                    <?php endif; ?>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            <?php endforeach; else: ?>
            <div class="col-12" style="text-align: center;">
                Không có sản phẩm nào thuộc danh mục này !!!
            </div>
        <?php endif; ?>
    </div>

    <div class="shop_toolbar t_bottom">
        <div class="pagination">
            <ul>
                <li class="current">1</li>
                <li><a href="#">2</a></li>
                <li><a href="#">3</a></li>
                <li class="next"><a href="#">next</a></li>
                <li><a href="#">>></a></li>
            </ul>
        </div>
    </div>
