<?php
require_once 'dbconnect.php';

$conn = connectDB();

$sql = "select * from product";
$result = mysqli_query($conn, $sql);

?>
<!DOCTYPE html>
<html lang="zxx">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Computer Bear</title>

    <!-- Google Font -->


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
            <a href="login.php"><img src="img/icon/heart.png" alt=""></a>
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
                                <a href="shoppingcart.php?id=<?php echo $AccountID?>"><img src="img/icon/cart.png" alt=""> <span><?php echo $total_quantity;?></span></a>
                                <div class="price">$<?php echo $total_price;?></div>
                                <?php
                                }else{
                                    ?>
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
                            <li class="active"><a href="./index.php">Home</a></li>
                            <li><a href="./shop.php">Shop</a></li>
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

    <!-- Hero Section Begin -->
    <section class="hero">
        <div class="hero__slider owl-carousel">
            <div class="hero__items set-bg" data-setbg="img/hero/MSIB.jpg">
                <div class="container">
                    <div class="row">
                        <div class="col-xl-5 col-lg-7 col-md-8">
                            <div class="hero__text">
                                <h6>Summer Collection</h6>
                                <h2>Fall - Winter Collections 2030</h2>
                                <p>MSI is a manufacturer that covers desktops, laptops, graphics cards and motherboards. MSI is a much more recognized company in the gaming world than in the everyday laptop world.</p>
                                <a href="#" class="primary-btn">Shop now <span class="arrow_right"></span></a>
                                <div class="hero__social">
                                    <a href="#"><i class="fa fa-facebook"></i></a>
                                    <a href="#"><i class="fa fa-twitter"></i></a>
                                    <a href="#"><i class="fa fa-pinterest"></i></a>
                                    <a href="#"><i class="fa fa-instagram"></i></a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="hero__items set-bg" data-setbg="img/hero/ASUSB.png">
                <div class="container">
                    <div class="row">
                        <div class="col-xl-5 col-lg-7 col-md-8">
                            <div class="hero__text">
                                <h6>Summer Collection</h6>
                                <h2>Fall - Winter Collections 2030</h2>
                                <p>Asus was founded in 1989 by four hardware engineers who were former Acer employees. They are now a multinational company that makes electronics as well as computer hardware and phones.</p>
                                <a href="#" class="primary-btn">Shop now <span class="arrow_right"></span></a>
                                <div class="hero__social">
                                    <a href="#"><i class="fa fa-facebook"></i></a>
                                    <a href="#"><i class="fa fa-twitter"></i></a>
                                    <a href="#"><i class="fa fa-pinterest"></i></a>
                                    <a href="#"><i class="fa fa-instagram"></i></a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Hero Section End -->

    <!-- Banner Section Begin -->
    <section class="banner spad">
        <div class="container">
            <div class="row">
                <div class="col-lg-7 offset-lg-4">
                    <div class="banner__item">
                        <div class="banner__item__pic">
                            <img src="img/banner/banner1.jpg" alt="">
                        </div>
                        <div class="banner__item__text">
                            <h2>Laptop Collections 2030</h2>
                            <a href="#">Shop now</a>
                        </div>
                    </div>
                </div>
                <div class="col-lg-5">
                    <div class="banner__item banner__item--middle">
                        <div class="banner__item__pic">
                            <img src="img/banner/banner2.jpg" alt="">
                        </div>
                        <div class="banner__item__text">
                            <h2>Accessories</h2>
                            <a href="#">Shop now</a>
                        </div>
                    </div>
                </div>
                <div class="col-lg-7">
                    <div class="banner__item banner__item--last">
                        <div class="banner__item__pic">
                            <img src="img/banner/banner3.jpg" alt="">
                        </div>
                        <div class="banner__item__text">
                            <h2>PC Spring 2030</h2>
                            <a href="#">Shop now</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Banner Section End -->

    <!-- Product Section Begin -->
    <section class="product spad">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <ul class="filter__controls">
                        <li class="active" data-filter="*">Best Sellers</li>
                        <li data-filter=".new-arrivals">New Arrivals</li>
                        <li data-filter=".hot-sales">Hot Sales</li>
                    </ul>
                </div>
            </div>
            <div class="row product__filter">
            <?php if (mysqli_num_rows($result) > 0) {
            while($row = mysqli_fetch_assoc($result)) {
                ?>
                <div class="col-lg-3 col-md-6 col-sm-6 col-md-6 col-sm-6 mix new-arrivals">
                    <div class="product__item">
                        <div class="product__item__pic set-bg" data-setbg=""><?php echo "<img src=\"img/product/".$row['ProductPicture']."\" height='200' weight='150'>"?>
                            <span class="label">New</span>
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
                                if(isset($_SESSION['user_login'])){
                                ?>
                                <a href="insertcart.php?Pid=<?php echo $row['ProductID']?>&Aid=<?php echo $AccountID?>" class="add-cart">+ Add To Cart</a>
                                <?php
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
                <?php }
    } else {
        echo "0 results";
    }
    mysqli_close($conn);
    ?>
            </div>
        </div>
    </section>
    <!-- Product Section End -->

    <!-- Categories Section Begin -->
    <section class="categories spad">
        <div class="container">
            <div class="row">
                <div class="col-lg-3">
                    <div class="categories__text">
                        <h2>Laptop Hot <br /> <span>Laptop New</span> <br /> Accessories</h2>
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="categories__hot__deal">
                        <img src="img/product/Psale.png" alt="">
                        <div class="hot__deal__sticker">
                            <span>Sale Of</span>
                            <h5>$29.99</h5>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 offset-lg-1">
                    <div class="categories__deal__countdown">
                        <span>Deal Of The Week</span>
                        <h2>Multi-pocket Chest Bag Black</h2>
                        <div class="categories__deal__countdown__timer" id="countdown">
                            <div class="cd-item">
                                <span>3</span>
                                <p>Days</p>
                            </div>
                            <div class="cd-item">
                                <span>1</span>
                                <p>Hours</p>
                            </div>
                            <div class="cd-item">
                                <span>50</span>
                                <p>Minutes</p>
                            </div>
                            <div class="cd-item">
                                <span>18</span>
                                <p>Seconds</p>
                            </div>
                        </div>
                        <a href="shop.php" class="primary-btn">Shop now</a>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Categories Section End -->

    <!-- Instagram Section Begin -->
    <section class="instagram spad">
        <div class="container">
            <div class="row">
                <div class="col-lg-8">
                    <div class="instagram__pic">
                        <div class="instagram__pic__item set-bg" data-setbg="img/instagram/instagram1.jpg"></div>
                        <div class="instagram__pic__item set-bg" data-setbg="img/instagram/instagram2.jpg"></div>
                        <div class="instagram__pic__item set-bg" data-setbg="img/instagram/instagram3.jpg"></div>
                        <div class="instagram__pic__item set-bg" data-setbg="img/instagram/instagram4.jpg"></div>
                        <div class="instagram__pic__item set-bg" data-setbg="img/instagram/instagram5.jpg"></div>
                        <div class="instagram__pic__item set-bg" data-setbg="img/instagram/instagram6.jpg"></div>
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="instagram__text">
                        <h2>Instagram</h2>
                        <p>Our company specializes in selling all kinds of computers such as business laptops, gaming laptops and other computers. However, our company focuses largely on gaming laptops because these gaming laptops are very hot in the market right now. You can use it for work and game play without FPS lag.</p>
                        <h3>#Computer Bear</h3>
                    </div>
                </div>
            </div>
        </div>
    </section></br></br>
    <!-- Instagram Section End -->

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