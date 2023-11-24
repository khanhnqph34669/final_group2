</div>
            <div id="layoutSidenav_content">
                <main>
                <div class="card mb-4">
                            <div class="card-header">
                                <i class="fas fa-table me-1"></i>
                                Thống kê bài viết
                            </div>
                            <div class="card-body">
                                <table id="datatablesSimple">
                                    <thead>
                                        <tr>
                                            <th>STT</th>
                                            <th>Tiêu đề</th>
                                            <th>Nội dung</th>
                                            <th>Ảnh</th>
                                            <th>Thời gian tạo</th>
                                            <th>Trạng thái</th>
                                            <th></th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php foreach ($posts as $post) : ?>
                                            <tr>
                                            <?php if($post['author_Id']==$_SESSION['id']) : ?>
                                                <td><?= $post['Id'] ?></td>
                                                <td><?= $post['Title'] ?></td>
                                                <td><?= $post['Content'] ?></td>
                                                <td><img class="img-thumbnail-cr"src="../<?=$post['ImageUrl']?>" alt=""></td>
                                                <td><?= $post['CreateAt'] ?></td>
                                                <td>
                                                    <?php
                                                    if($post['Status'] == 3) {
                                                        echo 'Đã duyệt';
                                                    } else if($post['Status'] == 2) {
                                                        echo 'Chờ duyệt';
                                                    } else{
                                                        echo 'Từ chối';
                                                    }
                                                    ?>
                                                </td>
                                                <td>
                                                    <form action="/author/post/delete?id=<?= $post['Id'] ?>" method="post">
                                                        <button type="submit" onclick="return confirm('Bạn có chắc chắn xóa?');" class="btn btn-danger btn-sm">Xóa</button>
                                                    </form>
                                                    <a href="/author/post/update?id=<?= $post['Id'] ?>"><button type="button" class="btn btn-primary btn-sm">Sửa</button></a>
                                                </td>
                                            <?php endif; ?>
                                            </tr>
                                        <?php endforeach; ?>
                                    </tbody>
                                    <tfoot>
                                        <tr>
                                            <th>STT</th>
                                            <th>Tiêu đề</th>
                                            <th>Nội dung</th>
                                            <th>Ảnh</th>
                                            <th>Thời gian tạo</th>
                                            <th>Trạng thái</th>
                                            <th></th>
                                        </tr>
                                    </tfoot>
                                </table>
                            </div>
                        </div>
                    </div> 
                </main>