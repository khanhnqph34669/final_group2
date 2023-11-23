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
                                            <th>Tiêu đề</th>
                                            <th>Nội dung</th>
                                            <th>Lượt xem</th>
                                            <th>Ảnh bìa</th>
                                            <th>Tác giả</th>
                                            <th>Status</th>
                                            <th>Thao tác</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php foreach ($posts as $post) : ?>
                                            <tr>
                                                <td class="we"><?=$post['Title'] ?></td>
                                                <td><?= $post['Content'] ?></td>
                                                <td><?= $post['ViewCount'] ?></td>
                                                <td><img class="img-thumbnail-cr"src="../<?=$post['ImageUrl']?>" alt=""></td>
                                                <td><?php 
                                                    foreach ($authors as $author) {
                                                        if($author['Id']==$post['author_Id']){
                                                            echo $author['Name'];
                                                        }
                                                    } 
                                                
                                                ?></td>
                                               
                                                <td><?php
                                                    if($post['Status']==3){
                                                        echo 'Đã duyệt';
                                                    }else if($post['Status']==2){
                                                        echo 'Chờ duyệt';
                                                    }else{
                                                        echo 'Từ chối';
                                                    }
                                                    ?>
                                                </td>
                                                <td>
                                                <?php
                                                <?php
                                                        if($post['Status']==2){
                                                            echo '<a href="/admin/post/accept?id=' . $post['Id'] . '" class="btn btn-success">Duyệt</a>';
                                                            echo '<button onclick="confirmReject('. $post['Id'] .')" class="btn btn-danger">Từ chối</button>';
                                                            echo '<a href="/client/post/preview?id=' . $post['Id'] . '" class="btn btn-info" target="_blank">Xem trước</a>';
                                                        }
                                                        else{
                                                            echo '<a href="/admin/post/edit?id=' . $post['Id'] . '" class="btn btn-primary">Sửa</a>';
                                                            echo '<button onclick="confirmDelete('. $post['Id'] .')" class="btn btn-danger">Xóa</button>';
                                                        }
                                                    ?>
                                                    <!-- <a href="/admin/post/edit?id=<?= $post['Id'] ?>" class="btn btn-primary">Sửa</a>
                                                    <a href="/admin/post/delete/<?= $post['Id'] ?>" class="btn btn-danger">Xóa</a> -->
                                                    
                                                </td>
                                            </tr>
                                            
                                        <?php endforeach; ?>
                                       
                                    </tbody>
                                    <tfoot>
                                        <tr>
                                            <th>Tiêu đề</th>
                                            <th>Nội dung</th>
                                            <th>Lượt xem</th>
                                            <th>Ảnh bìa</th>
                                            <th>Tác giả</th>
                                            <th>Status</th>
                                            <th>Thao tác</th>
                                        </tr>
                                    </tfoot>
                                </table>
                            </div>
                        </div>
                    </div> 
                </main>

                <script>
    // Hàm hiển thị thông báo xác nhận
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
                window.location.href = '/admin/post/delete?id=' + postId;
            }
        });
    }

    function confirmReject(postId) {
    // Lấy danh sách các lý do từ chối, có thể lấy từ server hoặc cung cấp sẵn
    const rejectReasons = ['Phản cảm', 'Không phù hợp', 'Sai sự thật', 'Bài viết không đúng chủ đề', 'Khác'];

    // Hiển thị prompt của Swal để chọn lý do từ chối
    Swal.fire({
        title: 'Bạn chắc chắn muốn từ chối bài viết?',
        text: 'Chọn lý do từ chối:',
        input: 'select',
        inputOptions: Object.fromEntries(rejectReasons.map(reason => [reason, reason])),
        inputPlaceholder: 'Chọn lý do',
        showCancelButton: true,
        confirmButtonText: 'Từ chối',
        cancelButtonText: 'Huỷ',
        showLoaderOnConfirm: true,
        preConfirm: (rejectReason) => {
            // Nếu lựa chọn là "Khác", hiển thị input để nhập lý do
            if (rejectReason === 'Khác') {
                return Swal.fire({
                    title: 'Nhập lý do từ chối:',
                    input: 'text',
                    showCancelButton: true,
                    confirmButtonText: 'Từ chối',
                    cancelButtonText: 'Huỷ',
                    showLoaderOnConfirm: true,
                    preConfirm: (customReason) => {
                        // Gửi lý do từ chối điều này đến server
                        window.location.href = `/admin/post/reject?id=${postId}&reason=${customReason}`;
                    },
                    allowOutsideClick: () => !Swal.isLoading()
                });
            } else if (rejectReason) {
                // Nếu có lựa chọn khác và không phải là "Khác", chuyển hướng đến đường dẫn /admin/post/reject
                window.location.href = `/admin/post/reject?id=${postId}&reason=${rejectReason}`;
            }
        },
        allowOutsideClick: () => !Swal.isLoading()
    });
}


</script>
