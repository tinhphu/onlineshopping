<?php
require_once 'dbconnect.php';

$conn = connectDB();
if (isset($_POST['fid']) && 
    isset($_POST['fname'])) {
        $controlUpdate = $_POST['controlUpdate'];
        $fid = $_POST['fid'];
        $fname = $_POST['fname'];
        $fdate = $_POST['fdate'];
        $famount = $_POST['famount'];

        if ($controlUpdate == 1) {
            $sql = "UPDATE category SET CategoryName='$fname', CategoryDate='$fdate', Categoryamount='$famount' WHERE CategoryID=$fid";
        } else {
            $sql = "insert into category(CategoryID, CategoryName, CategoryDate, Categoryamount) values('$fid', '$fname', '$fdate', '$famount')";
        }
        
        if (mysqli_query($conn, $sql)) {
            echo "New record created successfully <a href='javascript: history.go(-2)'>Back to page</a>";
        } else {
            echo "Error: " . $sql . "<br>" . mysqli_error($conn);
        }
        
        
    }

mysqli_close($conn);


?>