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
                </main>