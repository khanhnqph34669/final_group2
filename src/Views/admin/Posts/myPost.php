</div>
            <div id="layoutSidenav_content">
                <main>
                <div class="container-fluid px-4">
            <h1 class="mt-4">Bài viết của bạn</h1>
            <ol class="breadcrumb mb-4">
                <li class="breadcrumb-item"><a href="/admin">Dashboard</a></li>
                <li class="breadcrumb-item active">Bài viết của bạn</li>
            </ol>
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
                                                <td><img class="img-thumbnail-cr"src="../../<?=$post['ImageUrl']?>" alt=""></td>
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
                                                        if($post['Status']==2){
                                                            echo '<a href="/admin/post/accept?id=' . $post['Id'] . '" class="btn btn-success">Duyệt</a>';
                                                            echo '<a href="/admin/post/reject?id=' . $post['Id'] . '" class="btn btn-danger">Từ chối</a>';
                                                            echo '<a href="/client/post/preview?id=' . $post['Id'] . '" class="btn btn-info" target="_blank">Xem trước</a>';
                                                        }
                                                        else{
                                                            echo '<a href="/admin/post/edit?id=' . $post['Id'] . '" class="btn btn-primary">Sửa</a>';
                                                            echo '<a href="/admin/mypost/delete?id=' . $post['Id'] . '" class="btn btn-danger">Xóa</a>';
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