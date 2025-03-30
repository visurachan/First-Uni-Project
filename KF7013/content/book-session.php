<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Ensure trainingID is provided
    if (!isset($_POST['trainingID'])) {
        die("UnauthoOrized access.");
    }

    // Sanitize and use trainingID
    $trainingID = intval($_POST['trainingID']);
    include 'session_config.php';
    //if not logged in
    if (!isset($_SESSION['User_id'])) {
        die("You must be logged in to book a session.");
    }
    //session variables
    $user_email = $_SESSION['User_email'];
    $userFname = $_SESSION['User_fname'];
    $userSurname = $_SESSION['User_surname'];
    

    // Fetch the training session details from the database
    //include 'dbconn_local.php'; // local db
    include 'dbconn.php';
    $sql = "SELECT * FROM training_sessions WHERE trainingID = ?";
    $stmt = mysqli_prepare($conn, $sql);
    mysqli_stmt_bind_param($stmt, "i", $trainingID);
    mysqli_stmt_execute($stmt);
    $result = mysqli_stmt_get_result($stmt);

    if ($result && mysqli_num_rows($result) > 0) {
        $training_session = mysqli_fetch_assoc($result);
        $session_datetime = $training_session['session_date'];
        $session_date = date('Y-m-d',strtotime($session_datetime));
        
        
    } else {
        die("Training session not found.");
    }
    mysqli_stmt_close($stmt);
} else {
    // If accessed via GET or any other method
    die("Unauthorized access.");
}
?>
<!DOCTYPE html>
<html lang="en-GB">
<head>
    <?php include 'Head.php'; ?>
</head>
<body>
    <!--Navigation Bar-->
    <?php include 'Navbar.php'; ?>
    <!--Single experience info-->
    <div class="Experience-details-bookingpage">
    <div class="content">
        <h1><?php echo htmlspecialchars($training_session['title']); ?></h1>
        <img src="<?php echo htmlspecialchars($training_session['session_imagepath']); ?>" 
             alt="<?php echo htmlspecialchars($training_session['title']); ?>">
        <p class="description"><?php echo htmlspecialchars($training_session['description']); ?></p>
        <p><span class="detail-label">Duration:</span> <?php echo htmlspecialchars($training_session['Duration']); ?> hours</p>
        <p><span class="detail-label">Activity Type:</span> <?php echo htmlspecialchars($training_session['Indoor/Outdoor']); ?></p>
        <p><span class="detail-label">Price per person:</span> &pound;<?php echo htmlspecialchars($training_session['price_per_person']); ?></p>
        <p><span class="detail-label">Date:</span> <?php echo $session_date; ?></p>
    </div>
    <!--form to book-->
    <div class="booking-form">
        <h2>Book Your Session</h2>
        <form action="process_booking.php?trainingID=<?php echo $trainingID?>" method="POST">
            <label for="name">Your full name:</label>
            <input type="text" id="name" name="name" value="<?php echo $userFname." ".$userSurname ?>"readonly>

            <label for="email">Your email:</label>
            <input type="email" id="email" name="email" value="<?php echo $user_email ?>"readonly>

            <label for="date">Booking Date:</label>
            <input type="date" id="date" name="date" value="<?php echo $session_date ?>" readonly>
            

            <label for="learnersNo">Number of learners:</label>
            <input type="number" id="learnersNo" name="learnersNo" min="1" placeholder = "Required" required>

            <label for="booking_notes">Booking notes:</label>
            <textarea id="booking_notes" name="booking_notes" placeholder="Add any additional information or requests here"></textarea>

            <button type="submit" class="book-session-btn">Book Now</button>
        </form>
    </div>
</div>

    <?php include 'NewsletterSub.php'; ?>
    <?php include 'footer.php'; ?>

    <?php
    // Close the database connection
    mysqli_close($conn);
    ?>
</body>
</html>
