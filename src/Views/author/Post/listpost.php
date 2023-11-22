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
                                            <th>Thời gian tạo</th>
                                            <th>Trạng thái</th>
                                            <th></th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php foreach ($posts as $post) : ?>
                                            <tr>
                                                <td><?= $post['Id'] ?></td>
                                                <td><?= $post['Title'] ?></td>
                                                <td><?= $post['Content'] ?></td>
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
                                                    <a href="#">Xóa</a>
                                                    <a href="#">Sửa</a>
                                                </td>

                                            </tr>
                                        <?php endforeach; ?>
                                    </tbody>
                                    <tfoot>
                                        <tr>
                                            <th>STT</th>
                                            <th>Tiêu đề</th>
                                            <th>Nội dung</th>
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