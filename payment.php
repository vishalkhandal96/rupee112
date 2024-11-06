<?php
include "elements/header.php";
?>

<div class="container mt-5">
    <h2>One-Time Registration Fee</h2>
    <p>To validate your application, please pay a one-time registration fee of ₹500.</p>
    <form action="success.php" method="POST">
        <button type="submit" class="btn btn-success">Pay ₹500</button>
    </form>
</div>

<?php
include "elements/footer.php";
?>