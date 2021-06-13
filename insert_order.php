<?php
require_once 'dbconnect.php';

$conn = connectDB();
if (isset($_POST['fid']) && isset($_POST['ProductID'])) {
    $fid = $_POST['fid'];
    $note = $_POST['note'];
    $total_quantity = $_POST['total_quantity'];
    $ProductID = $_POST['ProductID'];
    $total_price = $_POST['total_price'];
    $aid = $_POST['aid'];
    
    $sql = "SELECT * FROM ordersdetail where OrdersID = '$fid'";
    $result = mysqli_query($conn, $sql);
    $row=mysqli_fetch_assoc($result);
    if ($row) {
        if($row['OrdersID'] == $fid){
            echo "error <a href='javascript: history.go(-1)'>Back to page</a>";
        }
    } else {
        $sql1 = "INSERT INTO ordersdetail(OrdersID, ProductID, TotalPrice, quantity, note) values('$fid', '$ProductID', '$total_price', '$total_quantity','$note')";
        if (mysqli_query($conn, $sql1)) {
            echo "Create New Order <a href='delete.php?AID=$aid'>Back to page</a>";
        }
    }
}

mysqli_close($conn);


?>