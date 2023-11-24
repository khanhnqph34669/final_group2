</div>
     <div id="layoutSidenav_content">
     <main>
          <div class="container-fluid">
          <h1 class="mt-4">Category Create</h1>
          <ol class="breadcrumb mb-4">
          <li class="breadcrumb-item"><a href="/author">Dashboard</a></li>
          <li class="breadcrumb-item active">Category Create</li>
          </ol>
          <div class="card mb-4">
          <div class="card-body">
          <form action="" method="post" enctype="multipart/form-data">
               <div class="form-group">
               <label for="Id">ID</label>
               <input type="text" name="Id" id="Id" class="form-control" value="<?= $post['Id'] ?>" readonly>
               </div>
               <div class="form-group">
               <label for="Title">Tiêu đề</label>
               <input type="text" name="Title" id="Title" class="form-control" value="<?= $post['Title'] ?>">
               </div>
               <div class="form-group">
               <label for="Content">Nội dung</label>
               <textarea name="Content" id="Content" class="form-control" placeholder="Content"><?= $post['Content'] ?></textarea>
               </div>
               <div class="form-group">
               <label for="Image">Ảnh</label>
               <input type="file" name="ImageUrl" id="ImageUrl" class="form-control">
               <input type="hidden" name="img_current" id="img_current" class="img-thumbnail-cr" value="<?= $post['ImageUrl'] ?>">
               <img src="../<?= $post['ImageUrl'] ?>" alt="" width="100px" class="img-thumbnail-cr">

               <br>

               </div>
               <div class="form-group">
               <input type="number" name="Status" id="Status" class="form-control" hidden value="2" readonly>
               </div> 
               <div class="form-group">
               <label for="categoryPost_id">Danh mục</label>
               <select class="form-control" id="CategoryPost_id" name="CategoryPost_id">
                    <?php foreach ($categories as $category) : ?>
                         <option  <?= $post['categoryPost_id'] == $category['id'] ? 'selected' : '' ?> 
                         value="<?= $category['id'] ?>">
                         <?= $category['name'] ?></option>
                    <?php endforeach; ?>
               </select>
               </div> 
               <div class="form-group">
                    <label for="author">Tác giả</label>
                    <input type="text" class="form-control" value="<?= $authors['Name'] ?>" readonly>
                    <input type="number" name="author_Id" hidden value="<?= $authors['Id'] ?>">
               </div>
               <div class="form-group">
               <input type="hidden" name="RejectContent" id="RejectContent" class="form-control">
               </div> 
               <input type="submit" name="btn-submit" id="btn-submit" class="btn btn-info mt-3" value="Đăng" >
               <a href="/author/post/list" class="btn btn-primary mt-3">Quay lại d/s</a>
          </form>
     </main>
