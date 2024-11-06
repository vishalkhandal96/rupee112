<!-- public/thankyou.php -->
<?php
session_start();

include "elements/header.php";

if ($_SESSION['payment_status'] !== "paid") {
    header("Location: index.php");
    exit();
}
?>

<div class="container mt-5">
    <h2>Thank You!</h2>
    <p>Your registration is complete. We’ll process your loan application shortly.</p>
</div>

<?php
include "elements/footer.php";
?>