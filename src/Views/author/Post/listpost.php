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
                                            <th>Ngày tạo</th>
                                            <th>Trạng thái</th>
                                            <th></th>
                                            <th></th>

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
                                                <td><?= $post['Status'] ?></td>
                                                <td><a href="update">Sửa lại</a></td>
                                                <td><a href="#">Xóa bài</a></td>

                                            </tr>
                                        <?php endforeach; ?>
                                    </tbody>
                                    <tfoot>
                                        <tr>
                                        <th>STT</th>
                                            <th>Tiêu đề</th>
                                            <th>Nội dung</th>
                                            <th>Lượt xem</th>
                                            <th>Ngày tạo</th>
                                            <th>Trạng thái</th>
                                            <th></th>
                                            <th></th>
                                        </tr>
                                    </tfoot>
                                </table>
                            </div>
                        </div>
                    </div> 
                </main>