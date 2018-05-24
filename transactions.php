<?php
  require_once ('config/db.php');
  require_once ('lib/pdo_db.php');
  require_once ('models/Transaction.php');

  //Instantiate Transaction
  $transaction = new Transaction();

  //Get Transaction
  $transactions = $transaction->getTransactions();
?>

<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" integrity="sha384-WskhaSGFgHYWDcbwN70/dfYBj47jz9qbsMId/iRN3ewGhXQFZCSftd1LZCfmhktB" crossorigin="anonymous">
    <title>View Transactions</title>
  </head>
  <body>

    <div class="container mt-4">
      <div class="btn-group" role="group">
        <a href="customers.php" class="btn btn-secondary">Customers</a>
        <a href="transactions.php" class="btn btn-primary">Transactions</a>
      </div>
      <hr>
      <h2>Transactions</h2>
      <table class="table table-striped">
        <thead>
          <tr>
            <th>Transaction ID</th>
            <th>Customer ID</th>
            <th>Product</th>
            <th>Amount</th>
            <th>Date</th>
          </tr>
        </thead>
        <tbody>
          <?php foreach ($transactions as $t): ?>
            <tr>
              <td><?php echo $t->id; ?></td>
              <td><?php echo $t->customer_id; ?></td>
              <td><?php echo $t->product; ?></td>
              <td><?php echo sprintf('%.2f', $t->amount / 100).' '.strtoupper($t->currency); ?></td>
              <td><?php echo $t->created_at; ?></td>
            </tr>
          <?php endforeach; ?>
        </tbody>
      </table>
      <br>

      <p><a href="index.php" class="btn btn-light">Pay Page</a></p>
    </div>

  </body>
</html>
