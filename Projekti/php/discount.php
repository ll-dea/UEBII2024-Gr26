<?php
session_start();


// Initialize cart if not set
if (!isset($_SESSION['cart'])) {
  $_SESSION['cart'] = [];
}

// Add item to cart
if (isset($_POST['add_to_cart'])) {
  $item = $_POST['add_to_cart'];
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

  <header class="sticky-header" style="background-color: #ff7f49; padding-right:16px">
    <h1>Gardening Shop</h1>
    <nav>
      <a href="home.php">Home</a>
      <a href="mycart.php">My Cart</a>
      <a href="about.php">About</a>
      <a href="discount.php">Discount Offer</a>
      <a href="../HTML/index.html">Sign Out</a>

    </nav>
  </header>


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
                  new ExtendedProduct("Digging set ", 100, "A pair of gardening gloves designed to provide protection and comfort during gardening activities. These gloves are made from durable materials and are suitable for various gardening tasks.", 1),
                  new ExtendedProduct("Ornamental Plant", 30, "Pruning shears designed for precise cutting of stems and small branches in your garden. These shears feature sharp blades and ergonomic handles for ease of use.", 30),
                  new ExtendedProduct("Flower Light", 50, "Loppers are essential tools for cutting thick branches and stems with ease. These loppers are built with high-quality materials and provide excellent leverage for efficient cutting.", 25),
                  new ExtendedProduct("Flower Vase", 40, "A garden fork designed to loosen soil and aerate the ground in your garden. This sturdy fork features sharp tines and a comfortable handle for effortless gardening.", 35),

                  new ExtendedProduct(" Watering Can ", 20, "The snake plant, also known as Sansevieria, is a popular indoor plant prized for its striking appearance and low maintenance requirements. It features tall, upright leaves with a variegated pattern.", 20),
                  new ExtendedProduct("Wheelbarrow", 120, "Pothos, also known as Devil's Ivy, is a versatile houseplant loved for its lush foliage and air-purifying qualities. This easy-to-care-for plant thrives in various lighting conditions and adds a touch of green to any indoor space.", 40),
                  new ExtendedProduct("Garden Boots", 70, "The ZZ plant is a resilient houseplant known for its ability to thrive in low light conditions and tolerate neglect. With its glossy, dark green leaves, the ZZ plant adds a touch of elegance to any room.", 0),
                  new ExtendedProduct(" Pink Flamingo", 90, "The peace lily, or Spathiphyllum, is a popular indoor plant admired for its elegant white flowers and air-purifying properties. This low-maintenance plant thrives in low to medium light conditions and requires minimal care.", 10),

                  new ExtendedProduct("Rake", 60, "Enhance the ambiance of your garden or indoor space with our selection of lighting solutions. From string lights to solar-powered lanterns, we offer a variety of options to illuminate your surroundings and create a cozy atmosphere.", 8),
                  new ExtendedProduct("Cactus Plant", 20, "Stay comfortable and protected during your gardening tasks with our range of garden garments. From sturdy gloves to lightweight aprons, we have the apparel you need to enjoy your time in the garden.", 60),
                  new ExtendedProduct("Electric Chainsaw", 180, "Add style and functionality to your indoor space with our decorative shelves. Perfect for displaying plants, decorations, or books, these shelves are both practical and aesthetically pleasing.", 0),
                  new ExtendedProduct("Fidle Leaf", 40, "Maximize space in your garden with our vertical gardening solutions. From wall-mounted planters to vertical garden towers, we offer innovative products to help you create a lush and thriving vertical garden.", 8)
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