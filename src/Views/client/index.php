<div class="container_content">
    <div class="productbanner flex mb30">
        <div class="postNews">
            <img class="imagePost" src="../../<?= $newpost['ImageUrl'] ?>" alt="">
            <div class="titlePost">
                <h1><?= $newpost['Title'] ?></h1>
                <br>
                <div class="inforPost">
                    <p><?= $newpost['Content'] ?></p>
                    <p>Create At</p>
                </div>
            </div>

        </div>
        <div class="bannerphu">
            <img src="src/Views/components/layout/client/img/banner1.png" alt="">
            <div class="nav">
                <ul>
                    <?php foreach ($randomthreecate as $random) : ?>
                        <li class="title-category"><a class="title-link" href="client/category?id=<?=$random['id']?>" ><?= $random['name'] ?></a></a></li>
                        <p>Artile name new post</p>

                    <?php endforeach; ?>

                </ul>
            </div>
        </div>
    </div>
    <h1 class="space20">For you</h1>
    <div class="foryou mb30">
        <div class="foryou1 flex">
            <?php foreach ($randompost as $post) : ?>
                <div class="productforyou">

                    <a href="client/post/preview?id=<?=$post['Id']?>">
                        <figure><img src="../../<?= $post['ImageUrl'] ?>" alt=""></figure>
                    </a>
                    <div class="titleforyou">
                        <h3><?= $post['Title'] ?></h3>
                    </div>
                    <div>
                        <p class="titleforyou"><?= $post['Content'] ?></p>
                        <p>Create At</p>
                    </div>
                </div>
            <?php endforeach; ?>
            <form action="" method="post">
                <img class="ml40" src="../src/Views/components/layout/client/img/group220.png" alt="">
                <div class="subscribe ml20">
                    <h4>Subscribe</h4>
                    <p>Please follow us</p>
                </div>
                <input class="ml20 email space20" type="email" placeholder="Input Email Address" required>
                <input type="submit" class="ml20 sbbutton space20" value="Button Subcribe">

            </form>
        </div>

    </div>
    <div class="category mb30">
        <h1 class="space20">Category name</h1>
        <div class="foryou1 flex">
            <div class="productforyou">
                <a href="">
                    <figure><img src="src/Views/components/layout/client/img/product1.png" alt=""></figure>
                    <figcaption>Article name</figcaption>
                </a>
            </div>
            <div class="productforyou">
                <a href="">
                    <figure><img src="src/Views/components/layout/client/img/product1.png" alt=""></figure>
                    <figcaption>Article name</figcaption>
                </a>
            </div>
            <div class="productforyou">
                <a href="">
                    <figure><img src="src/Views/components/layout/client/img/product1.png" alt=""></figure>
                    <figcaption>Article name</figcaption>
                </a>
            </div>
            <div class="productforyou">
                <a href="">
                    <figure><img src="src/Views/components/layout/client/img/product1.png" alt=""></figure>
                    <figcaption>Article name</figcaption>
                </a>
            </div>
        </div>

    </div>
    <div class="category mb30">
        <h1 class="space20">Category name</h1>
        <div class="foryou1 flex">
            <div class="productforyou">
                <a href="">
                    <figure><img src="src/Views/components/layout/client/img/product1.png" alt=""></figure>
                    <figcaption>Article name</figcaption>
                </a>
            </div>
            <div class="productforyou">
                <a href="">
                    <figure><img src="src/Views/components/layout/client/img/product1.png" alt=""></figure>
                    <figcaption>Article name</figcaption>
                </a>
            </div>
            <div class="productforyou">
                <a href="">
                    <figure><img src="src/Views/components/layout/client/img/product1.png" alt=""></figure>
                    <figcaption>Article name</figcaption>
                </a>
            </div>
            <div class="productforyou">
                <a href="">
                    <figure><img src="src/Views/components/layout/client/img/product1.png" alt=""></figure>
                    <figcaption>Article name</figcaption>
                </a>
            </div>
        </div>

    </div>

</div>