<?php
require_once 'dbconnect.php';

$conn = connectDB();

if (isset($_GET['id'])) {
    
    $id = $_GET['id'];
$sql = "SELECT * FROM cart, product WHERE product.ProductID = cart.ProductID AND AccountID = $id";
$result = mysqli_query($conn, $sql);
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
            <?php
                                if(isset($_SESSION['user_login'])){
                                ?>
                                <a href="wishlist.php?id=<?php echo $AccountID?>"><img src="img/icon/heart.png" alt=""></a>
                                <?php
                                }else{
                                    ?>
                                    <a href="login.php"><img src="img/icon/heart.png" alt=""></a>
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
                        <?php
                                if(isset($_SESSION['user_login'])){
                                ?>
                                <a href="wishlist.php?id=<?php echo $AccountID?>"><img src="img/icon/heart.png" alt=""></a>
                                <?php
                                }else{
                                    ?>
                                    <a href="login.php"><img src="img/icon/heart.png" alt=""></a>
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
                        <h4>Shopping Cart</h4>
                        <div class="breadcrumb__links">
                            <a href="./index.php">Home</a>
                            <a href="./shop.php">Shop</a>
                            <span>Shopping Cart</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Breadcrumb Section End -->

    <!-- Shopping Cart Section Begin -->
    <section class="shoppingcart spad">
        <div class="container">
            <div class="row">
                <div class="col-lg-8">
                    <div class="shopping__cart__table">
                        <table>
                            <thead>
                                <tr>
                                    <th>Product</th>
                                    <th>Quantity</th>
                                    <th>Total</th>
                                    <th></th>
                                </tr>
                            </thead>
                            <tbody>
                            <?php
                            $total_price = 0;
                            if (mysqli_num_rows($result) > 0) {
                                $total_price = 0;
                                    while($row = mysqli_fetch_assoc($result)){
                                    $CartID = $row['CartID'];
                                    $ProductName = $row['ProductName'];
                                    $ProductPrice = $row['ProductPrice'];
                                    $ProductPicture = $row['ProductPicture'];
                                    $quantity = $row['quantity'];
                                    $total = $quantity*$ProductPrice;
                                    $total_price += ($total);
                                    ?>
                                <tr>
                                    <td class="product__cart__item">
                                        <div class="product__cart__item__pic">
                                        <?php echo "<img src=\"img/product/".$ProductPicture."\" height='90' weight='90'>"?>
                                        </div>
                                        <div class="product__cart__item__text">
                                            <h6><?php echo $ProductName; ?></h6>
                                            <h5><?php echo "$" .$ProductPrice; ?></h5>
                                        </div>
                                    </td>
                                    <td class="quantity__item">
                                        <div class="quantity">
                                            <div class="pro-qty-2">
                                                <input type="text" value="<?php echo $quantity;?>">
                                            </div>
                                        </div>
                                    </td>
                                    <td class="cart__price"> $<?php echo $total; ?></td>
                                    <td class="cart__close" ><a href="delete.php?CartID=<?php echo $CartID;?>"><i class="fa fa-close"></i></a></td>
                                </tr>
                                <?php
                                    }
                                }else {
                                echo "0 result";
                                }
                                ?>
                            </tbody>
                        </table>
                    </div>
                    <div class="row">
                        <div class="col-lg-6 col-md-6 col-sm-6">
                            <div class="continue__btn">
                                <a href="shop.php">Continue Shopping</a>
                            </div>
                        </div>
                        <div class="col-lg-6 col-md-6 col-sm-6">
                            <div class="continue__btn update__btn">
                                <a href=""><i class="fa fa-spinner"></i> Update cart</a>
                            </div>
                        </div>
                    </div>
                </div>
                
                <div class="col-lg-4">
                    <div class="cart__discount">
                    
                        <h6>Discount codes</h6>
                        <form action="#">
                            <input type="text" placeholder="Coupon code">
                            <button type="submit">Apply</button>
                        </form>
                    </div>
                    <div class="cart__total">
                        <h6>Cart total</h6>
                        <ul>
                            <li>Subtotal <span> <?php echo "$" .$total_price; ?></span></li>
                            <li>Total <span><?php echo "$" .$total_price; ?></span></li>
                        </ul>
                        <?php
                                    if(isset($_SESSION['user_login'])){
                                    ?>
                                    <a href="checkout.php?id=<?php echo $AccountID?>" class="primary-btn">Proceed to checkout</a>
                                    <?php
                                    }else{
                                        ?>
                                        <a href="login.php" class="primary-btn">Login</a>
                                        <?php
                                    }
                                    ?>
                        
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Shopping Cart Section End -->

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
                            <li><a href="shoppingcart.php">Shopping Cart</a></li>
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