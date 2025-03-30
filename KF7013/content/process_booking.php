<?php
include 'dbconn.php'; // Live Server
//include 'dbconn_local.php'; //Local server
include 'session_config.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    if (isset($_GET['trainingID'])) {
        //Retrieve training ID from URL
        $trainingID = intval($_GET['trainingID']);
        //SQL to retrive info from db
        $sql = "SELECT * FROM training_sessions WHERE trainingID = ?";
        $stmt = mysqli_prepare($conn, $sql);
        mysqli_stmt_bind_param($stmt, "i", $trainingID);
        mysqli_stmt_execute($stmt);
        $result = mysqli_stmt_get_result($stmt);
    
        if ($result && mysqli_num_rows($result) > 0) {
            $training_session = mysqli_fetch_assoc($result);
            
            $price_per_person = $training_session['price_per_person'];
            $session_title = $training_session['title'];
            $session_date = $training_session['session_date'];
        //if cant find in db. delete no need
        } else {
            die("Experience not found in DB.");
    }
}   //If didnt recieve id from url. for debuging
    else {die("Training ID not recieved.");}
    $number_people = htmlspecialchars(trim($_POST['learnersNo'])); 
    $bookin_notes = htmlspecialchars(trim($_POST['booking_notes'])); 
    $customerID = $_SESSION['User_id'];
    $total_booking_cost = $number_people * $price_per_person;

    
    //Insert to booking
    $sql = "INSERT INTO booking (trainingID, customerID,number_people, total_booking_cost,booking_notes) 
        VALUES (?, ?, ?, ?, ?)";


    // Prepare the SQL statement
    if ($stmt = mysqli_prepare($conn, $sql)) {
        // Bind variables to the prepared statement as parameters
        mysqli_stmt_bind_param($stmt, "iiiis", $trainingID, $customerID, $number_people,$total_booking_cost,$bookin_notes);

        // Execute the prepared statement
        $queryresult = mysqli_stmt_execute($stmt); // Returns boolean

        // Check if the query execution was successful
        if ($queryresult) {
            $bookingID = mysqli_insert_id($conn);

            $_SESSION['Booking_success'] = true;
            $_SESSION['Session_booked_title'] = $session_title;
            $_SESSION['Session_booked_date'] = $session_date;
            // Redirect after successfull booking
            header("Location: Booking_successfull.php?bookingID= $bookingID");
            exit();
            
        }
        else {
            // Display error message
            echo "<p>Error: " . mysqli_stmt_error($stmt) . "</p>";
            }

        // Close the prepared statement
        mysqli_stmt_close($stmt);
    } else {
    // If the prepared statement could not be created
    echo "Could not prepare statement.";
    }

    // Close the database connection
    mysqli_close($conn);

    }
else {
    // If the script is accessed without a POST request, access is denied
    die("Invalid access");
}

?>