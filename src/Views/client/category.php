<div class="post-container">
    <div class="category-heading">
      <h2><?php
          foreach ($categories as $category) {
            $id = $_GET['id'];
            if ($category['id'] == $id) {
              echo '<p class="TitleCategory">'.$category['name'].'</p>';
            }
          }
      
      ?></h2>
    </div>
    <div class="articles-container">
      <?php if (count($posts) == 0) : ?>
        <div class="article">
          <div class="article-content">
            <div class="article-title">
              <div class="err">
              <h2 class="NoPost">Không có bài viết nào</h2>
              <p>Xin lỗi vì sự bất tiện này . Bạn có thể quay về  <a href="/">trang chủ tại đây !</a></a></p>
              </div>
            </div>
          </div>
        </div>
      <?php endif; ?>
      <?php foreach ($posts as $post): ?>
        <div class="article">
          <figure class="article-photo">
            <a href="#"><img src="../<?php echo $post['ImageUrl']; ?>" alt="Image Alt" class="image-thumb" /></a>
          </figure>
          <div class="article-title">
            <div class="article-category"><h2><a href="/client/post/preview?id=<?php echo $post['Id']; ?>"><?php echo $post['Title']; ?></a></h2></div>
            <div class="article-content">
              <p class="fix-content"><?php echo $post['Content']; ?></p><p>...</p>
            </div>
            
            <button class="btn2"><a class="preview" href="/client/post/preview?id=<?php echo $post['Id']; ?>">Đọc thêm</a></button>
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

  <style>
    .btn2{
      background-color: #4CAF50;
    color: white;
    border: none;
    padding: 8px 12px;
    border-radius: 5px;
    cursor: pointer;
    }
  </style>
