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
          <form action="/author/post/create/submit" method="post" enctype="multipart/form-data">
               <div class="form-group">
               <label for="Title">Tiêu đề</label>
               <input type="text" name="Title" id="Title" class="form-control" placeholder="Title" required>
               </div>
               <div class="form-group">
               <label for="Content">Nội dung</label>
               <textarea name="Content" id="Content" class="form-control" placeholder="Content" required></textarea>
               </div>
               <div class="form-group">
               <label for="Image">Ảnh</label>
               <input type="file" name="ImageUrl" id="ImageUrl" class="form-control">
               </div>
               <div class="form-group">
               <input type="number" name="Status" id="Status" class="form-control" hidden value="2" readonly>
               </div> 
               <div class="form-group">
               <label for="categoryPost_id">Danh mục</label>
               <select class="form-control" id="CategoryPost_id" name="CategoryPost_id">
                    <?php foreach ($categories as $category) : ?>
                         <option value="<?= $category['id'] ?>"><?= $category['name'] ?></option>
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
               <input type="submit" name="btn-submit" id="btn-submit" class="btn btn-info mt-3" value="Đăng bài" >
          </form>
     </main>
