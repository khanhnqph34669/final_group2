<div class="main-content">

    <div class="left-post">
        <div class="title">
            <h1><?=$posts['Title']?></h1>
        </div>
        <div class="image">
            <img src="../../<?=$posts['ImageUrl']?>" alt="Đây là ảnh bài viết" class="img-thumbnail">
        </div>
        <div class="content">
            <p><?=$posts['Content']?></p>
        </div>
        <div class="info">
            <p>Người đăng: <?php
                             foreach ($authors as $author) {
                              if($author['Id']==$posts['author_Id']){
                                  echo $author['Name'];
                                     }
                                    }

                                 ?></p>
            <p><?php
                $date = date_create($posts['CreateAt']);
                echo date_format($date, 'd-m-Y');

            ?></p>
        </div>
        <div class="comment-box">
            <?php  
                if(isset($_SESSION['user'])){
                    echo "<div class='input-comment'>
                    <h3>Viết bình luận</h3>
                    <p>".$_SESSION['Name']."</p>
                    <form action='/client/comment' method='post'>
                        <input type='number' hidden name='post_Id' value='".$posts['Id']."'>
                        <input type='number' hidden name='user_Id' value='".$_SESSION['id']."'>
                        <input type='text' name='comment' placeholder='Viết bình luận của bạn...'>
                        <button type='submit' name='btn-submit'>Gửi</button>
                    </form>
                </div>";
                }
                else{
                    echo "<div class='input-comment'>
                    <h3>Viết bình luận</h3>
                    <form action='' method='post'>
                        <input type='hidden' name='post_Id' value='".$posts['Id']."'>
                        <input type='text' name='comment' placeholder='Bạn cần đăng nhập để bình luận...' readonly>
                        <input type='submit' name='submit' value='Gửi'>
                    </form>
                </div>";
                }
            ?>
            <div class="comment-old">
                <?php
                foreach ($comments as $comment) {
                    if($comment['PostId']==$posts['Id']){
                        echo "<p>".$comment['Comment']."</p>";
                    }
                }
                ?>
            </div>
        </div>
    </div>
    <div class="right-post">
        <div class="title">
            <h1>Có thể bạn sẽ quan tâm</h1>
        </div>
        <?php foreach($getRandomPost as $random):?>
        <div class="content">
            <div class="title">
                <h2><?=$random['Title']?></h2>
            </div>
            <div class="image">
                <img src="../../<?=$random['ImageUrl']?>" alt="Đây là ảnh bài viết" class="img-thumbnail-right">
            </div>
            <div class="content-child">
                <p class='right-post-re'></p><?=$random['Content']?></p>
                <button class="btn btn-info"><a class="preview" href="/client/post/preview?id=<?php echo $random['Id']; ?>">Đọc thêm</a></button>
            </div>
        </div>
        <?php endforeach?>
    </div>
</div>

<style>
    .main-content {
        display: grid;
        grid-template-columns: 5% 55% 5% 30% 5%;
        align-items: center;
    }

    .title{
        font-family: 'Roboto', sans-serif;
    }

    .content {
        margin-top: 10px;
        margin-right: 10px;
        margin-left: 10px;
        max-height: fit-content;
    }

    .info{
        margin-right: 10px;
        margin-left: 10px;
    }

    .content-child{
        white-space: nowrap;
  max-width: 50rem;
  overflow: hidden;
    }

    .left-post,
    .right-post {
        margin-top: 20px;
        background-color: #fff;
        border-radius: 10px;


        /* Bạn có thể thêm các quy tắc CSS khác cho .left-post và .right-post nếu cần thiết */
    }

    .right-post .content{
        border: 0.5px solid #ccc;
        padding: 10px;
        
    }

    

    .left-post {
        grid-column: 2; /* Bắt đầu từ cột 1 (60%) */
        height: 1500px;
    }

    .right-post {
        position: relative;
        grid-column: 4; /* Bắt đầu từ cột 3 (30%) */
        height: 1000px;
        margin-top: -480px;
        margin-bottom: 30px;
    }

    .img-thumbnail {
        display: block;
        max-width: 550px;
        margin-left: auto;
        margin-right: auto;
    }

    .img-thumbnail-right{
        max-width: 500px;
        padding: 5px;
    }

    /* Phần Bình luận */
    .comment-box {
        margin-top: 20px;
    }

    .input-comment {
        background-color: #f0f2f5;
        padding: 10px;
        border-radius: 8px;
    }

    .input-comment h3 {
        font-size: 16px;
        margin-bottom: 10px;
    }

    .input-comment input[type="text"] {
        width: 100%;
        padding: 8px;
        border: 1px solid #ccc;
        border-radius: 4px;
        margin-bottom: 10px;
        box-sizing: border-box;
    }

    .input-comment input[type="submit"] {
        background-color: #1877f2;
        color: #fff;
        padding: 8px 15px;
        border: none;
        border-radius: 4px;
        cursor: pointer;
    }

    .input-comment input[type="submit"]:hover {
        background-color: #0e5aaf;
    }

    .comment-old p {
        background-color: #f0f2f5;
        padding: 10px;
        border-radius: 8px;
        margin-bottom: 10px;
    }

    /* Thêm các quy tắc CSS khác nếu cần thiết */





</style>