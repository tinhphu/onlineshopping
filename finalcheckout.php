<?php
require_once 'dbconnect.php';

$conn = connectDB();

if (isset($_GET['AccountID'])) {

    $Aid = $_GET['AccountID'];

$sql1 = "SELECT * FROM cart, product WHERE product.ProductID = cart.ProductID AND AccountID = $Aid";
$result1 = mysqli_query($conn, $sql1);
}
?>
<!DOCTYPE html>
<html lang="zxx">

<head>
    <meta charset="UTF-8">
    <meta name="description" content="Male_Fashion Template">
    <meta name="keywords" content="Male_Fashion, unica, creative, html">
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
            <a href="wishlist.php"><img src="img/icon/heart.png" alt=""></a>
            <a href="#"><img src="img/icon/cart.png" alt=""> <span>0</span></a>
            <div class="price">$0.00</div>
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
                $sql2 = "select AccountID from account where username='$id'";

                $result2 = mysqli_query($conn, $sql2);
                if (mysqli_num_rows($result2) > 0){
                    $row = mysqli_fetch_assoc($result2);
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
                        <a href="wishlist.php"><img src="img/icon/heart.png" alt=""></a>
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
                        <h4>Check Out</h4>
                        <div class="breadcrumb__links">
                            <a href="./index.php">Home</a>
                            <a href="./shop.php">Shop</a>
                            <a>Check Information</a>
                            <a><span>Check your Orders</span></a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Breadcrumb Section End -->

    <!-- Checkout Section Begin -->
    <?php
    $id = "";
    if (isset($_GET['OrdersID'])) {
        $id = $_GET['OrdersID'];
    
    $OrdersID= $id;
    $ProductID= "";
    $TotalPrice = "";
    $quantity = "";
    $note = "";
    if ($id !="") {
        $sql = "select * from ordersdetail where OrdersID = $id";
        $result = mysqli_query($conn, $sql);
        while($row = mysqli_fetch_assoc($result)) {
            $OrdersID = $row['OrdersID'];
            $ProductID = $row['ProductID'];
            $TotalPrice = $row['TotalPrice'];
            $quantity = $row['quantity'];
            $note = $row['note'];
        }
    }
}
    ?>
    <section class="checkout spad">
        <div class="container">
            <div class="checkout__form">
                <form action="insert_order.php" method="POST">
                <input type="hidden" id="controlUpdate" name="controlUpdate" value="<?php echo $isUpdated?>" />
                    <div class="row">
                        <div class="col-lg-8 col-md-6">
                            <h6 class="coupon__code"><span class="icon_tag_alt"></span> Have a coupon? <a href="#">Click
                            here</a> to enter your code</h6>
                            <h6 class="checkout__title">Billing Details</h6>
                            <div class="row">
                                <div class="col-lg-6">
                                    <div class="checkout__input">
                                        <p>Note<span></span></p>
                                        <input type="text" id="note" name="note" value="" placeholder="Note.">
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="checkout__input">
                                        <p><span>OrdersID</span></p>
                                        <input type="text" name="fid" value="<?php echo $OrdersID?>" readonly>
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="checkout__input">
                                        <p><span></span></p>
                                        <input type="hidden" id="aid" name="aid" value="<?php echo $AccountID?>" <?php echo "readonly";?>>
                                    </div>
                                </div>
                            </div>
                            <div class="checkout__input__checkbox">
                                <p>If you are a returning customer
                                please login at the top of the page</p>
                            </div>
                        </div>
                    <div class="col-lg-4 col-md-6">
                            <div class="checkout__order">
                                <h4 class="order__title">Your order</h4>
                                <div class="checkout__order__products">Product <span>Total</span></div>
                                <?php
                                if (mysqli_num_rows($result1) > 0) {
                                    $total_price = 0;
                                    $total_quantity = 0;
                                $ProductName = "no Product";
                                $ProductPrice = "$0";
                                    while($row = mysqli_fetch_assoc($result1)){
                                        $ProductID = $row['ProductID'];
                                        $ProductName = $row['ProductName'];
                                        $ProductPrice = $row['ProductPrice'];
                                        $quantity = $row['quantity'];
                                        $total = $quantity*$ProductPrice;
                                        $total_price += ($total);
                                        $total_quantity += $quantity;
                                    
                                ?>
                                <ul class="checkout__total__products">
                                <input type="hidden" name="total_quantity" value="<?php echo $total_quantity;?>">
                                    <li><input type="hidden" name="ProductID" value="<?php echo $ProductID;?>"><?php echo $ProductName; ?> <span><?php echo $ProductPrice; ?></span></li>
                                </ul>
                                <?php
                                }
                            }else {
                                $total_price = 0;
                                $ProductName = "no Product";
                                $ProductPrice = "$0";
                            }
                                ?>
                                <ul class="checkout__total__all">
                                    <li>Subtotal <span>$<?php echo $total_price;?></span></li>
                                    <li>Total <span>$<?php echo $total_price;?></span></li>
                                    <input type="hidden" name="total_price" value="<?php echo $total_price;?>">
                                </ul>
                                
                                <p>You can choose to pay via paypal, check payment or online payment.</p>
                                <div class="checkout__input__checkbox">
                                    <label for="payment">
                                        Check Payment
                                        <input type="checkbox" id="payment">
                                        <span class="checkmark"></span>
                                    </label>
                                </div>
                                <div class="checkout__input__checkbox">
                                    <label for="paypal">
                                        Paypal
                                        <input type="checkbox" id="paypal">
                                        <span class="checkmark"></span>
                                    </label>
                                </div>
                                <button type="submit" class="site-btn">PLACE ORDER</button>
                                
                            </div>
                            
                        </div>
                        
                    </div>
                </form>
            </div>
        </div>
    </section>
    <!-- Checkout Section End -->

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
                            <?php
                                    if(isset($_SESSION['user_login'])){
                                    ?>
                                    <li><a href="checkout.php?id=<?php echo $AccountID?>">Check Out</a></li>
                                    <?php
                                    }
                                    ?>
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