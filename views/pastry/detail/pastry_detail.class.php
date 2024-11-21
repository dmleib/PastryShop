<?php
/**
 * Author: Deirdre Leib
 * Date: 11/19/24
 * File: pastry_detail.class.php
 * Description:
 */
class PastryDetail extends PastryIndexView
{
    public function display($pastry, $confirm = ""): void
    {
        //displays the page header
        parent::displayHeader("Pastry Details");

        //retrieves pastry details
        $id = $pastry->getPastryId();
        $name = $pastry->getName();
        $price = number_format($pastry->getPrice(), 2);
        $category = $pastry->getCategory();
        $availability = $pastry->isInMenu() ? "Available" : "Not Available";
        $description = $pastry->getDescription();
        $image = $pastry->getImagePath();

        //check if correct path
        if (strpos($image, "http://") === false && strpos($image, "https://") === false) {
            $image = BASE_URL . '/images/pastries/' . $image;
        } elseif (!$image) {
            $image = BASE_URL . '/images/no-image.png';
        }
        ?>

        <div id="main-header">Pastry Details</div>
        <hr>
        <!-- Display pastry details in a table -->
        <table id="detail">
            <tr>
                <td style="width: 150px;">
                    <img src="<?= htmlspecialchars($image) ?>" alt="<?= htmlspecialchars($name) ?>" />
                </td>
                <td style="width: 130px;">
                    <p><strong>Name:</strong></p>
                    <p><strong>Price:</strong></p>
                    <p><strong>Category:</strong></p>
                    <p><strong>Availability:</strong></p>
                    <p><strong>Description:</strong></p>
                    <div id="button-group">
                        <input type="button" id="edit-button" value=" Edit "
                               onclick="window.location.href='<?= BASE_URL ?>/pastry/edit/<?= $id ?>'">
                    </div>
                </td>
                <td>
                    <p><?= htmlspecialchars($name) ?></p>
                    <p>$<?= htmlspecialchars($price) ?></p>
                    <p><?= htmlspecialchars($category) ?></p>
                    <p><?= htmlspecialchars($availability) ?></p>
                    <p class="media-description"><?= htmlspecialchars($description) ?></p>
                    <div id="confirm-message"><?= $confirm ?></div>
                </td>
            </tr>
        </table>
        <a href="<?= BASE_URL ?>/pastry/index">Go to pastry list</a>

        <?php
        //displays the page footer
        parent::displayFooter();
    }

    //End of display method
}