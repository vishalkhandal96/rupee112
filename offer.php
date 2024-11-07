<?php
session_start();
include "db/db.php"; // Include the database connection
include "elements/header.php";

$showAlert = false;

if ($_SERVER['REQUEST_METHOD'] == 'POST') {

    $showAlert = true;
    // Initialize an errors array to store validation errors
    $errors = [];
    $old = [];


    // Validate and sanitize name
    $name = htmlspecialchars(trim($_POST['name']));
    if (empty($name)) {
        $errors[] = "Name is required.";
    } else {
        $old['name'] = $name;
    }

    // Validate and sanitize mobile number
    $mobile_number = htmlspecialchars(trim($_POST['mobile-number']));
    if (empty($mobile_number) || !preg_match('/^[0-9]{10}$/', $mobile_number)) {
        $errors[] = "Please enter a valid 10-digit mobile number.";
    } else {
        $old['mobile-number'] = $mobile_number;
    }

    // Validate PAN number format
    $pan_number = htmlspecialchars(trim($_POST['pan-number']));
    if (empty($pan_number) || !preg_match('/^[A-Z]{5}[0-9]{4}[A-Z]{1}$/', $pan_number)) {
        $errors[] = "Please enter a valid PAN number.";
    } else {
        $old['pan-number'] = $pan_number;
    }

    // Validate terms and conditions checkbox
    if (!isset($_POST['tnccheck'])) {
        $errors[] = "You must agree to the terms and conditions.";
    } else {
        $old['tnccheck'] = true;
    }

    // If there are any validation errors, store them in session and redirect back to apply-now.php
    if (!empty($errors)) {
        $_SESSION['errors'] = $errors;
        $_SESSION['old'] = $old;
        header("Location: apply-now.php");
        exit;
    }

    $_SESSION['name'] = $name;
    $_SESSION['mobile_number'] = $mobile_number;
    $_SESSION['pan_number'] = $pan_number;


    // If validation passes, insert the data into the database
    $sql = "INSERT INTO users (name, mobile_number, pan_number) VALUES (?, ?, ?)";
    $stmt = $conn->prepare($sql);

    if ($stmt) {
        // Bind parameters to the statement
        $stmt->bind_param("sss", $name, $mobile_number, $pan_number);

        // Execute the statement and store success message in session
        if ($stmt->execute()) {
            $_SESSION['success'] = "Data successfully saved!";

            // Clear old input values
            unset($_SESSION['old']);

            // header("Location: apply-now.php");
            // exit;
        } else {
            $_SESSION['errors'] = ["Error saving data."];
            header("Location: apply-now.php");
            exit;
        }

        // Close the statement
        $stmt->close();
    } else {
        $_SESSION['errors'] = ["Error preparing the statement."];
        header("Location: apply-now.php");
        exit;
    }

    // Close the database connection
    $conn->close();
}
?>

<!-- Display success message if set -->
<?php if (isset($_SESSION['success'])): ?>
    <div class="alert alert-success notification-alert alert-dismissible fade show" role="alert" id="successAlert">
        <?php
        echo $_SESSION['success'];
        unset($_SESSION['success']);
        ?>
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close" onclick="document.getElementById('successAlert').style.display='none';"></button>
    </div>

<?php endif; ?>

<div class="container mt-5">
    <h2>Congratulations, <?= htmlspecialchars($_SESSION['name']) ?>!</h2>
    <p>You have a pre-approved loan offer up to <strong>₹5,00,000</strong>.</p>
    <a href="payment.php" class="btn btn-primary">Proceed to Payment</a>
</div>

<?php
include "elements/footer.php";
?>

<script>
    // Show the alert if PHP sets $showAlert to true
    document.addEventListener("DOMContentLoaded", function() {
        <?php if ($showAlert): ?>
            const alert = document.getElementById('successAlert');
            alert.style.display = 'block'; // Show the alert

            // Auto-hide the alert after 3 seconds (3000 ms)
            setTimeout(function() {
                alert.style.display = 'none';
            }, 3000);
        <?php endif; ?>
    });
</script>