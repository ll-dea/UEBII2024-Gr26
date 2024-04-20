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
  <link rel="stylesheet" href="../CSS/About.css">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
  <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Montserrat&display=swap">
  <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Truculenta:opsz,wght@12..72,100..900&display=swap" rel="stylesheet">



</head>

<body>

  <header class="sticky-header">
    <h1 style="margin-top:10px;">Gardening Shop</h1>
    <nav>
      <a href="home.php">Home</a>
      <a href="mycart.php">My Cart</a>
      <a href="about.php">About</a>
      <a href="discount.php">Discount Offer</a>


    </nav>
    <nav class="navbar navbar-expand-lg navbar-light bg-body-tertiary0" style=" background-color : #ff7f49">
      <div class="container-fluid">
        <button data-mdb-collapse-init class="navbar-toggler" type="button" data-mdb-target="#navbarNav"
          aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
          <i class="fas fa-bars"></i>
        </button>
        <div class="collapse navbar-collapse justify-content-center" id="navbarNav">
          <ul class="navbar-nav">
            <li class="nav-item">
              <a class="nav-link active" aria-current="page" href="#">About Us</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="#history-section">History</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="#stafiID">Staff</a>
            </li>

            <li class="nav-item">
              <a class="nav-link" href="#kontakt">Contact</a>
            </li>

          </ul>
        </div>
      </div>
    </nav>
  </header>



  <div id="about-us" class="about-us">
    <div class="container">
      <div class="left-side">
        <div class="info">

          <h2>About Us</h2>
          <p>Welcome to Gardening Shop, your premier destination for all things gardening! Nestled in the heart
            of Prishtina, our shop is a sanctuary for plant enthusiasts, beginners, and seasoned gardeners alike.
            From vibrant flowers to lush greenery, we offer a diverse selection of top-quality plants, tools, and
            accessories to transform your outdoor space into a flourishing oasis. </p>
        </div>
      </div>



      <div class="right-side">
        <img src="../HTML/foto/Photo20.jpeg" alt="">
      </div>
    </div>
  </div>
  <!-- ABOUT US END -->
<br><br><br><br>

  <button id="backToTopButton" class="btn rounded-circle d-none" draggable="true"
    style="background-color:white; color: #ff7f49; border: 1px solid #8efc8c;">
    <span>&#9733; </span>
  </button>



  <!-- SUBSCRIBTION NEWSLETTER  -->
  <section class="home-newsletter" id="newsletter-section" style="display: none;">
    <div class="container">
      <div class="row">
        <div class="col-sm-12">
          <div class="single">
            <h2 style="color: #ff7f49;">Subscribe to our Newsletter</h2>
            <p>Subcribe so you can be notified for future events or sales!</p>
            <div class="input-group">
              <input type="email" class="form-control" placeholder="Enter your email">
              <span class="input-group-btn">
                <button class="btn btn-theme" type="submit" onclick="submitForm()">Abonohu</button>
              </span>
            </div>
            <button class="close-btn" onclick="closePopup()" style="margin-bottom: 25px;">X </button>
          </div>
        </div>
      </div>
    </div>
  </section>


  <!-- HISTORY SECTION -->
  <div id="history-section" class="history-section" style="width: 100%; height: 85vh;">
    <div class="left-side">
      <img src="../HTML/foto/Photo21.jpg" alt="">
    </div>


    <div class="right-side" style="color: #000;">
      <div class="info-h">
        <h2>History</h2>
        <p>Established in 2002 by gardening enthusiasts Mia and Alex, Garden Shop started as a small
          family-run business in a converted greenhouse. Their shared passion for plants and landscaping drove them to
          expand, offering a diverse range of high-quality plants and gardening supplies. Over the years, Garden Shop
          has become a beloved community hub, known for its expertise, personalized service, and commitment to fostering
          a thriving gardening culture. Today, it stands as a testament to Mia and Alex's dedication to their craft and
          their vision of creating a welcoming space for fellow plant lovers to connect and grow.</p>
      </div>

    </div>
  </div>






  <!-- HISTORY END -->






  <!-- STAFI SECTION -->
  <h2 id="stafiID" style="color: #FFF; margin-bottom: -85px;">/</h2>
  <div id="stafi-section" class="stafi-section">
    <h2 style="display: flex; justify-content: center; border-bottom: solid 0.8px #000; border-radius: 25%;">Stafi Jone
    </h2>
    <div class="container">

      <div class="avatar">
        <div class="avatar-info">
          <img src="../HTML/foto/Photo22.jpg" alt="#">
          <h4>Andy Hover</h4>
          <div class="bottom-info" style="display: flex; gap: 15px; justify-content: center;">
            <p>Owner</p>
            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-linkedin"
              viewBox="0 0 16 16">
              <path
                d="M0 1.146C0 .513.526 0 1.175 0h13.65C15.474 0 16 .513 16 1.146v13.708c0 .633-.526 1.146-1.175 1.146H1.175C.526 16 0 15.487 0 14.854zm4.943 12.248V6.169H2.542v7.225zm-1.2-8.212c.837 0 1.358-.554 1.358-1.248-.015-.709-.52-1.248-1.342-1.248S2.4 3.226 2.4 3.934c0 .694.521 1.248 1.327 1.248zm4.908 8.212V9.359c0-.216.016-.432.08-.586.173-.431.568-.878 1.232-.878.869 0 1.216.662 1.216 1.634v3.865h2.401V9.25c0-2.22-1.184-3.252-2.764-3.252-1.274 0-1.845.7-2.165 1.193v.025h-.016l.016-.025V6.169h-2.4c.03.678 0 7.225 0 7.225z" />
            </svg>
          </div>

        </div>


        <div class="avatar-info">
          <img src="../HTML/foto/Photo23.jpg" alt="#">
          <h4>Jamie Smith</h4>
          <div class="bottom-info" style="display: flex; gap: 15px; justify-content: center;">
            <p>Social Media Manager</p>
            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-linkedin"
              viewBox="0 0 16 16">
              <path
                d="M0 1.146C0 .513.526 0 1.175 0h13.65C15.474 0 16 .513 16 1.146v13.708c0 .633-.526 1.146-1.175 1.146H1.175C.526 16 0 15.487 0 14.854zm4.943 12.248V6.169H2.542v7.225zm-1.2-8.212c.837 0 1.358-.554 1.358-1.248-.015-.709-.52-1.248-1.342-1.248S2.4 3.226 2.4 3.934c0 .694.521 1.248 1.327 1.248zm4.908 8.212V9.359c0-.216.016-.432.08-.586.173-.431.568-.878 1.232-.878.869 0 1.216.662 1.216 1.634v3.865h2.401V9.25c0-2.22-1.184-3.252-2.764-3.252-1.274 0-1.845.7-2.165 1.193v.025h-.016l.016-.025V6.169h-2.4c.03.678 0 7.225 0 7.225z" />
            </svg>
          </div>
        </div>


        <div class="avatar-info">
          <img src="../HTML/foto/Photo24.jpg" alt="#">
          <h4>Trina Rodriguez</h4>
          <div class="bottom-info" style="display: flex; gap: 15px; justify-content: center;">
            <p>Finance Manager</p>
            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-linkedin"
              viewBox="0 0 16 16">
              <path
                d="M0 1.146C0 .513.526 0 1.175 0h13.65C15.474 0 16 .513 16 1.146v13.708c0 .633-.526 1.146-1.175 1.146H1.175C.526 16 0 15.487 0 14.854zm4.943 12.248V6.169H2.542v7.225zm-1.2-8.212c.837 0 1.358-.554 1.358-1.248-.015-.709-.52-1.248-1.342-1.248S2.4 3.226 2.4 3.934c0 .694.521 1.248 1.327 1.248zm4.908 8.212V9.359c0-.216.016-.432.08-.586.173-.431.568-.878 1.232-.878.869 0 1.216.662 1.216 1.634v3.865h2.401V9.25c0-2.22-1.184-3.252-2.764-3.252-1.274 0-1.845.7-2.165 1.193v.025h-.016l.016-.025V6.169h-2.4c.03.678 0 7.225 0 7.225z" />
            </svg>
          </div>
        </div>


        <div class="avatar-info">
          <img src="../HTML/foto/Photo25.jpg" alt="#">
          <h4>Lia Brown</h4>
          <div class="bottom-info" style="display: flex; gap: 15px; justify-content: center;">
            <p>Marketing Team</p>
            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-linkedin"
              viewBox="0 0 16 16">
              <path
                d="M0 1.146C0 .513.526 0 1.175 0h13.65C15.474 0 16 .513 16 1.146v13.708c0 .633-.526 1.146-1.175 1.146H1.175C.526 16 0 15.487 0 14.854zm4.943 12.248V6.169H2.542v7.225zm-1.2-8.212c.837 0 1.358-.554 1.358-1.248-.015-.709-.52-1.248-1.342-1.248S2.4 3.226 2.4 3.934c0 .694.521 1.248 1.327 1.248zm4.908 8.212V9.359c0-.216.016-.432.08-.586.173-.431.568-.878 1.232-.878.869 0 1.216.662 1.216 1.634v3.865h2.401V9.25c0-2.22-1.184-3.252-2.764-3.252-1.274 0-1.845.7-2.165 1.193v.025h-.016l.016-.025V6.169h-2.4c.03.678 0 7.225 0 7.225z" />
            </svg>
          </div>
        </div>

        <div class="avatar-info">
          <img src="../HTML/foto/Photo27.jpg" alt="#">
          <h4>Cho Megan</h4>
          <div class="bottom-info" style="display: flex; gap: 15px; justify-content: center;">
            <p>Marketing Manager</p>
            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-linkedin"
              viewBox="0 0 16 16">
              <path
                d="M0 1.146C0 .513.526 0 1.175 0h13.65C15.474 0 16 .513 16 1.146v13.708c0 .633-.526 1.146-1.175 1.146H1.175C.526 16 0 15.487 0 14.854zm4.943 12.248V6.169H2.542v7.225zm-1.2-8.212c.837 0 1.358-.554 1.358-1.248-.015-.709-.52-1.248-1.342-1.248S2.4 3.226 2.4 3.934c0 .694.521 1.248 1.327 1.248zm4.908 8.212V9.359c0-.216.016-.432.08-.586.173-.431.568-.878 1.232-.878.869 0 1.216.662 1.216 1.634v3.865h2.401V9.25c0-2.22-1.184-3.252-2.764-3.252-1.274 0-1.845.7-2.165 1.193v.025h-.016l.016-.025V6.169h-2.4c.03.678 0 7.225 0 7.225z" />
            </svg>
          </div>
        </div>


        <div class="avatar-info">
          <img src="../HTML/foto/Photo26.jpg" alt="#">
          <h4>Benjamin Scott</h4>
          <div class="bottom-info" style="display: flex; gap: 20px; justify-content: center;">
            <p>Technician</p>
            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-linkedin"
              viewBox="0 0 16 16">
              <path
                d="M0 1.146C0 .513.526 0 1.175 0h13.65C15.474 0 16 .513 16 1.146v13.708c0 .633-.526 1.146-1.175 1.146H1.175C.526 16 0 15.487 0 14.854zm4.943 12.248V6.169H2.542v7.225zm-1.2-8.212c.837 0 1.358-.554 1.358-1.248-.015-.709-.52-1.248-1.342-1.248S2.4 3.226 2.4 3.934c0 .694.521 1.248 1.327 1.248zm4.908 8.212V9.359c0-.216.016-.432.08-.586.173-.431.568-.878 1.232-.878.869 0 1.216.662 1.216 1.634v3.865h2.401V9.25c0-2.22-1.184-3.252-2.764-3.252-1.274 0-1.845.7-2.165 1.193v.025h-.016l.016-.025V6.169h-2.4c.03.678 0 7.225 0 7.225z" />
            </svg>
          </div>
        </div>
      </div>
    </div>
  </div>
  <br><br><br>
  <!-- STAFI SECTION END  -->



  <!-- LOKACIONI SECTION -->






  <div id="kontakt" class="row" style="padding: 50px; background-color: #ff7900 ">
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
          <input style="height: 50px; width: 500px;" type="email" class="form-control" id="exampleInputEmail1"
            aria-describedby="emailHelp" placeholder="name.surname@gmail.com">
          <textarea style="height: 100px ; width: 500px;" class="form-control" id="exampleFormControlTextarea1"
            rows="3"></textarea>
            
          <button type="submit" class="btn btn-light mx-auto " >Send</button>
        
        </div>
      </form>
      </center>




    </div>
  </div>



  </div>



  <br>

  <!-- FOOTER SECTION  -->

  <footer>
    &copy; 2024 Gardening Shop. All rights reserved.
  </footer>











  <!-- Scroll back to the top button  -->
  <script>
    document.addEventListener("DOMContentLoaded", function () {
      var backToTopButton = document.getElementById('backToTopButton');

      function toggleBackToTopButton() {
        backToTopButton.classList.toggle('d-none', window.scrollY <= 300);
      }

      // Scroll to Top 
      function scrollToTop() {
        window.scrollTo({ top: 0, behavior: 'smooth' });
      }

      function animateBackToTopButton() {
        $('#backToTopButton').stop(true, true).fadeTo(200, 0.5).fadeTo(200, 1).addClass('animated bounce');
      }

      window.addEventListener('scroll', function () {
        toggleBackToTopButton();

        if (window.scrollY > 300) {
          animateBackToTopButton();
        }
      });

      backToTopButton.addEventListener('click', scrollToTop);
    });
  </script>









  <!-- Validimi edhe Button te Kontaktoni  -->
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





  <!-- Per Newsletter  -->
  <script src="../Javascript/about.js"></script>






  <!-- Jquery per Animation Containers  -->
  <script>
    $(document).ready(function () {
      var scrollPoint = 300;

      $(window).scroll(function () {
        if ($(this).scrollTop() > scrollPoint) {
          $("#history-section").addClass("show-container");
        }

      });
    });


    $(document).ready(function () {
      var scrollPoint = 700;

      $(window).scroll(function () {
        if ($(this).scrollTop() > scrollPoint) {
          $(".history-info-section").addClass("show-container");
        }

      });
    });


    $(document).ready(function () {
      var scrollPoint = 1300;

      $(window).scroll(function () {
        if ($(this).scrollTop() > scrollPoint) {
          $(".stafi-section").addClass("show-container");
        }

      });
    });


    $(document).ready(function () {
      var scrollPoint = 1600;

      $(window).scroll(function () {
        if ($(this).scrollTop() > scrollPoint) {
          $(".lokacioni-section").addClass("show-container");
        }

      });
    });
  </script>
</body>

</html>