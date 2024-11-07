<?php
session_start();
include "elements/header.php";

?>

<section class="my-5">
    <div class="container">
        <div class="row">
            <div class="col-md-6 d-flex align-items-center">
                <img src="assets/images/login_image.jpg" alt="" srcset="" style="width: 100%;">
            </div>
            <div class="col-md-6 py-5 px-4 text-white" style="background-color:slateblue">
                <h2 style="text-align: left;">To Create / Login an Account</h2>
                <!-- Display any error messages -->
                <?php if (isset($_SESSION['errors'])): ?>
                    <div class="alert alert-danger">
                        <?php
                        foreach ($_SESSION['errors'] as $error) {
                            echo "<p>$error</p>";
                        }
                        unset($_SESSION['errors']);
                        ?>
                    </div>
                <?php endif; ?>


                <form method="POST" id="login-form" action="offer.php" enctype="multipart/form-data" onsubmit="return validateForm()">
                    <div class="mb-3 login_box">
                        <label for="name" class="form-label">Type your name.</label>
                        <input class="form-control" type="text" autocomplete="off" id="name" name="name" placeholder="Enter your name"
                            value="<?php echo isset($_SESSION['old']['name']) ? htmlspecialchars($_SESSION['old']['name']) : ''; ?>">
                        <div id="nameError" class="form-text text-danger-emphasis" style="display:none;">Please enter your name.</div>
                    </div>
                    <div class="mb-3 login_box">
                        <label for="mobile-number" class="form-label">Type your MOBILE number</label>
                        <input class="form-control" type="text" autocomplete="off" id="mobile-number" name="mobile-number" minlength="10" maxlength="10" onkeypress="return isNumeric(event)"
                            inputmode="tel" placeholder="Mobile Number" value="<?php echo isset($_SESSION['old']['mobile-number']) ? htmlspecialchars($_SESSION['old']['mobile-number']) : ''; ?>">
                        <div id="mobileError" class="form-text text-danger-emphasis" style="display:none;">Please enter a valid 10-digit mobile number.</div>
                    </div>
                    <div class="mb-3 login_box">
                        <label for="pan-number" class="form-label">Type your PAN Number.</label>
                        <input class="form-control" type="text" autocomplete="off" id="pan-number" name="pan-number" placeholder="PAN Number"
                            value="<?php echo isset($_SESSION['old']['pan-number']) ? htmlspecialchars($_SESSION['old']['pan-number']) : ''; ?>">
                        <div id="panError" class="form-text text-danger-emphasis" style="display:none;">Please enter a valid PAN number (5 letters, 4 digits, 1 letter).</div>
                    </div>
                    <div class="form-check terms_service">
                        <input class="form-check-input" type="checkbox" id="tnccheck" name="tnccheck" <?php echo isset($_SESSION['old']['tnccheck']) ? 'checked' : ''; ?>>
                        <label class="form-check-label" for="tnccheck">
                            By checking this box, I give my consent to receive digital communications, including calls, SMS, emails, and WhatsApp messages, on my provided phone number, email address, and app from RUPEE112.<br>Additionally, I confirm that I have read and agree to your &nbsp;<a class="" target="_blank" href="terms-and-conditions.php">"Terms and Conditions"</a> and <a class="" target="_blank" href="privacy-policy.php">"Privacy Policy"</a>.
                        </label>
                        <div id="tncError" class="form-text text-danger-emphasis" style="display:none;">Please agree to the terms and conditions.</div>
                    </div>
                    <div class="button">
                        <button href="#" id="login-sbm" class="btn btn-success">Submit</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</section>

<?php
include "elements/footer.php";
?>


<script>
    // Function to check if a keypress is numeric
    function isNumeric(event) {
        var key = event.key;
        return /^[0-9]$/.test(key);
    }

    // Form validation function
    function validateForm() {
        let isValid = true;

        // Validate name
        const name = document.getElementById("name").value;
        const nameError = document.getElementById("nameError");
        if (name.trim() === "") {
            nameError.style.display = "block";
            isValid = false;
        } else {
            nameError.style.display = "none";
        }

        // Validate mobile number
        const mobileNumber = document.getElementById("mobile-number").value;
        const mobileError = document.getElementById("mobileError");
        if (!/^[0-9]{10}$/.test(mobileNumber)) {
            mobileError.style.display = "block";
            isValid = false;
        } else {
            mobileError.style.display = "none";
        }

        // Validate PAN number
        const panNumber = document.getElementById("pan-number").value;
        const panError = document.getElementById("panError");
        if (!/^[A-Z]{5}[0-9]{4}[A-Z]{1}$/.test(panNumber)) {
            panError.style.display = "block";
            isValid = false;
        } else {
            panError.style.display = "none";
        }

        // Check terms and conditions
        const tncCheck = document.getElementById("tnccheck");
        const tncError = document.getElementById("tncError");
        if (!tncCheck.checked) {
            tncError.style.display = "block";
            isValid = false;
        } else {
            tncError.style.display = "none";
        }

        return isValid; // Prevent form submission if any validation fails
    }
</script>