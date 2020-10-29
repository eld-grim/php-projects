<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">

<head>
    <meta content="text/html; charset=utf-8" http-equiv="Content-Type" />
    <title>Deletion Result</title>
</head>

<body>
    <?php
    include('connect.php');

    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    $sql = "DELETE FROM sptbl WHERE ID='$_POST[delete]'";
    $result = $conn->query($sql);

    if ($result === TRUE) {
        echo "Record deleted successfully";
        header("refresh:3; url=deletedb.php");
    } else {
        echo "Error deleting record: " . $conn->error;
    }

    $conn->close();
    ?>
</body>

</html>