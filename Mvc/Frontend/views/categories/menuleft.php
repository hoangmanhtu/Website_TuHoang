<?php if(!empty($categories)):  ?>
<div class="col-lg-3">
  <div class="categories_menu">
    <div class="categories_title">
      <h2 class="categori_toggle">Danh mục sản phẩm</h2>
    </div>
    <div class="categories_menu_toggle">
      <ul class="menu">
        <?php foreach ($categories as $category):
          $category_id=$category["id"];
          $category_name=$category["name"];
          $category_slug=Helper::getSlug($category_name);
          $category_link="danh-sach-san-pham/$category_slug/$category_id"
          ?>
        <li><a href="<?php echo $category_link; ?>"> <?php echo $category_name; ?></a></li>
        <?php endforeach; ?>
      </ul>
    </div>
  </div>
</div>
<?php endif; ?>
