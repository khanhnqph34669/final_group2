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
                                        </tr>
                                    </thead>
                                    <tfoot>
                                        <tr>
                                            <th>Tiêu đề</th>
                                
                                            <th>Nội dung</th>
                                        </tr>
                                    </tfoot>
                                    <tbody>
                                        <?php foreach ($posts as $post) : ?>
                                            <tr>
                                                <td><?= $post['Title'] ?></td>
                                                <td><?= $post['Content'] ?></td>
                                                
                                            
                                            </tr>
                                        <?php endforeach; ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </main>