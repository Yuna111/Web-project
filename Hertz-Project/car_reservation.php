<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
    <!--stylesheet reference -->
    <title>Car Reservation</title>
<style>

</style>
</head>
<body>
  <div><nav class="navbar fixed-top navbar navbar-dark bg-dark">
  <a style="color:white;">Hertz-UTS</a>
  <a class="navbar-brand" href="#"><h3>Car Rental Center<h3></a>
  </div>
  </nav>
  <br><br><br><br><br>
  <div>
    <?php
    session_start();
    if (empty($_SESSION["cart"])) //No cars
{

  echo '<form id="checkoutForm" method="post" action="1.php">';  //Display the cars in the form of table
  echo '<div class="container">
              <table class="table">
                  <thead>
                  <tr>
                      <th>Thumbnail</th>
                      <th>Vehicle</th>
                      <th>Price Per Day</th>
                      <th>Rental Days</th>
                      <th>Actions</th>
                  </tr>
                  </thead>
                  <tbody>';
                  echo '</tbody>
                  </table>
                       <br><br><br><br><br><br>
                      <button type="submit" form="checkoutForm" class="btn btn-outline-success btn-block">Checkout</button><br>
                  </div></form>';

}
else {
  echo '<form id="checkoutForm" method="post" action="checkout.php">';  //Display the cars in the form of table
  echo '<div class="container">
              <table class="table">
                  <thead>
                  <tr>
                      <th>Thumbnail</th>
                      <th>Vehicle</th>
                      <th>Price Per Day</th>
                      <th>Rental Days</th>
                      <th>Actions</th>
                  </tr>
                  </thead>
                  <tbody>';



      foreach ($_SESSION["cart"] as $id => $CAR) // Use session to print the details of selected cars
      {
          echo '<tr>';
          echo '<td class="align-middle" scope="row"><img style="width: 90px; height: 70px;" class="img-thumbnail" src="images/'.$CAR["Model"].'.jpg"></td>';
          echo '<td class="align-middle" class="align-middle">'.$CAR["Model"].'</td>';
          echo '<td class="align-middle">'.$CAR["PricePerDay"].'</td>';
          echo '<td class="align-middle"><input name="rentalDays[]" type="number" required max="90" min="1" value="'.$CAR["RentalDays"].'" </td>';
          echo '<td class="align-middle"><button type="submit" onclick="document.getElementById(\'deleteId\').value=' . $id . '" class="btn btn-outline-danger" form="Delete">Delete</button></td></tr>';
      }

      echo '</tbody>
      </table>
           <br>
          <button type="submit" form="checkoutForm" class="btn btn-outline-success btn-block">Checkout</button><br>
      </div></form>';

  // code...
}   //check if there are cars in the shopping cart

    ?>

<form id="Delete" method="post" action="deleteCar.php">  <!-- call the delete car function-->
<input hidden name="id" id="deleteId" value="">
</form>

  </div>




</body>
</html>
