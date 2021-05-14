
<div class="blog_left_area">
  <?php foreach ($news as $new):
    $new_id = $new["id"];
    $new_slug = Helper::getSlug($new['name']);
    $new_link = "blogs/$new_slug/$new_id";
    ?>
  <div class="single_blog mb-20">
    <div class="blog_container">
      <div class="blog_thumb">
        <a href="<?php echo $new_link; ?>">
          <img style="width: 100%;height: 190px"
               src="Assets/Uploads/news/<?php echo $new['avatar']; ?>">
        </a>
      </div>
    </div>
    <div class="blog_title1">
      <h2 style=""><a href="<?php echo $new_link; ?>"><?php echo $new['name']; ?></a></h2>
      <p class="categor11"><a style="text-align: center;"><?php echo $new['category_name']; ?></a></p>
      <ul>
        <li class="post_date"><i
              class="fa fa-clock-o"></i> Ngày <?php echo date('d/m/Y - H:i:s', strtotime($new['created_at'])); ?>
        </li>

      </ul>
    </div>
  </div>
  <?php endforeach; ?>

</div>