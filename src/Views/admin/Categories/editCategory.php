</div>
            <div id="layoutSidenav_content">
                <main>
                <div class="container-fluid px-4">
               <h1 class="mt-4">Sửa danh mục</h1>
               <ol class="breadcrumb mb-4">
                    <li class="breadcrumb-item"><a href="/admin">Dashboard</a></li>
                    <li class="breadcrumb-item active">Thêm bài danh mục mới</li>
               </ol>
               <div class="card mb-4">
                    <div class="card-body">
                         <form action="/admin/category/push" method="post" enctype="multipart/form-data">
                              <div class="form-group">
                                   <label for="title">Tên danh mục</label>
                                   <input type="text" class="form-control" id="title" name="name" value="<?=$category['name']?>" required>
                              </div>
                              <br>
                              <button name="submit-category" type="submit" class="btn btn-info">Sửa</button>
                         </form>
                </main>