</div>
            <div id="layoutSidenav_content">
                <main>
                <div class="container-fluid px-4">
               <h1 class="mt-4">Danh sách bài viết </h1>
               <ol class="breadcrumb mb-4">
                    <li class="breadcrumb-item"><a href="/admin">Dashboard</a></li>
                    <li class="breadcrumb-item active">Danh sách bài viết</li>
               </ol> 
                      <div class="card-body">
                             <a href="/admin/post/create" class="btn btn-success">Yêu cầu làm tác giả</a>
                      </div>
                      <hr>
                <div class="card mb-4">
                            <div class="card-header">
                                <i class="fas fa-table me-1"></i>
                                Yêu cầu làm tác giả
                            </div>
                            <div class="card-body">
                                <table id="datatablesSimple">
                                    <thead>
                                        <tr>
                                            <th>Id</th>
                                            <th>Name</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php foreach ($users as $user) : ?>
                                            <tr>
                                                <td><?=$user['Id'] ?></td>
                                                <td><?=$user['Name'] ?></td>
                                                <td>
                                                    <a href="/admin/requests/accept?id=<?=$user['Id']?>" class="btn btn-success">Duyệt</a>
                                                    <a href="/admin/requests/reject?id=<?=$user['Id']?>" class="btn btn-danger">Từ chối</a>
                                                    <a href="../../public/uploads/<?=$user['PathPortFolio']?>" download>Xem hồ sơ</a>
                                                </td>
                                            </tr>
                                        <?php endforeach; ?>
                                       
                                    </tbody>
                                    <tfoot>
                                        <tr>
                                            <th>Id</th>
                                            <th>Name</th>
                                            <th>Action</th>
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
