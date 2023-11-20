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
          <form action="create" method="post">
               <div class="form-group">
               <input type="hidden" name="Id" id="Id" class="form-control">
               </div>
               <div class="form-group">
               <label for="Title">Title</label>
               <input type="text" name="Title" id="Title" class="form-control" placeholder="Title">
               </div>
               <div class="form-group">
               <label for="Content">Content</label>
               <textarea name="Content" id="Content" class="form-control" placeholder="Content"></textarea>
               </div>
               <div class="form-group">
               <label for="Image">Image</label>
               <input type="text" name="ImageUrl" id="Image" class="form-control" placeholder="Image">
               </div>
               <div class="form-group">
               <label for="CreateAt">CreateAt</label>
               <input type="datetime-local" name="CreateAt" id="CreateAt" class="form-control">
               </div>
               <div class="form-group">
               <label for="Status">Status</label>
               <input type="number" name="Status" id="Status" class="form-control">
               </div> <br>
               <input type="submit" name="btn-submit" id="btn-submit" class="btn btn-info mt-3" value="Đăng bài" >
          </form>
     </main>
