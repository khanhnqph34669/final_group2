<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>TechNews<?php
    if(isset($category['name'])){
        echo ' - '.$category['name'];
    }

    ?></title>
    <link rel="icon" type="image/x-icon" href="../../public/img/favicon.ico">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">


    <!-- Favicon -->
    <link href="img/favicon.ico" rel="icon">

    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:400,600,700&display=swap" rel="stylesheet">

    <!-- CSS Libraries -->
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"
            integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL"
            crossorigin="anonymous"></script>
    <link href="../../src/Views/components/layout/client/lib/slick/slick.css" rel="stylesheet">
    <link href="../../src/Views/components/layout/client/lib/slick/slick-theme.css" rel="stylesheet">

    <!-- Template Stylesheet -->
    <link href="../../src/Views/components/CSS/CssClient/css/style.css" rel="stylesheet">
</head>

<body>
<!-- Top Header Start -->
<div class="top-header">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-lg-3 col-md-4">
                <div class="logo">
                    <a href="">
                        <img src="../../src/Views/components/layout/client/img/logoweb.png" alt="Logo">
                    </a>
                </div>
            </div>
            <div class="col-lg-6 col-md-4">
                <div class="search">
                    <input type="text" placeholder="Search">
                    <button><i class="fa fa-search"></i></button>
                </div>
            </div>
            <div class="col-lg-3 col-md-4">
                <div class="social">
                    <a href=""><i class="fab fa-twitter"></i></a>
                    <a href=""><i class="fab fa-facebook"></i></a>
                    <a href=""><i class="fab fa-linkedin"></i></a>
                    <a href=""><i class="fab fa-instagram"></i></a>
                    <a href=""><i class="fab fa-youtube"></i></a>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Top Header End -->


<!-- Header Start -->
<div class="header">
    <div class="container">
        <nav class="navbar navbar-expand-md bg-dark navbar-dark">
            <a href="#" class="navbar-brand">MENU</a>
            <button type="button" class="navbar-toggler" data-toggle="collapse" data-target="#navbarCollapse">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse justify-content-between" id="navbarCollapse">
                <div class="navbar-nav m-auto">
                    <a href="/" class="nav-item nav-link">Home</a>
                    <?php
                        foreach ($data['categories'] as $category) {
                            echo '<a href="/client/category?id=' . $category['id'] . '" class="nav-item nav-link" data-id="' . $category['id'] . '">
                    ' . $category['name'] . '</a>';
                    }
                    ?>
                    <a href="/client/contact" class="nav-item nav-link">Contact</a>

                </div>

            </div>
            <div class="das">
                <?php
                    if (isset($_SESSION['user'])) {
                        if ($_SESSION['roles'] == 1) {
                            echo '<p class="name-user">' . $_SESSION['Name'] . '</p>';
                echo '
                <div class="dropdown">';
                    echo '
                    <button class="btn btn-outline-light ml-auto dropdown-toggle tro" type="button" id="userDropdown"
                            data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">';
                        echo '';
                        echo '
                    </button>
                    ';
                    echo '
                    <div class="dropdown-menu" aria-labelledby="userDropdown">';
                        echo '<a href="/admin" class="btn btn-outline-light ml-auto mgr-10 dropdown-item">Dashboard</a>';
                        echo '<a href="/logout" class="btn btn-outline-light ml-auto dropdown-item">Logout</a>';
                        echo '
                    </div>
                    ';
                    echo '
                </div>
                ';
                } else if ($_SESSION['roles'] == 2) {

                echo '<p class="name-user">' . $_SESSION['Name'] . '</p>';
                echo '
                <div class="dropdown">';
                    echo '
                    <button class="btn btn-outline-light ml-auto dropdown-toggle tro" type="button" id="userDropdown"
                            data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">';
                        echo '';
                        echo '
                    </button>
                    ';
                    echo '
                    <div class="dropdown-menu" aria-labelledby="userDropdown">';
                        echo '<a href="/author" class="btn btn-outline-light ml-auto mgr-10 dropdown-item">Dashboard</a>';
                        echo '<a href="/logout" class="btn btn-outline-light ml-auto dropdown-item">Logout</a>';
                        } else {
                        echo '
                        <div class="user-menu">';
                            echo '<p class="name-user">' . $_SESSION['Name'] . '</p>';
                            echo '
                            <div class="dropdown">';
                                echo '
                                <button class="btn btn-outline-light ml-auto dropdown-toggle" type="button"
                                        id="userDropdown" data-toggle="dropdown" aria-haspopup="true"
                                        aria-expanded="false">';
                                    echo '';
                                    echo '
                                </button>
                                ';
                                echo '
                                <div class="dropdown-menu" aria-labelledby="userDropdown">';
                                    echo '<a class="dropdown-item" href="/logout">Logout</a>';
                                    echo '<a class="dropdown-item" href="/client/profile">Profile</a>';
                                    echo '<a class="dropdown-item" href="/client/form">Đăng ký làm tác giả</a>';
                                    echo '
                                </div>
                                ';
                                echo '
                            </div>
                            ';
                            echo '
                        </div>
                        ';
                        }
                        } else {
                        echo '<a href="/login" class="btn btn-outline-light ml-auto">Login</a>';
                        echo '<a href="/sign-up" class="btn btn-outline-light ml-auto">Sign Up</a>';
                        }
                        ?>

                    </div>
        </nav>
    </div>
</div>

    



