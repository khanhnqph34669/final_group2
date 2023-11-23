</div>
            <div id="layoutSidenav_content">
        <div class="container-fluid px-4">
            <h1 class="mt-4">Cập Nhật Bài Viết</h1>
            <ol class="breadcrumb mb-4">
                <li class="breadcrumb-item"><a href="/admin">Dashboard</a></li>
                <li class="breadcrumb-item active">Cập Nhật Bài Viết</li>
            </ol>
            <div class="card mb-4">
                <div class="card-body">
                    <form action="" method="post" enctype="multipart/form-data">
                        <div class="form-group">
                            <label for="title">Tiêu đề</label>
                            <input type="text" class="form-control" id="title" name="title" value="<?= $posts['Title'] ?>" placeholder="Tiêu đề bài viết">
                        </div>
                        <br>
                        <div class="form-group">
                            <label for="content">Nội dung</label>
                            <textarea class="form-control" id="content" name="content" rows="3"><?= $posts['Content'] ?></textarea>
                        </div>
                        <br>
                        <div class="form-group">
                            <label for="image">Ảnh bìa</label>
                            <input type="file" class="form-control" id="image" name="image">
                            <label for="">Ảnh bìa hiện tại</label>
                            <input type="hidden" name="img_current" id="img_current" class="form-control" value="<?= $posts['ImageUrl'] ?>">
                            <td><img class="img-thumbnail-cr"src="../../<?=$posts['ImageUrl']?>" alt="Ảnh bìa hiện tại" style="margin: 20px;"></td>
                        </div>
                        <div class="form-group">
                            <label for="category">Danh mục bài viết</label>
                            <select class="form-control" id="category" name="category">
                            <?php foreach ($categories as $category) : ?>
                                             <option value="<?= $category['id'] ?>"><?= $category['name'] ?></option>
                             <?php endforeach; ?>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="author">Tác giả</label>
                            <?php
                                foreach ($authors as $author) {
                                    if ($author['Id'] == $posts['author_Id']) {
                                        $authors = $author;
                                    }
                                }
                            ?>
                            <input type="text" class="form-control" value="<?= $authors['Name'] ?>" readonly>
                            <input type="number" name="author" hidden value="<?= $authors['Id'] ?>">
                        </div>
                        <input type="hidden" name="post_id" value="<?= $post['Id'] ?>">
                        <br>
                        <button type="submit" name="submit-update" class="btn btn-primary">Cập Nhật Bài Viết</button>
                    </form>
                </div>
            </div>
        </div>
    </main>

