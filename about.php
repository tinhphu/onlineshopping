<?php
require_once 'dbconnect.php';

$conn = connectDB();

$sql = "select AccountID from account";
$result = mysqli_query($conn, $sql);

// $sql2 = "SELECT * FROM cart, product WHERE product.ProductID = cart.ProductID";
// $result2 = mysqli_query($conn, $sql2);
// if (mysqli_num_rows($result2) > 0) {
//     $total_price = 0;
//     $total_quantity = 0;
//         while($row = mysqli_fetch_assoc($result2)){
//         $ProductPrice = $row['ProductPrice'];
//         $quantity = $row['quantity'];
//         $total = $quantity*$ProductPrice;
//         $total_price += ($total);
//         $total_quantity += $quantity;

//     }
// }
// else {
//     $total_price = 0;
//     $total_quantity = 0;
// }
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

    <!-- Breadcrumb Section Begin -->
    <section class="breadcrumb-option">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="breadcrumb__text">
                        <h4>About Us</h4>
                        <div class="breadcrumb__links">
                            <a href="./index.php">Home</a>
                            <span>About Us</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Breadcrumb Section End -->

    <!-- About Section Begin -->
    <section class="about spad">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="about__pic">
                        <img src="img/about/aboutus.png" alt="">
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-4 col-md-4 col-sm-6">
                    <div class="about__item">
                        <h4>Who We Are ?</h4>
                        <p>Our company specializes in selling all kinds of computers such as business laptops, gaming laptops, Accessories and other computers.</p>
                    </div>
                </div>
                <div class="col-lg-4 col-md-4 col-sm-6">
                    <div class="about__item">
                        <h4>Who We Do ?</h4>
                        <p>Our company focuses largely on gaming laptops because these gaming laptops are very hot in the market right now. You can use it for work and game play without FPS lag.</p>
                    </div>
                </div>
                <div class="col-lg-4 col-md-4 col-sm-6">
                    <div class="about__item">
                        <h4>Why Choose Us</h4>
                        <p>Our company always provides genuine items. In addition, we have better customer service than many other websites. Therefore, these are the reasons you choose us.</p>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- About Section End -->

    <!-- Testimonial Section Begin -->
    <section class="testimonial">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-6 p-0">
                    <div class="testimonial__text">
                        <span class="icon_quotations"></span>
                        <p>“Going out after work? Take our gaming laptop to the cafe, heat it up, fight all kinds of games before leaving the office to go home.”
                        </p>
                        <div class="testimonial__author">
                            <div class="testimonial__author__pic">
                                <img src="img/about/testimonial-author.jpg" alt="">
                            </div>
                            <div class="testimonial__author__text">
                                <h5>Augusta Schultz</h5>
                                <p>Administration</p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6 p-0">
                    <div class="testimonial__pic set-bg" data-setbg="img/about/testimonialpic.jpg"></div>
                </div>
            </div>
        </div>
    </section>
    <!-- Testimonial Section End -->

    <!-- Counter Section Begin -->
    <section class="counter spad">
        <div class="container">
            <div class="row">
                <div class="col-lg-3 col-md-6 col-sm-6">
                    <div class="counter__item">
                        <div class="counter__item__number">
                            <h2 class="cn_num">102</h2>
                        </div>
                        <span>Our <br />Clients</span>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 col-sm-6">
                    <div class="counter__item">
                        <div class="counter__item__number">
                            <h2 class="cn_num">30</h2>
                        </div>
                        <span>Total <br />Categories</span>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 col-sm-6">
                    <div class="counter__item">
                        <div class="counter__item__number">
                            <h2 class="cn_num">102</h2>
                        </div>
                        <span>In <br />Country</span>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 col-sm-6">
                    <div class="counter__item">
                        <div class="counter__item__number">
                            <h2 class="cn_num">98</h2>
                            <strong>%</strong>
                        </div>
                        <span>Happy <br />Customer</span>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Counter Section End -->

    <!-- Team Section Begin -->
    <section class="team spad">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="section-title">
                        <span>Our Team</span>
                        <h2>Meet Our Team</h2>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-3 col-md-6 col-sm-6">
                    <div class="team__item">
                        <img src="img/about/team-1.jpg" alt="">
                        <h4>John Smith</h4>
                        <span>Administration</span>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 col-sm-6">
                    <div class="team__item">
                        <img src="img/about/team-2.jpg" alt="">
                        <h4>Christine Wise</h4>
                        <span>C.E.O</span>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 col-sm-6">
                    <div class="team__item">
                        <img src="img/about/team-3.jpg" alt="">
                        <h4>Sean Robbins</h4>
                        <span>Manager</span>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 col-sm-6">
                    <div class="team__item">
                        <img src="img/about/team-4.jpg" alt="">
                        <h4>Lucy Myers</h4>
                        <span>Delivery</span>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Team Section End -->

    <!-- Client Section Begin -->
    <section class="clients spad">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="section-title">
                        <span>Partner</span>
                        <h2>Happy Clients</h2>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-3 col-md-4 col-sm-4 col-6">
                    <a href="#" class="client__item"><img src="img/clients/client-1.png" alt=""></a>
                </div>
                <div class="col-lg-3 col-md-4 col-sm-4 col-6">
                    <a href="#" class="client__item"><img src="img/clients/client-2.png" alt=""></a>
                </div>
                <div class="col-lg-3 col-md-4 col-sm-4 col-6">
                    <a href="#" class="client__item"><img src="img/clients/client-3.png" alt=""></a>
                </div>
                <div class="col-lg-3 col-md-4 col-sm-4 col-6">
                    <a href="#" class="client__item"><img src="img/clients/client-4.png" alt=""></a>
                </div>
                <div class="col-lg-3 col-md-4 col-sm-4 col-6">
                    <a href="#" class="client__item"><img src="img/clients/client-5.png" alt=""></a>
                </div>
                <div class="col-lg-3 col-md-4 col-sm-4 col-6">
                    <a href="#" class="client__item"><img src="img/clients/client-6.png" alt=""></a>
                </div>
                <div class="col-lg-3 col-md-4 col-sm-4 col-6">
                    <a href="#" class="client__item"><img src="img/clients/client-7.png" alt=""></a>
                </div>
                <div class="col-lg-3 col-md-4 col-sm-4 col-6">
                    <a href="#" class="client__item"><img src="img/clients/client-8.png" alt=""></a>
                </div>
            </div>
        </div>
    </section>
    <!-- Client Section End -->

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