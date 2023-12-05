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
                                            <th>Ảnh</th>
                                            <th>Danh mục</th>
                                            <th>Thời gian tạo</th>
                                            <th>Trạng thái</th>
                                            <th>Lý do từ chối</th>
                                            <th>Hành động</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php foreach ($posts as $post) : ?>
                                            <?php if($post['author_Id']==$_SESSION['id'] && $post['Status'] == 1 ) : ?>
                                            <tr>
                                                 <td><?= $post['Id'] ?></td>
                                                <td><?= $post['Title'] ?></td>
                                                <td><img class="img-thumbnail-cr"src="../<?=$post['ImageUrl']?>" alt=""></td>
                                                <td><?php
                                                    foreach ($categories as $category) {
                                                        if($category['id']==$post['categoryPost_id']){
                                                            echo $category['name'];
                                                        }
                                                    }
                                                    ?></td>
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
                                                <td><?= $post['RejectContent'] ?></td>
                                                <td>
                                                    <button type="button" class="btn btn-danger btn-sm" onclick="confirmDelete(<?= $post['Id'] ?>)">Xoá</button>
                                                    <a href="/author/post/update?id=<?= $post['Id'] ?>"><button type="button" class="btn btn-primary btn-sm">Sửa</button></a>
                                                    
                                                </td>
                                            </tr>
                                            <?php endif; ?>
                                        <?php endforeach; ?>
                                    </tbody>
                                    <tfoot>
                                        <tr>
                                            <th>STT</th>
                                            <th>Tiêu đề</th>
                                            <th>Ảnh</th>
                                            <th>Danh mục</th>
                                            <th>Thời gian tạo</th>
                                            <th>Trạng thái</th>
                                            <th>Lý do từ chối</th>
                                            <th></th>
                                        </tr>
                                    </tfoot>
                                </table>
                            </div>
                        </div>
                    </div> 
                </main>
<script>
    function confirmDelete(postId) {
        Swal.fire({
            title: 'Bạn chắc chắn muốn xoá bài viết?',
            text: 'Hành động này sẽ xoá vĩnh viễn bài viết.',
            icon: 'warning',
            showCancelButton: true,
            confirmButtonText: 'Đồng ý',
            cancelButtonText: 'Huỷ',
        }).then((result) => {
            if (result.isConfirmed) {
                // Nếu người dùng đồng ý, chuyển đến đường dẫn xoá bài viết
                window.location.href = '/author/post/delete?id=' + postId;
            }
        });
    }
</script>
