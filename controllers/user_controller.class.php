<?php
/**
 * Author: Deirdre Leib
 * Date: 11/15/24
 * File: user_controller.class.php
 * Description:
 */


require_once 'models/user_model.class.php';

class UserController
{
    private $userModel;

    public function __construct()
    {
        $this->userModel = new UserModel();
    }

    // Register a new user
    public function register($userData)
    {
        return $this->userModel->createUser($userData);
    }

    // Login a user
    public function login($email, $password)
    {
        $user = $this->userModel->getUserByEmail($email);
        if ($user && password_verify($password, $user['password'])) {
            // Set session or token
            $_SESSION['user'] = $user;
            return true;
        }
        return false;
    }

    // Fetch user profile
    public function getProfile($userId)
    {
        return $this->userModel->getUserById($userId);
    }
}

