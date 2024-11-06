<?php
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
                <form method="POST" id="login-form" action="offer.php">
                    <div class="mb-3 login_box">
                        <label for="name" class="form-label">Type your name.</label>
                        <input class="form-control" type="text" autocomplete="off" id="name" name="name" placeholder="Enter your name" aria-describedby="nameError">
                        <div id="nameError" class="form-text">Please enter valid mobile number.</div>
                    </div>
                    <div class="mb-3 login_box">
                        <label for="mobile-number" class="form-label">Type your MOBILE number</label>
                        <input class="form-control" type="text" autocomplete="off" id="mobile-number" name="mobile-number" minlength="10" onkeypress="return isNumeric(event)" maxlength="10" inputmode="tel" placeholder="Mobile Number" aria-describedby="mobileError">
                        <div id="mobileError" class="form-text">Please enter valid mobile number.</div>
                    </div>
                    <div class="mb-3 login_box">
                        <label for="email" class="form-label">Type your Email Address</label>
                        <input class="form-control" type="email" autocomplete="off" id="email" name="email" placeholder="Enter your email" aria-describedby="emailError">
                        <div id="emailError" class="form-text">Please enter your valid email address.</div>
                    </div>
                    <div class="mb-3 login_box">
                        <label for="pan-number" class="form-label">Type your PAN Number.</label>
                        <input class="form-control" type="text" autocomplete="off" id="pan-number" name="pan-number" placeholder="PAN Number" aria-describedby="panError">
                        <div id="panError" class="form-text">Please enter your valid PAN number.</div>
                    </div>
                    <div class="form-check terms_service">
                        <input class="form-check-input" type="checkbox" id="tnccheck"> <label class="form-check-label" for="tnccheck">
                            By checking this box, I give my consent to receive digital communications, including calls, SMS, emails, and WhatsApp messages, on my provided phone number, email address, and app from RUPEE112.<br>Additionally, I confirm that I have read and agree to your &nbsp;<a class="" target="_blank" href="terms-and-conditions.php">"Terms and Conditions"</a> and <a class="" target="_blank" href="privacy-policy.php">"Privacy Policy"</a>. </label>
                    </div>
                    <div class="button">
                        <button href="#" id="login-sbm" class="btn btn-success">GET OTP</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</section>

<?php
include "elements/footer.php";

?>