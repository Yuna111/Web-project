<?php
session_start();// function to calculate the total price;

$total = 0;
$rentalDays = $_REQUEST["rentalDays"];
$i = 0;
foreach ($_SESSION["cart"] as $id => $item) {
    $_SESSION["cart"][$id]["RentalDays"] = $rentalDays[$i];
    $total += $rentalDays[$i++] * $item["PricePerDay"];
}
$_SESSION["total"]=$total;
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
      <title>Check Out</title>
    <style>
    .home .logo {
      position: absolute;
      left: 0;
      top: 0;
      z-index: 5;
      width: 200px;
      height: 56px;
      background: url("hertz-uts.png") no-repeat;
      background-size: contain;
    }

    form{
      margin-top: 50px;
      margin-left: 280px;
      margin-right: 280px;
    }

  p{
    margin-top: 100px;
    margin-left: 280px;
  }
  span{
    color: red;
  }

    </style>



</head>
<body>
  <nav class="navbar fixed-top navbar navbar-dark bg-dark">
	<a style="color:white;">Hertz-UTS</a>
  <a class="navbar-brand" href="#"><h3>Check Out Form<h3></a>
</nav>

	<p><i><b>Please fill in your details with<span>*<span></b></i></p>
	<form method="post" action="SendEmail.php">
  <div class="form-group row">
    <label for="inputEmail3" class="col-sm-2 col-form-label">First Name<span class="error">* </span></label>
    <div class="col-sm-10">
      <input type="text" class="form-control" id="FirstName" placeholder="First Name">
    </div>
  </div>
  <div class="form-group row">
    <label for="inputPassword3" class="col-sm-2 col-form-label">Last Name<span class="error">* </span></label>
    <div class="col-sm-10">
      <input type="text" class="form-control" id="LastName" placeholder="Last Name">
    </div>
  </div>
	<div class="form-group row">
    <label for="inputPassword3" class="col-sm-2 col-form-label">Email Address<span class="error">* </span></label>
    <div class="col-sm-10">
      <input type="text" class="form-control" id="EmailAddress" placeholder="Email Address">
    </div>
  </div>
	<div class="form-group row">
    <label for="inputPassword3" class="col-sm-2 col-form-label">Address Line 1<span class="error">* </span></label>
    <div class="col-sm-10">
      <input type="text" class="form-control" id="AddressLine1" placeholder="Address Line 1">
    </div>
  </div>
	<div class="form-group row">
    <label for="inputPassword3" class="col-sm-2 col-form-label">Address Line 2</label>
    <div class="col-sm-10">
      <input type="password" class="form-control" id="AddressLine2" placeholder="Address Line 2">
    </div>
  </div>
	<div class="form-group row">
    <label for="inputPassword3" class="col-sm-2 col-form-label">City<span class="error">* </span></label>
    <div class="col-sm-10">
      <input type="text" class="form-control" id="City" placeholder="City">
    </div>
  </div>
	<div class="form-group row">
    <label for="inputPassword3" class="col-sm-2 col-form-label">State<span class="error">* </span></label>
    <div class="col-sm-10">
      <select class="form-control" required id="state" name="state">
                    <option selected>New South Wales</option>
                    <option>Queensland</option>
                    <option>South Australia</option>
                    <option>Western Australia</option>
                    <option>Victoria</option>
                </select>

    </div>
  </div>
	<div class="form-group row">
    <label for="inputPassword3" class="col-sm-2 col-form-label">Post Code<span class="error">* </span></label>
    <div class="col-sm-10">
      <input type="String" class="form-control" id="PostCode" placeholder="Post Code">
    </div>
  </div>
	<div class="form-group row">
    <label for="inputPassword3" class="col-sm-2 col-form-label">Payment Type<span class="error">* </span></label>
    <div class="col-sm-10">
			<select id="country" name="country">
      <option value="australia">Visa</option>
      <option value="canada">Mastercard</option>
      <option value="usa">Paypal</option>
    </select>
    </div>
  </div>

        <h3>Total Price: $<?php echo $total;?></h3>
        <div class="form-group row">
            <div class="col-sm-12 text-right">

                <button type="submit" class="btn btn-outline-success btn-block" onclick="alert('send successfully')">Submit</button>
            </div>
        </div>
    </form>
    </div>
    <script>
    document.getElementById("sub").addEventListener("click", function () {
    		var FirstName = document.getElementById("FirstName").value;
    		var LastName = document.getElementById("LastName").value;
    		var userAddress = document.getElementById("AddressLine1").value;
    		var userSuburb = document.getElementById("City").value;
    		var userState = document.getElementById("State").value;
    		var userCountry = document.getElementById("PostCode").value;
    		var userMail = document.getElementById("EmailAddress").value;
    		if (FirstName == "" || LastName == "" ||userAddress == "" || userSuburb == "" || userState == "" || userCountry == "" || userMail == "") {
    				alert("Please complete all the necessary details with * before submitting");
    document.getElementById("errorMsg").innerHTML="Please complete all the necessary details with * before submitting";
    				return;
    		}
    		var myreg = /^([a-zA-Z0-9]+[_|\_|\.]?)*[a-zA-Z0-9]+@([a-zA-Z0-9]+[_|\_|\.]?)*[a-zA-Z0-9]+\.[a-zA-Z]{2,3}$/;
    	if (!myreg.test(userMail)) {
    				alert('Invaild email address');
    	document.getElementById("errorMsg").innerHTML="Invaild email address";
    				return;
    		}
    else{alert('successfully send');
  }
}
</body>
</html>
