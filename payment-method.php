<?php
session_start();
error_reporting(0);
include('includes/config.php');

if (strlen($_SESSION['login']) == 0) {
    header('location:login.php');
} else {
    if (isset($_POST['submit'])) {
        // Generate a random amount between 100 and 1000
        $randomAmount = rand(100, 1000);

        // Update the paymentMethod and set a random amount
        mysqli_query($con, "update orders set paymentMethod='" . $_POST['paymethod'] . "', amount='" . $randomAmount . "' where userId='" . $_SESSION['id'] . "' and paymentMethod is null ");

        unset($_SESSION['cart']);
        header('location:order-history.php');
    }
    ?>
    <!DOCTYPE html>
    <html lang="en">

    <!-- ... (rest of your HTML code) ... -->

    <body class="cnt-home">

        <header class="header-style-1">
            <?php include('includes/top-header.php'); ?>
            <?php include('includes/main-header.php'); ?>
            <?php include('includes/menu-bar.php'); ?>
        </header>
        <div class="breadcrumb">
            <!-- ... (rest of your breadcrumb code) ... -->
        </div>

        <div class="body-content outer-top-bd">
            <div class="container">
                <div class="checkout-box faq-page inner-bottom-sm">
                    <div class="row">
                        <div class="col-md-12">
                            <!-- ... (rest of your code) ... -->

                            <form name="payment" method="post">
                                <input type="radio" name="paymethod" value="COD" checked="checked"> COD
                                <form> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<script src="https://checkout.razorpay.com/v1/payment-button.js" data-payment_button_id="pl_LWD15ksMv0Ctk2" async> </script> </form>
                                <input type="submit" value="submit" name="submit" class="btn btn-primary">
                            </form>

                            <!-- ... (rest of your code) ... -->
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- ... (rest of your code) ... -->

    </body>

    </html>
<?php } ?>
