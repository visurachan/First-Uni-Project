<?php
include 'dbconn.php';  
include 'session_config.php';

// Check if the user is logged in
if (!isset($_SESSION['logged-in']) || $_SESSION['logged-in'] !== true) {
    header("Location: login.php");
    exit();
}


$user_email = $_SESSION['User_email'];

// Prepare SQL 
$sql = "SELECT customer_forename, customer_surname, date_of_birth FROM customers WHERE customer_email = ?";
$stmt = mysqli_prepare($conn, $sql);


if ($stmt) {
    mysqli_stmt_bind_param($stmt, "s", $user_email);
    mysqli_stmt_execute($stmt);
    mysqli_stmt_store_result($stmt);

    
    if (mysqli_stmt_num_rows($stmt) > 0) {
        //bind to variables
        mysqli_stmt_bind_result($stmt, $user_fname, $user_surname, $user_birthdate);
        mysqli_stmt_fetch($stmt);
        $formatted_date = date('Y-m-d', strtotime($user_birthdate));
    } else {
        // User not found
        echo "User details not found.";
        exit();
    }
} else {
    // Error preparing the statement
    echo "Error preparing the query.";
    exit();
}

mysqli_stmt_close($stmt);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <?php
    include 'Head.php' ?>
</head>
<body>

<div class="profile-container">
    <!--Success message if redirected from regitration page -->
    <?php
        if (isset($_GET['message'])) {
            echo '<div class="register-success-message">' . htmlspecialchars($_GET['message']) . '</div>';
        }
                        
    ?>
                
    <h2>Profile</h2>
    
    <form action="" method="POST">
        <div class="profile-form-group">
            <label for="fname">First Name:</label>
            <input type="text" id="fname" name="fname" value="<?php echo $user_fname; ?>" readonly>
        </div>

        <div class="profile-form-group">
            <label for="surname">Last Name:</label>
            <input type="text" id="surname" name="surname" value="<?php echo $user_surname; ?>" readonly>
        </div>

        <div class="profile-form-group">
            <label for="birthdate">Birthdate:</label>
            <input type="text" id="birthdate" name="birthdate" value="<?php echo $formatted_date; ?>" readonly>
        </div>

        <div class="profile-form-group">
            <label for="email">Email:</label>
            <input type="email" id="email" name="email" value="<?php echo $user_email; ?>" readonly>
        </div>

        <div class="profile-button-group">
            <a href="index.php" class="profile-btn profile-btn-back">Back to Home</a>
            <a href="edit_profile.php" class="profile-btn profile-btn-back">Edit Details</a>

        </div>
    </form>
</div>

</body>
</html>
