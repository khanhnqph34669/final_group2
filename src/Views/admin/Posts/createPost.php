</div>
     <div id="layoutSidenav_content">
     <main>
     <div class="container-fluid">
     <h1 class="mt-4">Create Post</h1>
     <ol class="breadcrumb mb-4">
     <li class="breadcrumb-item"><a href="/admin">Dashboard</a></li>
     <li class="breadcrumb-item active">Create Post</li>
     </ol>
     <div class="card mb-4">
     <div class="card-body">
     <form action="/admin/posts/store" method="post">
     <div class="form-group">
     <label for="title">Title</label>
     <input type="text" name="title" id="title" class="form-control" placeholder="Title">
     </div>
     <div class="form-group">
     <label for="content">Content</label>
     <textarea name="content" id="content" class="form-control" placeholder="Content"></textarea>
     </div>
     <div class="form-group">
     <label for="author">Author</label>
     <input type="text" name="author" id="author" class="form-control" placeholder="Author">
     </div>
     <div class="form-group">
     <label for="category">Category</label>
     <input type="text" name="category" id="category" class="form-control" placeholder="Category">
     </div>
     <div class="form-group">
     <label for="image">Image</label>
     <input type="text" name="image" id="image" class="form-control" placeholder="Image">
     </div>
     <div class="form-group">
     <label for="status">Status</label>
     <input type="text" name="status" id="status" class="form-control" placeholder="Status">
     </div>
     <div class="form-group">
     <label for="tags">Tags</label>
     <input type="text" name="tags" id="tags" class="form-control" placeholder="Tags">
     </div>
     </main>
