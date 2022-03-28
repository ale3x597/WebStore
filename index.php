<?php
//start sesion for cart
session_start();
      require_once 'datab/component.php';
      require_once 'datab/connect.php';
//instance
$database = new CreateDb("website","products");
if(isset($_POST['add'])){
  //print_r($_POST['pID'])
  if(isset($_SESSION['cart'])){
    $item_array_id = array_column($_SESSION['cart'],"pID");


    if(in_array($_POST['pID'], $item_array_id)){
      echo "<script>alert('Product has already been added.')</script>";
      echo "<script>window.location = 'shop.php'</script>";
    }else{
      $count = count($_SESSION['cart']);
      $item_array = array(
        'pID' =>$_POST['pID']
      );

      $_SESSION['cart'][$count] = $item_array;

    }

  }else{
    $item_array = array(
      'pID' =>$_POST['pID']
    );
    //create new session variable
    $_SESSION['cart'][0] = $item_array;
    print_r($_SESSION['cart']);
  }
}


?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Store Project</title>
    <link rel="stylesheet" href="styles.css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.4/css/all.css"/>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.8.1/font/bootstrap-icons.css">
   
</head>

<body>
    
    <section id="header">
        <a href="#"><img src="img/temp_logo.png" class="logo"></a>
        <div>
            <ul id="nav_bar">
                <li><a class="active" href="index.html">Home</a> </li>
                <li><a href="shop.php">Shop</a> </li>
                <li><a href="reviews.php">Reviews</a> </li>
                <li><a href="about.html">About</a> </li>
                <li><button><a class="but1" href="cart.php">Cart</a> </li>
            </ul>
        </div>
       
       
         
       
    </section>
    <section id="banner">
        <h4>Presenting:</h4>
        <h2>Super Deals</h2>
        <h1>On All Products</h1>
        <p>30% off! Our Best Products</p>
        <button class="shop"><a href="shop.html">Shop Now!</a></button>
    </section>

    <section id="feat" class="section-p1">
        <div class="box">
            <img src="img/ship.png" alt="Free Shipping!">
            <h6>Free Shipping!</h6>
        </div>
        <div class="box">
            <img src="img/savem.png" alt="Save Big!">
            <h6>Biggest Savings!</h6>
        </div>
        <div class="box">
            <img src="img/satisfied.png" alt="Satisfaction Guaranteed">
            <h6>Satisfaction Guaranteed!</h6>
        </div>
        <div class="box">
            <img src="img/price.gif" alt="Lowest Prices">
            <h6>Lowest Prices!</h6>
        </div>
        <div class="box">
            <img src="img/usa.png" alt="Made in Usa">
            <h6>Locally Sourced!</h6>
        </div>
    </section>

    <section id="prod1" class="section-p1">
        <h2>Featured Products</h2>
        <p>Made For Everyone</p>
        <div class="pro-container">
            <div class="pro">
                <img class="img1" src="img/prod-img/prod1.jpg" alt="blue buttom down shirt">
                <div class="disc">
                    <span>Pengfei</span>
                    <h5>Pengfei Short Sleeve button down</h5>
                    <div class="star">
                        <i class="fas fa-star">4.5</i>
                      
                    </div>
                    <h4>$35</h4>
                </div>
                <a href="cart.html" class="cart"><img src="img/cart.png" alt="shopping cart" ></a>
            </div>
            <div class="pro">
                <img class="img1" src="img/prod-img/prod1.jpg" alt="blue buttom down shirt">
                <div class="disc">
                    <span>Pengfei</span>
                    <h5>Pengfei Short Sleeve button down</h5>
                    <div class="star">
                        <i class="fas fa-star">4.5</i>
                        
                    </div>
                    <h4>$35</h4>
                </div>
                <a href="cart.html" class="cart"><img src="img/cart.png" alt="shopping cart" ></a>
            </div>
            <div class="pro">
                <img class="img1" src="img/prod-img/prod1.jpg" alt="blue buttom down shirt">
                <div class="disc">
                    <span>Pengfei</span>
                    <h5>Pengfei Short Sleeve button down</h5>
                    <div class="star">
                        <i class="fas fa-star">4.5</i>
                       
                    </div>
                    <h4>$35</h4>
                </div>
                <a href="cart.html" class="cart"><img src="img/cart.png" alt="shopping cart" ></a>
            </div>
            <div class="pro">
                <img class="img1" src="img/prod-img/prod1.jpg" alt="blue buttom down shirt">
                <div class="disc">
                    <span>Pengfei</span>
                    <h5>Pengfei Short Sleeve button down</h5>
                    <div class="star">
                        <i class="fas fa-star">4.5</i>
                        
                    </div>
                    <h4>$35</h4>
                </div>
                <a href="cart.html" class="cart"><img src="img/cart.png" alt="shopping cart" ></a>
            </div>

        </div>

    </section>

    <section id="ad" class="section-m1">
        <h2>All the Labels You Love</h2>
        <button class="shop"><a href="shop.html">Shop Now!</a></button>

    </section>

    <script src="script.js"></script>

<footer class="section-p1">
    <img src="img/temp_logo.png" alt="Company Logo, shirt surf">
   <div class="foot">
      
       <p>University of North Carolina at Pembroke, Pembroke, North Carolina 28372</p>
      
       

   </div>
</footer>

</body>
</html>
</html>