<?php
/**
 * Author: Kierra White
 * Date: 11/15/24
 * File: user_model.class.php
 * Description: This class handles user data interactions with the database
 */
lass UserModel {
    private Database $db; // Database object
    private mysqli $dbConnection; // Database connection object

//constructor
    public function __construct() {
        $this->db = Database::getDatabase(); 
        $this->dbConnection = $this->db->getConnection();
    }
 // Method to add a new user
    public function add_user($username, $password, $email, $firstName, $lastName, $role = 'customer') {
        // Hash the password
        $hashPassword = password_hash($password, PASSWORD_DEFAULT);

        // SQL insert statement
        $sql = "INSERT INTO " . $this->db->getUsersTable() . " (username, password_hash, email, first_name, last_name, role)
                VALUES ('$username', '$hashPassword', '$email', '$firstName', '$lastName', '$role')";

        // Execute the query
        $query = $this->dbConnection->query($sql);

        // Return true if the query was successful
        if ($query === true) {
            return true;
        }
        return false;
    }

 // Method to verify a user
    public function verify_user($username, $password) {
        // SQL select statement
        $sql = "SELECT * FROM " . $this->db->getUsersTable() . " WHERE username = '$username'";

        // Execute the query
        $query = $this->dbConnection->query($sql);

        // Check if the user exists
        if ($query && $query->num_rows > 0) {
            $row = $query->fetch_assoc();
            $hashPassword = $row['password_hash'];

            // Verify the password
            if (password_verify($password, $hashPassword)) {
                // Create a cookie for session tracking
                setcookie("username", $username, time() + 3600, "/");
                return $row; 
            }
        }
        return false;
    }
// Method to log out a user
    public function logout() {
        // Check if the cookie exists and delete it
        if (isset($_COOKIE['username'])) {
            // Delete the cookie
            setcookie("username", "", time() - 3600, "/");
            return true;
        }
        return false;
    }
 // Method to reset a user's password
    public function reset_password($username, $newPassword) {
        // Hash the new password
        $hashPassword = password_hash($newPassword, PASSWORD_DEFAULT);

        // SQL update statement
        $sql = "UPDATE " . $this->db->getUsersTable() . " SET password_hash = '$hashPassword' WHERE username = '$username'";

        // Execute the query
        $query = $this->dbConnection->query($sql);

        // Return true if the query was successful
        if ($query === true) {
            return true;
        }
        return false;
    }
}
?>
