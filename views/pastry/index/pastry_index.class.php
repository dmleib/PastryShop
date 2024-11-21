<?php
/**
 * Author: Ashley Rodriguez Vega
 * Date: 11/21/24
 * File: pastry_index.class.php
 * Description:
 */
class PastryIndex extends PastryIndexView
{
    public function display($pastries): void
    {
        //displays the page header
        parent::displayHeader("List All Pastries");

        ?>
        <!-- Product Start -->
        <div class="container-xxl py-5">
            <div class="container">
                <div class="row g-0 gx-5 align-items-end">
                    <div class="col-lg-6">
                        <div class="section-header text-start mb-5 wow fadeInUp" data-wow-delay="0.1s" style="max-width: 500px;">
                            <h1 class="display-5 mb-3">Our Products</h1>
                            <p>Browse our menu using the search bar to find your favorite items. You can also sort by category to explore different options.</p>
                        </div>
                    </div>
                </div>
                <!-- Search and Sort Bar Start -->
                <div class="row mb-4">
                    <div class="col-md-6">
                        <input type="text" class="form-control" id="searchBar" placeholder="Search for items...">
                    </div>
                    <div class="col-md-6">
                        <select class="form-select" id="sortBy" aria-label="Sort by">
                            <option selected>Sort by Category</option>
                            <option value=""></option>
                        </select>
                    </div>
                </div>
        <div class="tab-content">
        <div id="tab-1" class="tab-pane fade show p-0 active">
            <div class="row g-4">
                <div class="col-xl-3 col-lg-4 col-md-6 wow fadeInUp" data-wow-delay="0.1s">
                    <div class="product-item">
                        <div class="position-relative bg-light overflow-hidden">
                            <img class="img-fluid w-100" src="img/product-1.jpg" alt="">
                            <div class="bg-secondary rounded text-white position-absolute start-0 top-0 m-4 py-1 px-3">New</div>
                        </div>
                        <div class="text-center p-4">
                            <a class="d-block h5 mb-2" href="">Fresh Tomato</a>
                            <span class="text-primary me-1">$19.00</span>
                            <span class="text-body text-decoration-line-through">$29.00</span>
                        </div>
                        <div class="d-flex border-top">
                            <small class="w-50 text-center border-end py-2">
                                <a class="text-body" href=""><i class="fa fa-eye text-primary me-2"></i>View detail</a>
                            </small>
                            <small class="w-50 text-center py-2">
                                <a class="text-body" href=""><i class="fa fa-shopping-bag text-primary me-2"></i>Add to cart</a>
                            </small>
                        </div>
                    </div>
                </div>
                <!-- Search and Sort Bar End -->
                <?php
                //list all movie is a grid
                ?>
            </div>
        </div>
        <!-- Product End -->
        <?php

        //displays the page footer
        parent::displayFooter();
    } //end of display method
}