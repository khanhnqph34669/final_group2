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
                                            <th>Tác giả</th>

                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php foreach ($posts as $post) : ?>
                                            <tr>
                                                <td><?= $post['Title'] ?></td>
                                                <td><?= $post['Content'] ?></td>
                                                <td><?= $post['ViewCount'] ?></td>
                                                <td><?= $post['AuthorId'] ?></td>
                                            </tr>
                                        <?php endforeach; ?>
                                    </tbody>
                                    <tfoot>
                                        <tr>
                                            <th>Tiêu đề</th>
                                            <th>Nội dung</th>
                                            <th>Lượt xem</th>
                                            <th>Tác giả</th>
                                        </tr>
                                    </tfoot>
                                </table>
                            </div>
                        </div>
                    </div> 
                </main>