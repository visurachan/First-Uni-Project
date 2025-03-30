<?php
include 'session_config.php';
?>

<!DOCTYPE html>
<html lang="en-GB">
<?php
include 'Head.php';
//include 'dbconn_local.php'; 
include 'dbconn.php';

if (isset($_GET['trainingID'])) {
    // Get the training ID from the GET request
    $trainingID = intval($_GET['trainingID']);

    // Prepare the SQL statement
    $sql = "SELECT * FROM training_sessions WHERE trainingID = ?";
    $stmt = mysqli_prepare($conn, $sql);

    // Bind the parameter (integer type)
    mysqli_stmt_bind_param($stmt, "i", $trainingID);

    // Execute the prepared statement
    mysqli_stmt_execute($stmt);

    // Get the result set
    $result = mysqli_stmt_get_result($stmt);

    // Check if a result was returned
    if ($result && mysqli_num_rows($result) > 0) {
        $training_session = mysqli_fetch_assoc($result);
        $session_datetime = $training_session['session_date'];
        $session_date = date('Y-m-d', strtotime($session_datetime));
    } else {
        die("Experience not found.");
    }

    // Close the statement
    mysqli_stmt_close($stmt);

}
 else {
    die("Invalid experience ID.");
}
?>
<body>
    <!--Navigation Bar-->
    <?php include 'Navbar.php'; ?>
    <div class="Experience-details-page">
        <h1><?php echo htmlspecialchars($training_session['title']); ?></h1>
        <img src="<?php echo htmlspecialchars($training_session['session_imagepath']); ?>" alt="<?php echo htmlspecialchars($training_session['title']); ?>">
        <p class="description"><?php echo htmlspecialchars($training_session['description']); ?></p>
        <p><span class="detail-label">Duration:</span> <?php echo htmlspecialchars($training_session['Duration']); ?> hours</p>
        <p><span class="detail-label">Activity Type:</span> <?php echo htmlspecialchars($training_session['Indoor/Outdoor']); ?></p>
        <p><span class="detail-label">Price per person:</span> &pound<?php echo htmlspecialchars($training_session['price_per_person']); ?></p>
        <p><span class="detail-label">Date:</span> <?php echo $session_date; ?></p>

        <?php if (isset($_SESSION['logged-in']) && $_SESSION['logged-in']==true): ?>

            <form method="POST" action="book-session.php">
            <input type="hidden" name="trainingID" value="<?php echo htmlspecialchars($training_session['trainingID']); ?>">
            <button type="submit" class="book-session-btn">Book Session</button>
            </form>

        <?php else: ?>
            <a href="Login.php" class="book-session-btn">Book Session</a>
        <?php endif; ?>
    </div>

    <?php
    include 'NewsletterSub.php';
    include 'footer.php';
    ?>

    <?php
    // Close the database connection
    mysqli_close($conn);
    ?>
</body>
</html>
