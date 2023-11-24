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
                                <th>Tên danh mục</th>
                                <th>Thao tác</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($categories as $category) : ?>
                                <tr>
                                    <td><?= $category['name'] ?></td>

                                    <td>
                                        <a href="/admin/category/edit?id=<?= $category['id'] ?>" class="btn btn-primary">Sửa</a>
                                        <button onclick="confirmDelete(<?= $category['id'] ?>,
                                            <?php
                                                if (isset($checkPosts[$category['id']])) {
                                                    echo $checkPosts[$category['id']];
                                                } else {
                                                    echo 0;
                                                }
                                            
                                            ?>
                                        )" class="btn btn-danger">Xóa</button>
                                    </td>

                                </tr>
                            <?php endforeach; ?>

                        </tbody>
                        <tfoot>
                            <tr>
                                <th>Tên danh mục</th>
                                <th>Thao tác</th>
                            </tr>
                        </tfoot>
                    </table>
                </div>
            </div>
    </div>
    </main>

    <script>
        function confirmDelete(id, checkPosts) {
    var postCounts = JSON.parse(checkPosts);

    // Access the post count for the specific category ID
    var postCount = postCounts;

    if (postCount > 0) {
        Swal.fire({
            title: 'Không thể xoá',
            text: 'Có bài viết trong danh mục này. Không thể xoá.',
            icon: 'error',
            confirmButtonText: 'Đóng',
        });
    } else {
        Swal.fire({
            title: 'Bạn chắc chắn muốn xoá danh mục?',
            text: 'Hành động này sẽ xoá vĩnh viễn danh mục.',
            icon: 'wanring',
            showCancelButton: true,
            confirmButtonText: 'Đồng ý',
            cancelButtonText: 'Huỷ',
        }).then((result) => {
            if (result.isConfirmed) {
                window.location.href = '/admin/category/delete?id=' + id;
            }
        });
    }
}

    </script>