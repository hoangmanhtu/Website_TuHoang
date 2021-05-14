
<?php if(!empty($products)):
foreach ($products as $product):
$product_title = $product['title'];
$product_slug = Helper::getSlug($product_title);
$product_id = $product['id'];
$product_link = "chi-tiet-san-pham/$product_slug/$product_id";
?>
<div style="border-bottom: 1px solid #dadada;padding: 5px 0px">
<a href="<?php echo $product_link; ?>">
    <div class="img_search">
      <img src="Assets/Uploads/products/<?php echo $product['avatar']; ?>" alt="">
    </div>
    <div class="title__search">
      <div class="title1"><?php echo $product['title']; ?></div>
      <div>
  <?php if($product["discount"] > 0): ?>
        <span class="price" >
          <?php echo number_format($product["price"] - ($product["price"] * ($product["discount"] / 100))); ?> ₫</span>
        <span class="price__old"><?php echo number_format($product["price"]); ?> ₫</span>
         <?php else: ?>
         <span class="price"><?php echo number_format($product["price"]); ?> ₫</span>
        <?php endif; ?>
    </div>
  </div>
  </a>
  <div style="clear: both"></div>
</div>
<?php endforeach;
else: ?>
  <div style="text-align: center">Không có sản phẩm nào !!!</div>
<?php endif; ?>