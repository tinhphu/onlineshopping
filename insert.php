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

        $sql = "SELECT * FROM customer where AccountID = $AccountID";
        $result = mysqli_query($conn, $sql);
        $row=mysqli_fetch_assoc($result);

        if ($row) {
            if($row['AccountID'] == $AccountID){
                $Update = "UPDATE customer SET CustomerName='$fname', CustomerAddress='$fad', CustomerPhone='$fphone', CustomerEmail='$femail', AccountID='$AccountID' WHERE CustomerID=$fid";
                if(mysqli_query($conn, $Update)){
                    echo "update successfully <a href='javascript: history.go(-1)'>Back to page</a>";
                }
            }
        } else {
            $sql1 = "INSERT INTO customer(CustomerID, CustomerName, CustomerAddress, CustomerPhone, CustomerEmail, AccountID) values('$fid', '$fname', '$fad', '$fphone', '$femail', '$AccountID')";
            if (mysqli_query($conn, $sql1)) {
                echo "New record created successfully <a href='javascript: history.go(-1)'>Back to page</a>";
            }
        }
    }

mysqli_close($conn);


?>