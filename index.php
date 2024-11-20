<?php

require_once ("application/config.php");

//load autoloader
require_once ("vendor/autoload.php");

//load the dispatcher that dissects a request URL
new Dispatcher();
// Testing the User class
try {
    // Create a new User object
    $user = new User(
        userId: 1,
        username: 'johndoe',
        passwordHash: password_hash('password123', algo: PASSWORD_DEFAULT),
        email: 'johndoe@example.com',
        role: 'customer',
        firstName: 'John',
        lastName: 'Doe',
        dateCreated: date('Y-m-d H:i:s')
    );

    // Test getters
    echo "<h1>User Details</h1>";
    echo "<p>User ID: " . $user->getUserId() . "</p>";
    echo "<p>Username: " . $user->getUsername() . "</p>";
    echo "<p>Email: " . $user->getEmail() . "</p>";
    echo "<p>Role: " . $user->getRole() . "</p>";
    echo "<p>First Name: " . $user->getFirstName() . "</p>";
    echo "<p>Last Name: " . $user->getLastName() . "</p>";
    echo "<p>Date Created: " . $user->getDateCreated() . "</p>";

    // Test setters
    echo "<h2>Updating User Details</h2>";
    $user->setUsername('janedoe');
    $user->setEmail('janedoe@example.com');
    $user->setFirstName('Jane');
    $user->setLastName('Doe');
    $user->setRole('employee');

    echo "<p>Updated Username: " . $user->getUsername() . "</p>";
    echo "<p>Updated Email: " . $user->getEmail() . "</p>";
    echo "<p>Updated Role: " . $user->getRole() . "</p>";
    echo "<p>Updated First Name: " . $user->getFirstName() . "</p>";
    echo "<p>Updated Last Name: " . $user->getLastName() . "</p>";

    // Test password verification
    echo "<h2>Password Verification</h2>";
    $password = 'securepassword123';
    if ($user->verifyPassword($password)) {
        echo "<p>Password verified successfully!</p>";
    } else {
        echo "<p>Invalid password!</p>";
    }

    // Test invalid role (should throw an exception)
    echo "<h2>Testing Invalid Role</h2>";
    $user->setRole('invalidRole'); // This should throw an exception
} catch (Exception $e) {
    echo "<p style='color: red;'>Error: " . $e->getMessage() . "</p>";
}

