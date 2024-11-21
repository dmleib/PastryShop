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
        <div id="main-header">Pastries in the Bakery</div>

        <div class="grid-container">
            <?php
            if (empty($pastries)) {
                echo "<p>No pastries found.</p>";
            } else {
                //display pastries in a grid; six items per row
                foreach ($pastries as $pastry) {
                    $id = $pastry->getPastryId();
                    $name = $pastry->getName();
                    $price = number_format($pastry->getPrice(), 2);
                    $image = $pastry->getImagePath();

                    //check if this is the correct path
                    if ($image && strpos($image, "http://") === false && strpos($image, "https://") === false) {
                        $image = BASE_URL . "/images/pastries/" . $image;
                    } else if (!$image) {
                        $image = BASE_URL . "/images/no-image.png";
                    }

                    echo "<div class='item'>
                            <p><a href='" . BASE_URL . "/pastry/detail/$id'>
                            <img src='" . htmlspecialchars($image) . "' alt='" . htmlspecialchars($name) . "'></a></p>
                            <span>" . htmlspecialchars($name) . "<br>$" . htmlspecialchars($price) . "</span>
                          </div>";
                }
            }
            ?>
        </div>
        <?php

        //displays the page footer
        parent::displayFooter();
    } //end of display method
}