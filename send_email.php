<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Retrieve form data
    $developmentType = $_POST['development-type'];
    $aboutProject = $_POST['about-project'];
    $city = $_POST['city'];
    $state = $_POST['state'];
    $name = $_POST['name'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];

    // Email details
    $to = "archigrambuildcon@gmail.com"; // Replace with your email address
    $cc =  "supriya.spandigit@gmail.com";
    $subject = "New Contact Form Submission";
    $headers = "From: " . $email . "\r\n";
    $headers .= "Reply-To: " . $email . "\r\n";
    $headers .= "Content-Type: text/html; charset=UTF-8\r\n";

    // Compose the email content
    $message = "<html><body>";
    $message .= "<h2>New Contact Form Submission</h2>";
    $message .= "<p><strong>Type of Development:</strong> $developmentType</p>";
    $message .= "<p><strong>About the Project:</strong> $aboutProject</p>";
    $message .= "<p><strong>Project Location:</strong> $city, $state</p>";
    $message .= "<p><strong>Name:</strong> $name</p>";
    $message .= "<p><strong>Email:</strong> $email</p>";
    $message .= "<p><strong>Phone Number:</strong> $phone</p>";
    $message .= "</body></html>";

    // Send the email
   if (mail($to, $subject, $message, $headers)) {
        echo "<script>
                alert('Application submitted successfully. We will contact you soon.');
               window.location.href='https://archigram.co.in//interior-designers-in-nashik.html';
              </script>";
    } else {
        echo "Failed to send your message. Please try again.";
    }
   
}
 else {
    echo "Invalid request method: $request_method";
}
?>
