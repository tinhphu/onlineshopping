<?php
require_once 'dbconnect.php';

$conn = connectDB();
if (isset($_POST['fid']) && 
    isset($_POST['fname'])) {
        $controlUpdate = $_POST['controlUpdate'];
        $fid = $_POST['fid'];
        $fname = $_POST['fname'];
        $fad = $_POST['fad'];
        $fphone = $_POST['fphone'];
        $femail = $_POST['femail'];
        $AccountID = $_POST['AccountID'];

        if ($controlUpdate == 1) {
            $sql = "UPDATE customer SET CustomerName='$fname', CustomerAddress='$fad', CustomerPhone='$fphone', CustomerEmail='$femail', AccountID='$AccountID' WHERE CustomerID=$fid";
        } else {
            $sql = "insert into customer(CustomerID, CustomerName, CustomerAddress, CustomerPhone, CustomerEmail, AccountID) values('$fid', '$fname', '$fad', '$fphone', '$femail', '$AccountID')";
        }
        
        if (mysqli_query($conn, $sql)) {
            echo "New record created successfully <a href='javascript: history.go(-1)'>Back to page</a>";
        } else {
            echo "Error: " . $sql . "<br>" . mysqli_error($conn);
        }
        
        
    }

mysqli_close($conn);


?>