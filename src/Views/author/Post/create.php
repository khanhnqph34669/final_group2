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
          <form action="" method="post">
               <div class="form-group">
               <label for="Title">Tiêu đề</label>
               <input type="text" name="Title" id="Title" class="form-control" placeholder="Title">
               </div>
               <div class="form-group">
               <label for="Content">Nội dung</label>
               <textarea name="Content" id="Content" class="form-control" placeholder="Content"></textarea>
               </div>
               <div class="form-group">
               <label for="Image">Ảnh</label>
               <input type="file" name="ImageUrl" id="Image" class="form-control" placeholder="Image">
               </div>
               <div class="form-group">
               <label for="CreateAt">Thời gian tạo</label>
               <input type="datetime-local" name="CreateAt" id="CreateAt" class="form-control">
               </div>
               <div class="form-group">
               <input type="number" name="Status" id="Status" class="form-control" hidden value="2" readonly>
               </div> 
               <div class="form-group">
               <label for="categoryPost_id">Danh mục</label>
               <input type="number" name="categoryPost_id" id="categoryPost_id" class="form-control">
               </div> 
               <div class="form-group">
               <label for="VoteCount">VoteCount</label>
               <input type="number" name="VoteCount" id="VoteCount" class="form-control">
               </div> 
               <div class="form-group">
               <label for="ViewCount">Lượt xem</label>
               <input type="number" name="ViewCount" id="ViewCount" class="form-control">
               </div> 
               <div class="form-group">
               <label for="VoteAvg">VoteAvg</label>
               <input type="number" name="VoteAvg" id="VoteAvg" class="form-control">
               </div> 
               <div class="form-group">
               <input type="number" class="form-control" name="author_Id" hidden value="2" readonly>
               </div> 
               <div class="form-group">
               <input type="hidden" name="RejectContent" id="RejectContent" class="form-control">
               </div> 
               <input type="submit" name="btn-submit" id="btn-submit" class="btn btn-info mt-3" value="Đăng bài" >
          </form>
     </main>