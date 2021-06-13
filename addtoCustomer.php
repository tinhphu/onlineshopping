<?php
require_once 'dbconnect.php';

$conn = connectDB();
?>
<!DOCTYPE html>
<html>
<head>
<style>
* {
  box-sizing: border-box;
}

input[type=text], select, textarea {
  width: 100%;
  padding: 12px;
  border: 1px solid #ccc;
  border-radius: 4px;
  resize: vertical;
}

label {
  padding: 12px 12px 12px 0;
  display: inline-block;
}

input[type=submit] {
  background-color: #4CAF50;
  color: white;
  padding: 12px 20px;
  border: none;
  border-radius: 4px;
  cursor: pointer;
  float: right;
}

input[type=submit]:hover {
  background-color: #45a049;
}

.container {
  border-radius: 5px;
  background-color: #f2f2f2;
  padding: 20px;
}

.col-25 {
  float: left;
  width: 25%;
  margin-top: 6px;
}

.col-75 {
  float: left;
  width: 75%;
  margin-top: 6px;
}

.row:after {
  content: "";
  display: table;
  clear: both;
}


@media screen and (max-width: 600px) {
  .col-25, .col-75, input[type=submit] {
    width: 100%;
    margin-top: 0;
  }
}
</style>
</head>
<body>
<?php

$id = "";
if (isset($_GET['id'])) {
    $id = $_GET['id'];
} 
$CustomerID= 'int';
$CustomerName="";
$CustomerAddress="";
$CustomerPhone="";
$CustomerEmail="";
$AccountID ="";
$isUpdated = 0;
if ($id !="") {
    $sql = "select * from customer where CustomerID = $id";
    $result = mysqli_query($conn, $sql);
    while($row = mysqli_fetch_assoc($result)) {
        $CustomerID = $row['CustomerID'];
        $CustomerName = $row['CustomerName'];
        $CustomerAddress = $row['CustomerAddress'];
        $CustomerPhone = $row['CustomerPhone'];
        $CustomerEmail = $row['CustomerEmail'];
        $AccountID = $row['AccountID'];
    }
    $isUpdated = 1;
}
?>
<h2>Add New Product FORM</h2>
<p>This is function of adminstrator to insert, edit, delete one Product.</p>
<p><a href="ManageOrderCus.php">Back to Product page</a></p>
<div class="container">
  <form action="insert_customer.php" method="POST">
  <input type="hidden" id="controlUpdate" name="controlUpdate" value="<?php echo $isUpdated?>" />

  <div class="row">
    <div class="col-25">
      <h1 for="fname"></h1>
    </div>
    <div class="col-75">
      <input type="hidden" id="fid" name="fid" value="<?php echo $CustomerID?>" <?php if ($isUpdated == 1) echo "readonly";?> placeholder="Product id..">
    </div>
  </div>

  <div class="row">
    <div class="col-25">
      <label for="fname">Customer Name</label>
    </div>
    <div class="col-75">
      <input type="text" id="fname" name="fname" value="<?php echo $CustomerName?>" placeholder="Customer name..">
    </div>
  </div>
  
  <div class="row">
    <div class="col-25">
      <label for="fad">Customer Address</label>
    </div>
    <div class="col-75">
      <input type="text" id="fad" name="fad" value="<?php echo $CustomerAddress?>" placeholder="Customer Address..">
    </div>
  </div>

  <div class="row">
    <div class="col-25">
      <label for="fphone">Customer Phone</label>
    </div>
    <div class="col-75">
      <input type="text" id="fphone" name="fphone" value="<?php echo $CustomerPhone?>" placeholder="Customer Phone..">
    </div>
  </div>

  <div class="row">
    <div class="col-25">
      <label for="femail">Customer Email</label>
    </div>
    <div class="col-75">
      <input type="text" id="femail" name="femail" value="<?php echo $CustomerEmail?>" placeholder="Customer Email..">
    </div>
  </div>

  <div class="row">
    <div class="col-25">
      <label for="AccountID">Account Name</label>
    </div>
    <div class="col-75">
    <select id="AccountID" name="AccountID">
      <?php
        $querryCate="select AccountID, username from account";
        $result=mysqli_query($conn,$querryCate);
        while($row=mysqli_fetch_assoc($result)){
          $AccountID=$row['AccountID'];
          $username= $row['username'];
          echo "<option value='$AccountID'>$username</option>";
        }
        
      ?>
    </select>
    </div>
  </div>
  
  <div class="row">
    <input type="submit" value="Submit" />
  </div>
  </form>
</div>

</body>
</html>
<?php
    mysqli_close($conn);
?>
