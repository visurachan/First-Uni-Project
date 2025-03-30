<?php

//include 'dbconn_local.php'; // Local server
include 'dbconn.php';
include 'session_config.php';

//If only from after complete booking
if (!isset($_SESSION['Booking_success']) || !isset($_GET['bookingID'])) {
    header("Location: book-session.php");
    exit();
}
//session variables
$bookingID = intval($_GET['bookingID']);
$sessionTitle = $_SESSION['Session_booked_title'];
$sessionDate = $_SESSION['Session_booked_date'];
$sessionDateOnly=date("Y-m-d", strtotime($sessionDate));

// SQL to retriev the booking data
$sql = "SELECT * FROM booking WHERE bookingID = ?";
$stmt = mysqli_prepare($conn, $sql);
mysqli_stmt_bind_param($stmt, "i", $bookingID);
mysqli_stmt_execute($stmt);
$result = mysqli_stmt_get_result($stmt);

if ($result && mysqli_num_rows($result) > 0) {
    $booking = mysqli_fetch_assoc($result);
    $number_people = $booking['number_people'];
    $total_booking_cost = $booking['total_booking_cost'];
    $booking_notes = $booking['booking_notes'];
} else {
    die("Booking session not found.");
}
mysqli_stmt_close($stmt);

//unset session variables 
unset($_SESSION['Booking_success']);  
unset($_SESSION['Session_booked_title']);

$userFname = $_SESSION['User_fname'];
$userSurname = $_SESSION['User_surname'];
$userFullName = $userFname . " " . $userSurname;
?>

<!DOCTYPE html>
<html lang="en-GB">
    <head>
        <?php include 'Head.php'; ?>
        <link rel="stylesheet" href="booked_styles.css">
    </head>
    <body class="booked-body">
        <div class="booked-page-container">
            <div class="booked-form-container">
                <h1 class="booked-success-title">Session booked successfully!</h1>
                <div class="booked-details">
                    <div class="booked-row">
                        <span class="booked-label">Customer full name</span>
                        <span class="booked-colon">:</span>
                        <span class="booked-value"><?php echo $userFullName; ?></span>
                    </div>
                    <div class="booked-row">
                        <span class="booked-label">Session booked</span>
                        <span class="booked-colon">:</span>
                        <span class="booked-value"><?php echo $sessionTitle; ?></span>
                    </div>
                    <div class="booked-row">
                        <span class="booked-label">Session booked date</span>
                        <span class="booked-colon">:</span>
                        <span class="booked-value"><?php echo $sessionDateOnly; ?></span>
                    </div>
                    <div class="booked-row">
                        <span class="booked-label">Number of people</span>
                        <span class="booked-colon">:</span>
                        <span class="booked-value"><?php echo $number_people; ?></span>
                    </div>
                    <div class="booked-row">
                        <span class="booked-label">Total booking cost</span>
                        <span class="booked-colon">:</span>
                        <span class="booked-value">&pound<?php echo $total_booking_cost; ?></span>
                    </div>
                    <div class="booked-row">
                        <span class="booked-label">Notes</span>
                        <span class="booked-colon">:</span>
                        <span class="booked-value"><?php echo $booking_notes; ?></span>
                    </div>
                </div>
                <button class="booked-learn-more-btn" onclick="window.location.href='All_experiences_page.php'">Experience more</button>
            </div>
        </div>
    </body>
</html>
