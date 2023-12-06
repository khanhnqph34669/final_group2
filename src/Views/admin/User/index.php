</div>
<div id="layoutSidenav_content">
    <main>
    <div class="container-fluid px-4">
               <h1 class="mt-4">Danh sách User </h1>
               <ol class="breadcrumb mb-4">
                    <li class="breadcrumb-item"><a href="/admin">Dashboard</a></li>
                    <li class="breadcrumb-item active">Danh sách User</li>
               </ol> 
                      <div class="card-body">
                             <a href="/admin/user/create" class="btn btn-success">Thêm người dùng mới</a>
                      </div>
                      <hr>
        <div class="card mb-4">
            <div class="card-header">
                <i class="fas fa-table me-1"></i>
                Thống kê bài viết
            </div>
            <div class="card-body">
                <table id="datatablesSimple">
                    <thead>
                        <tr>
                            <th>Id người dùng</th>
                            <th>Tên người dùng</th>
                            <th>Hành động</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($users as $user) : ?>
                            <?php if($user['roles_id']!=1):?>
                            <tr>
                                <td><?= $user['Id'] ?></td>
                                <td><?= $user['Name'] ?></td>
                                <td>
                                    <a href="/admin/user/edit?id=<?= $user['Id'] ?>" class="btn btn-sm btn-primary">Sửa</a>
                                    <button class="btn btn-sm btn-danger" onclick="confirmDelete(<?= $user['Id'] ?>)">Xoá</button>
                                </td>
                            </tr>
                            <?php endif; ?>
                        <?php endforeach; ?>
                    </tbody>
                    <tfoot>
                        <tr>
                            <td>Id người dùng</td>
                            <th>Tên người dùng</th>
                            <th>Hành động</th>
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
                title: 'Bạn chắc chắn muốn xoá người dùng này',
                text: 'Hành động này sẽ xoá vĩnh viễn người dùng và họ sẽ không thể đăng nhập tài khoản này.',
                icon: 'warning',
                showCancelButton: true,
                confirmButtonText: 'Đồng ý',
                cancelButtonText: 'Huỷ',
            }).then((result) => {
                if (result.isConfirmed) {
                    // Nếu người dùng đồng ý, chuyển đến đường dẫn xoá bài viết
                    window.location.href = '/admin/user/delete?id=' + postId;
                }
            });
        }

    //     function confirmReject(postId) {
    //     // Lấy danh sách các lý do từ chối, có thể lấy từ server hoặc cung cấp sẵn
    //     const rejectReasons = ['Phản cảm', 'Không phù hợp', 'Sai sự thật', 'Bài viết không đúng chủ đề', 'Khác'];

    //     // Hiển thị prompt của Swal để chọn lý do từ chối
    //     Swal.fire({
    //         title: 'Bạn chắc chắn muốn từ chối bài viết?',
    //         text: 'Chọn lý do từ chối:',
    //         input: 'select',
    //         inputOptions: Object.fromEntries(rejectReasons.map(reason => [reason, reason])),
    //         inputPlaceholder: 'Chọn lý do',
    //         showCancelButton: true,
    //         confirmButtonText: 'Từ chối',
    //         cancelButtonText: 'Huỷ',
    //         showLoaderOnConfirm: true,
    //         preConfirm: (rejectReason) => {
    //             // Nếu lựa chọn là "Khác", hiển thị input để nhập lý do
    //             if (rejectReason === 'Khác') {
    //                 return Swal.fire({
    //                     title: 'Nhập lý do từ chối:',
    //                     input: 'text',
    //                     showCancelButton: true,
    //                     confirmButtonText: 'Từ chối',
    //                     cancelButtonText: 'Huỷ',
    //                     showLoaderOnConfirm: true,
    //                     preConfirm: (customReason) => {
    //                         // Gửi lý do từ chối điều này đến server
    //                         window.location.href = `/admin/post/reject?id=${postId}&reason=${customReason}`;
    //                     },
    //                     allowOutsideClick: () => !Swal.isLoading()
    //                 });
    //             } else if (rejectReason) {
    //                 // Nếu có lựa chọn khác và không phải là "Khác", chuyển hướng đến đường dẫn /admin/post/reject
    //                 window.location.href = `/admin/post/reject?id=${postId}&reason=${rejectReason}`;
    //             }
    //         },
    //         allowOutsideClick: () => !Swal.isLoading()
    //     });
    // }
</script>