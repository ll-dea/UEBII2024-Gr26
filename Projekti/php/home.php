<?php
session_start();


// Initialize cart if not set
if (!isset($_SESSION['cart'])) {
    $_SESSION['cart'] = [];
}

// Add item to cart
try{
    if (isset($_POST['add_to_cart'])) {
       $item = $_POST['add_to_cart'];
        if (array_key_exists($item, $_SESSION['cart'])) {
          $_SESSION['cart'][$item]++;
        } else {
          $_SESSION['cart'][$item] = 1;
        }
      }
  }catch(Exception $e){
      echo 'Error'.$e->getMessage();
  }



?>




<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Garden Shop</title>
    <link rel="stylesheet" href="../CSS/index.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Truculenta:opsz,wght@12..72,100..900&display=swap" rel="stylesheet">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
   
    

<style>
    .modal {
            display: none;
            position: fixed;
            z-index: 1;
            left: 0;
            top: 0;
            width: 100%;
            height: 100%;
            overflow: auto;
            padding-top: 60px;
        }

        /* Stilizimi për përmbajtjen e modalit */
        .modal-content {
            background-color: #fefefe;
            margin: 5% auto;
            padding: 20px;
            border: 1px solid #888;
            width: 80%;
            max-width: 300px;
            border-radius: 10px;
        }

        /* Stilizimi për butonin e mbylljes në modal */
        .close {
            color: #aaa;
            float: right;
            font-size: 28px;
            font-weight: bold;
        }

        .close:hover,
        .close:focus {
            color: black;
            text-decoration: none;
            cursor: pointer;
        }
        </style>
<body class="truculenta" style="padding: 0px;margin-right:0px">

    <header class="sticky-header">
        <h1>Gardening Shop</h1>
        <nav>
            <a href="home.php">Home</a>
            <a href="mycart.php">My Cart</a>
            <a href="about.php">About</a>
            <a href="signout.php">Sign Out</a>

        </nav>
    </header>
    <br><br><br>
    <div>
        <video autoplay muted loop playsinline style="width: 100vw; height: 90vh; object-fit: cover; position:relative">
            <source src="../HTML/foto/Video1.mp4" type="video/mp4">
            Your browser does not support the video tag.
        </video>
        <p style="position: absolute;top: 50%;left: 50%;transform: translate(-50%, -50%);color: #fff;font-size: 70px;text-align: center; text-shadow: 2px 2px 4px rgba(0, 0, 0, 0.5);
    letter-spacing: 2px;
    max-width: 80%;
    line-height: 1.5;filter:blur(100%)">Find Your Style</p>
    </div>


    <br><br>
    <form action="mycart.php" method="post">
        <div style="padding: 20px;">
            <div class="row">

                <h class="display-4 " style="text-align: center;">Best Selling</h>
            </div>
            <br>
            <h3>Tools:</h3>
            <br><br>
            <div id="item1" class="row" style="padding-left: 5%; ">


                <div id="Gloves" class="col-3">
                    <div class="card" style="width: 18rem;">
                        <img src="../HTML/foto/Photo1.jpg" class="card-img-top" style="height: 250px;cursor:pointer" alt="Gloves" data-toggle="modal" data-target="#productModal0">
                        <div class="card-body">
                            <h5 class="card-title">Gloves</h5>
                            <button type="submit" name="add_to_cart" value="Gloves">Buy</button>
                        </div>
                    </div>
                </div>
                <div id="Pruning Shears" class="col-3 ">
                    <div class="card" style="width: 18rem;">
                        <img src="../HTML/foto/Photo2.jpg" class="card-img-top" style="height: 250px;cursor:pointer" alt="Pruning Shears" data-toggle="modal" data-target="#productModal1">
                        <div class="card-body">
                            <h5 class="card-title">Pruning Shears</h5>

                            <button type="submit" name="add_to_cart" value="Pruning Shears">Buy</button>

                        </div>
                    </div>
                </div>
                <div id="Loppers" class="col-3">
                    <div class="card" style="width: 18rem;">
                        <img src="../HTML/foto/Photo3.jpg" class="card-img-top" style="height: 250px;cursor:pointer" alt="Loppers" data-toggle="modal" data-target="#productModal2">
                        <div class="card-body">
                            <h5 class="card-title">Loppers</h5>

                            <button type="submit" name="add_to_cart" value="Loppers">Buy</button>

                        </div>
                    </div>
                </div>
                <div id="Garden Fork" class="col-3">
                    <div class="card" style="width: 18rem;">
                        <img src="../HTML/foto/Photo4.jpg" class="card-img-top" style="height: 250px;cursor:pointer" alt="Garden Fork" data-toggle="modal" data-target="#productModal3">
                        <div class="card-body">
                            <h5 class="card-title">Garden Fork</h5>

                            <button type="submit" name="add_to_cart" value="Garden Fork">Buy</button>

                        </div>
                    </div>
                </div>
            </div>


        </div> <br>
        <h3>Plants:</h3>
        <br><br>
        <div id="item2" class="row" style="padding-left: 5%;">
            <div id="Snake Plant" class="col-3">
                <div class="card" style="width: 18rem;">
                    <img src="../HTML/foto/Photo5.jpg" class="card-img-top" style="height: 250px;cursor:pointer" alt="Snake Plant" data-toggle="modal" data-target="#productModal4">
                    <div class="card-body">
                        <h5 class="card-title">Snake Plant</h5>

                        <button type="submit" name="add_to_cart" value="Snake Plant">Buy</button>

                    </div>
                </div>
            </div>
            <div id="Pothos" class="col-3 ">
                <div class="card" style="width: 18rem;">
                    <img src="../HTML/foto/Photo6.jpg" class="card-img-top" style="height: 250px;cursor:pointer" alt="Pothos " data-toggle="modal" data-target="#productModal5">
                    <div class="card-body">
                        <h5 class="card-title">Pothos</h5>

                        <button type="submit" name="add_to_cart" value="Pothos">Buy</button>

                    </div>
                </div>
            </div>
            <div id="ZZ Plant" class="col-3">
                <div class="card" style="width: 18rem;">
                    <img src="../HTML/foto/Photo7.png" class="card-img-top" style="height: 250px;cursor:pointer" alt="ZZ Plant" data-toggle="modal" data-target="#productModal6">
                    <div class="card-body">
                        <h5 class="card-title">ZZ Plant</h5>

                        <button type="submit" name="add_to_cart" value="ZZ Plant">Buy</button>

                    </div>
                </div>
            </div>
            <div id="Peace Lily" class="col-3">
                <div class="card" style="width: 18rem;">
                    <img src="../HTML/foto/Photo8.jpg" class="card-img-top" style="height: 250px;cursor:pointer" alt="Peace Lily" data-toggle="modal" data-target="#productModal7">
                    <div class="card-body">
                        <h5 class="card-title">Peace Lily</h5>

                        <button type="submit" name="add_to_cart" value="Peace Lily">Buy</button>

                    </div>
                </div>
            </div>
        </div>
        <h3>Decorations:</h3>
        <br><br>
        <div id="item3" class="row" style="padding-left: 5%;">
            <div id="Lighting" class="col-3">
                <div class="card" style="width: 18rem;">
                    <img src="../HTML/foto/Photo9.jpg" class="card-img-top" style="height: 250px;cursor:pointer" alt="Garmets" data-toggle="modal" data-target="#productModal8">
                    <div class="card-body">
                        <h5 class="card-title">Lighting</h5>

                        <button type="submit" name="add_to_cart" value="Lighting">Buy</button>

                    </div>
                </div>
            </div>
            <div id="Garmets" class="col-3 ">
                <div class="card" style="width: 18rem;">
                    <img src="../HTML/foto/Photo10.jpeg" class="card-img-top" style="height: 250px;cursor:pointer" alt="Garmets" data-toggle="modal" data-target="#productModal9">
                    <div class="card-body">
                        <h5 class="card-title">Garmets</h5>

                        <button type="submit" name="add_to_cart" value="Garmets">Buy</button>

                    </div>
                </div>
            </div>
            <div id="Shelf" class="col-3">
                <div class="card" style="width: 18rem;">
                    <img src="../HTML/foto/Photo11.jpg" class="card-img-top" style="height: 250px;cursor:pointer" alt="Shelf" data-toggle="modal" data-target="#productModal10">
                    <div class="card-body">
                        <h5 class="card-title">Shelf</h5>

                        <button type="submit" name="add_to_cart" value="Shelf">Buy</button>

                    </div>
                </div>
            </div>
            <div id="Vertical Gardening" class="col-3">
                <div class="card" style="width: 18rem;">
                    <img src="../HTML/foto/Photo12.jpg" class="card-img-top" style="height: 250px;cursor:pointer" alt="Vertical Gardening" data-toggle="modal" data-target="#productModal11">
                    <div class="card-body">
                        <h5 class="card-title">Vertical Gardening</h5>
                        <button type="submit" name="add_to_cart" value="Vertical Gardening">Buy</button>

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
                                    new ExtendedProduct("Gloves", 10, "A pair of gardening gloves designed to provide protection and comfort during gardening activities. These gloves are made from durable materials and are suitable for various gardening tasks.", 1),
                                    new ExtendedProduct("Pruning Shears", 15, "Pruning shears designed for precise cutting of stems and small branches in your garden. These shears feature sharp blades and ergonomic handles for ease of use.", 30),
                                    new ExtendedProduct("Loppers", 20, "Loppers are essential tools for cutting thick branches and stems with ease. These loppers are built with high-quality materials and provide excellent leverage for efficient cutting.", 25),
                                    new ExtendedProduct("Garden Fork", 18, "A garden fork designed to loosen soil and aerate the ground in your garden. This sturdy fork features sharp tines and a comfortable handle for effortless gardening.", 35),

                                    new ExtendedProduct("Snake Plant", 25, "The snake plant, also known as Sansevieria, is a popular indoor plant prized for its striking appearance and low maintenance requirements. It features tall, upright leaves with a variegated pattern.", 20),
                                    new ExtendedProduct("Pothos", 12, "Pothos, also known as Devil's Ivy, is a versatile houseplant loved for its lush foliage and air-purifying qualities. This easy-to-care-for plant thrives in various lighting conditions and adds a touch of green to any indoor space.", 40),
                                    new ExtendedProduct("ZZ Plant", 30, "The ZZ plant is a resilient houseplant known for its ability to thrive in low light conditions and tolerate neglect. With its glossy, dark green leaves, the ZZ plant adds a touch of elegance to any room.", 0),
                                    new ExtendedProduct("Peace Lily", 22, "The peace lily, or Spathiphyllum, is a popular indoor plant admired for its elegant white flowers and air-purifying properties. This low-maintenance plant thrives in low to medium light conditions and requires minimal care.", 10),

                                    new ExtendedProduct("Lighting", 50, "Enhance the ambiance of your garden or indoor space with our selection of lighting solutions. From string lights to solar-powered lanterns, we offer a variety of options to illuminate your surroundings and create a cozy atmosphere.", 8),
                                    new ExtendedProduct("Garments", 8, "Stay comfortable and protected during your gardening tasks with our range of garden garments. From sturdy gloves to lightweight aprons, we have the apparel you need to enjoy your time in the garden.", 60),
                                    new ExtendedProduct("Shelf", 40, "Add style and functionality to your indoor space with our decorative shelves. Perfect for displaying plants, decorations, or books, these shelves are both practical and aesthetically pleasing.", 0),
                                    new ExtendedProduct("Vertical Gardening", 50, "Maximize space in your garden with our vertical gardening solutions. From wall-mounted planters to vertical garden towers, we offer innovative products to help you create a lush and thriving vertical garden.", 8)
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
                                                    <p>Hope you found this helpful</p>
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
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </v>


    </form>


    <button id="backToTopButton" class="btn rounded-circle d-none" draggable="true" style="background-color:white; color: #8efc8c; border: 1px solid #8efc8c; width:45px">
        <span>&#9733; </span>
    </button>
    <br><br><br><br><br>
    <br><br>

    <div id="kontenti">
        <div style="background-color: #8efc8c;">

            <img id="slideshow" src="../HTML/foto/Photo13.jpg">
            <div class="row"><button style="align-items: center;" onclick="changeImg()">➤ </button></div>

        </div>
    </div>
    <br><br><br><br><br> <br><br><br><br><br><br><br><br><br>
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
                <p style="font-size: 1.75rem;">There are tons of good reasons to garden in raised beds: bigger harvests and more control, fewer weeds and
                    less
                    bending.</p>
            </div>
        </div>
        <div class="col-6">

            <img src="../HTML/foto/Photo17.png" style="width: 500px;" alt="Garden">
        </div>

    </div>
    <br><br>
    




<div class="container mt-5">
    <h2>Write a review</h2>
    <form id="reviewForm" action="submit_review.php" method="post">
        <div class="mb-3">
            <label for="user_name" class="form-label">Name:</label>
            <input type="text" id="user_name" name="user_name" class="form-control" required>
        </div>
        <div class="mb-3">
            <label for="email" class="form-label">Email:</label>
            <input type="email" id="email" name="email" class="form-control" required>
        </div>
        <div class="mb-3">
            <label for="rating" class="form-label">Rating:</label>
            <div class="rating">
                <input type="radio" id="star5" name="rating" value="5" required>
                <label for="star5" title="5 stars">1</label>
                <input type="radio" id="star4" name="rating" value="4">
                <label for="star4" title="4 stars">2</label>
                <input type="radio" id="star3" name="rating" value="3">
                <label for="star3" title="3 stars">3</label>
                <input type="radio" id="star2" name="rating" value="2">
                <label for="star2" title="2 stars">4</label>
                <input type="radio" id="star1" name="rating" value="1">
                <label for="star1" title="1 star">5</label>
            </div>
        </div>
        <div class="mb-3">
            <label for="comment" class="form-label">Comment:</label>
            <textarea id="comment" name="comment" class="form-control" required></textarea>
        </div>
        <button type="submit" name="submit_reviews" id="submitBtn" value="Submit" class="btn btn-primary">Submit</button>
    </form>
</div>

<div class="modal fade" id="successModal" tabindex="-1" role="dialog" aria-labelledby="successModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="successModalLabel">Success</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                Review submitted successfully.
            </div>
        </div>
    </div>
</div>



<script>
    $(document).ready(function() {
        // When the submit button is clicked
        $("#submitBtn").click(function(event) {
            // Prevent default form submission
            event.preventDefault();

            // Send the form data using AJAX
            $.ajax({
                type: $("#reviewForm").attr("method"),
                url: $("#reviewForm").attr("action"),
                data: $("#reviewForm").serialize(),
                success: function(response) {
                    // Show the success modal
                    $("#successModal").modal('show');
                },
                error: function(xhr, status, error) {
                    // Handle any errors here
                    console.error("Form submission failed:", error);
                }
            });
        });

        // When the close button is clicked in the modal
        $(".close").click(function() {
            // Hide the modal
            $("#successModal").modal('hide');
        });
    });
</script>


</body>



<script>
    function addToCart() {
        var formData = new FormData(document.getElementById("addToCartForm"));
        var xhr = new XMLHttpRequest();
        xhr.open("POST", "add_to_cart.php", true);
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

<head>
    <title>Submit a Review</title>
</head>


</html>