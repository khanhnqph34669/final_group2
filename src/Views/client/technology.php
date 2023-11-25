<div class="container-tintuc">
    <div class="noidungtt">
        <div class="tinchinh space20">
            <?php foreach ($posts as $post) : ?>

                <a href="/client/chitiet">
                    <div class="tin tintin space20">
                        <img class="imgNews" src="../<?= $post['ImageUrl'] ?>" alt="">

                        <div class="tieude">
                            <h3><?= $post['Title'] ?></h3>
                            <p><?= $post['Content'] ?></p>
                            <p>...</p>
                            <a href="/client/post/preview?id=<?= $post['Id'] ?>" class="btn btn-info space20">Xem trước</a>
                        </div>
                    </div>
                </a>

            <?php endforeach ?>
        </div>
        <div class="alltinphu">
            <div class="tinphu space20">
                <h2>Tin Tức 1</h2>
                <a href="">
                    <div class="tinphu tin space20">
                        <img class="imgNews1" src="../src/Views/components/layout/client/img/image1.png" alt="">
                        <div class="tieude">
                            <h5>Không cần mang theo giấy phép lái xe, đăng ký xe…nếu đã được tích hợp vào Thẻ căn cước</h5>
                            <p>Ngày 20/11/2023</p>
                        </div>
                    </div>
                </a>
            </div>



        </div>

    </div>
    <h2 class="space20">Tin Liên Quan</h2>
    <div class="tinlienquan">
        <a href="">
            <div class="tinlienquan1 space20">
                <div class=" space20">
                    <img class="imgNews" src="../src/Views/components/layout/client/img/image1.png" alt="">
                    <div class="tieude1">
                        <p>Không cần mang theo giấy phép lái xe, đăng ký xe…nếu đã được tích hợp vào Thẻ căn cước</p>
                    </div>
                </div>

            </div>
        </a>

    </div>
</div>