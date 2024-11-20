<?php
/**
 * Author: Deirdre Leib
 * Date: 11/15/24
 * File: admin_controller.class.php
 * Description:
 */


require_once 'models/pastry_model.class.php';
require_once 'models/user_model.class.php';

class AdminController
{
    private $adminModel;

    public function __construct()
    {
        $this->adminModel = new AdminModel();
    }

    // Manage pastries (CRUD operations)
    public function managePastries()
    {
        return $this->adminModel->getPastries();
    }

    // Manage users
    public function manageUsers()
    {
        return $this->adminModel->getUsers();
    }

    // Other admin functionalities
    public function updateSettings($settingsData)
    {
        return $this->adminModel->updateSettings($settingsData);
    }
}

