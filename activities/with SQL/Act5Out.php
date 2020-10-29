<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">

<head>
    <meta content="text/html; charset=utf-8" http-equiv="Content-Type" />
    <title>Shopee Delivery Receipt</title>

</head>

<body>
    <?php
    if (isset($_POST['amtprod']) && isset($_POST['dcost'])) {
        $amtp = $_POST['amtprod'];
        $costd = $_POST['dcost'];
        $payment = $_POST['pay'];
        $fuelc = $_POST['fcost'];
        $kmdel = $_POST['ddeliver'];
        $fuelr = $_POST['frate'];


        //arithmetic operations
        $cd = ($amtp * $costd / 100);
        $ctotalp = $cd + $amtp;
        $cost = $payment - $ctotalp;
        $ftcons = $kmdel / $fuelr;
        $ftcost = ($kmdel / $fuelr) * $fuelc;

        include('connect.php');
        $fname = $_POST['name'];
        $address = $_POST['address'];
        $email = $_POST['emailadd'];
        $contnum = $_POST['contact'];
        $adrland = $_POST['addland'];
        $delr = $_POST['droute'];
        $deld = $_POST['dhub'];
        $schd = $_POST['schedday'];
        $scht = $_POST['schedtime'];

        $sql = "INSERT INTO sptbl (cusN, cusAdr, cusEad, cusNum, cusAdrLnd, delRte, delDes, delSchd, delScht, amtPr, delCt, cPay, chg, tFuelcns, tFuelct)
        VALUES ('$fname', '$address', '$email', '$contnum', '$adrland', '$delr', '$deld', '$schd', '$scht', '$amtp', '$cd', '$ctotalp', '$cost', '$ftcons', '$ftcost')";
        if ($conn->query($sql) === TRUE) {
            echo "New record created successfully";
        } else {
            echo "Error: " . $sql . "<br>" . $conn->error;
        }

        $conn->close();
    }
    ?>
    <form method="post">
        <h3>Customer Information:</h3>
        Name: <input type="text" name="name" value="<?php echo $_POST['name'] ?>" readonly="" /></br>
        Address: <textarea name="address" readonly=""><?php echo $_POST['address'] ?> </textarea></br>
        Email Address:<input type="email" name="emailadd" value="<?php echo $_POST['emailadd'] ?>" readonly="" /></br>
        Contact Number:<input type="number" name="contact" value="<?php echo $_POST['contact'] ?>" readonly="" /></br>
        Address Landmark:<textarea name="addland" readonly=""><?php echo $_POST['addland'] ?> </textarea></br>

        <h3>Delivery Information:</h3>
        Delivery Route: <input type="text" name="droute" value="<?php echo $_POST['droute'] ?>" readonly="" /></br>
        Delivery Hub to Destination (km): <input type="number" name="dhub" value="<?php echo $_POST['dhub'] ?>" readonly="" /></br>
        Schedule of Delivery: <input type="date" name="schedday" value="<?php echo $_POST['schedday'] ?>" readonly="" /> <input type="time" name="schedtime" value="<?php echo $_POST['schedtime'] ?>" readonly="" /></br>
        Amount of Product: <input type="number" name="amtprod" value="<?php echo $_POST['amtprod'] ?>" readonly="" /></br>
        Total Cost of Delivery: <input type="number" name="delamt" value="<?php echo $cd ?>" readonly="" /></br>
        Customer Total Amount to pay: <input type="number" name="totalpay" value="<?php echo $ctotalp ?>" readonly="" /></br>
        Change: <input type="number" name="cost" value="<?php echo $cost ?>" readonly="" /></br>

        <h3>Fuel Consumption:</h3>
        Total Fuel Consumption (in Liters): <input type="number" name="fuelcons" value="<?php echo $ftcons ?>" readonly="" /></br>
        Total Fuel Cost (in Peso): <input type="number" name="fueltcost" value="<?php echo $ftcost ?>" readonly="" /></br>
    </form>
    </br>
    <a href="Act5.php">Insert New Entry</a></br>
    <a href="homepage.php">Go Back to Menu</a>
</body>

</html>