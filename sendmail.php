<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);

$request_method = $_SERVER["REQUEST_METHOD"];

if ($request_method == "POST") {
    $name = $_POST['name'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];
    $msg = $_POST['msg'];

    // Recipient email address
    $to = 'archigrambuildcon@gmail.com'; 
    //$to = 'sagar91.tsr@gmail.com'; 
   // $to = 'sagar@spandigitsocial.com'; 

    // Email subject
    $subject = 'New Contact Enquiry';
    
    $message = '<html><body>';
    $message .= '<table rules="all" style="border-color: #666;" cellpadding="10">';
    $message .= "<tr style='background: #eee;'><td><strong>Name:</strong> </td><td>" . $name . "</td></tr>";
    $message .= "<tr><td><strong>Email:</strong> </td><td>" . $email . "</td></tr>";
    $message .= "<tr><td><strong>Phone:</strong> </td><td>" . $phone . "</td></tr>";
    $message .= "<tr><td><strong>Message:</strong> </td><td>" . $msg . "</td></tr>";
    $message .= "</table>";
    $message .= "</body></html>";

    // Email headers
    $headers = "From: inquiry@spandigitproject.me \r\n";
    $headers .= "Cc: $email\r\n";
    $headers .= "MIME-Version: 1.0\r\n";
    $headers .= "Content-type: text/html\r\n";

    // Send email
    if (mail($to, $subject, $message, $headers)) {
        echo "<script>
                alert('Application submitted successfully. We will contact you soon.');
                window.location.href='https://archigram.co.in/';
              </script>";
    } else {
        echo "<script>
                alert('Unable to submit application. Please try again later.');
              </script>";
    }
} else {
    echo "Invalid request method: $request_method";
}
?>
