<?php
require_once 'dbconnect.php';

$conn = connectDB();
//The value is entered, we use $ _POST to get the value
if (isset($_POST['id']) && 
    isset($_POST['username'])) {
        //creates a variable $... = with the value of Post.
        $id = $_POST['id'];
        $username = $_POST['username'];
        $password = $_POST['password'];
        $role = $_POST['role'];

        //query product by username = with the name of the variable to be created
        $sql="SELECT username FROM account WHERE username='$username' LIMIT 1";
        //The mysqli_query () function will perform the query against the database.
        $result = mysqli_query($conn, $sql);
        $row=mysqli_fetch_assoc($result);
        if ($row) {
            //If the username already exists in the data will be notified username already exists
            if($row['username'] === $username){
                echo "username already exists <a href='javascript: history.go(-1)'>Back to login page</a>";
            }
            //If not, Insert is the query used to add and notify New record created successfully
        } else {
            $sql = "INSERT into account(AccountID, username, password, user_type) values('$id', '$username', '$password', '$role')";
            if (mysqli_query($conn, $sql)) {
                echo "New record created successfully <a href='javascript: history.go(-1)'>Back to login page</a>";
            }
        }
        
    }

mysqli_close($conn);


?>