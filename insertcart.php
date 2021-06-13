
<?php
require_once 'dbconnect.php';

$conn = connectDB();
//use $ _Get to get the ProductID passed in
if (isset($_GET['Pid']) && isset($_GET['Aid'])) {
//creates a new variable for the ID passed as $Pid and $Aid
    $Pid = $_GET['Pid'];
    $Aid = $_GET['Aid'];
//query select by ProductID and AccountID
    $sql = "SELECT * FROM cart where ProductID = $Pid AND AccountID = $Aid";
    $result = mysqli_query($conn, $sql);
    $row=mysqli_fetch_assoc($result);
    if ($row) {
        //If the ProductID and AccountID already exists in the data will be Update database.
        if($row['ProductID'] == $Pid && $row['AccountID'] == $Aid){
            $Update = "UPDATE cart SET quantity = quantity + 1 WHERE ProductID = $Pid AND AccountID = $Aid";
            if(mysqli_query($conn, $Update)){
                echo "update successfully <a href='shop.php'>Back to page</a>";
            }
        }
        //If not, Insert is the query used to add and notify New record created successfully
    }else{
        $sql = "INSERT into cart(CartID, ProductID, quantity, AccountID) values('int', '$Pid', 1, '$Aid')";
        if (mysqli_query($conn, $sql)) {
            echo "New record created successfully <a href='shop.php'>Back to page</a>";
        }
    }
}
?>