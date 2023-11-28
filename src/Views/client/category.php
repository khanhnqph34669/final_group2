<div class="post-container">
    <div class="category-heading">
      <h2><?php
          foreach ($categories as $category) {
            $id = $_GET['id'];
            if ($category['id'] == $id) {
              echo $category['name'];
            }
          }
      
      ?></h2>
    </div>

    <div class="articles-container">
      <?php if (count($posts) == 0) : ?>
        <div class="article">
          <div class="article-content">
            <div class="article-title">
              <h2>Không có bài viết nào</h2>
            </div>
          </div>
        </div>
      <?php endif; ?>
      <?php foreach ($posts as $post): ?>
        <div class="article">
          <figure class="article-photo">
            <a href="#"><img src="../<?php echo $post['ImageUrl']; ?>" alt="Image Alt" class="image-thumb" /></a>
          </figure>
          <div class="article-content">
            <div class="article-category"><?php echo $post['Title']; ?></div>
            <div class="article-title">
              <h2><a href="/client/post/preview?id=<?php echo $post['Id']; ?>"><?php echo $post['Content']; ?></a></h2>
            </div>
            <footer class="article-footer">
              <span class="article-author">Tác giả:
                <?php
                foreach ($authors as $author) {
                  if ($author['Id'] == $post['author_Id']) {
                    echo $author['Name'];
                  }
                }
                ?>
                <br>
              </span>
              <span class="article-date">Ngày đăng: <?php echo $post['CreateAt']; ?></span>
            </footer>
          </div>
        </div>
      <?php endforeach; ?>

    </div>
  </div>