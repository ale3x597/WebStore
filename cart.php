
<?php
session_start();

require_once ("datab/component.php");
require_once ("datab/connect.php");
$db = new CreateDb("website","products");


if(isset($_POST['remove'])){
  if($_GET['action']=='remove'){
    foreach($_SESSION['cart'] as $key=> $value){
      if($value["pID"]==$_GET['id']){
        unset($_SESSION['cart'][$key]);
        echo "<script>alert('Product has been removed!')</script>";
        echo "<script>window.location='cart.php'</script>";
      }
    }
  }
}
 ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
      content="width=device-width, user-scalable=no, intial-sclae=1.0,minimum-scale=1.0"
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Cart</title>

    <link rel="icon" type="img/x-icon"  href="img/alien.ico">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@fortawesome/fontawesome-free@5.15.4/css/fontawesome.min.css" integrity="sha384-jLKHWM3JRmfMU0A5x5AkjWkw/EYfGUAGagvnfryNV3F9VqM98XiIH7VBGVoxVSc7" crossorigin="anonymous">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css" integrity="sha512-KfkfwYDsLkIlwQp6LFnl8zNdLGxu9YAA1QvwINks4PhcElQSvqcyVLLD9aMhXd13uQjoXtEKNosOWaZqXgel0g==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="CSS/style3.css">
    <link rel="stylesheet" href="styles.css">
</head>
<body class="bg-light">
  <section id="header">
      <a href="#"><img src="img/temp_logo.png" class="logo"></a>
      <div>
          <ul id="nav_bar">
              <li><a  href="index.html">Home</a> </li>
              <li><a href="shop.php">Shop</a> </li>
              <li><a href="reviews.php">Reviews</a> </li>
              <li><a href="about.html">About</a> </li>
              <li><button><a class="active" class="but1" href="cart.php">Cart</a> </li>

          </ul>
      </div>
  </section>
  <div class="container-fluid">
    <div class="row px-5">
      <div class="col-md-7">
        <div class="shopping-cart">
          <h6>My Cart</h6>
          <hr>
            <?php
            $totalF=0;
            $total=0;
            $tax=0;
              if(isset($_SESSION['cart'])){
                $pID = array_column($_SESSION['cart'],'pID');
                $result = $db->getData();
                while($row= mysqli_fetch_assoc($result)){
                  foreach($pID as $id){
                    if($row['pID']==$id){
                      cartElement($row['pImg'],$row['pname'],$row['price'],$row['pID']);
                      $total = $total + (int)$row['price'];
                      $tax = (float)$total * .07+.00;
                      $totalF=$total + $tax+.00;
                    }
                  }
                }
              }
              else{
                echo "<h5>Cart is empty</h5>";
              }

             ?>

        </div>
      </div>
      <div class="col-md-4 offset-md-1 border rounded mt-5 bg-white h-25">
        <div class="pt-4">
          <h6>PRICE DETAILS</h6>
          <hr>
          <div class="row price-detials">
            <div class="col-md-6">
              <?php
                if(isset($_SESSION['cart'])){
                  $count = count($_SESSION['cart'])-1;
                  echo "<h6>Price ($count items)</h6>";
                }else{
                  echo "<h6>Price (0 items)</h6>";
                }
              ?>
              <h6>Delivery Charges</h6>
              <hr>
              <h6>Taxes</h6>
              <hr>
              <h6>Total</h6>
            </div>
            <div class="col-md-6">
              <h6>$<?php echo $total ?></h6>
              <h6 class="text-success">FREE</h6>
              <hr>
              <h6>$<?php echo $tax ?></h6>
              <hr>
              <h6>$<?php echo $totalF ?></h6>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  <footer class="section-p1">
        <img src="img/temp_logo.png" alt="Company Logo, shirt surf">
       <div class="foot">
          
           <p>University of North Carolina at Pembroke, Pembroke, North Carolina 28372</p>
          
           

       </div>
    </footer>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js" integrity="sha384-7+zCNj/IqJ95wo16oMtfsKbZ9ccEh31eOz1HGyDuCQ6wgnyJNSYdrPa03rtR1zdB" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js" integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13" crossorigin="anonymous"></script>

</body>
</html>
