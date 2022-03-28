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
<html>
  <head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Products</title>
    <link rel="icon" type="img/x-icon"  href="img/alien.ico">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@fortawesome/fontawesome-free@5.15.4/css/fontawesome.min.css" integrity="sha384-jLKHWM3JRmfMU0A5x5AkjWkw/EYfGUAGagvnfryNV3F9VqM98XiIH7VBGVoxVSc7" crossorigin="anonymous">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css" integrity="sha512-KfkfwYDsLkIlwQp6LFnl8zNdLGxu9YAA1QvwINks4PhcElQSvqcyVLLD9aMhXd13uQjoXtEKNosOWaZqXgel0g==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="CSS/style3.css">
    <link rel="stylesheet" href="styles.css">


  </head>
  <body>
    <section id="header">
        <a href="#"><img src="img/temp_logo.png" class="logo"></a>
        <div>
            <ul id="nav_bar">
                <li><a  href="index.html">Home</a> </li>
                <li><a class="active" href="shop.php">Shop</a> </li>
                <li><a href="reviews.php">Reviews</a> </li>
                <li><a href="about.html">About</a> </li>
                <li><button><a class="but1" href="cart.php">Cart</a> </li>

            </ul>
        </div>
    </section>
    <div class="container">
      <h4 class="shopTitle">Shop</h4>
        <div class="row text-center py-5">
          <?php
          $result = $database->getData();
          while ($row = mysqli_fetch_assoc($result)){
                    component($row['pname'], $row['price'], $row['pImg'], $row['pID']);
                }
           ?>
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
