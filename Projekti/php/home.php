php
Copy code
<?php
session_start();
include 'classes.php'; 

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
    <title>Garden</title>
    <link rel="stylesheet" href="../CSS/index.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Truculenta:opsz,wght@12..72,100..900&display=swap" rel="stylesheet">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
     <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
  


    <script src="../Javascript/index.js"></script>
</head>

<body class="truculenta">

    <header class="sticky-header">
        <h1>Gardening Shop</h1>
        <nav>
            <a href="home.php">Home</a>
            <a href="mycart.php">My Cart</a>
            <a href="about.php">About</a>

        </nav>
    </header>
    <br><br><br><br><br>

    <div id="kontenti">
        <div style="background-color: #8efc8c;">

            <a href="mycart.php"> <img id="slideshow" src="../HTML/foto/Photo13.jpg"></a>
            <div class="row"><button style="align-items: center;" onclick="changeImg()">➤ </button></div>

        </div>
    </div>
    <br><br>
    <form action="mycart.php" method="post">
    <div style="padding: 20px;">
        <div class="row">

            <h class="display-4 " style="text-align: center;">Best Selling</h>
        </div>
        <br>
        <h3>Tools:</h>
            <br><br>
            <div id="item1" class="row" style="padding-left: 5%; ">


                <div id="Gloves" class="col-3">
                    <div class="card" style="width: 18rem;">
                        <img src="../HTML/foto/Photo1.jpg" class="card-img-top" style="height: 250px;" alt="Gloves" data-toggle="modal" data-target="#productModal1">
                        <div class="card-body">
                            <h5 class="card-title">Gloves</h5>
                            <button type="submit" name="add_to_cart" value="Gloves">Buy</button>
                        </div>
                    </div>
                </div>
                <div id="Pruning Shears" class="col-3 ">
                    <div class="card" style="width: 18rem;">
                        <img src="../HTML/foto/Photo2.jpg" class="card-img-top" style="height: 250px;" alt="Pruning Shears"data-toggle="modal" data-target="#productModal2">
                        <div class="card-body">
                            <h5 class="card-title">Pruning Shears</h5>

                            <button type="submit" name="add_to_cart" value="Pruning Shears">Buy</button>

                        </div>
                    </div>
                </div>
                <div id="Loppers" class="col-3">
                    <div class="card" style="width: 18rem;">
                        <img src="../HTML/foto/Photo3.jpg" class="card-img-top" style="height: 250px;" alt="Loppers" data-toggle="modal" data-target="#productModal3">
                        <div class="card-body">
                            <h5 class="card-title">Loppers</h5>

                            <button type="submit" name="add_to_cart" value="Loppers">Buy</button>

                        </div>
                    </div>
                </div>
                <div id="Garden Fork" class="col-3">
                    <div class="card" style="width: 18rem;">
                        <img src="../HTML/foto/Photo4.jpg" class="card-img-top" style="height: 250px;" alt="Garden Fork" data-toggle="modal" data-target="#productModal4">
                        <div class="card-body">
                            <h5 class="card-title">Garden Fork</h5>

                            <button type="submit" name="add_to_cart" value="Garden Fork">Buy</button>

                        </div>
                    </div>
                </div>
            </div>
            <br>
            <h3>Plants:</h>
                <br> <br>
                <div id="item2" class="row" style="padding-left: 5%;">
                    <div id="Snake Plant" class="col-3">
                        <div class="card" style="width: 18rem;">
                            <img src="../HTML/foto/Photo5.jpg" class="card-img-top" style="height: 250px;" alt="Snake Plant" data-toggle="modal" data-target="#productModal5">
                            <div class="card-body">
                                <h5 class="card-title">Snake Plant</h5>

                                <button type="submit" name="add_to_cart" value="Snake Plant">Buy</button>

                            </div>
                        </div>
                    </div>
                    <div id="Pothos" class="col-3 ">
                        <div class="card" style="width: 18rem;">
                            <img src="../HTML/foto/Photo6.jpg" class="card-img-top" style="height: 250px;" alt="Pothos " data-toggle="modal" data-target="#productModal6">
                            <div class="card-body">
                                <h5 class="card-title">Pothos</h5>

                                <button type="submit" name="add_to_cart" value="Pothos">Buy</button>

                            </div>
                        </div>
                    </div>
                    <div id="ZZ Plant" class="col-3">
                        <div class="card" style="width: 18rem;">
                            <img src="../HTML/foto/Photo7.png" class="card-img-top" style="height: 250px;" alt="ZZ Plant"data-toggle="modal" data-target="#productModal7">
                            <div class="card-body">
                                <h5 class="card-title">ZZ Plant</h5>

                                <button type="submit" name="add_to_cart" value="ZZ Plant">Buy</button>

                            </div>
                        </div>
                    </div>
                    <div id="Peace Lily" class="col-3">
                        <div class="card" style="width: 18rem;">
                            <img src="../HTML/foto/Photo8.jpg" class="card-img-top" style="height: 250px;" alt="Peace Lily" data-toggle="modal" data-target="#productModal8">
                            <div class="card-body">
                                <h5 class="card-title">Peace Lily</h5>

                                <button type="submit" name="add_to_cart" value="Peace Lily">Buy</button>

                            </div>
                        </div>
                    </div>
                </div>
                <h3>Decorations:</h>
                    <br><br>
                    <div id="item3" class="row" style="padding-left: 5%;">
                        <div id="Lighting" class="col-3">
                            <div class="card" style="width: 18rem;">
                                <img src="../HTML/foto/Photo9.jpg" class="card-img-top" style="height: 250px;" alt="Garmets" data-toggle="modal" data-target="#productModal9">
                                <div class="card-body">
                                    <h5 class="card-title">Lighting</h5>

                                    <button type="submit" name="add_to_cart" value="Lighting">Buy</button>

                                </div>
                            </div>
                        </div>
                        <div id="Garmets" class="col-3 ">
                            <div class="card" style="width: 18rem;">
                                <img src="../HTML/foto/Photo10.jpeg" class="card-img-top" style="height: 250px;" alt="Garmets" data-toggle="modal" data-target="#productModal10">
                                <div class="card-body">
                                    <h5 class="card-title">Garmets</h5>

                                    <button type="submit" name="add_to_cart" value="Garmets">Buy</button>

                                </div>
                            </div>
                        </div>
                        <div id="Shelf" class="col-3">
                            <div class="card" style="width: 18rem;">
                                <img src="../HTML/foto/Photo11.jpg" class="card-img-top" style="height: 250px;" alt="Shelf" data-toggle="modal" data-target="#productModal11">
                                <div class="card-body">
                                    <h5 class="card-title">Shelf</h5>

                                    <button type="submit" name="add_to_cart" value="Shelf">Buy</button>

                                </div>
                            </div>
                        </div>
                        <div id="Vertical Gardening" class="col-3">
                            <div class="card" style="width: 18rem;">
                                <img src="../HTML/foto/Photo12.jpg" class="card-img-top" style="height: 250px;" alt="Vertical Gardening" data-toggle="modal" data-target="#productModal12">
                                <div class="card-body">
                                    <h5 class="card-title">Vertical Gardening</h5>
                                    <button type="submit" name="add_to_cart" value="Vertical Gardening">Buy</button>

                                </div>
                            </div>
                        </div>
                    </div>


         <v class="container">
        <div class="row">
        <div class="container">
    <div class="row">
    <div class="container">
    <div class="row">

   <?php
    class Product {
    public $name;
    public $price;
    public $description;
    public $availability;

    public function __construct($name, $price, $description, $availability) {
        $this->name = $name;
        $this->price = $price;
        $this->description = $description;
        $this->availability = $availability;
    }

    public function isAvailable() {
        return $this->availability > 0;
    }
}
?>
        <?php
       $products = array(
        new Product("Gloves", 10, "A pair of gardening gloves designed to provide protection and comfort during gardening activities. These gloves are made from durable materials and are suitable for various gardening tasks.", 50),
        new Product("Pruning Shears", 15, "Pruning shears designed for precise cutting of stems and small branches in your garden. These shears feature sharp blades and ergonomic handles for ease of use.", 30),
        new Product("Loppers", 20, "Loppers are essential tools for cutting thick branches and stems with ease. These loppers are built with high-quality materials and provide excellent leverage for efficient cutting.", 25),
        new Product("Garden Fork", 18, "A garden fork designed to loosen soil and aerate the ground in your garden. This sturdy fork features sharp tines and a comfortable handle for effortless gardening.", 35),
        
        new Product("Snake Plant", 25, "The snake plant, also known as Sansevieria, is a popular indoor plant prized for its striking appearance and low maintenance requirements. It features tall, upright leaves with a variegated pattern.", 20),
        new Product("Pothos", 12, "Pothos, also known as Devil's Ivy, is a versatile houseplant loved for its lush foliage and air-purifying qualities. This easy-to-care-for plant thrives in various lighting conditions and adds a touch of green to any indoor space.", 40),
        new Product("ZZ Plant", 30, "The ZZ plant is a resilient houseplant known for its ability to thrive in low light conditions and tolerate neglect. With its glossy, dark green leaves, the ZZ plant adds a touch of elegance to any room.", 0),
        new Product("Peace Lily", 22, "The peace lily, or Spathiphyllum, is a popular indoor plant admired for its elegant white flowers and air-purifying properties. This low-maintenance plant thrives in low to medium light conditions and requires minimal care.", 10),
        
        new Product("Lighting", 50, "Enhance the ambiance of your garden or indoor space with our selection of lighting solutions. From string lights to solar-powered lanterns, we offer a variety of options to illuminate your surroundings and create a cozy atmosphere.", 8),
        new Product("Garments", 8, "Stay comfortable and protected during your gardening tasks with our range of garden garments. From sturdy gloves to lightweight aprons, we have the apparel you need to enjoy your time in the garden.", 60),
        new Product("Shelf", 40, "Add style and functionality to your indoor space with our decorative shelves. Perfect for displaying plants, decorations, or books, these shelves are both practical and aesthetically pleasing.", 0),
        new Product("Vertical Gardening", 50, "Maximize space in your garden with our vertical gardening solutions. From wall-mounted planters to vertical garden towers, we offer innovative products to help you create a lush and thriving vertical garden.", 8)
       );
      
       
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
                <?php if ($product->isAvailable()): ?>
                    <p>In stock</p>
                <?php else: ?>
                    <p>Out of stock. It will be back soon</p>
                <?php endif; ?>
            </div>
        </div>
    </div>
</div>
<?php }

           
        // Add hidden fields for previously added items
        foreach ($_SESSION['cart'] as $item => $quantity) {
            echo "<input type='hidden' name='cart[$item][name]' value='Item $item'>";
            echo "<input type='hidden' name='cart[$item][price]' value='$quantity'>";
        }
        ?>

    </form>

    <button id="backToTopButton" class="btn rounded-circle d-none" draggable="true" style="background-color:white; color: #8efc8c; border: 1px solid #8efc8c;">
        <span>&#9733; </span>
    </button>


    <br><br>
    <div class="row" style="align-items: center;">
        <img src="../HTML/foto/Photo18.png" alt="Promo">
    </div>
    <br><br>
    <div class="row" style="height: 400px;">

        <div class="col-6">
            <div style="padding-left: 100px;"><img src="../HTML/foto/Photo16.png" style="width: 550px;" alt="Garden"></div>

        </div>
        <div class="col-6">
            <br><br>
            <h class="display-5"> Ready, Set, Grow!</h>
            <br><br>
            <p>Many herbs are easy to grow from seed. Here we'll focus on the direct-sow method, which works well for growing
                herbs throughout the season.</p>
        </div>

    </div>

    <div class="row" style="height: 400px;">

        <div class="col-6">
            <br><br>
            <div style="padding-left: 100px;padding-right: 20px;">
                <h class="display-5"> Raised Bed Buying Guide</h>
                <br><br>
                <p>There are tons of good reasons to garden in raised beds: bigger harvests and more control, fewer weeds and
                    less
                    bending. We offer one of the largest assortments of raised beds available — dozens of sizes, colors, and
                    materials; self-watering options; accessories to increase growing space and functionality — and the friendly
                    and
                    knowledgeable support to guide you to the raised bed garden of your dreams!</p>
            </div>
        </div>
        <div class="col-6">

            <img src="../HTML/foto/Photo17.png" style="width: 500px;" alt="Garden">
        </div>

    </div>
    <br><br><br>
    <div id="kontakt" class="row" style="padding: 50px; background-color: #8efc8c ">
        <div class="middle col-6 ">
            <div class="info">
                <h2>Meet Us</h2>
                <p>Rruga B, Prishtina 10000</p>
                <p>Phone : +383111000</p>
                <p>Office Hours : 8:00am - 17:00pm</p>
            </div>

        </div>

        <div class="form col-6 " style="align-items: center;">
            <h2 style="margin-left: 15px;">Contact Us</h2>
            <form id="contactForm" onsubmit="return validateForm()">
                <div class="inputs">
                    <input style="height: 50px; width: 500px;" type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="name.surname@gmail.com">
                    <textarea style="height: 100px ; width: 500px;" class="form-control" id="exampleFormControlTextarea1" rows="3"></textarea>

                    <button type="submit" class="btn btn-light mx-auto ">Send</button>

                </div>
            </form>
            </center>




        </div>
    </div>

    <footer>
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
function addToCart() {
    var formData = new FormData(document.getElementById("addToCartForm"));
    var xhr = new XMLHttpRequest();
    xhr.open("POST", "add_to_cart.php", true);
    xhr.onload = function () {
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