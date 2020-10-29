<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">

<head>
    <meta content="text/html; charset=utf-8" http-equiv="Content-Type" />
    <title>Entry Deletion from Database</title>
</head>

<body>
    <form method="post" action="deletedbOut.php">
        Insert ID Number to Delete: <input type="number" name="delete" /></br>
        <input type="submit" value="Delete" />
        <input type="reset" value="Clear" /></br>
    </form>
    </br>
    <h3>Database Contents</h3>
    <table border="1" cellpadding="1" cellspacing="1">
        <tr>
            <th>ID</th>
            <th>Name</th>
            <th>Address</th>
            <th>Email Address</th>
            <th>Contact Number</th>
            <th>Address Landmark</th>
            <th>Delivery Route</th>
            <th>Delivery Hub to Destination</th>
            <th>Scheduled Delivery Date</th>
            <th>Scheduled Delivery Time</th>
            <th>Amount of Product</th>
            <th>Total Cost Of Delivery</th>
            <th>Customer Total Amount to Pay</th>
            <th>Change</th>
            <th>Total Fuel Consumption (L)</th>
            <th>Total Fuel Cost (PHP)</th>
            <th>Date & Time of Registration</th>
        </tr>
        <?php
        include('connect.php');

        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        }

        $sql = "SELECT * FROM sptbl";
        $result = $conn->query($sql);

        if ($result->num_rows > 0) {
            while ($row = $result->fetch_array()) {
                echo "<tr>";
                echo "<td>" . $row['ID'] . "</td>";
                echo "<td>" . $row['cusN'] . "</td>";
                echo "<td>" . $row['cusAdr'] . "</td>";
                echo "<td>" . $row['cusEad'] . "</td>";
                echo "<td>" . $row['cusNum'] . "</td>";
                echo "<td>" . $row['cusAdrLnd'] . "</td>";
                echo "<td>" . $row['delRte'] . "</td>";
                echo "<td>" . $row['delDes'] . "</td>";
                echo "<td>" . $row['delSchd'] . "</td>";
                echo "<td>" . $row['delScht'] . "</td>";
                echo "<td>" . $row['amtPr'] . "</td>";
                echo "<td>" . $row['delCt'] . "</td>";
                echo "<td>" . $row['cPay'] . "</td>";
                echo "<td>" . $row['chg'] . "</td>";
                echo "<td>" . $row['tFuelcns'] . "</td>";
                echo "<td>" . $row['tFuelct'] . "</td>";
                echo "<td>" . $row['regDT'] . "</td>";
                echo "</tr>";
            }
            $result->free();
        } else {
            echo "0 results";
        }
        $conn->close();
        ?>
    </table>
    <br>
    <a href="homepage.php">Go Back to Menu</a>
</body>

</html>