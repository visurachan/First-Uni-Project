<?php
include 'dbconn.php';
session_start();
//include 'dbconn_local.php';

// Check if the form is submitted from POST ensure no direct access
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $input_email = htmlspecialchars($_POST['email']);
    $input_password = htmlspecialchars($_POST['password']);
    //echo "Hello $customer_email";
    //echo "Your password is $customer_password";
    $sql = "SELECT  customerID,customer_email, password_hash, customer_forename, customer_surname FROM customers where customer_email = ?";
    if($stmt = mysqli_prepare($conn, $sql)){
        mysqli_stmt_bind_param($stmt, "s",$input_email);
        mysqli_stmt_execute($stmt);
        $queryresult = mysqli_stmt_get_result($stmt);
        if (mysqli_num_rows($queryresult)==1){
            $currentrow= mysqli_fetch_assoc($queryresult);
            $hashed_password = $currentrow['password_hash'];
            $customer_firstname = $currentrow['customer_forename'];
            $customer_surname = $currentrow['customer_surname'];
            $customerID = $currentrow['customerID'];

            //Password verification
            if (password_verify($input_password,$hashed_password)){
                //echo "Login successfull. Welcome, $input_email!";
                $_SESSION['logged-in']= true;
                $_SESSION['User_email'] = $input_email;
                $_SESSION['User_fname'] = $customer_firstname;
                $_SESSION['User_surname'] = $customer_surname;
                $_SESSION['User_id'] =$customerID;

                header('Location: index.php');
                exit();

            //wrong password
            }else{
                header("Location: Login.php?invalid_message=Incorrect Username or Password. Try again");
            }

            
            //wrong email
        }else{
            header("Location: Login.php?invalid_message= Icorrect Username or Password. Try again");
        }

    }
    else {
        // If the prepared statement could not be created
        echo "Could not prepare statement.";
    }
} else {
    // If the script is accessed without a POST request, access is denied
    die("Invalid access");
}

?>