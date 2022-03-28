
<?php

function component($pname,$price, $pImg,$pID){
  $element="
  <div class=\"col-md-3 col-sm-6 my-3 my-md-0\">
    <form action=\"shop.php\" method=\"post\">
      <div class=\"card shadow\">
        <div>
          <img src=\"$pImg\" alt=\"shirt\" class=\"img-fluid card-img-top\">
        </div>
        <div class=\"card-body\">
          <h5 class=\"card-title\">$pname</h5>
          <h6>
            <i class=\"fas fa-star\"></i>
            <i class=\"fas fa-star\"></i>
            <i class=\"fas fa-star\"></i>
            <i class=\"fas fa-star\"></i>
            <i class=\"far fa-star\"></i>
          </h6>
          <p class=\"card-text\">
            some text about product
          </p>
          <h5>
            <small><s class=\"text-secondary\">$50</s></small>
            <span class=\"price\">$price</span>
          </h5>
          <button type=\"submit\" class=\"btn btn-warning my-3\" name=\"add\">Add to Cart<i class=\"fas fa-shopping-cart\"></i></button>
          <input type='hidden' name='pID' value='$pID'>
      </div>
    </div>
  </form>
  </div>
  ";

  echo $element;
}


function cartElement($pImg,$pname,$price,$pID){

  $element="
  <form action=\"cart.php?action=remove&id=$pID\" method=\"post\" class=\"cart-items\">
    <div class=\"border rounded\">
      <div class=\"row bg-white\">
        <div class=\"col-md-3 pl-0\">
          <img src=$pImg alt=\"Blue T\" class=\"img-fluid\">
        </div>
        <div class=\"col-md-6\">
          <h5 class=\"pt-2\">$pname</h5>
          <small class=\"text-secondary\">Website Team</small>
          <h5 class=\"pt-2\">$$price</h5>
          <button type=\"submit\" class=\"btn btn-warning\">Save for Later</button>
          <button type=\"submit\" class=\"btn btn-danger mx-2\" name=\"remove\">Remove</button>
        </div>
        <div class=\"col-md-3 py-5\">
          <div>
            <button type=\"button\" class=\"btn bg-light border rounded-circle\"><i class=\"fas fa-minus\"></i></button>
            <input type=\"text\" value=\"1\" class=\"form-control w-25 d-inline\">
            <button type=\"button\" class=\"btn bg-light border rounded-circle\"><i class=\"fas fa-plus\"></i></button>
          </div>
        </div>
      </div>
    </div>
  </form>
  ";
  echo $element;
}
