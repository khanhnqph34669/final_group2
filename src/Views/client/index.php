<div class="container_content">
    <div class="productbanner flex mb30">
        <div class="postNews">
            <img class="imagePost" src="../../<?= $newpost['ImageUrl'] ?>" alt="">
            <div class="titlePost">
                <div class="inforPost">
                    <h2 class="title-link"><?= $newpost['Title'] ?></h2>
                    <h3></h3>
                    <p><?= $newpost['Content'] ?></p>
                    <!-- <p>Create At</p> -->
                </div>
            </div>

        </div>
        <div class="bannerphu">
            <div class="slideshow-container">

                <!-- Full-width images with number and caption text -->
                <div class="mySlides fade">
                    <div class="numbertext">1 / 3</div>
                    <img class="imgSlide" src="../../public/img/ip.jpg" >
                </div>

                <div class="mySlides fade">
                    <div class="numbertext">2 / 3</div>
                    <img class="imgSlide" src="../../public/img/fb.jpeg" >
                </div>

                <div class="mySlides fade">
                    <div class="numbertext">3 / 3</div>
                    <img class="imgSlide" src="../../public/img/ai.jpg" >
                </div>

                <!-- Next and previous buttons -->
                <a class="prev" onclick="plusSlides(-1)">&#10094;</a>
                <a class="next" onclick="plusSlides(1)">&#10095;</a>
            </div>
            <br>

            <!-- The dots/circles -->
            <div style="text-align:center">
                <span class="dot" onclick="currentSlide(1)"></span>
                <span class="dot" onclick="currentSlide(2)"></span>
                <span class="dot" onclick="currentSlide(3)"></span>
            </div>
            <div class="nav">
                <ul>
                    <?php foreach ($randomthreecate as $random) : ?>
                        <li class="title-category"><a class="title-link" href="client/category?id=<?= $random['id'] ?>"><?= $random['name'] ?></a></li>
                        <?php foreach ($randompost as $post) : ?>
                            <?php if ($post['categoryPost_id'] == $random['id']) : ?>
                                <a href='client/post/preview?id=<?= $post['Id'] ?>'><?= $post['Title'] ?></a><br>
                            <?php endif; ?>
                        <?php endforeach; ?>
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

                    <a href="client/post/preview?id=<?= $post['Id'] ?>">
                        <figure><img src="../../<?= $post['ImageUrl'] ?>" alt=""></figure>
                    </a>
                    <div class="titleforyou">
                        <h3><?= $post['Title'] ?></h3>
                    </div>
                    <div>
                        <p class="titleforyou"><?= $post['Content'] ?></p>
                        <button><a class="tt-home" href="client/post/preview?id=<?= $post['Id'] ?>">Đọc thêm</a></button>
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
    <?php foreach ($getDiv as $categoryItem) : ?>
        <div class="category mb30">
            <h1 class="space20"><?= $categoryItem['name'] ?></h1>
            <div class="foryou1 flex">
                <?php foreach ($categoryItem['posts'] as $post) : ?>
                    <div class="productforyou">
                        <a href="">
                            <figure><img src="../../../<?= $post['ImageUrl'] ?>" alt=""></figure>
                            <figcaption><a class="tt-home" href="client/post/preview?id=<?= $post['Id'] ?>"><?= $post['Title'] ?></a></figcaption>
                            <div class="content-home">
                                <p><?= $post['Content'] ?></p>
                            </div>
                            <button><a class="tt-home" href="client/post/preview?id=<?= $post['Id'] ?>">Đọc thêm</a></button>
                        </a>
                    </div>
                <?php endforeach; ?>
            </div>

        </div>
    <?php endforeach; ?>

    <style>
        .category {
            margin-bottom: 30px;
            border: 1px solid #ddd;
            border-radius: 8px;
            padding: 15px;
            background-color: #fff;
        }

        .category h1 {
            margin-bottom: 20px;
        }

        .foryou1 {
            display: flex;
            flex-wrap: wrap;
        }

        .productforyou {
            margin-right: 20px;
            margin-bottom: 20px;
            max-width: 300px;
            /* Adjust as needed */
        }

        .productforyou a {
            text-decoration: none;
            color: #333;
        }

        .productforyou figure {
            margin-bottom: 10px;
        }

        figcaption {
            white-space: nowrap;
            overflow: hidden;
            max-width: 100%;
            text-overflow: ellipsis;
            font-weight: bold;
        }

        .content-home {
            white-space: nowrap;
            overflow: hidden;
            max-width: 100%;
            text-overflow: ellipsis;
            padding-bottom: 10px;
        }

        button {
            background-color: #4CAF50;
            color: white;
            border: none;
            padding: 8px 12px;
            border-radius: 5px;
            cursor: pointer;
        }

        button a {
            color: white;
            text-decoration: none;
        }

        button:hover {
            background-color: #45a049;
        }


        * {box-sizing:border-box}

/* Slideshow container */
.slideshow-container {
  max-width: 1000px;
  position: relative;
  margin: auto;
}

/* Hide the images by default */
.mySlides {
  display: none;
}

/* Next & previous buttons */
.prev, .next {
  cursor: pointer;
  position: absolute;
  top: 50%;
  width: auto;
  margin-top: -22px;
  padding: 16px;
  color: white;
  font-weight: bold;
  font-size: 18px;
  transition: 0.6s ease;
  border-radius: 0 3px 3px 0;
  user-select: none;
}

/* Position the "next button" to the right */
.next {
  right: 0;
  border-radius: 3px 0 0 3px;
}

/* On hover, add a black background color with a little bit see-through */
.prev:hover, .next:hover {
  background-color: rgba(0,0,0,0.8);
}

/* Caption text */
.text {
  color: #f2f2f2;
  font-size: 15px;
  padding: 8px 12px;
  position: absolute;
  bottom: 8px;
  width: 100%;
  text-align: center;
}

/* Number text (1/3 etc) */
.numbertext {
  color: #f2f2f2;
  font-size: 12px;
  padding: 8px 12px;
  position: absolute;
  top: 0;
}

/* The dots/bullets/indicators */
.dot {
  cursor: pointer;
  height: 15px;
  width: 15px;
  margin: 0 2px;
  background-color: #bbb;
  border-radius: 50%;
  display: inline-block;
  transition: background-color 0.6s ease;
}

.active, .dot:hover {
  background-color: #717171;
}

/* Fading animation */
.fade {
  animation-name: fade;
  animation-duration: 1.5s;
}

@keyframes fade {
  from {opacity: .4}
  to {opacity: 1}
}   
    </style>
</div>
<script>
    let slideIndex = 0;
showSlides();

function showSlides() {
  let i;
  let slides = document.getElementsByClassName("mySlides");
  for (i = 0; i < slides.length; i++) {
    slides[i].style.display = "none";
  }
  slideIndex++;
  if (slideIndex > slides.length) {slideIndex = 1}
  slides[slideIndex-1].style.display = "block";
  setTimeout(showSlides, 2000); // Change image every 2 seconds
}
</script>