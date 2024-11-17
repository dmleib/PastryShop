<?php
/**
 * Author: Kierra White
 * Date: 11/15/24
 * File: inventorylog_model.class.php
 * Description:This class handles interactions with the InventoryLog table in the database.
 */
class InventoryLogModel {
    private Database $db; // Database object
    private mysqli $dbConnection; // Database connection object
    private string $table; // Table name

    public function __construct() {
        $this->db = Database::getDatabase(); // Get the database instance
        $this->dbConnection = $this->db->getConnection(); // Get the database connection
        $this->table = $this->db->getInventoryLogTable(); // Get the InventoryLog table name from the Database class
    }
  
   // Method to log a change in inventory
    public function log_inventory_change($pastryId, $changeQuantity, $reason) {
        // SQL insert statement
        $sql = "INSERT INTO $this->table (pastry_id, change_quantity, reason, time_updated) 
                VALUES ($pastryId, $changeQuantity, '$reason', NOW())";

        // Execute the query and return the result
        $query = $this->dbConnection->query($sql);
        return $query === true;
    }
  
  // Method to retrieve all logs for a specific pastry
    public function get_logs_by_pastry_id($pastryId) {
        // SQL select statement
        $sql = "SELECT * FROM $this->table WHERE pastry_id = $pastryId ORDER BY date_updated DESC";

        // Execute the query and fetch results
        $result = $this->dbConnection->query($sql);
        $logs = [];

        if ($result) {
            while ($row = $result->fetch_assoc()) {
                $logs[] = $row;
            }
        }

        return $logs;
    }

   // Method to calculate the current stock for a specific pastry
    public function get_current_stock($pastryId) {
        // SQL select statement to calculate the total change in inventory
        $sql = "SELECT SUM(change_quantity) AS current_stock FROM $this->table WHERE pastry_id = $pastryId";

        // Execute the query and fetch the result
        $result = $this->dbConnection->query($sql);

        if ($result) {
            $row = $result->fetch_assoc();
          // Return the current stock or 0 if no records are found
            return $row['current_stock'] ?? 0; 
        }

        return 0;
    }
}
?>
  
  
