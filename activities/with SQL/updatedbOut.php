<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">

<head>
    <meta content="text/html; charset=utf-8" http-equiv="Content-Type" />
    <title>Update Result</title>
</head>

<body>
    <?php
    include('connect.php');

    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    $sql = "UPDATE sptbl SET cusN='$_POST[newName]', cusAdr='$_POST[newAdd]', cusEad='$_POST[newEAdd]', cusNum='$_POST[newconNum]', cusAdrLnd='$_POST[newAddLnd]' WHERE ID='$_POST[idDB]'";
    $result = $conn->query($sql);

    if ($result === TRUE) {
        echo "Record updated successfully";
        header("refresh:3; url=updatedb.php");
    } else {
        echo "Error updating record: " . $conn->error;
    }

    $conn->close();
    ?>
</body>

</html>