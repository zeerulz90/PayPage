<?php
require_once('vendor/autoload.php');
require_once('config/db.php');
require_once('lib/pdo_db.php');
require_once('models/Customer.php');
require_once('models/Transaction.php');

\Stripe\Stripe::setApiKey('sk_test_qzKO2b0TrIecSSlIybbnVEdB');

//Sanitize POST Array
$POST = filter_var_array($_POST, FILTER_SANITIZE_STRING);

$first_name = $POST['first_name'];
$last_name = $POST['last_name'];
$email = $POST['email'];
$token = $POST['stripeToken'];

//Create customer in Stripe
$customer = \Stripe\Customer::create(array(
  "email" => $email,
  "source" => $token));

//Charge Customer
$charge = \Stripe\Charge::create(array(
  "amount" => 5000,
  "currency" => "usd",
  "description" => "Intro To React Course",
  "customer" => $customer->id
));

//Customer data
$customerData = [
  'id' => $charge->customer,
  'first_name' => $first_name,
  'last_name' => $last_name,
  'email' => $email
];

//Instantiate Customer
$customer = new Customer();

//Add customer to DB
$customer->addCustomer($customerData);



//Transaction data
$transactionData = [
  'id' => $charge->id,
  'customer_id' => $charge->customer,
  'product' => $charge->description,
  'amount' => $charge->amount,
  'currency' => $charge->currency,
  'status' => $charge->status
];

//Instantiate Transaction
$transaction = new Transaction();

//Add transaction to DB
$transaction->addTransaction($transactionData);

//Redirect to success
header('Location: success.php?tid='.$charge->id.'&product='.$charge->description);
?>
