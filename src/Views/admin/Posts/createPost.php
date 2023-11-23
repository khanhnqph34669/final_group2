</div>

<div id="layoutSidenav_content">
     <main>
          <div class="container-fluid px-4">
               <h1 class="mt-4">Thêm bài viết mới</h1>
               <ol class="breadcrumb mb-4">
                    <li class="breadcrumb-item"><a href="/admin">Dashboard</a></li>
                    <li class="breadcrumb-item active">Thêm bài viết mới</li>
               </ol>
               <div class="card mb-4">
                    <div class="card-body">
                         <form action="/admin/post/push" method="post" enctype="multipart/form-data">
                              <div class="form-group">
                                   <label for="title">Tiêu đề</label>
                                   <input type="text" class="form-control" id="title" name="title" placeholder="Tiêu đề bài viết" required>
                              </div>
                              <br>
                              <div class="form-group">
                                   <label for="content">Nội dung</label>
                                   <textarea class="form-control" id="content" name="content" rows="3" required></textarea>
                              </div>
                              <br>
                              <div class="form-group">
                                   <label for="image">Ảnh bìa</label>
                                   <input type="file" class="form-control" id="image" name="image" required>
                              </div>
                              <div class="form-group">
                                   <label for="category">Danh mục bài viết</label>
                                   <select class="form-control" id="category" name="categoryPost_id">
                                        <?php foreach ($categories as $category) : ?>
                                             <option name="category" value="<?= $category['id'] ?>"><?= $category['name'] ?></option>
                                        <?php endforeach; ?>
                                   </select>
                              </div>
                              <div class="form-group">
                                   <label for="author">Tác giả</label>
                                   <input type="text" class="form-control" value="<?= $authors['Name'] ?>" readonly>
                                   <input type="number" name="author" hidden value="<?= $authors['Id'] ?>">
                              </div>
                              <span>
                                   <?php 
                                        if(isset($thongbao)){
                                             echo $thongbao;
                                        }
                                   ?>
                              </span>
                              <br>
                              
                              <button type="submit" name="submit-post" class="btn btn-primary">Thêm bài viết</button>
                         </form>
     </main>