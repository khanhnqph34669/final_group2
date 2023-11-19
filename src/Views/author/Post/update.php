</div>
     <div id="layoutSidenav_content">
     <main>
     <div class="container-fluid">
     <h1 class="mt-4">Create Post</h1>
     <ol class="breadcrumb mb-4">
     <li class="breadcrumb-item"><a href="/author">Dashboard</a></li>
     <li class="breadcrumb-item active">Create Post</li>
     </ol>
     <div class="card mb-4">
     <div class="card-body">
     <form action="" method="post">
     <div class="form-group">
     <input type="hidden" name="Id" id="Id" class="form-control" value="<?= $category['Id']?>">
     </div>
     <div class="form-group">
     <label for="title">Title</label>
     <input type="text" name="Title" id="Title" class="form-control" placeholder="Title" value="<?= $category['Title']?>">
     </div>
     <!-- <div class="form-group">
     <label for="content">Content</label>
     <textarea name="content" id="content" class="form-control" placeholder="Content"></textarea>
     </div>
     <div class="form-group">
     <label for="image">Image</label>
     <input type="text" name="image" id="image" class="form-control" placeholder="Image">
     </div>
     <div class="form-group">
     <label for="tags">CreateAt</label>
     <input type="datetime-local" name="CreateAt" id="CreateAt" class="form-control">
     <div class="form-group">
     <label for="tags">Status</label>
     <input type="number" name="Status" id="Status" class="form-control">
     </div> <br> -->
     <input type="submit" name="btn_submit" id="btn_submit" value="Đăng bài" >

     </main>
