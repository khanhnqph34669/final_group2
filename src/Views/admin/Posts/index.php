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
                                            
                                            <th>Status</th>
                                            <th>Thao tác</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php foreach ($posts as $post) : ?>
                                            <tr>
                                                <td><?= $post['Title'] ?></td>
                                                <td><?= $post['Content'] ?></td>
                                                <td><?= $post['ViewCount'] ?></td>
                                                <td><?= $post['author_Id'] ?></td>
                                               
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
                                                    <a href="/admin/post/edit/<?= $post['Id'] ?>" class="btn btn-primary">Sửa</a>
                                                    <a href="/admin/post/delete/<?= $post['Id'] ?>" class="btn btn-danger">Xóa</a>
                                                    <?php
                                                        if($post['Status']==2){
                                                            echo '<a href="/admin/post/accept/<?= $post[\'Id\'] ?>" class="btn btn-success">Duyệt</a>';
                                                        }
                                                    ?>
                                                </td>
                                            </tr>
                                        <?php endforeach; ?>
                                    </tbody>
                                    <tfoot>
                                        <tr>
                                            <th>Tiêu đề</th>
                                            <th>Nội dung</th>
                                            <th>Lượt xem</th>
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