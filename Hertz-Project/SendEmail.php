<?php
session_start();

$to = $_REQUEST['EmailAddress'];
$subject = 'Order Details from Hertz-UTS';
$message = '<h3>Thanks for renting cars from Hertz-UTS, the total cost is $' . $_SESSION["total"] .'</h3>
            <h3>Details are as follows:</h3>';


$headers = "MIME-Version: 1.0" . "\r\n";
$headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";//set content-type

$headers .= 'From: Hetrz-UTS@uts.edu.au' . "\r\n";


mail($to, $subject, $message, $headers);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">

    <title>Purchase</title>
</head>
<body>
    <div><nav class="navbar fixed-top navbar navbar-dark bg-dark">
      <a style="color:white;">Hertz-UTS</a>
    <a class="navbar-brand" href="#"><h3>Car Rental Center<h3></a>
    </nav></div>
    <div class="container text-center">
      <br><br><br><br><br><br>
        <h1>Thank you for your shopping</h1>
      <br><br><br><br><br><br>
        <a href="index.html" class="btn btn-outline-secondary btn-block"">Back to Home</a>
    </div>

</body>

<?php
session_destroy();
?>
