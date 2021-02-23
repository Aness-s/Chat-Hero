<?php
$fname = $_POST['userid'];
$lname = $_POST['usermsg'];
$date = date_create();
$times = date_format($date, 'U = Y-m-d H:i:s');

$conn = new mysqli('35.203.54.110', 'root', '1234', 'rm1');

if (mysqli_connect_error()) {
    die('Connect Error('. mysqli_connect_errno().')'. mysqli_connect_error());
} else {
    $stmt = $conn->prepare("INSERT Into chat (userid, message) values(?, ?)");
    $stmt->bind_param("ss", $fname, $lname);
    $execval = $stmt->execute();
    

    $stmt->close();
    $conn->close();

    header("Location:http://localhost/rm1.php?fname={$fname}&room=1");
    exit();
}

?>