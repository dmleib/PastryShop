<?php
/**
 * Author: Kierra White
 * Date: 11/15/24
 * File: pastry_model.class.php
 * Description: This class handles interactions with the Pastries table
 */
class PastryModel {
    private Database $db; // Database object
    private mysqli $dbConnection; // Database connection object
    private string $table; // Table name

    public function __construct() {
        $this->db = Database::getDatabase(); // Get the database instance
        $this->dbConnection = $this->db->getConnection(); // Get the database connection
        $this->table = $this->db->getPastriesTable(); // Get the Pastries table name from the Database class
    }
  
  // Method to add a new pastry
    public function add_pastry($name, $description, $price, $categoryId, $availability = 1, $imagePath = null, $stockQuantity = 0) {
        // SQL insert statement
        $sql = "INSERT INTO $this->table (name, description, price, category_id, availability, image_url, stock_quantity)
                VALUES ('$name', '$description', $price, $categoryId, $availability, '$imagePath', $stockQuantity)";

        // Execute the query and return the result
        $query = $this->dbConnection->query($sql);

        if ($query === true) {
            return true;
        }
        return false;
    }

  // Method to get a pastry by ID
    public function get_pastry_by_id($pastryId) {
        // SQL select statement
        $sql = "SELECT * FROM $this->table WHERE pastry_id = $pastryId";

        // Execute the query
        $result = $this->dbConnection->query($sql);

        if ($result && $result->num_rows > 0) {
            return $result->fetch_assoc(); // Return the pastry as an associative array
        }
        return null;
    }

  // Method to get all pastries
    public function get_all_pastries() {
        // SQL select statement
        $sql = "SELECT * FROM $this->table ORDER BY name ASC";

        // Execute the query
        $result = $this->dbConnection->query($sql);
        $pastries = [];

        if ($result) {
            while ($row = $result->fetch_assoc()) {
                $pastries[] = $row;
            }
        }

        return $pastries;
    }

   // Method to update a pastry by ID
    public function update_pastry($pastryId, $name, $description, $price, $categoryId, $availability, $imageFileName, $stockQuantity) {
        // SQL update statement
        $sql = "UPDATE $this->table 
                SET name = '$name', description = '$description', price = $price, category_id = $categoryId,
                    availability = $availability, image_url = '$imagePath', stock_quantity = $stockQuantity
                WHERE pastry_id = $pastryId";

        // Execute the query and return the result
        $query = $this->dbConnection->query($sql);

        if ($query === true) {
            return true;
        }
        return false;
    }
  
    // Method to delete a pastry by ID
    public function delete_pastry($pastryId) {
        // SQL delete statement
        $sql = "DELETE FROM $this->table WHERE pastry_id = $pastryId";

        // Execute the query and return the result
        $query = $this->dbConnection->query($sql);

        if ($query === true) {
            return true;
        }
        return false;
    }
}
?>
