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
                                    
                                    <tbody>
                                        <?php foreach ($lists as $list) : ?>
                                            <tr>
                                                <td><?= $list['Title'] ?></td>
                                                <td><?= $list['Content'] ?></td>
                                            
                                            </tr>
                                        <?php endforeach; ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </main>