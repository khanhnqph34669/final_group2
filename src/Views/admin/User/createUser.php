</div>

<div id="layoutSidenav_content">
     <main>
          <div class="container-fluid px-4">
               <h1 class="mt-4">Thêm người dùng mới</h1>
               <ol class="breadcrumb mb-4">
                    <li class="breadcrumb-item"><a href="/admin">Dashboard</a></li>
                    <li class="breadcrumb-item active">Thêm người dùng mới</li>
               </ol>
               <div class="card mb-4">
                    <div class="card-body">
                         <form action="/admin/post/push" method="post" enctype="multipart/form-data">
                              <div class="form-group">
                                   <label for="title">Name</label>
                                   <input type="text" class="form-control" id="title" name="title" placeholder="Nhập tên người dùng" required>
                              </div>
                              <div class="form-group">
                                   <label for="title">Email</label>
                                   <input type="text" class="form-control" id="title" name="title" placeholder="Nhập tên người dùng" required>
                              </div>
                              <div class="form-group">
                                   <label for="title">Phone</label>
                                   <input type="text" class="form-control" id="title" name="title" placeholder="Nhập tên người dùng" required>
                              </div>
                              <div class="form-group">
                                   <label for="title">Passwords</label>
                                   <input type="password" class="form-control" id="title" name="title" placeholder="Nhập tên người dùng" required>
                              </div>
                              <div class="form-group">
                            <label for="category">Chỉ định phân quyền</label>
                            <select class="form-control" id="category" name="category">
                            <?php foreach($roles as $role): ?>
                                      <option value="<?= $role['Id'] ?>"><?= $role['roles_name'] ?></option>    
                                <?php endforeach?>
                            </select>
                            </div>
                              <br>
                              
                              <button type="submit" name="submit-post" class="btn btn-primary">Thêm bài viết</button>
                         </form>
     </main>