<?php 
include('connection.php');

date_default_timezone_set("Asia/Hong_Kong");
$currentDate = date('Y-m-d');

$expSub = 'Expired';

$sql = mysqli_query($con, "UPDATE clinics SET SubscriptionStatus='$expSub' WHERE ExpiryDateOfSub='$currentDate'");

echo "Subscription update successful!";

?>