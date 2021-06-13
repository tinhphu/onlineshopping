<?php
require_once 'dbconnect.php';

$conn = connectDB();

$sql = "SELECT CategoryName FROM product, category WHERE product.CategoryID = category.CategoryID";
$result = mysqli_query($conn, $sql);

if (isset($_GET['id'])) {
    
    $id = $_GET['id'];
    
    $sql1 = "SELECT * FROM product where ProductID = $id";
    $result1 = mysqli_query($conn, $sql1);
    if (mysqli_num_rows($result1) > 0) {
        
        $row = mysqli_fetch_assoc($result1);
        $ProductID = $id;
        $ProductName = $row['ProductName'];
        $ProductPrice = $row['ProductPrice'];
        $ProductDescription = $row['ProductDescription'];
        $ProductInfo = $row['ProductInfo'];
        $ProductPicture = $row['ProductPicture'];
        $Picture1 = $row['Picture1'];
        $Picture2 = $row['Picture2'];
        
        if (mysqli_num_rows($result) > 0) {
            while($row = mysqli_fetch_assoc($result)) {
        $CategoryName = $row['CategoryName'];
            }
        }
    }
 else {
    echo "0 results";
    exit;
}
}
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
                                    <li><a href="./shoppingcart.php">Shopping Cart</a></li>
                                    <?php
                                    if(isset($_SESSION['user_login'])){
                                    ?>
                                    <li><a href="checkout.php?id=<?php echo $AccountID?>">Check Out</a></li>
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

    <!-- Shop Details Section Begin -->
    <section class="shopdetails">
        <div class="product__details__pic">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="product__details__breadcrumb">
                            <a href="./index.php">Home</a>
                            <a href="./shop.php">Shop</a>
                            <span>Product Details</span>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-3 col-md-3">
                        <ul class="nav nav-tabs" role="tablist">
                            <li class="nav-item">
                                <a class="nav-link active" data-toggle="tab" href="#tabs-1" role="tab">
                                    <div class="product__thumb__pic set-bg" data-setbg="">
                                    <?php echo "<img src=\"img/product/".$ProductPicture."\" height='100' weight='120'>"?>
                                    </div>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" data-toggle="tab" href="#tabs-2" role="tab">
                                    <div class="product__thumb__pic set-bg" data-setbg="">
                                    <?php echo "<img src=\"img/product/".$Picture1."\" height='100' weight='120'>"?>
                                    </div>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" data-toggle="tab" href="#tabs-3" role="tab">
                                    <div class="product__thumb__pic set-bg" data-setbg="">
                                    <?php echo "<img src=\"img/product/".$Picture2."\" height='100' weight='120'>"?>
                                    </div>
                                </a>
                            </li>
                        </ul>
                    </div>
                    <div class="col-lg-6 col-md-9">
                        <div class="tab-content">
                            <div class="tab-pane active" id="tabs-1" role="tabpanel">
                                <div class="product__details__pic__item">
                                <?php echo "<img src=\"img/product/".$ProductPicture."\" height='500' weight='250'>"?>
                                </div>
                            </div>
                            <div class="tab-pane" id="tabs-2" role="tabpanel">
                                <div class="product__details__pic__item">
                                <?php echo "<img src=\"img/product/".$Picture1."\" height='500' weight='250'>"?>
                                </div>
                            </div>
                            <div class="tab-pane" id="tabs-3" role="tabpanel">
                                <div class="product__details__pic__item">
                                <?php echo "<img src=\"img/product/".$Picture2."\" height='500' weight='250'>"?>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        
        <div class="product__details__content">
            <div class="container">
                <div class="row d-flex justify-content-center">
                    <div class="col-lg-8">
                        <div class="product__details__text">
                            <h4><?php echo $ProductName; ?></h4>
                            <h3>$<?php echo $ProductPrice; ?></h3>
                            <p><?php echo $ProductDescription; ?></p>
                            <div class="product__details__option">
                            <div class="product__details__cart__option">
                                <div class="quantity">
                                    <div class="pro-qty">
                                        <input type="text" value="1">
                                    </div>
                                </div>
                                <a href="insertcart.php?id=<?php echo $ProductID; ?>" class="primary-btn">add to cart</a>
                            </div>
                            <div class="product__details__btns__option">
                                <a href="wishlist.php"><i class="fa fa-heart"></i> add to wishlist</a>
                            </div>
                            <div class="product__details__last__option">
                                <h5><span>Guaranteed Safe Checkout</span></h5>
                                <img src="img/shopdetails/details-payment.png" alt="">
                                <ul>
                                    <li><span>Categories:</span> <?php echo $CategoryName; ?></li>
                                    <li><span>Tag:</span> Asus, MSI, Dell</li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
                
                <?php 
                ?>
                <div class="row">
                    <div class="col-lg-12">
                        <div class="product__details__tab">
                            <ul class="nav nav-tabs" role="tablist">
                                <li class="nav-item">
                                    <a class="nav-link active" data-toggle="tab" href="#tabs-5"
                                    role="tab">Information</a>
                                </li>
                            </ul>
                            <div class="tab-content">
                                <div class="tab-pane active" id="tabs-5" role="tabpanel">
                                    <div class="product__details__tab__content">
                                        <p class="note">Note: A gaming laptop is a small and mobile personal computer which has its own built-in screen. ... With high-end hardware included, gaming laptops are generally much more expensive than entry-level laptops.</p>
                                        <div class="product__details__tab__content__item">
                                            <h5>Products Infomation</h5>
                                            <p><?php echo $ProductInfo; ?></p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Shop Details Section End -->

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
                            <li><a href="#">Shop Details</a></li>
                            <li><a href="#">Shopping Cart</a></li>
                            <li><a href="#">Check out</a></li>
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
                            </script>
                            All rights reserved
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