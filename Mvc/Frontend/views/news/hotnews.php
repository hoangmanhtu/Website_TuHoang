
<?php if (!empty($news)): ?>
  <div class="services_gallery mt-60">
    <div class="container">
      <div class="section_title">
        <h2>TIN TỨC <span>NỔI BẬT</span></h2>
      </div>
      <div class="row">
        <?php foreach ($news as $new):
          $new_id = $new["id"];
          $new_slug = Helper::getSlug($new['name']);
          $new_link = "blogs/$new_slug/$new_id";
          ?>
          <div class="col-lg-4 col-md-6">
              <div class="single_services">
                <a href="<?php echo $new_link; ?>">
                <div class="services_thumb">
                  <img src="Assets/uploads/news/<?php echo $new["avatar"]; ?>" alt="">
                </div>
                </a>
                <div class="services_content">
                  <a href="<?php echo $new_link; ?>"> <h3><?php echo $new['name']; ?></h3></a>
                  <p style="margin-bottom: 5px;color: #696969"><i class="fa fa-clock-o"></i>
                    <?php echo date('d/m/Y - H:i:s', strtotime($new['created_at'])); ?>
                  </p>
                  <p>
                    <?php echo $new['summary']; ?>
                  </p>
                </div>
          </div>
          </div>
        <?php endforeach; ?>
      </div>
    </div>
  </div>

<?php endif; ?>