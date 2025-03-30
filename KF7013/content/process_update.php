<?php
include 'dbconn.php';
include 'session_config.php';



// Check if the form is submitted by POST
if ($_SERVER['REQUEST_METHOD'] == 'POST') {

    // Get the user input
    $user_id = $_SESSION['User_id'];
    $first_name = htmlspecialchars($_POST['first_name']);
    $last_name = htmlspecialchars($_POST['last_name']);
    $email = htmlspecialchars($_POST['email']); // Thi
    $date_of_birth = htmlspecialchars($_POST['date_of_birth']);
    
    // If a new password is provided, hashing
    if (!empty($_POST['password'])) {
        $password = $_POST['password'];
        //ATTENTION!!! VALIDATE EMAIL
        $hashed_password = password_hash($password, PASSWORD_DEFAULT);  // Hashing the new password
    } else {
        // If no new password, keep the old password
        $hashed_password = null;  
    }

    // Update the user profile
    if ($hashed_password) {
        // Update the user details along with the new hashed password
        $sql = "UPDATE customers SET customer_forename = ?, customer_surname = ?, customer_email = ?, date_of_birth = ?, password_hash = ? WHERE customerID = ?";
        $stmt = mysqli_prepare($conn, $sql);
        mysqli_stmt_bind_param($stmt, 'sssssi', $first_name, $last_name, $email, $date_of_birth, $hashed_password, $user_id);
    } else {
        // Update without changing the password
        $sql = "UPDATE customers SET customer_forename = ?, customer_surname = ?, customer_email = ?, date_of_birth = ? WHERE customerID = ?";
        $stmt = mysqli_prepare($conn, $sql);
        mysqli_stmt_bind_param($stmt, 'ssssi', $first_name, $last_name, $email, $date_of_birth, $user_id);
    }

    // Execute the update query
    if (mysqli_stmt_execute($stmt)) {
        //CHANGE session varibles
        $_SESSION['User_fname'] = $first_name;
        $_SESSION['User_surname'] = $last_name;
                
        // Redirect TO PROFILE & show success message
        header("Location: Profile.php?message=Registration Successful!");
        exit();
    } else {
        
        echo "Error updating profile: " . mysqli_error($conn);
    }

    mysqli_stmt_close($stmt);
}
else{
    
        // If the script is accessed without a POST request, access is denied
        die("Invalid access");
    
    
}

?>

