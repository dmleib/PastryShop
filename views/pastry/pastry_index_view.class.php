<?php
/**
 * Author: Ashley Rodriguez Vega
 * Date: 11/21/24
 * File: pastry_index_view.class.php
 * Description:
 */
class PastryIndexView extends IndexView {

    public static function displayHeader($name): void
    {
        parent::displayHeader($name)
        ?>
        <script>
            //the media type
            var media = "pastry";
        </script>
        <!--create the search bar -->
        <div id="searchbar">
            <form method="get" action="<?= BASE_URL ?>/pastry/search">
                <input type="text" name="query-terms" id="searchtextbox" placeholder="Search movies by title" autocomplete="off" onkeyup="handleKeyUp(event)">
                <input type="submit" value="Go" />
            </form>
            <div id="suggestionDiv"></div>
        </div>
        <?php
    }

    public static function displayFooter(): void
    {
        parent::displayFooter();
    }

}