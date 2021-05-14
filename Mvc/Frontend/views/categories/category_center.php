<div class="widget_list widget_categories">
  <h2>Danh mục sản phẩm</h2>
  <ul>
    <?php if(!empty($categories)):  ?>
    <?php foreach ($categories as $category):
    $category_id=$category["id"];
    $category_name=$category["name"];
    $category_slug=Helper::getSlug($category_name);
    $category_link="danh-sach-san-pham/$category_slug/$category_id"
    ?>
    <li >
      <a href="<?php echo $category_link; ?>"><?php echo $category_name; ?> <span>(<?php echo $category['total_product'] ?>)</span></a>
    </li>

    <?php endforeach; ?>
    <?php else: ?>
    <li>
     Không có danh mục nào
    </li>
    <?php endif; ?>
  </ul>
</div>
