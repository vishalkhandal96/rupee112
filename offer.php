<?php
session_start();

include "elements/header.php";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $_SESSION['name'] = $_POST['name'];
    $_SESSION['mobile-number'] = $_POST['mobile-number'];
    $_SESSION['email'] = $_POST['email'];
    $_SESSION['pan-number'] = $_POST['pan-number'];
}
?>

<div class="container mt-5">
    <h2>Congratulations, <?= htmlspecialchars($_SESSION['name']) ?>!</h2>
    <p>You have a pre-approved loan offer up to <strong>₹5,00,000</strong>.</p>
    <a href="payment.php" class="btn btn-primary">Proceed to Payment</a>
</div>

<?php
include "elements/footer.php";
?>