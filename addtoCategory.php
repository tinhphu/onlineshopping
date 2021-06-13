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
$CategoryID= 'int';
$CategoryName="";
$CategoryDate="";
$Categoryamount="";
$isUpdated = 0;
if ($id !="") {
    $sql = "select * from category where CategoryID = $id";
    $result = mysqli_query($conn, $sql);
    while($row = mysqli_fetch_assoc($result)) {
        $CategoryID = $row['CategoryID'];
        $CategoryName = $row['CategoryName'];
        $CategoryDate = $row['CategoryDate'];
        $Categoryamount = $row['Categoryamount'];
    }
    $isUpdated = 1;
}
?>
<h2>Add New Category FORM</h2>
<p>This is function of adminstrator to insert, edit, delete one Category.</p>
<p><a href="tables.php">Back to Category page</a></p>
<div class="container">
  <form action="insert_category.php" method="POST">
  <input type="hidden" id="controlUpdate" name="controlUpdate" value="<?php echo $isUpdated?>" />

  <div class="row">
    <div class="col-25">
      <h1 for="fid"></h1>
    </div>
    <div class="col-75">
      <input type="hidden" id="fid" name="fid" value="<?php echo $CategoryID?>" <?php if ($isUpdated == 1) echo "readonly";?>>
    </div>
  </div>

  <div class="row">
    <div class="col-25">
      <label for="fname">Category Name</label>
    </div>
    <div class="col-75">
      <input type="text" id="fname" name="fname" value="<?php echo $CategoryName?>" placeholder="Category name..">
    </div>
  </div>
  
  <div class="row">
    <div class="col-25">
      <label for="fdate">Category Date</label>
    </div>
    <div class="col-75">
      <input type="date" id="fdate" name="fdate" value="<?php echo $CategoryDate?>" placeholder="Category Date..">
    </div>
  </div>

  <div class="row">
    <div class="col-25">
      <label for="famount">Category amount</label>
    </div>
    <div class="col-75">
      <input type="int" id="famount" name="famount" value="<?php echo $Categoryamount?>" placeholder="Category amount..">
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
