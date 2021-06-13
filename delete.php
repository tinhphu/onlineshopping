<?php
require_once 'dbconnect.php';

$conn = connectDB();
if (isset($_GET['OrdersID'])) {
    
        $id = $_GET['OrdersID'];
        
        $sql = "delete from orders where OrdersID = $id";
        
        if (mysqli_query($conn, $sql)) {
            header("Location: MOrderCus.php");
            
        } else {
            echo "Error: " . $sql . "<br>" . mysqli_error($conn);
            exit;
        }
        
}
//use $ _Get to get the ProductID passed in
if (isset($_GET['ProductID'])) {
    //creates a new variable for the ID passed as $id
        $id = $_GET['ProductID'];
        //query delete by ProductID 
        $sql = "delete from product where ProductID = $id";
        
        if (mysqli_query($conn, $sql)) {
            header("Location:tables.php");
            
        } else {
            echo "Error: " . $sql . "<br>" . mysqli_error($conn);
            exit;
        }
        
}

if (isset($_GET['CategoryID'])) {
    
        $id = $_GET['CategoryID'];
        
        $sql = "delete from category where CategoryID = $id";
        
        if (mysqli_query($conn, $sql)) {
            header("Location:tables.php");
            
        } else {
            echo "Error: " . $sql . "<br>" . mysqli_error($conn);
            exit;
        }
    
}

if (isset($_GET['CustomerID'])) {
    
    $id = $_GET['CustomerID'];
    
    $sql = "delete from customer where CustomerID = $id";
    
    if (mysqli_query($conn, $sql)) {
        header("Location:ManageOrderCus.php");
        
    } else {
        echo "Error: " . $sql . "<br>" . mysqli_error($conn);
        exit;
    }
    
    
}

if (isset($_GET['CartID'])) {
    
    $id = $_GET['CartID'];
    
    $sql = "delete from cart where CartID = $id";
    
    if (mysqli_query($conn, $sql)) {
        echo "Delete successfully <a href='javascript: history.go(-1)'>Back to page</a>";
    } else {
        echo "Error: " . $sql . "<br>" . mysqli_error($conn);
        exit;
    }
    
    
}

if (isset($_GET['wishlistID'])) {
    
    $id = $_GET['wishlistID'];
    
    $sql = "delete from wishlist where wishlistID = $id";
    
    if (mysqli_query($conn, $sql)) {
        echo "Delete successfully <a href='javascript: history.go(-1)'>Back to page</a>";
        
    } else {
        echo "Error: " . $sql . "<br>" . mysqli_error($conn);
        exit;
    }
}

if (isset($_GET['AID'])) {
    
    $id = $_GET['AID'];
    
    $sql = "delete from cart where AccountID = $id";
    
    if (mysqli_query($conn, $sql)) {
        header("Location:index.php");
        
    } else {
        echo "Error: " . $sql . "<br>" . mysqli_error($conn);
        exit;
    }
}

mysqli_close($conn);

?>

