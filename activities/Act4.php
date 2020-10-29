<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">

<head>
<meta content="text/html; charset=utf-8" http-equiv="Content-Type" />
<title>Shopee Delivery</title>
</head>

<body>
<?php
if (isset($_POST['amtprod'])&&isset($_POST['dcost']))
{
$amtp = $_POST['amtprod'];
$costd = $_POST['dcost'];
$payment = $_POST['pay'];
$fuelc = $_POST['fcost'];
$kmdel = $_POST['ddeliver'];
$fuelr = $_POST['frate'];


if (empty($amtp)&&empty($costd)&&empty($payment)&&empty($fuelc)&&empty($kmdel)&&empty($fuelr))
{
	echo "Pls. input the numbers first!!";
	
}
else
{
//arithmetic operations
$cd = ($amtp * $costd/100);
$ctotalp = $cd + $amtp;
$cost = $payment - $ctotalp;
$ftcons = $kmdel / $fuelr;
$ftcost = ($kmdel / $fuelr) * $fuelc;
}
}
?>
</head>

<body>

<form method="post" action="Act4Out.php">
<h3>Customer Information:</h3>
    Name: <input type="text" name="name" /></br>
    Address: <textarea name="address"> </textarea></br>
    Gender: <select name="formGender">
                <option value="">Select...</option>
                <option value="Male">Male</option>
                <option value="Female">Female</option>
            </select><br>
    Email Address:<input type="email" name="emailadd" /></br>
    Contact Number:<input type="number" name="contact" /></br>
    Address Landmark:<textarea name="addland"> </textarea></br>

<h3>Delivery Information:</h3>
    Delivery Route: <input type="text" name="droute" /></br>
    Delivery Hub to Destination (km): <input type="number" name="dhub" /></br>
    Schedule of Delivery: <input type="date" name="schedday" /> <input type="time" name="schedtime" /></br>
    Amount of Product: <input type="number" name="amtprod" /></br>
    Cost of Delivery (10%): <input type="number" name="dcost" /></br>
    Payment: <input type="number" name="pay" /></br>

<h3>Fuel Consumption:</h3>
    Fuel Cost: <input type="number" name="fcost" /></br>
    Total km of Delivery: <input type="number" name="ddeliver" /></br>
    Fuel Rate (km/L): <input type="number" name="frate" /></br>

<input type="submit" value="Submit" /></br>
<input type="reset" value="Clear" /></br>
</form>


</body>

</html>
