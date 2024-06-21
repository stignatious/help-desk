<?php include('serverr.php'); 
if (!isset($_SESSION['username'])) {
    $_SESSION['msg'] = "You must log in first";
    header('location: login.php');
    exit();
}
if (isset($_GET['logout']) && $_GET['logout'] == 1) {
    session_destroy();
    unset($_SESSION['username']);
    header("location: login.php");
    exit();
}
?>
<!DOCTYPE html>
<html>
<head>
    <title>Home</title>
    <link rel="stylesheet" type="text/css" href="style.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css"/>
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <link href="css/owl.carousel.min.css" rel="stylesheet">
    <link href="css/owl.theme.default.min.css" rel="stylesheet">
    
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background-color:lightgoldenrodyellow;
        }
        .navigation {
            display: flex;
            justify-content: space-around;
            background-color: #333;
            padding: 10px;
            width: 100%;
            position: fixed;
            top: 0;
            z-index: 1;
        }
        .navigation a {
            color: white;
            text-decoration: none;
            padding: 14px 20px;
            margin: 0 10px;
        }
        .navigation a:hover {
            background-color: #ddd;
            color: black;
        }
        #slider {
            overflow: hidden;
            margin-top: 50px; /* Adjust margin to avoid overlap with the fixed navbar */
        }
        #slider figure {
            position: relative;
            width: 500%;
            height: 100vh;
            margin: 0;
            left: 0;
            animation: 20s slider infinite;
        }
        #slider figure img {
            float: left;
            width: 20%;
        }
        @keyframes slider {
            0%, 20% {
                left: 0;
            }
            25%, 45% {
                left: -100%;
            }
            50%, 70% {
                left: -200%;
            }
            75%, 95% {
                left: -300%;
            }
            100% {
                left: -400%;
            }
        }
        .header {
            color: blueviolet;
            font-size: 24px;
            text-align: center;
            max-width: 80%;
            margin: 60px auto 20px auto; /* Adjust margin to avoid overlap with the fixed navbar */
        }
        .header h2 {
            color: yellow;
            font-size: 36px;
        }
        .welcome-message {
            display: flex;
            position: relative;
            color: blue;
            font-size: 18px;
            margin-top: -30px;
            text-align: left;
            font-weight: bold;
            font-style: italic;
        }
        .about {
            display: flex;
            align-items: center;
            justify-content: space-between;
            padding: 50px;
            background: linear-gradient(to bottom right, rgba(255, 255, 255, .25), rgba(194, 236, 239, .25));
        }
        .about img {
            max-width: 100%;
            height: auto;
            border-radius: 10px;
        }
        .text-about {
            flex: 1;
            margin-left: 20px;
            padding: 20px;
            background-color: white;
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }
        .text-about h1 {
            color: #ADAFB1;
            font-size: 16px;
            font-weight: 500;
            text-transform: uppercase;
        }
        .text-about h2 {
            color: #333333;
            font-size: 1.2em;
        }
        .text-about p {
            font-size: 1em;
            color: #333333;
        }
        .cta-button {
            display: inline-block;
            background-color: #f08920;
            color: white;
            padding: 10px 20px;
            margin-top: 20px;
            text-decoration: none;
            border-radius: 5px;
            border: none;
        }
        .lp-hero__body .cta_button {
            color: #ffffff;
            padding: 0;
            text-decoration: none;
            border-radius: 2px;
            display: inline-block;
            -webkit-transition: all 200ms ease;
            -o-transition: all 200ms ease;
            transition: all 200ms ease;
            margin: 0;
            background-color: transparent;
        }
        .reviews-image {
            border-radius: 50%;
            width: 100px; /* Adjust the size as needed */
            height: 100px; /* Adjust the size as needed */
            object-fit: cover;
        }
        .reviews-section {
            background-color: lightblue;
            padding: 50px 0;
        }
        .reviews-section h2 {
            text-align: center;
            margin-bottom: 50px;
            font-size: 2.5em;
            color: #333;
        }
        .review-card {
            background-color: lightcoral;
            border: 1px solid #ddd;
            border-radius: 10px;
            padding: 20px;
            margin: 10px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            transition: transform 0.3s;
        }
        .review-card:hover {
            transform: translateY(-5px);
        }
        .review-card img {
            border-radius: 50%;
            width: 80px;
            height: 80px;
            margin-right: 20px;
        }
        .review-card h3 {
            margin: 0;
            font-size: 1.5em;
            color: #333;
        }
        .review-card p {
            font-size: 1em;
            color: #666;
        }
        .contact {
            margin-top: 20px;
        }
        .icons a {
  text-decoration: none;
  color: white;
}

.icons ion-icon {
  color: white;
  font-size: 30px;
  padding-left: 14px;
  padding-top: 5px;
  transition: 0.3s ease;
}

.icons ion-icon:hover {
  color: orangered;
}

    </style>
<script>
    window.onload = function() {
        const welcomeMessage = document.querySelector('.welcome-message');
        if (welcomeMessage) {
            $(welcomeMessage).fadeIn();
            setTimeout(function() {
                $(welcomeMessage).fadeOut();
            }, 3000); // 3000 is the timeout in milliseconds (3 seconds)
        }
    }
</script>

</head>

<body>
<nav class="navigation">
    <a href="#slider"><b>HOME</b></a>
    <a href="#about"><b>ABOUT</b></a>
    <a href="#services"><b>SERVICES</b></a>
    <a href="#reviews"><b>REVIEWS</b></a>
    <a href="#contact"><b>CONTACT</b></a>
    <?php if (isset($_SESSION['username'])) : ?>
        <a href="main_page.php?logout=1" style="color: red;"><b>LOGOUT</b></a>
    <?php endif; ?>
</nav>
<!-- HOME -->
<div id="slider" style="position: relative;">
    <figure>
        <img src="22.jpg" alt="">
        <img src="3.jpg" alt="">
        <img src="10.jpg" alt="">
        <img src="4.jpg" alt="">
        <img src="22.jpg" alt="">
    </figure>
    <div class="header" style="position: absolute; top: 50%; left: 50%; transform: translate(-50%, -50%); text-align: center; color: white;">
        <h2>Welcome to ICT ROADS</h2>
        <p>Welcome to ICT ROADS, where innovation meets expertise. We are your trusted partner in delivering cutting-edge ICT solutions tailored to your business needs. Explore our services and see how we can help you achieve your goals.</p>
    </div>
</div>
   
<div class="content">
    <div class="welcome-message">
        <?php if (isset($_SESSION['success'])) : ?>
            <?php echo $_SESSION['success']; unset($_SESSION['success']); ?>
        <?php endif; ?>
        <?php if (isset($_SESSION['username'])) : ?>
            <p>Welcome <strong><?php echo $_SESSION['username']; ?></strong></p>
        <?php endif; ?>
    </div>
</div>

<!-- ABOUT -->
<section class="about" id="about">
        <img src="team.webp" alt="team-image">
        <div class="text-about">
            <h1>ABOUT US</h1>
            <h2>Meet the HubSpot Experts Behind ICT Roads</h2>
            <p>Discover the HubSpot experts behind ICT Roads who bring the magic to life. Whether it's inbound marketing, sales enablement, or any other revenue-generating goal, our team possesses the skills and expertise to help you succeed.</p>
            <a class="cta-button" href="https://www.bluleadz.com/meetings/will287/connect-with-bluleadz" target="_blank" rel="noopener">Schedule a Call</a>
        </div>
    </section>

    <section class="section" id="mission" style="background: none; padding-top: 0;">
        <div style="text-align: center; width: 100%;">
            <p>OUR MISSION</p>
            <h3>Transforming the Way Companies Market, Sell, & Service Their Customers Using the HubSpot Platform</h3>
        </div>
    </section>
<!-- SERVICES -->
<section id="services" style="background-color: #f4f4f4; padding: 50px 0;">
    <div class="container">
        <h2 style="text-align: center; margin-bottom: 50px; font-size: 2.5em; color: #333;">Our Services</h2>
        <div class="row">
            <div class="col-md-4">
                <div class="card" style="border: none;">
                    <img src="92.webp" class="card-img-top" alt="Affordability">
                    <div class="card-body">
                        <h5 class="card-title">Affordability</h5>
                        <p class="card-text"></p>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card" style="border: none;">
                    <img src="44.JPG" class="card-img-top" alt="Great Experience">
                    <div class="card-body">
                        <h5 class="card-title">Great Experience</h5>
                        <p class="card-text"></p>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card" style="border: none;">
                    <img src="78.jpg" class="card-img-top" alt="Transparency">
                    <div class="card-body">
                        <h5 class="card-title">Transparency</h5>
                        <p class="card-text"></p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- REVIEWS -->
<section class="reviews-section" id="reviews">
    <div class="container">
        <h2>What Our Clients Say</h2>
        <div class="row">
            <div class="col-md-4">
                <div class="review-card">
                    <img src="ma.jpg" alt="Client 1">
                    <h3>LORNA MUGURE</h3>
                    <p>I FOUND REPAIR SERVICES WITH ICT QUITE CHEAPER AS COMPARED TO MOST SUPPORT AGENCIES AND IT WAS A GREAT EXPERIENCE AT SUCH A LOW PRICE</p>
                </div>
            </div>
            <div class="col-md-4">
                <div class="review-card">
                    <img src="la.jpg" alt="Client 2">
                    <h3>SEAN MARARO</h3>
                    <p>THE STAFF SERVED US WELL AND MADE SURE TO MEET ALL THE EXPECTATIONS WE HAD SET. GREAT WORK FROM THE STAFF</p>
                </div>
            </div>

                <div class="col-md-4">
                <div class="review-card">
                    <img src="sa.jpg" alt="Client 3">
                    <h3>KIMBERLY</h3>
                    <p>GREAT EXPERIENCE AT ICT WITH MY COLLEAGUES</p>
                </div>
            </div>
        </div>
    </div>
</section>
     <!-- CONTACT -->
     <div id="contact" class="contact-us">
     <div class="container">
     <h2>Contact Us</h2>
<form method="post" action="main_page.php">
    <?php include('errors.php'); ?>
    <div class="form-group">
    <label for="fullname">Name:</label>  
        <input type="text" name="fullname" id="fullname" class="form-control" placeholder="ENTER FULL NAME" required>
    </div>
    <div class="form-group">
    <label for="office">Office:</label>
        <input type="text" name="office" id="office" class="form-control" placeholder="ENTER OFFICE NUMBER" required>
    </div>
    <div class="form-group">
    <label for="phone">Phone:</label>
        <input type="text" name="phone" id="phone" class="form-control" placeholder="ENTER YOUR PHONE NUMBER" required>
    </div>
    <div class="form-group">
    <label for="message">Message:</label>
        <textarea rows="5" name="message" id="message" class="form-control" placeholder="ENTER YOUR MESSAGE" required></textarea>

    <button type="submit" class="btn btn-primary">SUBMIT</button>
</form>
</div>
<div class="col-md-6 col-sm-12">
                         <div class="contact-image">
                              <img src="99.jpg" class="img-responsive" alt="Smiling Two Girls">
                         </div>
                    </div>
</div>
  <!-- contact info -->
<footer style="background-color: #333; color: #fff; padding: 50px 0; position: relative;" data-stellar-background-ratio="5">
    <div class="container">
        <div class="row">
            <div class="col-md-4 col-sm-4">
                <div class="footer-thumb">
                    <h3 class="wow fadeInUp" data-wow-delay="0.4s" style="color: #ffd700;">Contact Info</h3>
                    <p>To Contact Us :</p>
                    <div class="contact-info">
                        <p><i class="fa fa-phone"></i><b> 0793704279 <br> 0798042636</b></p>
                        <p><i class="fa fa-envelope"></i> <a href="mailto:ps@infrastructure.go.ke" style="color: #ffd700;"> ps@infrastructure.go.ke </a></p>
                    </div>
                </div>
            </div>
            <div class="col-md-4 col-sm-4">
                <div class="footer-thumb">
                    <h3 class="wow fadeInUp" data-wow-delay="0.4s" style="color: #ffd700;">Opening Hours</h3>
                    <div class="opening-hours">
                        <p>Monday - Friday <span>8:00 AM - 5:00 PM</span></p>
                        <p>Saturday <span>Closed</span></p>
                        <p>Sunday <span>Closed</span></p>
                    </div> 
                </div>
            </div>
            <div class="col-md-4 col-sm-4">
                <div class="footer-thumb">
                    <h3 class="wow fadeInUp" data-wow-delay="0.4s" style="color: #ffd700;">Follow Us</h3>
                    <ul class="social-icon">
                                   <li><a href="#" class="fa fa-facebook-square" attr="facebook icon"></a></li>
                                   <li><a href="#" class="fa fa-twitter"></a></li>
                                   <li><a href="#" class="fa fa-instagram"></a></li>
                              </ul>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12 col-sm-12 border-top" style="border-top: 1px solid #444; padding-top: 20px; margin-top: 20px;">
                <div class="col-md-6 col-sm-6">
                    <div class="copyright-text">
                        <p>Copyright &copy; 2024 ict.roads</p>
                    </div>
                </div>
                <div class="col-md-6 col-sm-6 text-right">
                    <div class="angle-up-btn">
                        <a href="#top" class="smoothScroll wow fadeInUp" data-wow-delay="1.2s" style="color: #ffd700; font-size: 1.5em;"><i class="fa fa-angle-up"></i></a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</footer>

</body>
</html>

