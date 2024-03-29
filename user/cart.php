<h2>
            Cart</h2>

<?php
session_start();

if (is_array($_COOKIE['item']))  //this is for chec cookies are available or nor
{
    foreach ($_COOKIE['item'] as $name1 => $value)
    {

        if (isset($_POST["delete$name1"]))
        {

            setcookie("item[$name1]", "", time()-1800);
            ?>
            <script type="text/javascript">
                window.location.href = window.location.href;
            </script>
            <?php
        }
    }
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>Cart</title>
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="css/font-awesome.min.css" rel="stylesheet">
    <link href="css/prettyPhoto.css" rel="stylesheet">
    <link href="css/price-range.css" rel="stylesheet">
    <link href="css/animate.css" rel="stylesheet">
    <link href="css/main.css" rel="stylesheet">
    <link href="css/responsive.css" rel="stylesheet">
    <!--[if lt IE 9]>
    <script src="js/html5shiv.js"></script>
    <script src="js/respond.min.js"></script>
    <![endif]-->
    
</head>
<!--/head-->

<body>
<header id="header"><!--header-->
    <div class="header_top"><!--header_top-->
        <div class="container">
            <div class="row">
                <div class="col-sm-6">
                    
                </div>
                <div class="col-sm-6">
                    <div class="social-icons pull-right">
                        
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!--/header_top-->

    <div class="header-middle"><!--header-middle-->
        <div class="container">
            <div class="row">
                
                <div class="col-sm-8">
                    <div class="shop-menu pull-right">
                        
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!--/header-middle-->

    <div class="header-bottom"><!--header-bottom-->
        <div class="container">
            <div class="row">
                <div class="col-sm-9">
                    <div class="navbar-header">
                        <button type="button" class="navbar-toggle" data-toggle="collapse"
                                data-target=".navbar-collapse">
                            <span class="sr-only">Toggle navigation</span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                        </button>
                    </div>
                    <div class="mainmenu pull-left">
                        <ul class="nav navbar-nav collapse navbar-collapse">
                            <li><a href="shop.php">Home</a></li>
                            
                            
                        </ul>
                    </div>
                </div>
                <div class="col-sm-3">
                    
                </div>
            </div>
        </div>
    </div>
    <!--/header-bottom-->
</header>
<!--/header-->

<section id="cart_items">
    <div class="container">
        <div class="breadcrumbs">
            <ol class="breadcrumb">
                <li><a href="#">Home</a></li>
                <li class="active">Cart</li>
            </ol>
        </div>
        <div class="table-responsive cart_info">
            <table class="table table-condensed">
                <form name="form1" action="" method="post">
                    <?php
                    $d = 0;
                    if (is_array($_COOKIE['item']))  //this is for check cookies are available or nor
                    {
                        $d = $d + 1;

                    }
                    if ($d == 0)
                    {
                        echo "no record available in cart";
                        echo "<br>";
                        echo "<br>";
                        echo "<br>";
                        echo "<br>";
                    }
                    else
                    {
                    ?>
                    <thead>
                    <tr class="cart_menu">
                        <td class="image">Item</td>
                        <td class="description"></td>
                        <td class="price">Price</td>
                        <td class="quantity">Quantity</td>
                        <td class="total">Total</td>
                        <td></td>
                    </tr>
                    </thead>
                    <tbody>
                    <?php
                    foreach ($_COOKIE['item'] as $name1 => $value)   //this is for looping as per cookies if 3 cookies then loop move
                    {
                        $values11 = explode("__", $value);

                        ?>
                        <tr>
                            <td class="cart_product">
                                <a href=""><img src="../admin/<?php echo $values11[0]; ?>" alt="" height="100"
                                                width="100"></a>
                            </td>
                            <td class="cart_description">
                                <h4><a href=""><?php echo $values11[1]; ?></a></h4>

                            </td>
                            <td class="cart_price">
                                <p>$<?php echo $values11[2]; ?></p>
                            </td>
                            <td class="cart_quantity">
                                <div class="cart_quantity_button">

                                    <input class="cart_quantity_input" type="text" name="quantity"
                                           value="<?php echo $values11[3]; ?>" autocomplete="off" size="2" readonly>

                                </div>
                            </td>
                            <td class="cart_total">
                                <p class="cart_total_price">$<?php echo $values11[4]; ?></p>
                            </td>
                            <td><input type="submit" name="delete<?php echo $name1;
                                ?>" value="del" id="s3"></td>
                            <td class="cart_delete">
                                <a class="cart_quantity_delete" href=""><i class="fa fa-times"></i></a>
                            </td>
                        </tr>
                        <?php

                    }

                    ?>


                    </tbody>
                </form>
            </table>
            <?php

            }
            $tot = 0;

            if (is_array($_COOKIE['item']))  //this is for chec cookies are available or nor
            {
                foreach ($_COOKIE['item'] as $name1 => $value)   //this is for looping as per cookies if 3 cookies then loop move
                {
                    $values11 = explode("__", $value);
                    $tot = $tot + $values11[4];
                }

                echo "$" . $tot;
                $_SESSION["pay"] = $tot;
            }
            ?>


        </div>
    </div>
</section>
<!--/#cart_items-->
<center>
    <a href="checkout.php">
        <input type="button" value="checkout"></a>
</center>


<script src="js/jquery.js"></script>
<script src="js/bootstrap.min.js"></script>
<script src="js/jquery.scrollUp.min.js"></script>
<script src="js/jquery.prettyPhoto.js"></script>
<script src="js/main.js"></script>
</body>
</html>