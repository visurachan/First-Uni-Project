<!DOCTYPE html>
<html lang="en-GB">
<?php
include 'Head.php';
include 'dbconn.php'; 

include 'session_config.php';
$user_email = $_SESSION['User_email']; // Example: Retrieving from session

// Fetch user details from the database
$sql = "SELECT customer_forename, customer_surname, customer_email, date_of_birth FROM customers WHERE customer_email = ?";
$stmt = mysqli_prepare($conn, $sql);
mysqli_stmt_bind_param($stmt, "s", $user_email);
mysqli_stmt_execute($stmt);
$result = mysqli_stmt_get_result($stmt);

if ($row = mysqli_fetch_assoc($result)) {
    $first_name = $row['customer_forename'];
    $last_name = $row['customer_surname'];
    $email = $row['customer_email'];
    $birthdate = date('Y-m-d', strtotime($row['date_of_birth']));
} else {
    die("User not found");
}
?>
<body class="Login-Register">
    <div class="page-container">
        <div class="form-container">
            <!-- Close link -->
            <a href="Profile.php" class="close-btn">&#x2716; Close</a>
            

            <h1>Edit Profile</h1>
            <form action="process_update.php" method="POST">
                <div class="form-group">
                    <label for="first_name">First name</label>
                    <input type="text" id="first_name" name="first_name" value="<?php echo htmlspecialchars($first_name); ?>" required>
                </div>
                <div class="form-group">
                    <label for="last_name">Last name</label>
                    <input type="text" id="last_name" name="last_name" value="<?php echo htmlspecialchars($last_name); ?>" required>
                </div>
                <div class="form-group">
                    <label for="email">Email</label>
                    <input type="email" id="email" name="email" value="<?php echo htmlspecialchars($email); ?>" readonly>
                </div>
                <div class="form-group">
                    <label for="password">Password</label>
                    <input type="password" id="password" name="password" placeholder="Enter new password (optional)">
                </div>
                <div class="form-group">
                    <label for="date_of_birth">Date of birth</label>
                    <input type="date" id="date_of_birth" name="date_of_birth" value="<?php echo $birthdate; ?>" required>
                </div>
                <button type="submit" class="btn">Save Changes</button>
            </form>
        </div>
    </div>
</body>
</html>
