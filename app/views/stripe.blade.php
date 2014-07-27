<!DOCTYPE html>
<html lang="en">
<head>
    <meta http-equiv="Content-type" content="text/html; charset=utf-8" />
    <title>Billing</title>

    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap.min.css">
    <!-- The required Stripe lib -->
    <script type="text/javascript" src="https://js.stripe.com/v2/"></script>

</head>
<body>

<form action="" method="POST">
    <script
        src="https://checkout.stripe.com/checkout.js" class="stripe-button"
        data-key="pk_test_4Te47S8wjPLWUR2HsfadSWJ8"
        data-amount="500"
        data-name="App Rocket"
        data-description="Start Account (Monthly $5.00)"
        data-panel-label="Subscribe"
        data-email="{{{ Auth::user()->email }}}"
        data-label="Starter Account"
        data-image="/128x128.png">
    </script>
    <input type="hidden" value="starter" name="subscription" />
</form>

<form action="" method="POST">
    <script
        src="https://checkout.stripe.com/checkout.js" class="stripe-button"
        data-key="pk_test_4Te47S8wjPLWUR2HsfadSWJ8"
        data-amount="1000"
        data-name="App Rocket"
        data-description="Pro Account (Monthly $10.00)"
        data-panel-label="Subscribe"
        data-email="{{{ Auth::user()->email }}}"
        data-label="Pro Account"
        data-image="/128x128.png">
    </script>
    <input type="hidden" value="pro" name="subscription" />
</form>

</body>
</html>