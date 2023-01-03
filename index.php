<?php
    //helper function
    require_once ('funtions.php');
    //instantiate valiables we'll use
    $errors = array();
    $sent = false;

    //check for form submission
    if(!empty($_POST)){
        //process the form
        $process = process_form($_POST);
        //check for errors
        if(!empty($process['message'])){
            $errors[] = $process['message'];
        } elseif( !empty($process['errors'])){
            $errors = $process['errors'];
        } else{
            $sent = true;
        }
    }
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Jovation</title>
    <link rel="stylesheet" href="style.css">
    <!-- <link rel="stylesheet" href="fontawesome-free-6.0.0-web/css/all.css"> -->
</head>
<body>
    <!-- <img src="img/Lines.png" class="lines" alt=""> -->
    <div class="body">
        
        
        <img src="img/Ellipse_home.png" class="Ellipse_home" alt="">
        <div class="right">
            <img src="img/lady_svg.svg" alt="" class="svg">
        </div>
        <section id="home">
            <div class="nav">
                <div class="nav_bar">
                    <div class="logo">
                        <img src="img/Jovation-header-removebg-preview 1.png" alt="Logo" class="logo_img">
                    </div>
                    <div class="nav_items">
                        <div><a href="#main">Home</a></div>
                        <div><a href="#section-about">About</a></div>
                        <div><a href="#section-service">Sevices</a></div>
                        <div><a href="#section-team">Team</a></div>
                        <!-- <div><a href="#section-contact">Contact Us</a></div> -->
                    </div>
                    <div class="nav_contact">
                        <a href="#">Contact Us</a>
                    </div>
                </div>
                <div class="menu">
                    <nav class="mobile-nav">
                        <a href="#main" class="mobile-list">Home</a>
                        <a href="#section-about" class="mobile-list">About</a>
                        <a href="#section-service" class="mobile-list">Service</a>
                        <a href="#section-team" class="mobile-list">Team</a>
                        <a href="#section-contact" class="mobile-list">Contact</a>
                    </nav>
                    <button class="hamburger">
                        <div class="bar"></div>
                    </button>
                </div>
            </div>
            <div class="landing">
                <div class="left">
                    <h1>INNOVATE YOUR BUSINESS <br>
                        WITH DYNAMIC SOLUTIONS <br>
                        AND OPTIMIZATION</h1>
                    <h3>For custom built web site and appliication<br>
                        Analysis and optimization for customer<br> satisfaction</h3>
                    <div class="main_btn">
                        <a href="#">Contact Us</a>  
                    </div>
                </div>
            </div>

        </section>
        <section id="about">
            <div class="about_us">
                <div class="about_mobile">
                    <h3>ABOUT US</h3>
                </div>
                <div class="about_left">
                    <img src="img/about.svg" alt="" class="about_img">
                </div>
                <div class="about_right">
                    <h3>ABOUT US</h3>
                    <p>For custom built web site and appliication
                        Analysis and optimization for customer satisfaction</p>
                    <div class="main_btn">
                        <a href="#">Contact Us</a>
                    </div>
                </div>
            </div>

        </section>
        <section id="services">
            <div class="our_services">
                
                <h3>OUR SERVICES</h3>
            
                <div class="info">
                    <div class="row1">
                        <div class="box1">
                            <img src="img/Speed.svg" alt="" class="speed">
                            <h3>CODE OPTIMIZATION</h3>
                            <p>For custom built web site and appliication
                                Analysis and optimization for customer satisfaction</p>
                        </div>
                        <div class="box2">
                            <img src="img/Speed.svg" alt="" class="speed">
                            <h3>CODE OPTIMIZATION</h3>
                            <p>For custom built web site and appliication
                                Analysis and optimization for customer satisfaction</p>
                        </div>
                    </div>
                    <div class="row2">
                        <div class="box1">
                            <img src="img/Speed.svg" alt="" class="speed">
                            <h3>CODE OPTIMIZATION</h3>
                            <p>For custom built web site and appliication
                                Analysis and optimization for customer satisfaction</p>
                        </div>
                        <div class="box2">
                            <img src="img/Speed.svg" alt="" class="speed">
                            <h3>CODE OPTIMIZATION</h3>
                            <p>For custom built web site and appliication
                                Analysis and optimization for customer satisfaction</p>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <section id="contact">
            <div class="contact_us">
                <h3>CONTACT US</h3>
                <div class="contact_info">
                    <div class="contact_img">
                        <img src="img/contact.svg" alt="" class="contact_img">
                    </div>
                    <div class="contact_form">
                        <form action="" class="contact-field" method="POST">
                            <div class="form">
                                <?php if(!empty($errors)): ?>
                                    <div class="errors">
                                        <p class= "danger_alart"><?php echo implode('.</p><p class = "danger_msg">', $errors);?>.</p>
                                    </div>
                                    <?php elseif ($sent): ?> 
                                    <div class="success_alart">
                                        <p class = "succcess_msg"> Message sent but...</p>
                                    </div>
                                    <?php endif; ?>
                                <div class="form-group">
                                    <input type="text" class="form-input" placeholder="Full name" name="name" value = "<?php echo validate_input('name'); ?>" required>
                                    <label for="name" class="form-label">Full name</label>
                                </div>
                                <div class="form-group">
                                    <input type="text" class="form-input" placeholder="Email Address" name="email" value = "<?php echo validate_input('email'); ?>" required>
                                    <label for="email" class="form-label">Email Address</label>
                                </div>
                                <div class="form-group">
                                    <textarea name="message" value = "<?php echo validate_input('message'); ?>" class="form-input" cols="30" rows="4"></textarea>
                                    <button type="submit" name="submit" class="contact-btn">Send a message </button>
                                </div>
                            </div>
                    </form>
                    </div>
                </div>
            </div>
        </section>
        <footer class="footer">
            <div class="footer-logo-box">
                <img src="./image/Jovation whitte.png" alt="" class="footer-logo">
            </div>
            <div class="row1">
                <div class="box11">
                    <div class="footer-navigation">
                        <ul class="footer-list">
                            <li class="footer-item"><a href="#" class="footer-link">Home</a></li>
                            <li class="footer-item"><a href="#" class="footer-link">About</a></li>
                            <li class="footer-item"><a href="#" class="footer-link">Services</a></li>
                            <li class="footer-item"><a href="#" class="footer-link">Team</a></li>
                            <li class="footer-item"><a href="#" class="footer-link">Contact</a></li>
                        </ul>
                    </div>
                </div>
                <div class="box22">
                    <p class="footer-copyright">
                        &copy; Jovation  <a href="#" class="footer-link"></a>
                    </p>
                </div>
            </div>

        </footer>

    </div>
    <script src="./app.js"></script>
</body>
</html>