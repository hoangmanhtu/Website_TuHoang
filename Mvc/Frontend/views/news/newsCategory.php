<div class="breadcrumbs_area">
  <div class="container">
    <div class="row">
      <div class="col-12">
        <div class="breadcrumb_content">
          <ul>
            <li><a href="index.php">Trang chủ</a></li>
            <li>Tin tức</li>
          </ul>
        </div>
      </div>
    </div>
  </div>
</div>
<div class="main_blog_area mt-50 mb-50">
  <div class="container">
    <div class="row">

      <div class="col-8">
        <?php if(!empty($news)): ?>
        <div class="blog_left_area">
          <?php foreach ($news as $new):
            $new_id = $new["id"];
            $new_slug = Helper::getSlug($new['name']);
            $new_link = "blogs/$new_slug/$new_id";
            ?>
          <div class="single_blog mb-50">
            <div class="blog_title">
                                    <span>
                                        <a  style="color: red"><?php echo $new['category_name']; ?></a>
                                    </span>
              <h2><a href="<?php echo $new_link; ?>"><?php echo $new['name']; ?></a></h2>
              <div class="blog_post">
                <ul>
                  <li class="post_date"> <i class="fa fa-clock-o"></i> Ngày <?php echo date('d/m/Y - H:i:s', strtotime($new['created_at'])); ?></li>
                </ul>
              </div>
            </div>
            <div class="blog_container">
              <div class="blog_thumb">
                <a href="<?php echo $new_link; ?>"><img style="width: 100%;height: 400px"
                      src="Assets/Uploads/news/<?php echo $new['avatar']; ?>" alt=""></a>
              </div>
              <div class="blog_content">
                <p class="blog_desc"><?php echo $new['summary'] ?></p>
                <a href="<?php echo $new_link; ?>">Xem chi tiết</a>
                <div class="blog_footer">
                  <div class="blog_social">
                    <p>Chia sẻ bài viết:</p>
                    <ul>
                      <li><a href="#" title="Facebook"><i class="fa fa-facebook"></i></a></li>
                      <li><a href="#" title="Facebook"><i class="fa fa-twitter"></i></a></li>
                      <li><a href="#" title="Facebook"><i class="fa fa-pinterest"></i></a></li>
                      <li><a href="#" title="Facebook"><i class="fa fa-google-plus"></i></a></li>
                      <li><a href="#" title="Facebook"><i class="fa fa-linkedin"></i></a></li>
                    </ul>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <?php endforeach; ?>
        </div>
        <!--blog pagination area start-->
        <div class="blog_pagination">
          <div class="pagination">
            <ul>
              <li class="current">1</li>
              <li><a href="#">2</a></li>
              <li><a href="#">3</a></li>
              <li class="next"><a href="#">next</a></li>
              <li><a href="#">&gt;&gt;</a></li>
            </ul>
          </div>
        </div>
        <?php else: ?>
        <div style="margin: 40px auto;text-align: center">Chưa có tin tức nào cả !!!</div>
        <?php endif; ?>
      </div>

      <!--      -->
      <div class="col-4">
       <?php require_once 'Mvc/frontend/controllers/NewsController.php';
          $news_controller=new NewsController();
          $news_controller->NewsHot();
       ?>

      </div>
    </div>
  </div>
</div>
</div>