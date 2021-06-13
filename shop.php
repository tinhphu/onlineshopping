<?php
require_once 'dbconnect.php';

$conn = connectDB();

$sql4 = "select * from product";
$result4 = mysqli_query($conn, $sql4);

?>
<!DOCTYPE html>
<html lang="zxx">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Computer Bear</title>

    <!-- Google Font -->
    <link href="https://fonts.googleapis.com/css2?family=Nunito+Sans:wght@300;400;600;700;800;900&display=swap"
    rel="stylesheet">

    <!-- Css Styles -->
    <link rel="stylesheet" href="css/bootstrap.min.css" type="text/css">
    <link rel="stylesheet" href="css/font-awesome.min.css" type="text/css">
    <link rel="stylesheet" href="css/elegant-icons.css" type="text/css">
    <link rel="stylesheet" href="css/magnific-popup.css" type="text/css">
    <link rel="stylesheet" href="css/nice-select.css" type="text/css">
    <link rel="stylesheet" href="css/owl.carousel.min.css" type="text/css">
    <link rel="stylesheet" href="css/slicknav.min.css" type="text/css">
    <link rel="stylesheet" href="css/style.css" type="text/css">
</head>

<body>
    <!-- Page Preloder -->
    <div id="preloder">
        <div class="loader"></div>
    </div>

    <!-- Offcanvas Menu Begin -->
    <div class="offcanvas-menu-overlay"></div>
    <div class="offcanvas-menu-wrapper">
        <div class="offcanvas__option">
            <div class="offcanvas__links">
                <a href="login.php">Sign in</a>
                <a href="#">FAQs</a>
            </div>
            <div class="offcanvas__top__hover">
                <span>Usd <i class="arrow_carrot-down"></i></span>
                <ul>
                    <li>USD</li>
                    <li>EUR</li>
                    <li>USD</li>
                </ul>
            </div>
        </div>
        <div class="offcanvas__nav__option">
            <a href="#" class="search-switch"><img src="img/icon/search.png" alt=""></a>
            <?php
                                if(isset($_SESSION['user_login'])){
                                    $sql2 = "SELECT * FROM cart, product WHERE product.ProductID = cart.ProductID AND AccountID = $AccountID";
                                    $result2 = mysqli_query($conn, $sql2);
                                    if (mysqli_num_rows($result2) > 0) {
                                    $total_price = 0;
                                    $total_quantity = 0;
                                        while($row = mysqli_fetch_assoc($result2)){
                                        $ProductPrice = $row['ProductPrice'];
                                        $quantity = $row['quantity'];
                                        $total = $quantity*$ProductPrice;
                                        $total_price += ($total);
                                        $total_quantity += $quantity;

                                    }
                                }
                                else {
                                    $total_price = 0;
                                    $total_quantity = 0;
                                }
                                ?>
                                <a href="wishlist.php?id=<?php echo $AccountID?>"><img src="img/icon/heart.png" alt=""></a>
                                <a href="shoppingcart.php?id=<?php echo $AccountID?>"><img src="img/icon/cart.png" alt=""> <span><?php echo $total_quantity;?></span></a>
                                <div class="price">$<?php echo $total_price;?></div>
                                <?php
                                }else{
                                    ?>
                                    <a href="login.php"><img src="img/icon/heart.png" alt=""></a>
                                    <a href="login.php"><img src="img/icon/cart.png" alt=""> <span></span></a>
                                    <div class="price">$</div>
                                    <?php
                                }
                                ?>
        </div>
        <div id="mobile-menu-wrap"></div>
        <div class="offcanvas__text">
            <p>Free shipping, 30-day return or refund guarantee.</p>
        </div>
    </div>
    <!-- Offcanvas Menu End -->

    <!-- Header Section Begin -->
    <header class="header">
        <div class="header__top">
            <div class="container">
                <div class="row">
                    <div class="col-lg-6 col-md-7">
                        <div class="header__top__left">
                            <p>Free shipping, 30-day return or refund guarantee.</p>
                        </div>
                    </div>
                    <div class="col-lg-6 col-md-5">
                        <div class="header__top__right">
                            <div class="header__top__links">
                            <?php
            session_start();
            if(isset($_SESSION['admin_login'])){
              header("location: admin.php");
            }
            if(isset($_SESSION['user_login'])){
                $id = $_SESSION['user_login'];
                $sql1 = "select AccountID from account where username='$id'";

                $result1 = mysqli_query($conn, $sql1);
                if (mysqli_num_rows($result1) > 0){
                    $row = mysqli_fetch_assoc($result1);
                    $AccountID = $row['AccountID'];
                }

            ?>
            <span class="text-white">Welcome,
            <?php
            echo $_SESSION['user_login'];
            ?>
            <a href="userinfo.php?id=<?php echo $AccountID?>"><img src="img/icon/info.png" alt=""></a>
            <?php
            echo '<a href="Logout.php">Logout</a>';
            }else{
              ?>
              <?php
              echo '<a href="login.php">login</a>';
            }
            ?>
                                <a href="#">FAQs</a>
                            </div>
                            <div class="header__top__hover">
                                <span>Usd <i class="arrow_carrot-down"></i></span>
                                <ul>
                                    <li>USD</li>
                                    <li>EUR</li>
                                    <li>VN</li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="container">
            <div class="row">
                <div class="col-lg-3 col-md-3">
                    <div class="header__logo">
                        <a href="./index.php"><img src="img/logo.png" alt=""></a>
                    </div>
                </div>
                <div class="col-lg-6 col-md-6">
                    <nav class="header__menu mobile-menu">
                        <ul>
                            <li><a href="./index.php">Home</a></li>
                            <li class="active"><a href="./shop.php">Shop</a></li>
                            <li><a href="#">Pages</a>
                                <ul class="dropdown">
                                    <li><a href="./about.php">About Us</a></li>
                                    <?php
                                    if(isset($_SESSION['user_login'])){
                                    ?>
                                    <li><a href="./shoppingcart.php?id=<?php echo $AccountID?>">Shopping Cart</a></li>
                                    <li><a href="checkout.php?id=<?php echo $AccountID?>">Check Out</a></li>
                                    <?php
                                    }else{
                                        ?>
                                        <li><a href="./login.php">Shopping Cart</a></li>
                                        <?php
                                    }
                                    ?>
                                    
                                </ul>
                            </li>
                            
                            <li><a href="./contact.php">Contacts</a></li>
                        </ul>
                    </nav>
                </div>
                <div class="col-lg-3 col-md-3">
                    <div class="header__nav__option">
                        <a href="#" class="search-switch"><img src="img/icon/search.png" alt=""></a>
                        <?php
                                if(isset($_SESSION['user_login'])){
                                    $sql2 = "SELECT * FROM cart, product WHERE product.ProductID = cart.ProductID AND AccountID = $AccountID";
                                    $result2 = mysqli_query($conn, $sql2);
                                    if (mysqli_num_rows($result2) > 0) {
                                    $total_price = 0;
                                    $total_quantity = 0;
                                        while($row = mysqli_fetch_assoc($result2)){
                                        $ProductPrice = $row['ProductPrice'];
                                        $quantity = $row['quantity'];
                                        $total = $quantity*$ProductPrice;
                                        $total_price += ($total);
                                        $total_quantity += $quantity;

                                    }
                                }
                                else {
                                    $total_price = 0;
                                    $total_quantity = 0;
                                }
                                ?>
                                <a href="wishlist.php?id=<?php echo $AccountID?>"><img src="img/icon/heart.png" alt=""></a>
                                <a href="shoppingcart.php?id=<?php echo $AccountID?>"><img src="img/icon/cart.png" alt=""> <span><?php echo $total_quantity;?></span></a>
                                <div class="price">$<?php echo $total_price;?></div>
                                <?php
                                }else{
                                    ?>
                                    <a href="login.php"><img src="img/icon/heart.png" alt=""></a>
                                    <a href="login.php"><img src="img/icon/cart.png" alt=""> <span></span></a>
                                    <div class="price">$</div>
                                    <?php
                                }
                                ?>
                    </div>
                </div>
            </div>
            <div class="canvas__open"><i class="fa fa-bars"></i></div>
        </div>
    </header>
    <!-- Header Section End -->

    <!-- Breadcrumb Section Begin -->
    <section class="breadcrumb-option">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="breadcrumb__text">
                        <h4>Shop</h4>
                        <div class="breadcrumb__links">
                            <a href="./index.php">Home</a>
                            <span>Shop</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Breadcrumb Section End -->

    <!-- Shop Section Begin -->
    <section class="shop spad">
        <div class="container">
            <div class="row">
                <div class="col-lg-3">
                    <div class="shop__sidebar">
                        <div class="shop__sidebar__search">
                        <!-- form search function -->
                            <form action="shop.php" method="POST">
                                <input type="text" name="search" placeholder="Search...">
                                <button type="submit" name="save"><span class="icon_search"></span></button>
                            </form>
                        </div>
                        <div class="shop__sidebar__accordion">
                            <div class="accordion" id="accordionExample">
                                <div class="card">
                                    <div class="card-heading">
                                        <a data-toggle="collapse" data-target="#collapseOne">Categories</a>
                                    </div>
                                    <div id="collapseOne" class="collapse show" data-parent="#accordionExample">
                                        <div class="card-body">
                                            <div class="shop__sidebar__categories">
                                                <ul class="nice-scroll">
                                                <?php
                                                //query database
                                                $query = "SELECT * FROM category";
                                                //The mysqli_query () function will perform the query against the database.
                                                $result = mysqli_query($conn, $query);
                                                //The mysqli_num_rows () function will return the number of rows in the result set passed.
                                                if (mysqli_num_rows($result) > 0) {
                                                    while($row = mysqli_fetch_assoc($result)) {
                                                        //Create variables for values in the database
                                                        $CategoryID = $row['CategoryID'];
                                                        $CategoryName = $row['CategoryName'];
                                                ?>
                                                <!-- display by CategoryName and pass CategoryID to the handle page. -->
                                                    <li><a href="shop.php?CateogoryName=<?php echo $CategoryID?>"><?php echo $CategoryName;?></a></li>
                                                    <?php
                                                    }
                                                }else{
                                                    echo "0 result";
                                                }
                                                    ?>
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-9">
                    <div class="shop__product__option">
                        <div class="row">
                            <div class="col-lg-6 col-md-6 col-sm-6">
                                <div class="shop__product__option__left">
                                    <p>Showing Product</p>
                                </div>
                            </div>
                            <div class="col-lg-6 col-md-6 col-sm-6">
                                <div class="shop__product__option__right">
                                    <p>Sort by Price:</p>
                                    <select>
                                        <option value="">Low To High</option>
                                        <option value="">$0 - $55</option>
                                        <option value="">$55 - $100</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                    
                    <?php 
                    //The value is entered, we use $ _POST to get the value
                    if (isset($_POST['search'])){
                        //creates a variable $ search = with the value of Post.
                        $search=$_POST['search'];
                        //query product by ProductName = with the name of the variable to be created
                        $sql = "SELECT * FROM product where ProductName='$search'";
                        //The mysqli_query () function will perform the query against the database.
                        $result = mysqli_query($conn, $sql);
                        //The mysqli_num_rows () function will return the number of rows in the result set passed.
                        if (mysqli_num_rows($result) > 0) {
                            //display data by product name.
                            while($row = mysqli_fetch_assoc($result)) {
                                ?>

                               <div class="col-lg-4 col-md-6 col-sm-6">
                            <div class="product__item">
                                <div class="product__item__pic set-bg" data-setbg="">
                                <?php echo "<img src=\"img/product/".$row['ProductPicture']."\" height='200' weight='150'>"?>
                                    <ul class="product__hover">
                                        <li><a href="insert_wishlist.php?id=<?php echo $row['ProductID']?>"><img src="img/icon/heart.png" alt=""></a></li>
                                        <li><a href="shopdetails.php?id=<?php echo $row['ProductID']?>"><img src="img/icon/info.png" alt=""></a></li>
                                    </ul>
                                </div>
                                <div class="product__item__text">
                                    <h6><?php echo $row['ProductName']?></h6>
                                    <?php
                                //If you are logged in to your account when you press "Add to cart", it will pass the ProductID and AccountID to the processing page
                                if(isset($_SESSION['user_login'])){
                                ?>
                                <a href="insertcart.php?Pid=<?php echo $row['ProductID']?>&Aid=<?php echo $AccountID?>" class="add-cart">+ Add To Cart</a>
                                <?php
                                //If you don't have an account, it will ask you to login or sign up
                                }else{
                                    ?>
                                    <a href="login.php" class="add-cart">+ Add To Cart</a>
                                    <?php
                                }
                                ?>
                                    <h5>$<?php echo $row['ProductPrice']?></h5>
                                </div>
                            </div>
                        </div> 
                        <?php 
                            }
                        }
                        //use $ _Get to get the CategoryName passed in
                    }else if(isset($_GET['CateogoryName'])){
                        //creates a new variable for the ID passed as $id
                        $filter=$_GET['CateogoryName'];
                        //query database by CategoryID
                        $sql3 = "SELECT * FROM product where CategoryID = $filter";
                        $result3 = mysqli_query($conn, $sql3);
                        
                        if (mysqli_num_rows($result3) > 0) {
                            while($row = mysqli_fetch_assoc($result3)) {
                            ?>
                            <!-- Displays data by CategoryID -->
                           <div class="col-lg-4 col-md-6 col-sm-6">
                        <div class="product__item">
                            <div class="product__item__pic set-bg" data-setbg="">
                            <?php echo "<img src=\"img/product/".$row['ProductPicture']."\" height='200' weight='150'>"?>
                                <ul class="product__hover">
                                <?php
                                if(isset($_SESSION['user_login'])){
                                ?>
                                <li><a href="insert_wishlist.php?id=<?php echo $row['ProductID']?>&Aid=<?php echo $AccountID?>"><img src="img/icon/heart.png" alt=""></a></li>
                                <?php
                                }else{
                                    ?>
                                    <li><a href="login.php"><img src="img/icon/heart.png" alt=""></a></li>
                                    <?php
                                }
                                ?>
                                    <li><a href="shopdetails.php?id=<?php echo $row['ProductID']?>"><img src="img/icon/info.png" alt=""></a></li>
                                </ul>
                            </div>
                            <div class="product__item__text">
                                <h6><?php echo $row['ProductName']?></h6>
                                <?php
                                //If you are logged in to your account when you press "Add to cart", it will pass the ProductID and AccountID to the processing page
                                if(isset($_SESSION['user_login'])){
                                ?>
                                <a href="insertcart.php?Pid=<?php echo $row['ProductID']?>&Aid=<?php echo $AccountID?>" class="add-cart">+ Add To Cart</a>
                                <?php
                                //If you don't have an account, it will ask you to login or sign up
                                }else{
                                    ?>
                                    <a href="login.php" class="add-cart">+ Add To Cart</a>
                                    <?php
                                }
                                ?>
                                <h5>$<?php echo $row['ProductPrice']?></h5>
                            </div>
                        </div>
                    </div> 
                    <?php
                            }
                        }
                    }else if (mysqli_num_rows($result4) > 0) {
                        while($row = mysqli_fetch_assoc($result4)) {
                        ?>
                        <div class="col-lg-4 col-md-6 col-sm-6">
                            <div class="product__item">
                                <div class="product__item__pic set-bg" data-setbg="">
                                <?php echo "<img src=\"img/product/".$row['ProductPicture']."\" height='200' weight='150'>"?>
                                    <ul class="product__hover">
                                        <li><a href="insert_wishlist.php?id=<?php echo $row['ProductID']?>&Aid=<?php echo $AccountID?>"><img src="img/icon/heart.png" alt=""></a></li>
                                        <li><a href="shopdetails.php?id=<?php echo $row['ProductID']?>"><img src="img/icon/info.png" alt=""></a></li>
                                    </ul>
                                </div>
                                <div class="product__item__text">
                                    <h6><?php echo $row['ProductName']?></h6>
                                    <?php
                                //If you are logged in to your account when you press "Add to cart", it will pass the ProductID and AccountID to the processing page
                                if(isset($_SESSION['user_login'])){
                                ?>
                                <a href="insertcart.php?Pid=<?php echo $row['ProductID']?>&Aid=<?php echo $AccountID?>" class="add-cart">+ Add To Cart</a>
                                <?php
                                //If you don't have an account, it will ask you to login or sign up
                                }else{
                                    ?>
                                    <a href="login.php" class="add-cart">+ Add To Cart</a>
                                    <?php
                                }
                                ?>
                                    <h5>$<?php echo $row['ProductPrice']?></h5>
                                </div>
                            </div>
                        </div> 
                        
                        <?php
                        }
                    }
                        mysqli_close($conn);
                ?>
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="product__pagination">
                                <a class="active" href="#">1</a>
                                <a href="#">2</a>
                                <a href="#">3</a>
                                <span>...</span>
                                <a href="#">21</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Shop Section End -->

    <!-- Footer Section Begin -->
    <footer class="footer">
        <div class="container">
            <div class="row">
                <div class="col-lg-3 col-md-6 col-sm-6">
                    <div class="footer__widget">
                        <h6>About</h6>
                        <p>THIS IS A WEBSITE THAT SELLS LAPTOPS ONLINE is an initiative that makes it possible for customers to shop online without leaving home. We will provide complete information about the types of laptops you need including today's major brands such as Asus, MSI, Dell, HP and Acer.</p>
                        <a href="#"><img src="img/payment.png" alt=""></a>
                    </div>
                </div>
                <div class="col-lg-2 offset-lg-1 col-md-3 col-sm-6">
                    <div class="footer__widget">
                        <h6>Shopping</h6>
                        <ul>
                            <li><a href="index.php">Home</a></li>
                            <li><a href="shop.php">Shop</a></li>
                            <li><a href="contact.php">Contact Us</a></li>
                        </ul>
                    </div>
                </div>
                <div class="col-lg-2 col-md-3 col-sm-6">
                    <div class="footer__widget">
                        <h6>Pages</h6>
                        <ul>
                            <li><a href="about.php">About US</a></li>
                            <li><a href="#">Shopping Cart</a></li>
                            <li><a href="checkout.php?id=<?php echo $AccountID?>">Check out</a></li>
                        </ul>
                    </div>
                </div>
                <div class="col-lg-3 offset-lg-1 col-md-6 col-sm-6">
                    <div class="footer__widget">
                        <h6>NewLetter</h6>
                        <div class="footer__newslatter">
                            <p>Be the first to know about new arrivals, look books, sales & promos!</p>
                            <form action="#">
                                <input type="text" placeholder="Your email">
                                <button type="submit"><span class="icon_mail_alt"></span></button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-12 text-center">
                    <div class="footer__copyright__text">
                        <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
                        <p>Copyright ©
                            <script>
                                document.write(new Date().getFullYear());
                            </script>2020
                            All rights reserved | This template is made with <i class="fa fa-heart-o"
                            aria-hidden="true"></i> by <a href="" target="_blank">Colorlib</a>
                        </p>
                        <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
                    </div>
                </div>
            </div>
        </div>
    </footer>
    <!-- Footer Section End -->

    <!-- Search Begin -->
    <div class="search-model">
        <div class="h-100 d-flex align-items-center justify-content-center">
            <div class="search-close-switch">+</div>
            <form class="search-model-form">
                <input type="text" id="search-input" placeholder="Search here.....">
            </form>
        </div>
    </div>
    <!-- Search End -->

    <!-- Js Plugins -->
    <script src="js/jquery-3.3.1.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/jquery.nice-select.min.js"></script>
    <script src="js/jquery.nicescroll.min.js"></script>
    <script src="js/jquery.magnific-popup.min.js"></script>
    <script src="js/jquery.countdown.min.js"></script>
    <script src="js/jquery.slicknav.js"></script>
    <script src="js/mixitup.min.js"></script>
    <script src="js/owl.carousel.min.js"></script>
    <script src="js/main.js"></script>
</body>

</html>