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
                                            <th>Lượt xem</th>
                                            <th>Thời gian tạo</th>
                                            <th>Trạng thái</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php foreach ($posts as $post) : ?>
                                            <tr>
                                                <td><?= $post['Id'] ?></td>
                                                <td><?= $post['Title'] ?></td>
                                                <td><?= $post['Content'] ?></td>
                                                <td><?= $post['ViewCount'] ?></td>
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

                                            </tr>
                                        <?php endforeach; ?>
                                    </tbody>
                                    <tfoot>
                                        <tr>
                                        <th>STT</th>
                                            <th>Tiêu đề</th>
                                            <th>Nội dung</th>
                                            <th>Lượt xem</th>
                                            <th>Thời gian tạo</th>
                                            <th>Trạng thái</th>
                                            </tr>
                                    </tfoot>
                                </table>
                            </div>
                        </div>
                    </div> 
                </main>