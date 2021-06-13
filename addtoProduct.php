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
$ProductID= 'int';
$ProductName="";
$ProductPrice="";
$ProductDescription="";
$ProductInfo="";
$ProductPicture ="";
$Picture1 ="";
$Picture2 ="";
$CategoryID ="";
$isUpdated = 0;
if ($id !="") {
  //View information by ProductID.
    $sql = "select * from product where ProductID = $id";
    $result = mysqli_query($conn, $sql);
    while($row = mysqli_fetch_assoc($result)) {
        $ProductID = $row['ProductID'];
        $ProductName = $row['ProductName'];
        $ProductPrice = $row['ProductPrice'];
        $ProductDescription = $row['ProductDescription'];
        $ProductInfo = $row['ProductInfo'];
        $ProductPicture = $row['ProductPicture'];
        $Picture1 = $row['Picture1'];
        $Picture2 = $row['Picture2'];
        $CategoryID = $row['CategoryID'];
    }
    $isUpdated = 1;
}
?>
<h2>Add New Product FORM</h2>
<p>This is function of adminstrator to insert, edit, delete one Product.</p>
<p><a href="tables.php">Back to Product page</a></p>
<div class="container">
<!-- form enter new product or edit product -->
  <form action="insert_product.php" method="POST">
  <input type="hidden" id="controlUpdate" name="controlUpdate" value="<?php echo $isUpdated?>" />

  <div class="row">
    <div class="col-25">
      <h1 for="fname"></h1>
    </div>
    <div class="col-75">
      <input type="hidden" id="fid" name="fid" value="<?php echo $ProductID?>" <?php if ($isUpdated == 1) echo "readonly";?> placeholder="Product id..">
    </div>
  </div>

  <div class="row">
    <div class="col-25">
      <label for="fname">Product Name</label>
    </div>
    <div class="col-75">
      <input type="text" id="fname" name="fname" value="<?php echo $ProductName?>" placeholder="Product name..">
    </div>
  </div>
  
  <div class="row">
    <div class="col-25">
      <label for="fprice">Product Price</label>
    </div>
    <div class="col-75">
      <input type="text" id="fprice" name="fprice" value="<?php echo $ProductPrice?>" placeholder="Product Price..">
    </div>
  </div>

  <div class="row">
    <div class="col-25">
      <label for="fdescrip">Product Description</label>
    </div>
    <div class="col-75">
      <input type="text" id="fdescrip" name="fdescrip" value="<?php echo $ProductDescription?>" placeholder="Product Description..">
    </div>
  </div>

  <div class="row">
    <div class="col-25">
      <label for="finfo">Product Info</label>
    </div>
    <div class="col-75">
      <input type="text" id="finfo" name="finfo" value="<?php echo $ProductInfo?>" placeholder="Product Info..">
    </div>
  </div>
  
  <div class="row">
    <div class="col-25">
      <label for="fpicture">Product Picture</label>
    </div>
    <div class="col-75">
      <input type="text" id="fpicture" name="fpicture" value="<?php echo $ProductPicture?>" placeholder="Product Picture..">
    </div>
  </div>

  <div class="row">
    <div class="col-25">
      <label for="Picture1">Product Picture</label>
    </div>
    <div class="col-75">
      <input type="text" id="Picture1" name="Picture1" value="<?php echo $Picture1?>" placeholder="Product Picture..">
    </div>
  </div>
  
  <div class="row">
    <div class="col-25">
      <label for="Picture2">Product Picture</label>
    </div>
    <div class="col-75">
      <input type="text" id="Picture2" name="Picture2" value="<?php echo $Picture2?>" placeholder="Product Picture..">
    </div>
  </div>

  <div class="row">
    <div class="col-25">
      <label for="fname">Category Id</label>
    </div>
    <div class="col-75">
    <select id="CategoryID" name="CategoryID">
      <?php
        $querryCate="select CategoryID,CategoryName from category";
        $result=mysqli_query($conn,$querryCate);
        while($row=mysqli_fetch_assoc($result)){
          $categoryId=$row['CategoryID'];
          $categoryName= $row['CategoryName'];
          echo "<option value='$categoryId'>$categoryName</option>";
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
