<?php

include 'dbconn.php'; // Live Server
//include 'dbconn_local.php'; //Local server

// Check if the form is submitted from POST ensure no direct access
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Retrieve and sanitize form inputs
    $customer_forename = htmlspecialchars(trim($_POST['first_name'])); //trim removes whitespaces before and after
    $customer_surname = htmlspecialchars(trim($_POST['last_name'])); //htmlspecialchars prevent attackers from exploiting the code by injecting HTML or Javascript code
    //It replaces HTML characters like < and > with &lt fromw3schools.com
    $customer_email = filter_var($_POST['email'], FILTER_SANITIZE_EMAIL); //sanitize email w3schools tutorial
    $password = $_POST['password']; 
    $date_of_birth = $_POST['date_of_birth'];

    // Validate email
    if (!filter_var($customer_email, FILTER_VALIDATE_EMAIL)) {
        die("Invalid email format"); 
    }

    // Hashing the password for security
    $password_hash = password_hash($password, PASSWORD_DEFAULT);

    


    // Check if email is already registered
    $check_email_sql = "SELECT customer_email FROM customers WHERE customer_email = ?";
    $check_stmt = mysqli_prepare($conn, $check_email_sql);
    mysqli_stmt_bind_param($check_stmt, "s", $customer_email);
    mysqli_stmt_execute($check_stmt);
    mysqli_stmt_store_result($check_stmt);

    // Check if the email already exists
    if (mysqli_stmt_num_rows($check_stmt) > 0) {
        die("Email already registered!");
    }
    mysqli_stmt_close($check_stmt);
    

    
//insert to customers db
$sql = "INSERT INTO customers (customer_forename, customer_surname, customer_email, password_hash, date_of_birth) 
        VALUES (?, ?, ?, ?, ?)";

// Prepare the SQL statement
if ($stmt = mysqli_prepare($conn, $sql)) {
    // Bind variables to the prepared statement as parameters
    mysqli_stmt_bind_param($stmt, "sssss", $customer_forename, $customer_surname, $customer_email, $password_hash, $date_of_birth);

    // Execute the prepared statement
    $queryresult = mysqli_stmt_execute($stmt); // Returns boolean

    // Check if the query execution was successful
    if ($queryresult) {
        // Redirect or confirm successful registration
        header("Location: Login.php?message=Registration Successfull!");
    } 

    // Close the prepared statement
    mysqli_stmt_close($stmt);
} else {
    // If the prepared statement could not be created
    echo "Could not prepare statement.";
}

// Close the database connection
mysqli_close($conn);


} else {
    // If the script is accessed without a POST request, access is denied
    die("Invalid access");
}
?>

