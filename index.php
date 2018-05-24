<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="css/style.css" type="text/css" rel="stylesheet">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" integrity="sha384-WskhaSGFgHYWDcbwN70/dfYBj47jz9qbsMId/iRN3ewGhXQFZCSftd1LZCfmhktB" crossorigin="anonymous">
    <title>Pay Page</title>
  </head>
  <body>
    <div class="container">
      <h2 class="my-4 text-center">Intro To React Course [$50]</h2>
      <form action="./charge.php" method="post" id="payment-form">
        <div class="form-row">
          <input type="text" name="first_name" class="form-control mb-3 StripeElement StripeElement--empty" placeholder="First Name">
          <input type="text" name="last_name" class="form-control mb-3 StripeElement StripeElement--empty" placeholder="Last Name">
          <input type="email" name="email" class="form-control mb-3 StripeElement StripeElement--empty" placeholder="Email Address">
          <div id="card-element" class="form-control">
            <!-- A Stripe Element will be inserted here. -->
          </div>

          <!-- Used to display form errors. -->
          <div id="card-errors" role="alert"></div>
        </div>
        <button>Submit Payment</button>
      </form>

      <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
      <script src="https://js.stripe.com/v3/"></script>
      <script src="js/charge.js"></script>
    </div>
  </body>
</html>
