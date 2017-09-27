<?php include('./_head.php'); ?>

<div class="container page">
    <?php include ($config->paths->content.'billing/process-steps.php'); ?>
    <h1>Success!</h1>
    <p>Your order has been received and will be processed shortly. Your confirmation number is: <strong>AX67932<!-- TODO: replace hardcoded confirmation --></strong></p>
    <h3>Thank you for your purchase, Barbara!<!-- TODO: replace hardcoded name --></h3>
    <p>A confirmation was sent to the email:</p>
    <p><strong>&emsp;me@gmail.com<!-- TODO: replace hardcoded email --></strong></p>
    <p>This email contains the order information as well as your confirmation number. Please print for your records.</p><br>
    <button class="btn btn-info" type="button" name="button">Continue to Your Account</button>
</div>

<?php include('./_foot.php'); // include footer markup ?>
