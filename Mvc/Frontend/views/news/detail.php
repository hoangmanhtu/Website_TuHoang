<div class="breadcrumbs_area">
  <div class="container">
    <div class="row">
      <div class="col-12">
        <div class="breadcrumb_content">
          <ul>
            <li><a href="index.html">Trang chủ</a></li>
            <li><a href="#"><?php echo $news['category_name']; ?></a></li>
            <li><?php echo $news['name']; ?></li>
          </ul>
        </div>
      </div>
    </div>
  </div>
</div>
<div class="container">
  <div class="row">
    <div class="col-md-12">
      <!--blog grid area start-->
      <div class="blog_details_wrapper">
        <div class="single_blog mb-50">
          <div class="blog_title">
                            <span>
                                <a style="color: red"><?php echo $news['category_name']; ?></a>
                            </span>
            <h2><a ><?php echo $news['name']; ?></a></h2>
            <div class="blog_post">
              <ul>
                <li class="post_date"><i
                      class="fa fa-clock-o"></i> <?php echo date('d/m/Y - H:i:s', strtotime($news['created_at'])); ?>
                </li>
              </ul>
            </div>
          </div>
          <div class="post_content">
            <blockquote>
              <?php echo $news['summary']; ?>
            </blockquote>
          </div>
          <div class="blog_thumb">
            <a href="#"><img width="100%" src="assets/uploads/news/<?php echo $news['avatar']; ?>" alt=""></a>
          </div>
          <div class="blog_content">
            <div class="post_content">
              <?php echo $news['content']; ?>
            </div>
            <div class="entry_content">
              <div class="post_meta">
                <span>Tags: </span>
                <span><a href="#"><?php echo $news['category_name']; ?></a></span>

              </div>

              <div class="social_sharing">
                <p>Chia sẻ tin tức:</p>
                <ul>
                  <li><a href="#" title="facebook"><i class="fa fa-facebook"></i></a></li>
                  <li><a href="#" title="twitter"><i class="fa fa-twitter"></i></a></li>
                  <li><a href="#" title="pinterest"><i class="fa fa-pinterest"></i></a></li>
                  <li><a href="#" title="google+"><i class="fa fa-google-plus"></i></a></li>
                  <li><a href="#" title="linkedin"><i class="fa fa-linkedin"></i></a></li>
                </ul>
              </div>
            </div>
          </div>
        </div>
        <!--blog grid area start-->
      </div>
    </div>
  </div>
</div>

