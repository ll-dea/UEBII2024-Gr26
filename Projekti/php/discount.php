<?php
session_start();

if (!isset($_SESSION["user"])) {
    header("Location: ../index.php");
}


// Initialize cart if not set
if (!isset($_SESSION['cart'])) {
  $_SESSION['cart'] = [];
}

// Add item to cart
function addItemToCart($item) {
  if (!isset($item) || empty($item)) {
      throw new Exception("Artikulli nuk është i vlefshëm.");
  }

  if (array_key_exists($item, $_SESSION['cart'])) {
      $_SESSION['cart'][$item]++;
  } else {
      $_SESSION['cart'][$item] = 1;
  }
}

?>



<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv='cache-control' content='no-cache'>
  <meta http-equiv='expires' content='0'>
  <meta http-equiv='pragma' content='no-cache'>
  <link rel="icon" href="img/tl.png" type="image/x-icon">
  <title>Garden Shop</title>
  <link rel="stylesheet" href="../CSS/discount.css">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
  <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Montserrat&display=swap">
  <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Truculenta:opsz,wght@12..72,100..900&display=swap" rel="stylesheet">



</head>

<body>
  <!-- HEADER -->
  <!-- require()  -->
  <?php require  'header.php'; ?>

  <!-- Discount Offer Content -->
  <div class="discount-container row" style="margin-top:60px; ">
    <div class="discount-text col-md-6">
      <h2 style="font-size: 3rem; ">Special Discount Offer</h2>
      <p style="font-size: 1.5rem;">Get 20% off on all gardening tools this weekend!</p>
      <p style="font-size: 1.5rem;">Hurry up! Limited time offer.</p>
      <p style="font-size: 1.5rem;">Shop Now</p>
    </div>
    <div class="discount-image col-md-6">
      <img src="../HTML/foto/Photo30.jpg" alt="Discount Image" style="max-width: 300px; height: auto; ">
    </div>
  </div>

  <form action="mycart.php" method="post">

    <div id="item1" class="row" style="padding-left: 5%; margin-top:50px; margin-bottom:100px;">

      <div id="item1emri1" class="col-3">
        <div class="card" style="width: 18rem;">
          <img src="../HTML/foto/Photo31.jpg" class="card-img-top" style="height: 270px; width:287px; margin-left:0px;" alt="Digging Set">
          <div class="card-body">
            <h5 class="card-title">Digging Set</h5>
            <button type="submit" name="add_to_cart" value="Digging Set">Buy</button>
          </div>
        </div>
      </div>
      <div id="item1emri2" class="col-3 ">
        <div class="card" style="width: 18rem;">
          <img src="../HTML/foto/Photo32.jpg" class="card-img-top" style="height:270px; width:287px; margin-left: 0px;" alt="Ornamental Plant">
          <div class="card-body">
            <h5 class="card-title">Ornamental Plant</h5>
            <button type="submit" name="add_to_cart" value="Ornamental Plant">Buy</button>
          </div>
        </div>
      </div>
      <div id="item1emri3" class="col-3">
        <div class="card" style="width: 18rem;">
          <img src="../HTML/foto/Photo33.jpg" class="card-img-top" style="height:270px; margin-left: 0px;" alt="Flower Light">
          <div class="card-body">
            <h5 class="card-title">Flower Light</h5>

            <button type="submit" name="add_to_cart" value="Flower Light">Buy</button>
          </div>
        </div>
      </div>
      <div id="item1emri4" class="col-3">
        <div class="card" style="width: 18rem;">
          <img src="../HTML/foto/Photo34.jpg" class="card-img-top" style="height: 270px; margin-left: 0px;" alt="Flower Vase">
          <div class="card-body">
            <h5 class="card-title">Flower Vase</h5>

            <button type="submit" name="add_to_cart" value="Flower Vase">Buy</button>
          </div>
        </div>
      </div>
    </div>

    <div id="item2" class="row" style="padding-left: 5%; margin-top:70px; margin-bottom:100px;">

      <div id="item2emri1" class="col-3">
        <div class="card" style="width: 18rem;">
          <img src="../HTML/foto/Photo35.jpg" class="card-img-top" style="height: 270px; width:287px; margin-left:0px;" alt="Watering Can">
          <div class="card-body">
            <h5 class="card-title">Watering Can</h5>
            <button type="submit" name="add_to_cart" value="Watering Can">Buy</button>
          </div>
        </div>
      </div>
      <div id="item2emri2" class="col-3 ">
        <div class="card" style="width: 18rem;">
          <img src="../HTML/foto/Photo36.jpg" class="card-img-top" style="height:270px; width:287px; margin-left: 0px;" alt=" Wheelbarrow">
          <div class="card-body">
            <h5 class="card-title">Wheelbarrow</h5>
            <button type="submit" name="add_to_cart" value="Wheelbarrow">Buy</button>
          </div>
        </div>
      </div>
      <div id="item2emri3" class="col-3">
        <div class="card" style="width: 18rem;">
          <img src="../HTML/foto/Photo38.jpg" class="card-img-top" style="height:270px; margin-left: 0px;" alt="Garden Boots">
          <div class="card-body">
            <h5 class="card-title"> Garden Boots </h5>
            <button type="submit" name="add_to_cart" value="Garden Boots">Buy</button>
          </div>
        </div>
      </div>
      <div id="item2emri4" class="col-3">
        <div class="card" style="width: 18rem;">
          <img src="../HTML/foto/Photo37.jpg" class="card-img-top" style="height: 270px; margin-left: 0px;" alt="Pink Flamingo">
          <div class="card-body">
            <h5 class="card-title">Pink Flamingo</h5>
            <button type="submit" name="add_to_cart" value="Pink Flamingo">Buy</button>
          </div>
        </div>
      </div>
    </div>

    <div id="item3" class="row" style="padding-left: 5%; margin-top:70px; margin-bottom:100px;">

      <div id="item3emri1" class="col-3">
        <div class="card" style="width: 18rem;">
          <img src="../HTML/foto/Photo39.jpg" class="card-img-top" style="height: 270px; width:287px; margin-left:0px;" alt="Rake">
          <div class="card-body">
            <h5 class="card-title">Rake</h5>
            <button type="submit" name="add_to_cart" value="Rake">Buy</button>
          </div>
        </div>
      </div>
      <div id="item3emri2" class="col-3 ">
        <div class="card" style="width: 18rem;">
          <img src="../HTML/foto/Photo40.jpg" class="card-img-top" style="height:270px; width:287px; margin-left: 0px;" alt=" Cactus Plant">
          <div class="card-body">
            <h5 class="card-title">Cactus Plant</h5>
            <button type="submit" name="add_to_cart" value="Cactus Plant">Buy</button>
          </div>
        </div>
      </div>
      <div id="item3emri3" class="col-3">
        <div class="card" style="width: 18rem;">
          <img src="../HTML/foto/Photo41.jpg" class="card-img-top" style="height:270px; margin-left: 0px;" alt="Eletric chainsaw">
          <div class="card-body">
            <h5 class="card-title"> Electric Chainsaw</h5>

            <button type="submit" name="add_to_cart" value="Electric Chainsaw">Buy</button>
          </div>
        </div>
      </div>
      <div id="item3emri4" class="col-3">
        <div class="card" style="width: 18rem;">
          <img src="../HTML/foto/Photo42.jpg" class="card-img-top" style="height: 270px; margin-left: 0px;" alt="PFidle Leaf">
          <div class="card-body">
            <h5 class="card-title">Fidle Leaf</h5>

            <button type="submit" name="add_to_cart" value="Fidle Leaf">Buy</button>
          </div>
        </div>
      </div>
    </div>


    <br><br><br>
    <v class="container">
      <div class="row">
        <div class="container">
          <div class="row">
            <div class="container">
              <div class="row">

                <?php
                class Product
                {
                  public $name;
                  public $price;
                  public $description;

                  public function __construct($name, $price, $description)
                  {
                    $this->name = $name;
                    $this->price = $price;
                    $this->description = $description;
                  }
                }
                class ExtendedProduct extends Product
                {
                  protected $availability;

                  public function __construct($name, $price, $description, $availability)
                  {
                    parent::__construct($name, $price, $description);
                    $this->availability = $availability;
                  }

                  // Shto metoda të tjera nëse është e nevojshme
                  public function getAvailability()
                  {
                    return $this->availability;
                  }

                  public function getAvailabilityText()
                  {
                    if ($this->availability > 0) {
                      return 'In stock';
                    } else {
                      return 'Out of stock. It will be back soon';
                    }
                  }

                  public function setAvailability($availability)
                  {
                    $this->availability = $availability;
                  }
                }

                ?>
                <?php
                $products = array(
                  new ExtendedProduct("Digging set ", 100, "Each tool in our Garden Digging Tool Set is constructed from high-quality materials, such as stainless steel, carbon steel, or forged aluminum, ensuring durability, strength, and longevity.", 5),
                  new ExtendedProduct("Ornamental Plant", 30, "The Ornamental Plant, a delightful addition to any indoor or outdoor space, brings a touch of natural beauty and elegance to your home or garden.", 30),
                  new ExtendedProduct("Flower Light", 50, "The Flower Light is a charming and versatile lighting accessory that adds a touch of elegance and ambiance to any indoor or outdoor space.", 25),
                  new ExtendedProduct("Flower Vase", 40, "Crafted from high-quality materials such as glass, ceramic, or porcelain, our Flower Vase ensures durability and longevity.", 35),

                  new ExtendedProduct(" Watering Can ", 20, "Crafted from high-quality materials such as durable plastic, galvanized metal, or corrosion-resistant stainless steel, our watering can is built to withstand regular use and outdoor elements.", 20),
                  new ExtendedProduct("Wheelbarrow", 120, "Designed for user comfort and convenience, the ergonomic handles feature a comfortable grip and optimal leverage, allowing for easy pushing, pulling, and dumping of loads.", 40),
                  new ExtendedProduct("Garden Boots", 70, "Constructed from waterproof materials such as rubber, neoprene, or PVC, our garden boots provide reliable protection against moisture, mud, and debris. Keep your feet dry and comfortable even when working in wet or muddy conditions", 0),
                  new ExtendedProduct(" Pink Flamingo", 90, "Crafted from durable materials such as resin or metal, our Pink Flamingo Garden Decor features vivid pink hues and lifelike details that capture the graceful beauty of these iconic birds.", 10),

                  new ExtendedProduct("Rake", 60, "Our rake features an adjustable head or handle, allowing you to customize the tool's width and angle to suit different gardening needs.", 8),
                  new ExtendedProduct("Cactus Plant", 20, " Our Cactus Plant boasts a captivating and exotic beauty that instantly adds visual interest and charm to any environment.", 60),
                  new ExtendedProduct("Electric Chainsaw", 180, "Equipped with a high-performance electric motor, our chainsaw delivers ample cutting power to tackle a wide range of cutting tasks with ease. ", 9),
                  new ExtendedProduct("Fidle Leaf", 40, " Fiddle Leaf Fig is a favorite among plant enthusiasts and interior decorators alike, adding a touch of tropical sophistication to any space.", 8)
              );
                $products[0]->setAvailability(1);

                foreach ($products as $key => $product) {
                ?>

                  <div class="modal fade" id="productModal<?= $key ?>" tabindex="-1" role="dialog" aria-labelledby="productModalLabel<?= $key ?>" aria-hidden="true">
                    <div class="modal-dialog" role="document">
                      <div class="modal-content">
                        <div class="modal-header">
                          <h5 class="modal-title" id="productModalLabel<?= $key ?>"><?= $product->name ?></h5>
                          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                          </button>
                        </div>
                        <div class="modal-body">
                          <p><?= $product->description ?></p>
                          <p>Price: $<?= $product->price ?></p>
                          <p><?= $product->getAvailabilityText() ?></p>
                          <p>Hope you found this helpful!</p>
                        </div>
                      </div>
                    </div>
                  </div>
                <?php }




                # Add hidden fields for previously added items
                foreach ($_SESSION['cart'] as $item => $quantity) {
                  echo "<input type='hidden' name='cart[$item][name]' value='Item $item'>";
                  echo "<input type='hidden' name='cart[$item][price]' value='$quantity'>";
                }
                ?>


  </form>




  <button id="backToTopButton" class="btn rounded-circle d-none" draggable="true" style="background-color:white; color: #ff7900; border: 1px solid #ff7900; width:45px">
    <span>&#9733; </span>
  </button>

  <footer style="width: 100%;">
    &copy; 2024 Gardening Shop. All rights reserved.

  </footer>


</body>

<script>
  document.addEventListener("DOMContentLoaded", function() {
    var backToTopButton = document.getElementById('backToTopButton');

    function toggleBackToTopButton() {
      backToTopButton.classList.toggle('d-none', window.scrollY <= 300);
    }

    // Scroll to Top 
    function scrollToTop() {
      window.scrollTo({
        top: 0,
        behavior: 'smooth'
      });
    }

    function animateBackToTopButton() {
      $('#backToTopButton').stop(true, true).fadeTo(200, 0.5).fadeTo(200, 1).addClass('animated bounce');
    }

    window.addEventListener('scroll', function() {
      toggleBackToTopButton();

      if (window.scrollY > 300) {
        animateBackToTopButton();
      }
    });

    backToTopButton.addEventListener('click', scrollToTop);
  });
</script>

<script>
  function addDiscount() {
    var formData = new FormData(document.getElementById("addDiscountForm"));
    var xhr = new XMLHttpRequest();
    xhr.open("POST", "add_discount.php", true);
    xhr.onload = function() {
      if (xhr.status === 200) {
        window.location.href = "mycart.php";
      } else {
        alert('Error: ' + xhr.responseText);
      }
    };
    xhr.send(formData);
  }
</script>
<script>
  function validateForm() {
    var email = document.getElementById('exampleInputEmail1').value;

    // Email validation
    var emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
    if (!emailRegex.test(email)) {
      alert('Please enter a valid email address.');
      return false;
    }

    // BUTTON ANIMATION
    function clickButton() {
      const Toast = Swal.mixin({
        toast: true,
        position: "top-end",
        showConfirmButton: false,
        timer: 3000,
        timerProgressBar: true,
        didOpen: (toast) => {
          toast.onmouseenter = Swal.stopTimer;
          toast.onmouseleave = Swal.resumeTimer;
        }
      });
      Toast.fire({
        icon: "success",
        title: "Email eshte Derguar!"
      });
    }

    clickButton();

    return true;
  }
</script>

</html>