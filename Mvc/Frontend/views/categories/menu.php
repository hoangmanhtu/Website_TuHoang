<div class="header_bottom">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-lg-3">
                <div class="categories_menu categori_three">
                    <div class="categories_title">
                        <h2 class="categori_toggle">Danh sách sản phẩm</h2>
                    </div>
                    <div class="categories_menu_toggle" style="display: none;">
                        <ul>
                            <?php if (!empty($categories)): ?>
                                <?php foreach ($categories as $category):
                                    $category_id = $category["id"];
                                    $category_name = $category["name"];
                                    $category_slug = Helper::getSlug($category_name);
                                    $category_link = "danh-sach-san-pham/$category_slug/$category_id"
                                    ?>
                                    <li ><a href="<?php echo $category_link; ?>"> <span class="count__product">(<?php echo $category['total_product'] ?>)</span><?php echo $category_name; ?></a></li>
                                <?php endforeach; ?>
                            <?php endif; ?>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="col-lg-9">
                <div class="main_menu menu_three header_position">
                    <nav>
                        <ul>
                            <li class="active"><a  href="index.php"><i class="zmdi zmdi-home"></i> Trang chủ</a>
                            <li><a href="san-pham-moi"><i class="zmdi zmdi-tablet-android"></i> Hàng mới về</a></li>
                            <li><a href="bolgs-full"><i class="zmdi zmdi-collection-music"></i> Tin tức</a></li>
                            <li><a href="lien-he"><i class="zmdi zmdi-star"></i> Liên hệ</a></li>
                            <li><a href="he-thong-cua-hang"><i class="zmdi zmdi-account-box-mail"></i> Hệ thống cửa hàng</a></li>
                        </ul>
                    </nav>
                </div>
            </div>
        </div>
    </div>
</div>
