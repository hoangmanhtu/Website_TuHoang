<?php if(!empty($categories)):  ?>
<section class="category_product_area mt-30 mb-50">
  <div class="container">
    <div class="row">
      <div class="col-12">
        <div class="category_product_carousel category_column4 owl-carousel">
          <?php foreach ($categories as $category):
            $category_id=$category["id"];
            $category_name=$category["name"];
            $category_slug=Helper::getSlug($category_name);
            $category_link="danh-sach-san-pham/$category_slug/$category_id"
           ?>
          <div class="single_category_product">
            <div class="category_product_thumb">
              <a href="<?php echo $category_link; ?>"><img src="Assets/Uploads/categories/<?php echo $category["avatar"]; ?>" alt=""></a>
            </div>
            <div class="category_product_name">
              <h2><a href="<?php echo $category_link; ?>"><?php echo $category_name; ?></a></h2>
            </div>
          </div>
        <?php endforeach; ?>
        </div>
      </div>
    </div>
  </div>
</section>
<?php endif; ?>