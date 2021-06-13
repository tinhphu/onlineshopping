<?php
require_once 'dbconnect.php';

$conn = connectDB();
//We use $ _POST to post the data we entered earlier in the variables.
if (isset($_POST['fid']) && 
    isset($_POST['fname'])) {
        $controlUpdate = $_POST['controlUpdate'];
        $fid = $_POST['fid'];
        $fname = $_POST['fname'];
        $fprice = $_POST['fprice'];
        $fdescrip = $_POST['fdescrip'];
        $finfo = $_POST['finfo'];
        $fpicture = $_POST['fpicture'];
        $Picture1 = $_POST['Picture1'];
        $Picture2 = $_POST['Picture2'];
        $CategoryID = $_POST['CategoryID'];

        if ($controlUpdate == 1) {
            //UPDATE is a query used to edit existing records in the table according to ProductID
            $sql = "UPDATE product SET ProductName='$fname', ProductPrice='$fprice', ProductDescription='$fdescrip', ProductInfo='$finfo', ProductPicture='$fpicture', Picture1='$Picture1', Picture2='$Picture2', CategoryID='$CategoryID' WHERE ProductID=$fid";
        } else {
            //Insert is the query used to add
            $sql = "INSERT into product(ProductID, ProductName, ProductPrice, ProductDescription, ProductInfo, ProductPicture, Picture1, Picture2, CategoryID) VALUES('$fid', '$fname', '$fprice', '$fdescrip', '$finfo', '$fpicture', '$Picture1', '$Picture2', '$CategoryID')";
        }
        //The mysqli_query () function will perform the query against the database.
        if (mysqli_query($conn, $sql)) {
            echo "New record created successfully <a href='javascript: history.go(-2)'>Back to page</a>";
        } else {
            echo "Error: " . $sql . "<br>" . mysqli_error($conn);
        }
        
        
    }

mysqli_close($conn);


?>