</div>
     <div id="layoutSidenav_content">
     <main>
     <div class="container-fluid">
     <h1 class="mt-4">Category Update</h1>
     <ol class="breadcrumb mb-4">
     <li class="breadcrumb-item"><a href="/author">Dashboard</a></li>
     <li class="breadcrumb-item active">Create Post</li>
     </ol>
     <div class="card mb-4">
     <div class="card-body">
     <form action="" method="post">
     <div class="form-group">
    <label for="ID">ID</label>
     <input type="number" name="Id" id="Id" class="form-control" value="<?= $category['Id']?>">
     </div>
     <div class="form-group">
     <label for="title">Title</label>
     <input type="text" name="Title" id="Title" class="form-control" value="<?= $category['Title']?>">
     </div>
     <div class="form-group">
     <label for="content">Content</label>
     <textarea name="content" id="content" class="form-control" value="<?= $category['Content']?>"></textarea>
     </div>
     <div class="form-group">
     <label for="image">Image</label>
     <input type="text" name="image" id="image" class="form-control" value="<?= $category['ImageUrl']?>">
     </div>
     <div class="form-group">
     <label for="tags">CreateAt</label>
     <input type="datetime-local" name="CreateAt" id="CreateAt" value="<?= $category['CreateAt']?>" class="form-control">
     <div class="form-group">
     <label for="tags">Status</label>
     <input type="number" name="Status" id="Status" value="<?= $category['Status']?>" class="form-control">
     </div> <br>
     <input type="submit" name="btn-submit" class="btn btn-info mt-3" id="btn-submit" value="Update" >
</form>
     </main>
