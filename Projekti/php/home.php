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
<?php
function setRating($value)
{
    setcookie('rating', $value, time() + (86400 * 30), "/"); // 86400 = 1 day
}

// Function to get the current rating
function getRating()
{
    if (isset($_COOKIE['rating'])) {
        return $_COOKIE['rating'];
    } else {
        // If no rating is set, set it to 0
        setRating(0);
        return 0;
    }
}

// Function to delete the rating
function deleteRating()
{
    if (isset($_COOKIE['rating'])) {
        unset($_COOKIE['rating']);
        setcookie('rating', null, -1, '/');
    }
}

// Check if the rating form is submitted
if (isset($_POST['rating'])) {
    $rating = $_POST['rating'];
    setRating($rating);
}

// Check if the delete button is clicked
if (isset($_POST['delete_rating'])) {
    deleteRating();
}

$currentRating = getRating();
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
        .rating {
            unicode-bidi: bidi-override;
            direction: rtl;
            text-align: center;
        }

        .rating>label {
            display: inline-block;
            position: relative;
            width: 1.1em;
            font-size: 2em;
            color: #ccc;
            cursor: pointer;
        }

        .rating>label:hover,
        .rating>label:hover~label,
        .rating>input:focus~label {
            color: #ffcc00;
        }

        .rating>input:checked~label,
        .rating:not(:checked)>label:hover~input:checked~label {
            color: #ffcc00;
        }

        /*.rating > label:hover,
        .rating > input:focus ~ label,
        .rating > label:hover ~ input:focus ~ label,
        .rating > input:checked ~ label:hover,
        .rating > input:checked ~ label:hover ~ label,
        .rating > label:hover ~ input:checked ~ label {
            color: #ffcc00;
        }
        .rating > input:checked ~ label:hover:after,
        .rating > input:checked ~ label:hover ~ label:after,
        .rating > label:hover ~ input:checked ~ label:after {
            content: "\2605";
            position: absolute; 
        }
        */
    </style>

</head>

<body class="truculenta" style="margin-right:0px">
    <header class="sticky-header" style="background-color: #ff7f49; padding-left:27px">
        <h1 style="margin-top:10px; ">Gardening Shop</h1>
        <nav>
            <a href="home.php">Home</a>
            <a href="mycart.php">My Cart</a>
            <a href="about.php">About</a>
            <a href="discount.php">Offers</a>
            <a href="../HTML/index.html">Sign Out</a>

        </nav>
    </header>

    <br><br><br>
    <div>
        <video autoplay muted loop playsinline style=" height: 620px;width:100%; object-fit: cover; position:relative;margin-top:20px">
            <source src="../HTML/foto/Video1.mp4" type="video/mp4">
            Your browser does not support the video tag.
        </video>
        <!-- <p style="position: absolute;top: 50%;left: 50%;transform: translate(-50%, -50%);color: #fff;font-size: 70px;text-align: center; text-shadow: 2px 2px 4px rgba(0, 0, 0, 0.5);
    letter-spacing: 2px;
    max-width: 80%;
    line-height: 1.5;filter:blur(100%)">Find Your Style</p> -->
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
                            <img src="../HTML/foto/Photo1.jpg" class="card-img-top" style="height: 250px;cursor:pointer" alt="Gloves" data-toggle="modal" data-target="#productModal0">
                            <div class="card-body">
                                <h5 class="card-title">Gloves</h5>
                                <button type="submit" name="add_to_cart" style=" background-color : #ff7f49; font-size:1rem;width:auto" value="Gloves">Add to Cart</button>
                            </div>
                        </div>
                    </div>
                    <div id="Pruning Shears" class="col-3 ">
                        <div class="card" style="width: 18rem;">
                            <img src="../HTML/foto/Photo2.jpg" class="card-img-top" style="height: 250px;cursor:pointer" alt="Pruning Shears" data-toggle="modal" data-target="#productModal1">
                            <div class="card-body">
                                <h5 class="card-title">Pruning Shears</h5>

                                <button type="submit" name="add_to_cart" style=" background-color : #ff7f49 ; font-size:1rem;width:auto" value="Pruning Shears">Add to Cart</button>

                            </div>
                        </div>
                    </div>
                    <div id="Loppers" class="col-3">
                        <div class="card" style="width: 18rem;">
                            <img src="../HTML/foto/Photo3.jpg" class="card-img-top" style="height: 250px;cursor:pointer" alt="Loppers" data-toggle="modal" data-target="#productModal2">
                            <div class="card-body">
                                <h5 class="card-title">Loppers</h5>

                                <button type="submit" name="add_to_cart" style=" background-color : #ff7f49 ; font-size:1rem;width:auto" value="Loppers">Add to Cart</button>

                            </div>
                        </div>
                    </div>
                    <div id="Garden Fork" class="col-3">
                        <div class="card" style="width: 18rem;">
                            <img src="../HTML/foto/Photo4.jpg" class="card-img-top" style="height: 250px;cursor:pointer" alt="Garden Fork" data-toggle="modal" data-target="#productModal3">
                            <div class="card-body">
                                <h5 class="card-title">Garden Fork</h5>

                                <button type="submit" name="add_to_cart" style=" background-color : #ff7f49; font-size:1rem;width:auto" value="Garden Fork">Add to Cart</button>

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
                                <img src="../HTML/foto/Photo5.jpg" class="card-img-top" style="height: 250px;cursor:pointer" alt="Snake Plant" data-toggle="modal" data-target="#productModal4">
                                <div class="card-body">
                                    <h5 class="card-title">Snake Plant</h5>

                                    <button type="submit" name="add_to_cart" style=" background-color : #ff7f49; font-size:1rem;width:auto" value="Snake Plant">Add to Cart</button>

                                </div>
                            </div>
                        </div>
                        <div id="Pothos" class="col-3 ">
                            <div class="card" style="width: 18rem;">
                                <img src="../HTML/foto/Photo6.jpg" class="card-img-top" style="height: 250px;cursor:pointer" alt="Pothos " data-toggle="modal" data-target="#productModal5">
                                <div class="card-body">
                                    <h5 class="card-title">Pothos</h5>

                                    <button type="submit" name="add_to_cart" style=" background-color : #ff7f49; font-size:1rem;width:auto" value="Pothos">Add to Cart</button>

                                </div>
                            </div>
                        </div>
                        <div id="ZZ Plant" class="col-3">
                            <div class="card" style="width: 18rem;">
                                <img src="../HTML/foto/Photo7.png" class="card-img-top" style="height: 250px;cursor:pointer" alt="ZZ Plant" data-toggle="modal" data-target="#productModal6">
                                <div class="card-body">
                                    <h5 class="card-title">ZZ Plant</h5>

                                    <button type="submit" name="add_to_cart" style=" background-color : #ff7f49; font-size:1rem;width:auto" value="ZZ Plant">Add to Cart</button>

                                </div>
                            </div>
                        </div>
                        <div id="Peace Lily" class="col-3">
                            <div class="card" style="width: 18rem;">
                                <img src="../HTML/foto/Photo8.jpg" class="card-img-top" style="height: 250px;cursor:pointer" alt="Peace Lily" data-toggle="modal" data-target="#productModal7">
                                <div class="card-body">
                                    <h5 class="card-title">Peace Lily</h5>

                                    <button type="submit" name="add_to_cart" style=" background-color : #ff7f49; font-size:1rem;width:auto" value="Peace Lily">Add to Cart</button>

                                </div>
                            </div>
                        </div>
                    </div>
                    <h3>Decorations:</h>
                        <br><br>
                        <div id="item3" class="row" style="padding-left: 5%;">
                            <div id="Lighting" class="col-3">
                                <div class="card" style="width: 18rem;">
                                    <img src="../HTML/foto/Photo9.jpg" class="card-img-top" style="height: 250px;cursor:pointer" alt="Garmets" data-toggle="modal" data-target="#productModal8">
                                    <div class="card-body">
                                        <h5 class="card-title">Lighting</h5>

                                        <button type="submit" name="add_to_cart" style=" background-color : #ff7f49; font-size:1rem;width:auto" value="Lighting">Add to Cart</button>

                                    </div>
                                </div>
                            </div>
                            <div id="Garmets" class="col-3 ">
                                <div class="card" style="width: 18rem;">
                                    <img src="../HTML/foto/Photo10.jpeg" class="card-img-top" style="height: 250px;cursor:pointer" alt="Garmets" data-toggle="modal" data-target="#productModal9">
                                    <div class="card-body">
                                        <h5 class="card-title">Garmets</h5>

                                        <button type="submit" name="add_to_cart" style=" background-color : #ff7f49; font-size:1rem;width:auto" value="Garmets">Add to Cart</button>

                                    </div>
                                </div>
                            </div>
                            <div id="Shelf" class="col-3">
                                <div class="card" style="width: 18rem;">
                                    <img src="../HTML/foto/Photo11.jpg" class="card-img-top" style="height: 250px;cursor:pointer" alt="Shelf" data-toggle="modal" data-target="#productModal10">
                                    <div class="card-body">
                                        <h5 class="card-title">Shelf</h5>

                                        <button type="submit" name="add_to_cart" style=" background-color : #ff7f49; font-size:1rem;width:auto" value="Shelf">Add to Cart</button>

                                    </div>
                                </div>
                            </div>
                            <div id="Vertical Gardening" class="col-3">
                                <div class="card" style="width: 18rem;">
                                    <img src="../HTML/foto/Photo12.jpg" class="card-img-top" style="height: 250px;cursor:pointer" alt="Vertical Gardening" data-toggle="modal" data-target="#productModal11">
                                    <div class="card-body">
                                        <h5 class="card-title">Vertical Gardening</h5>
                                        <button type="submit" name="add_to_cart" style=" background-color : #ff7f49; font-size:1rem; width:auto" value="Vertical Gardening">Add to Cart</button>

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
                                                                    <p>Hope you found this helpful!</p>
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


    <button id="backToTopButton" class="btn rounded-circle d-none" draggable="true" style="background-color:white; color: #ff7900; border: 1px solid #ff7900; width:45px">
        <span>&#9733; </span>
    </button>
    <br><br><br><br><br>
    <br><br>

    <div id="kontenti">
        <div style="background-color: #ff7f49;">

            <img src="../HTML/foto/Photo13.jpg">


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

    <div style="border:1px solid black;padding:30px 30px;margin-bottom:0px">
        <center>
            <h2>Your Rating</h2>

            <form method="post">
                <fieldset class="rating">
                    <input type="radio" id="star5" name="rating" value="5" <?php if ($currentRating == 5) echo "checked"; ?> /><label for="star5" title="5 stars">&#9733;</label>
                    <input type="radio" id="star4" name="rating" value="4" <?php if ($currentRating == 4) echo "checked"; ?> /><label for="star4" title="4 stars">&#9733;</label>
                    <input type="radio" id="star3" name="rating" value="3" <?php if ($currentRating == 3) echo "checked"; ?> /><label for="star3" title="3 stars">&#9733;</label>
                    <input type="radio" id="star2" name="rating" value="2" <?php if ($currentRating == 2) echo "checked"; ?> /><label for="star2" title="2 stars">&#9733;</label>
                    <input type="radio" id="star1" name="rating" value="1" <?php if ($currentRating == 1) echo "checked"; ?> /><label for="star1" title="1 star">&#9733;</label>
                </fieldset>
                <br />

                <div class="row" style="width: 200px;">
                    <input type="submit" value="Submit Rating" style="background-color: #ff7f49;">
                </div>
            </form>

            <form method="post">
                <div class="row" style="width: 200px">
                    <input type="submit" name="delete_rating" value="Delete Rating" style="background-color: #ff8f20">
                </div>
        </center>
        </form>
    </div>
    <footer style="font-size: 1rem;background-color:#ff7f49;margin-left:-8px"> &copy; 2024 Login Page. All rights reserved.
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
<script>
    let i = 0;
    let imgArray = ['../HTML/foto/Photo14.jpg', '../HTML/foto/Photo15.jpg', '../HTML/foto/Photo13.jpg'];

    function changeImg() {
        document.getElementById('slideshow').src = imgArray[i];

        if (i < imgArray.length - 1) {
            i++;
        } else {
            i = 0;
        }
        //setTimeout("changeImg()", 2600);
    }
    document.addEventListener(onload, changeImg());
</script>

</html>