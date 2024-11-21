<?php
/**
 * Author: Deirdre Leib
 * Date: 11/19/24
 * File: index_view.class.php
 * Description:
 */
class IndexView {
    //this method displays the page header
    static public function displayHeader($page_title): void
    {
        ?>
        <!DOCTYPE html>
        <html lang="en">
        <head>
            <title> <?php echo $page_title; ?> </title>
            <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
            <meta name="description" content="An MVC-based pastry shop application with RESTful routing.">
            <link type='text/css' rel='stylesheet' href='<?= BASE_URL ?>/www/css/bootstrap.min.css' />
            <link type='text/css' rel='stylesheet' href='<?= BASE_URL ?>/www/css/style.css' />
            <link rel="shortcut icon" href="<?= BASE_URL ?>/www/img/bg-icon.png" type="image/x-icon">


            <!-- Favicon -->
            <link href="<?= BASE_URL ?>/www/img/bg-icon.png" rel="icon">

            <!-- Google Web Fonts -->
            <link rel="preconnect" href="https://fonts.googleapis.com">
            <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
            <link href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@400;500&family=Lora:wght@600;700&display=swap" rel="stylesheet">

            <!-- Icon Font Stylesheet -->
            <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css" rel="stylesheet">
            <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css" rel="stylesheet">

            <!-- Libraries Stylesheet -->
            <link href="<?= BASE_URL ?>/lib/animate/animate.min.css" rel="stylesheet">
            <link href="<?= BASE_URL ?>/lib/owlcarousel/assets/owl.carousel.min.css" rel="stylesheet">

            <!-- Customized Bootstrap Stylesheet -->
            <link href="<?= BASE_URL ?>/css/bootstrap.min.css" rel="stylesheet">

            <!-- Template Stylesheet -->
            <link href="<?= BASE_URL ?>/css/style.css" rel="stylesheet">

            <script>
                //create the JavaScript variable for the base url
                var base_url = "<?= BASE_URL ?>";
            </script>
        </head>
        <body>
        <!-- Navbar Start -->
        <div class="container-fluid fixed-top px-0 wow fadeIn" data-wow-delay="0.1s">
            <div class="top-bar row gx-0 align-items-center d-none d-lg-flex">
                <div class="col-lg-6 px-5 text-start">
                    <small><i class="fa fa-map-marker-alt me-2"></i>123 Street, Indianapolis, IN</small>
                    <small class="ms-4"><i class="fa fa-envelope me-2"></i>pastryshop@project.com</small>
                </div>
            </div>

            <nav class="navbar navbar-expand-lg navbar-light py-lg-0 px-lg-5 wow fadeIn" data-wow-delay="0.1s">
                <a href="<?= BASE_URL ?>/home/index" class="navbar-brand ms-4 ms-lg-0">
                    <h1 class="fw-bold text-primary m-0">Pastry sh<span class="text-secondary">o</span>p</h1>
                </a>
                <button type="button" class="navbar-toggler me-4" data-bs-toggle="collapse" data-bs-target="#navbarCollapse">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarCollapse">
                    <div class="navbar-nav ms-auto p-4 p-lg-0">
                        <a href="<?= BASE_URL ?>/views/welcome/welcome_index.class.php" class="nav-item nav-link active">Home</a>
                        <a href="<?= BASE_URL ?>/views/index/pastry_index.class.php" class="nav-item nav-link">Menu</a>
                        <a href="<?= BASE_URL ?>/about/index" class="nav-item nav-link">About Us</a>
                        <a href="<?= BASE_URL ?>/user/login" class="nav-item nav-link">Login/Register</a>
                    </div>
                    <div class="d-none d-lg-flex ms-2">
                        <a class="btn-sm-square bg-white rounded-circle ms-3" href="<?= BASE_URL ?>/cart/index">
                            <small class="fa fa-shopping-bag text-body"></small>
                        </a>
                    </div>
                </div>
            </nav>
        </div>
        <?php
    } //end of displayHeader function

    //this method displays the page footer
    public static function displayFooter(): void
    {
        ?>
        <div class="container-fluid bg-dark footer pt-5 wow fadeIn" data-wow-delay="0.1s">
            <div class="container py-5">
                <div class="row g-5">
                    <div class="col-lg-3 col-md-6">
                        <h1 class="fw-bold text-primary mb-4">Pastry sh<span class="text-secondary">o</span>p</h1>
                        <p>This project is an MVC-based concept for a pastry shop, focusing on organization and functionality.</p>
                    </div>
                    <div class="col-lg-3 col-md-6">
                        <h4 class="text-light mb-4">Address</h4>
                        <p><i class="fa fa-map-marker-alt me-3"></i>123 Street, Indianapolis, IN</p>
                        <p><i class="fa fa-phone-alt me-3"></i>+317 123 4567</p>
                        <p><i class="fa fa-envelope me-3"></i>pastryshop@project.com</p>
                    </div>
                    <div class="col-lg-3 col-md-6">
                        <h4 class="text-light mb-4">Quick Links</h4>
                        <a class="btn btn-link" href="<?= BASE_URL ?>/views/index/pastry_index.class.php">Menu</a>
                        <a class="btn btn-link" href="<?= BASE_URL ?>/about/index">About Us</a>
                    </div>
                </div>
            </div>
            <div class="container-fluid copyright">
                <div class="container">
                    <div class="row">
                        <div class="col-md-6 text-center text-md-start mb-3 mb-md-0">
                            &copy; <?= date('Y'); ?> Pastry Shop Project, All Right Reserved.
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Back to Top -->
        <a href="#" class="btn btn-lg btn-primary btn-lg-square rounded-circle back-to-top"><i class="bi bi-arrow-up"></i></a>

        <!-- JavaScript Libraries -->
        <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/js/bootstrap.bundle.min.js"></script>
        <script src="<?= BASE_URL ?>/lib/wow/wow.min.js"></script>
        <script src="<?= BASE_URL ?>/lib/easing/easing.min.js"></script>
        <script src="<?= BASE_URL ?>/lib/waypoints/waypoints.min.js"></script>
        <script src="<?= BASE_URL ?>/lib/owlcarousel/owl.carousel.min.js"></script>

        <!-- Template Javascript -->
        <script src="<?= BASE_URL ?>/js/main.js"></script>
        </body>
        </html>
        <?php
    } //end of displayFooter function
}

