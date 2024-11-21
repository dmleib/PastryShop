<?php
/**
 * Author: Ashley Rodriguez Vega
 * Date: 11/20/24
 * File: welcome_index.class.php
 * Description:
 */

class WelcomeIndex extends IndexView{
    public function display(): void{
        //display page header
        parent::displayHeader("Home/Welcome Page");
        ?>
        <div class="container-xxl py-5">
            <div class="container">
                <div class="row g-5 align-items-center">
                    <div class="col-lg-6 wow fadeIn" data-wow-delay="0.1s">
                        <div class="about-img position-relative overflow-hidden p-5 pe-0">
                            <img class="img-fluid w-100" src="<?= BASE_URL ?>/www/img/bakerimage.jpg" title="Baker Picture"/>
                        </div>
                    </div>
                    <div class="col-lg-6 wow fadeIn" data-wow-delay="0.5s">
                        <h1 class="display-5 mb-4">Best Quality Bakes and Sweet Treats</h1>
                        <p class="mb-4">Our pastries are baked fresh every day with the best ingredients. Each one is made with care, giving you a tasty treat you can enjoy. We bring you quality and flavor in every bite.</p>
                        <p><i class="fa fa-check text-secondary me-3"></i>Freshly Baked Every Day</p>
                        <p><i class="fa fa-check text-secondary me-3"></i>Made with Quality Ingredients</p>
                        <p><i class="fa fa-check text-secondary me-3"></i>Full of Flavor and Deligh</p>
                    </div>
                </div>
            </div>
        </div>
        <?php
        //displays the page footer
        parent::displayFooter();
    }
}