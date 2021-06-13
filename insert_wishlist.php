<?php
require_once 'dbconnect.php';

$conn = connectDB();

if (isset($_GET['id']) && isset($_GET['Aid'])) {
    
    $id = $_GET['id'];
    $Aid = $_GET['Aid'];
    
    $sql = "SELECT * FROM wishlist where ProductID = $id AND AccountID = $Aid";
    $result = mysqli_query($conn, $sql);
    $row=mysqli_fetch_assoc($result);
    if ($row) {
        if($row['ProductID'] == $id && $row['AccountID'] == $Aid){
            echo "Product already exists <a href='javascript: history.go(-1)'>Back to page</a>";
        }
    }
        
 else {
    $sql = "INSERT into wishlist(wishlistID, ProductID, AccountID) values('int', '$id', '$Aid')";
    if (mysqli_query($conn, $sql)) {
        echo "New record created successfully <a href='javascript: history.go(-1)'>Back to page</a>";
        echo '</br>';
        echo "<a href='wishlist.php?id= $Aid'>view your wishlist</a>";
    }
}
}
?>