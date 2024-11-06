<!-- public/success.php -->
<?php
session_start();
// In real life, validate payment here.
$_SESSION['payment_status'] = "paid";
header("Location: thankyou.php");
exit();
