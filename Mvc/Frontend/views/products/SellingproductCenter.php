<div class="widget_list recent_product">
    <h2>Đánh giá nhiều nhất</h2>
    <div class="recent_product_container">
        <?php if (!empty($products)):
        foreach ($products as $product):
        $product_title = $product['title'];
        $product_slug = Helper::getSlug($product_title);
        $product_id = $product['id'];
        $product_link = "chi-tiet-san-pham/$product_slug/$product_id";
        ?>
        <div class="recent_product_list">
            <div class="recent_product_thumb">
                <a target="_blank" href="<?php echo $product_link; ?>"><img src="Assets/Uploads/Products/<?php echo $product['avatar']; ?>" alt=""></a>
            </div>
            <div class="recent_product_content">
                <h3><a target="_blank" href="<?php echo $product_link; ?>"><?php echo $product['title']; ?></a></h3>
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
                        <?php endif; ?>
                    </ul>
                </div>
                <div class="price_box">
                    <?php if($product["discount"] > 0): ?>
                        <span style="font-size: 13px; !important;" class="current_price">  <?php echo number_format($product["price"] - ($product["price"] * ($product["discount"] / 100))); ?> VNĐ</span>
                        <span style="font-size: 11px;" class="old_price"> <?php echo number_format($product["price"]); ?>VNĐ</span>
                    <?php else: ?>
                        <span style="font-size: 13px;" class="current_price">  <?php echo number_format($product["price"]); ?> VNĐ</span>
                    <?php endif; ?>
                </div>
            </div>
        </div>
        <?php endforeach; endif; ?>
    </div>
</div>
