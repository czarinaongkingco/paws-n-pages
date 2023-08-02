<?php
session_start();
include('config.php');
include('connection.php');
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>Paws N Pages | About</title>
    <link rel="icon" href="https://media.discordapp.net/attachments/1112075552669581332/1113455947420024832/icon.png" type="image/x-icon">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">

    <!-- Favicon -->
    <link href="img/favicon.ico" rel="icon">

    <!-- Google Web Fonts -->
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Poppins&family=Roboto:wght@700&display=swap" rel="stylesheet">

    <!-- Icon Font Stylesheet -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css" rel="stylesheet">
    <link href="lib/flaticon/font/flaticon.css" rel="stylesheet">

    <!-- Libraries Stylesheet -->
    <link href="lib/owlcarousel/assets/owl.carousel.min.css" rel="stylesheet">

    <!-- Customized Bootstrap Stylesheet -->
    <link href="css/bootstrap.min.css" rel="stylesheet">

    <!-- Template Stylesheet -->
    <link href="css/style.css" rel="stylesheet">
    <style>
        .faq-list {
            flex: 1;
        }

        .faq-item {

            cursor: pointer;
        }

        .faq-question {
            margin: 0;
        }

        .faq-answer {
            display: none;
        }

        .show-answer .faq-answer {
            display: block;
        }

        #searchInput {
            margin-bottom: 10px;
        }

        #pills-1-tab:focus,
        #pills-1-tab:active,
        #pills-1-tab.active {
            background-color: rgb(36, 94, 28);
        }

        #pills-2-tab:focus,
        #pills-2-tab:active,
        #pills-2-tab.active {
            background-color: rgb(36, 94, 28);
        }
    </style>
</head>

<body>
    <!-- Navbar Start -->
    <nav class="navbar navbar-expand-lg bg-white navbar-light shadow-sm py-3 py-lg-0 px-3 px-lg-0">
        <a href="index.php" class="navbar-brand ms-lg-5">
            <img src="https://i.ibb.co/vmrbJ34/logo-black.png" alt="Paws N Pages Logo" width="70" height="70" />
        </a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarCollapse">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarCollapse">
            <div class="navbar-nav ms-auto py-0">
                <a href="index.php" class="nav-item nav-link">Home</a>
                <a href="clinics.php" class="nav-item nav-link">Clinics</a>
                <a href="contact.php" class="nav-item nav-link">Contact Us</a>
                <a href="about.php" class="nav-item nav-link active">About Us</a>

                <?php if ($_SESSION["id"] > 0) { ?>
                    <a href="userProfile.php" class="nav-item nav-link">Profile</a>
                    <a href="logout.php" class="nav-item nav-link">Logout
                        <i class="bi bi-arrow-right"></i>
                        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                    </a>


                <?php } else { ?>

                    <a href="login.php" class="nav-item nav-link">Login</a>
                    <a href="vet-or-pet.php" class="nav-item nav-link nav-contact bg-primary text-white px-5 ms-lg-5">JOIN US
                        <i class="bi bi-arrow-right"></i>
                    </a>

                <?php } ?>


            </div>
        </div>
    </nav>
    <!-- Navbar End -->


    <!-- About Start -->
    <div class="container-fluid py-5">
        <div class="container">
            <div class="row gx-5">
                <div class="col-lg-5 mb-5 mb-lg-0" style="min-height: 500px;">
                    <div class="position-relative h-100">
                        <img class="position-absolute w-100 h-100 rounded" src="img/about.jpg" style="object-fit: cover; border-radius: 15px;">
                    </div>
                </div>
                <div class="col-lg-7">
                    <div class="border-5 ps-5 mb-5" style="border-style: solid; border-color: transparent transparent transparent #245e1c;">
                        <h6 class="text-primary text-uppercase">About Us</h6>
                        <h1 class="text-primary text-uppercase">Welcome to Paws N Pages</h1>
                    </div>
                    <h4 class="text-body mb-4" style="text-align: justify;">Where we wholeheartedly welcome pet owners seeking exceptional veterinary care and convenient pet supplies. As a passionate team of pet lovers, we are driven by a deep understanding of the profound bond between humans and animals.</h4>
                    <div class="bg-light p-4" style="border-radius: 15px;">
                        <ul class="nav nav-pills justify-content-between mb-3" id="pills-tab" role="tablist">
                            <li class="nav-item w-50" role="presentation">
                                <button style="border-radius: 15px;" class="nav-link text-uppercase w-100 active" id="pills-1-tab" data-bs-toggle="pill" data-bs-target="#pills-1" type="button" role="tab" aria-controls="pills-1" aria-selected="true">Our Mission</button>
                            </li>
                            <li class="nav-item w-50" role="presentation">
                                <button style="border-radius: 15px;" class="nav-link text-uppercase w-100" id="pills-2-tab" data-bs-toggle="pill" data-bs-target="#pills-2" type="button" role="tab" aria-controls="pills-2" aria-selected="false">Our Vission</button>
                            </li>
                        </ul>
                        <div class="tab-content" id="pills-tabContent">
                            <div class="tab-pane fade show active" id="pills-1" role="tabpanel" aria-labelledby="pills-1-tab">
                                <p class="mb-0" style="text-align: justify;"> Our mission at Paws N Pages is to help you find exceptional veterinary care, trusted resources, and heartfelt support to pets and their owners. We connect pet owners with reputable clinics and offer convenient tools to streamline pet healthcare management.
                                </p>
                            </div>
                            <div class="tab-pane fade" id="pills-2" role="tabpanel" aria-labelledby="pills-2-tab">
                                <p class="mb-0" style="text-align: justify;">At Paws N Pages, we envision a world where every pet receives the love, care, and attention they deserve. We strive to be the go-to resource, ensuring your pets' well-being is our top priority. </p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- About End -->


    <!-- Bianca Start -->
    <div class="container-fluid py-5">
        <div class="container">
            <p style="text-align: justify; font-size: 22px;">
                The journey of Paws N Pages began with our founders, Bianca and Shirley, who experienced the devastating loss of their beloved pets due to illness and inadequate veterinary care. These personal tragedies ignited an unwavering desire within them to create a platform that empowers pet owners like you to find the very best clinics and resources for your furry companions.

            </p>
            <br>
            <div class="border-5 ps-5 mb-5" style="max-width: 600px; border-style: solid; border-color: transparent transparent transparent #245e1c;">
                <h6 class="text-primary text-uppercase">Bianca</h6>
            </div>
            <div class="owl-carousel team-carousel position-relative" style="padding-right: 25px;">
                <div class="team-item">
                    <div class="position-relative overflow-hidden">
                        <img class="img-fluid w-100" src="img/1.png" alt="" style="border-radius: 15px;">
                    </div>
                </div>
                <div class="team-item">
                    <div class="position-relative overflow-hidden">
                        <img class="img-fluid w-100" src="img/2.png" alt="" style="border-radius: 15px;">
                    </div>
                </div>
                <div class="team-item">
                    <div class="position-relative overflow-hidden">
                        <img class="img-fluid w-100" src="img/3.png" alt="" style="border-radius: 15px;">
                    </div>
                </div>
                <div class="team-item">
                    <div class="position-relative overflow-hidden">
                        <img class="img-fluid w-100" src="img/4.png" alt="" style="border-radius: 15px;">
                    </div>
                </div>
                <div class="team-item">
                    <div class="position-relative overflow-hidden">
                        <img class="img-fluid w-100" src="img/5.png" alt="" style="border-radius: 15px;">
                    </div>
                </div>
                <div class="team-item">
                    <div class="position-relative overflow-hidden">
                        <img class="img-fluid w-100" src="img/6.png" alt="" style="border-radius: 15px;">
                    </div>
                </div>
                <div class="team-item">
                    <div class="position-relative overflow-hidden">
                        <img class="img-fluid w-100" src="img/7.png" alt="" style="border-radius: 15px;">
                    </div>
                </div>
                <div class="team-item">
                    <div class="position-relative overflow-hidden">
                        <img class="img-fluid w-100" src="img/8.png" alt="" style="border-radius: 15px;">
                    </div>
                </div>


            </div>
        </div>
    </div>
    <!-- Bianca End -->

    <!-- Shir Start -->
    <div class="container-fluid py-5">
        <div class="container">
            <div class="border-5 ps-5 mb-5" style="max-width: 600px; border-style: solid; border-color: transparent transparent transparent #245e1c;">
                <h6 class="text-primary text-uppercase">Shirley</h6>
            </div>
            <div class="owl-carousel team-carousel position-relative" style="padding-right: 25px;">
                <div class="team-item">
                    <div class="position-relative overflow-hidden">
                        <img class="img-fluid w-100" src="img/9.png" alt="" style="border-radius: 15px;">
                    </div>
                </div>
                <div class="team-item">
                    <div class="position-relative overflow-hidden">
                        <img class="img-fluid w-100" src="img/10.png" alt="" style="border-radius: 15px;">
                    </div>
                </div>
                <div class="team-item">
                    <div class="position-relative overflow-hidden">
                        <img class="img-fluid w-100" src="img/11.png" alt="" style="border-radius: 15px;">
                    </div>
                </div>
                <div class="team-item">
                    <div class="position-relative overflow-hidden">
                        <img class="img-fluid w-100" src="img/12.png" alt="" style="border-radius: 15px;">
                    </div>
                </div>
                <div class="team-item">
                    <div class="position-relative overflow-hidden">
                        <img class="img-fluid w-100" src="img/13.png" alt="" style="border-radius: 15px;">
                    </div>
                </div>
                <div class="team-item">
                    <div class="position-relative overflow-hidden">
                        <img class="img-fluid w-100" src="img/14.png" alt="" style="border-radius: 15px;">
                    </div>
                </div>
                <div class="team-item">
                    <div class="position-relative overflow-hidden">
                        <img class="img-fluid w-100" src="img/15.png" alt="" style="border-radius: 15px;">
                    </div>
                </div>
                <div class="team-item">
                    <div class="position-relative overflow-hidden">
                        <img class="img-fluid w-100" src="img/16.png" alt="" style="border-radius: 15px;">
                    </div>
                </div>


            </div>
        </div>
    </div>
    <!-- Shir End -->
    <!-- Services Start -->
    <div class="container-fluid py-5">
        <div class="container">
            <div class="border-5 ps-5 mb-5" style="max-width: 600px; border-style: solid; border-color: transparent transparent transparent #245e1c;">
                <h6 class="text-primary text-uppercase">Services</h6>
                <h1 class="display-5 text-uppercase mb-0">Our Services</h1>
            </div>
            <div class="row g-5">
                <div class="col-md-4">
                    <div class="service-item bg-light d-flex p-4" style="border-radius: 15px;">
                        <i class="flaticon-location display-1 text-primary me-4"></i>
                        <div>
                            <h5 class="text-uppercase mb-3">Veterinary Clinics Directory</h5>
                            <p>Find the best clinic for your pets, book an appointment, or purchase pet supplies</p>
                            <img src="https://i.ibb.co/6Pmq9Bc/1.png" style="max-width: 100%; height: auto; padding-bottom: 25px;" />
                            <a class="text-primary text-uppercase" href="clinics.php">View Nearby Clinics<i class="bi bi-chevron-right"></i></a>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="service-item bg-light d-flex p-4" style="border-radius: 15px;">
                        <i class="display-1 text-primary me-4"></i>
                        <div>
                            <h5 class="text-uppercase mb-3">Booking of Appointments</h5>
                            <p>Avoid waiting in line and find the a clinic that will cater to your pet's needs</p>
                            <img src="https://i.ibb.co/jZxWwSW/3.png" style="max-width: 100%; height: auto; padding-bottom: 25px;" href="#" />

                            <a class="text-primary text-uppercase" href="clinics.php">View Appointments<i class="bi bi-chevron-right"></i></a>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="service-item bg-light d-flex p-4" style="border-radius: 15px;">
                        <i class="display-1 text-primary me-4"></i>
                        <div>
                            <h5 class="text-uppercase mb-3">Pet Booklet</h5>
                            <p>Digitalize your Pet Booklet and never have to lose it again!
                            </p>
                            <img src="https://media.discordapp.net/attachments/1112075552669581332/1121348266773184552/31.png" style="max-width: 100%; height: auto; padding-bottom: 25px;" />
                            <a class="text-primary text-uppercase" href="userProfile.php">View Profile<i class="bi bi-chevron-right"></i></a>
                        </div>
                    </div>
                </div>

                <div class="col-md-12">
                    <div class="service-item bg-light d-flex p-4" style="border-radius: 15px;">
                        <i class="display-1 text-primary me-4"></i>
                        <div>
                            <h5 class="text-uppercase mb-3">Want to Join Our Clinic Directory?</h5>
                            <p>We provide a system for Veterinary Clinics to showcase their services and supplies available.
                            </p>
                            <a class="text-primary text-uppercase" href="pricing.php">See Pricing<i class="bi bi-chevron-right"></i></a>
                        </div>
                    </div>
                </div>


            </div>
        </div>
    </div>
    <!-- Services End -->

    <!-- FAQS Start -->
    <div class="container-fluid py-5" id="faqs">
        <div class="container">
            <div class="border-5 ps-5 mb-5" style="max-width: 600px; border-style: solid; border-color: transparent transparent transparent #245e1c;">
                <h6 class="text-primary text-uppercase">Frequently Asked Questions</h6>
                <h1 class="display-5 text-uppercase mb-0">Our FAQs</h1>
                <!-- Search Form Start -->
                <div class="mb-5">
                    <input type="text" id="searchInput" name="search" class="form-control p-3" placeholder="Search FAQ..." style="border-radius: 15px 15px 15px 15px;">
                </div>
                </form>
            </div>
            <!-- Search Form End -->
        </div>
        <!-- Row start-->
        </br>
        <div class="row g-6">
            <div class="col-md-2"></div>
            <div class="col-md-4">
                <div class="service-item bg-light d-flex p-4" style="border-radius: 15px;">
                    <i class="flaticon-location display-1 text-primary me-4"></i>
                    <div>
                        <!-- FAQs start-->
                        <div class="faq-list">
                            <div class="faq-item">
                                <h5 class="faq-question">How do I register and create an account on the website?</h5>
                                <div class="faq-answer">
                                    <p>To register and create an account, you can click on the
                                        <a href="vet-or-pet.php">"Join US"</a> on the website's upper right hand corner.
                                        Fill out the required fields. Follow the instructions provided and submit the registration form.
                                        Once completed, you will be able to log in to your account.
                                    </p>
                                </div>
                            </div>
                        </div>
                        <!-- FAQs end-->

                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="service-item bg-light d-flex p-4" style="border-radius: 15px;">
                    <i class="display-1 text-primary me-4"></i>
                    <!-- FAQs start-->
                    <div class="faq-list">
                        <div class="faq-item">
                            <h5 class="faq-question">Is my personal information secure and protected on this website?</h5>
                            <div class="faq-answer">
                                <p>Yes, we prioritize the security and protection of your personal information.
                                    We employ various security measures, such as encryption protocols and secure storage,
                                    to safeguard your data. Additionally, we adhere to data privacy regulations and guidelines
                                    to ensure the confidentiality of your information. </p>
                            </div>
                        </div>
                    </div>
                    <!-- FAQs end-->
                </div>
            </div>
            <div class="col-md-2"></div>

        </div>
        <!-- Row end-->
        <!-- Row start-->
        </br>
        <div class="row g-6">
            <div class="col-md-2"></div>
            <div class="col-md-4">
                <div class="service-item bg-light d-flex p-4" style="border-radius: 15px;">
                    <i class="flaticon-location display-1 text-primary me-4"></i>
                    <div>
                        <!-- FAQs start-->
                        <div class="faq-list">
                            <div class="faq-item">
                                <h5 class="faq-question">How can I add a new pet to my record?</h5>
                                <div class="faq-answer">
                                    <strong></strong>
                                    <p>Once logged into your account, navigate to your <a href="userProfile.php"><strong>profile</strong></a>,
                                        click on the <strong>"Buy a pet booklet"</strong> option, <strong>make the payment, </strong>
                                        and then click the <strong>"Add New Pet"</strong> button to provide the required information
                                        and create a digital pet booklet for storing your pet's health assessments and vaccination records.</p>
                                </div>
                            </div>
                        </div>
                        <!-- FAQs end-->

                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="service-item bg-light d-flex p-4" style="border-radius: 15px;">
                    <i class="display-1 text-primary me-4"></i>
                    <!-- FAQs start-->
                    <div class="faq-list">
                        <div class="faq-item">
                            <h5 class="faq-question">Can I manage multiple pets under one account?</h5>
                            <div class="faq-answer">
                                <strong></strong>
                                <p><strong>Yes</strong>, you can manage multiple pets under one account.
                                    Paws N Pages provide functionality to add, view, and manage multiple pet records.
                                    You can repeat the process of adding a new pet to include all your pets in your account's record.</p>
                            </div>
                        </div>
                    </div>
                    <!-- FAQs end-->
                </div>
            </div>
            <div class="col-md-2"></div>
        </div>
        <!-- Row end-->
        <!-- Row start-->
        </br>
        <div class="row g-6">
            <div class="col-md-2"></div>
            <div class="col-md-4">
                <div class="service-item bg-light d-flex p-4" style="border-radius: 15px;">
                    <i class="flaticon-location display-1 text-primary me-4"></i>
                    <div>
                        <!-- FAQs start-->
                        <div class="faq-list">
                            <div class="faq-item">
                                <h5 class="faq-question">How can I edit or update the information for my pet?</h5>
                                <div class="faq-answer">
                                    <p>To edit or update the information for a pet, go to your <a href="userProfile.php"><strong>profile</strong></a>.
                                        Locate the specific pet you wish to modify and click the pen on its upper
                                        right corner to update its details. Click on it, make the necessary changes,
                                        and save the updated information.
                                    </p>
                                </div>
                            </div>
                        </div>
                        <!-- FAQs end-->

                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="service-item bg-light d-flex p-4" style="border-radius: 15px;">
                    <i class="display-1 text-primary me-4"></i>
                    <!-- FAQs start-->
                    <div class="faq-list">
                        <div class="faq-item">
                            <h5 class="faq-question">Is there a limit to the number of pet records I can add?</h5>
                            <div class="faq-answer">
                                <p>There is <strong>no limit</strong> to the number of pet records you can add. </p>
                            </div>
                        </div>
                    </div>
                    <!-- FAQs end-->
                </div>
            </div>
            <div class="col-md-2"></div>
        </div>
        <!-- Row end-->
        <!-- Row start-->
        </br>
        <div class="row g-6">
            <div class="col-md-2"></div>
            <div class="col-md-4">
                <div class="service-item bg-light d-flex p-4" style="border-radius: 15px;">
                    <i class="flaticon-location display-1 text-primary me-4"></i>
                    <div>
                        <!-- FAQs start-->
                        <div class="faq-list">
                            <div class="faq-item">
                                <h5 class="faq-question">How do I book an appointment with a veterinary clinic?</h5>
                                <div class="faq-answer">
                                    <strong></strong>
                                    <p>To book an appointment with a veterinary clinic, navigate to the <strong>Clinics</strong> page,
                                        <strong>search for a clinic</strong> based on location or services offered, select a clinic,
                                        choose your desired service, preferred date and time slot, and <strong>once confirmed,
                                            you will receive a text and email notification.</strong>
                                    </p>
                                </div>
                            </div>
                        </div>
                        <!-- FAQs end-->

                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="service-item bg-light d-flex p-4" style="border-radius: 15px;">
                    <i class="display-1 text-primary me-4"></i>
                    <!-- FAQs start-->
                    <div class="faq-list">
                        <div class="faq-item">
                            <h5 class="faq-question">Can I search for clinics based on location or services offered?</h5>
                            <div class="faq-answer">
                                <p><strong>Yes,</strong> Paws N Pages provide a search functionality where you can search for
                                    veterinary clinics based on location or specific services offered. </p>
                            </div>
                        </div>
                    </div>
                    <!-- FAQs end-->
                </div>
            </div>
            <div class="col-md-2"></div>
        </div>
        <!-- Row end-->
        <!-- Row start-->
        </br>
        <div class="row g-6">
            <div class="col-md-2"></div>
            <div class="col-md-4">
                <div class="service-item bg-light d-flex p-4" style="border-radius: 15px;">
                    <i class="flaticon-location display-1 text-primary me-4"></i>
                    <div>
                        <!-- FAQs start-->
                        <div class="faq-list">
                            <div class="faq-item">
                                <h5 class="faq-question">What should I do if I need to reschedule or cancel an appointment?</h5>
                                <div class="faq-answer">
                                    <strong></strong>
                                    <p>If you need to reschedule or cancel an appointment, go to your profile,
                                        the appointment section of your account. Click the eye icon to cancel the booking. <strong> Once an appointment is confirmed,
                                            cancellation is NOT allowed within three (3) days prior to the scheduled appointment date. </strong>
                                    </p>
                                </div>
                            </div>
                        </div>
                        <!-- FAQs end-->

                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="service-item bg-light d-flex p-4" style="border-radius: 15px;">
                    <i class="display-1 text-primary me-4"></i>
                    <!-- FAQs start-->
                    <div class="faq-list">
                        <div class="faq-item">
                            <h5 class="faq-question">How will I receive confirmation of my appointment booking?</h5>
                            <div class="faq-answer">
                                <strong></strong>
                                <p>After the booking has been confirmed by the clinic, you should receive a <strong>text and email notification.</strong>
                                    The confirmation will include details such as the clinic's name, service you wish to avail, date,
                                    and time of the appointment. Make sure to check your registered email address and notification settings to ensure you receive the confirmation. </p>
                            </div>
                        </div>
                    </div>
                    <!-- FAQs end-->
                </div>
            </div>
            <div class="col-md-2"></div>
        </div>
        <!-- Row end-->
        <!-- Row start-->
        </br>
        <div class="row g-6">
            <div class="col-md-2"></div>
            <div class="col-md-4">
                <div class="service-item bg-light d-flex p-4" style="border-radius: 15px;">
                    <i class="flaticon-location display-1 text-primary me-4"></i>
                    <div>
                        <!-- FAQs start-->
                        <div class="faq-list">
                            <div class="faq-item">
                                <h5 class="faq-question">Can I view my appointment details for reference?</h5>
                                <div class="faq-answer">
                                    <p>Yes, Paws N Pages provide a feature to view and access your appointment details.
                                        Navigate to your <strong>profile</strong> and select <strong>appointments</strong>, locate the specific appointment,
                                        and <strong>click on its reference number</strong> to view the details. </p>
                                </div>
                            </div>
                        </div>
                        <!-- FAQs end-->

                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="service-item bg-light d-flex p-4" style="border-radius: 15px;">
                    <i class="display-1 text-primary me-4"></i>
                    <!-- FAQs start-->
                    <div class="faq-list">
                        <div class="faq-item">
                            <h5 class="faq-question">Are there any fees or charges associated with using this web application?</h5>
                            <div class="faq-answer">
                                <strong></strong>
                                <p>The application is free to use; however, if you would like to digitize your pet booklet, there is a cost of<strongPhp 49.00 per booklet></strong>.
                                </p>
                            </div>
                        </div>
                    </div>
                    <!-- FAQs end-->
                </div>
            </div>
            <div class="col-md-2"></div>
        </div>
        <!-- Row end-->
        <!-- Row start-->
        </br>
        <div class="row g-6">
            <div class="col-md-2"></div>
            <div class="col-md-4">
                <div class="service-item bg-light d-flex p-4" style="border-radius: 15px;">
                    <i class="flaticon-location display-1 text-primary me-4"></i>
                    <div>
                        <!-- FAQs start-->
                        <div class="faq-list">
                            <div class="faq-item">
                                <h5 class="faq-question">How can I contact customer support or report an issue with the system?</h5>
                                <div class="faq-answer">
                                    <strong></strong>
                                    <p>To provide feedback or report an issue with the system, click the <a href="contact.php">"Contact Us"</a> option on the menu.
                                        Provide your details, describe the feedback or issue in detail, and submit the form.
                                        Alternatively, you may find a dedicated support email or phone number for communication.</p>
                                </div>
                            </div>
                        </div>
                        <!-- FAQs end-->

                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="service-item bg-light d-flex p-4" style="border-radius: 15px;">
                    <i class="display-1 text-primary me-4"></i>
                    <!-- FAQs start-->
                    <div class="faq-list">
                        <div class="faq-item">
                            <h5 class="faq-question">What should I do if I forget my account password?</h5>
                            <div class="faq-answer">
                                <p>If you forget your account password, click the <strong>"Forgot Password"</strong> option on the <strong>login</strong> page.
                                    Click on this option and follow the instructions to reset your password.
                                    You will receive an <strong>email with a password reset link</strong>. Clicking on the link will allow you to create a new password for your account.
                                </p>
                            </div>
                        </div>
                    </div>
                    <!-- FAQs end-->
                </div>
            </div>
            <div class="col-md-2"></div>
        </div>
        <!-- Row end-->


    </div>
    </div>
    </div>
    <!-- FAQS End -->


    <!-- FINAL Footer Start -->
    <div class="container-fluid bg-light mt-5 py-5">
        <div class="container pt-5">
            <div class="row g-5">
                <div class="col-lg-4 col-md-6">
                    <h5 class="text-uppercase border-start border-5 border-primary ps-3 mb-4">Get In Touch</h5>
                    <p class="mb-4">If you have inquiries feel free to contact us below<br>
                        <a href="contact.php">Contact Us </a>
                    </p>
                    <a class="mb-2" href="https://goo.gl/maps/nGdbiDamK7MP9L5z5"><i class="bi bi-geo-alt text-primary me-2"></i>Manila, PH</br></a>
                    <a class="mb-2" href="mailto:pawsnpages.site@gmail.com"><i class="bi bi-envelope-open text-primary me-2"></i>pawsnpages.site@gmail.com</a>
                    <a class="mb-0" href="tel:+6396176261"></br><i class="bi bi-telephone text-primary me-2"></i>+63 961
                        762 6162</a>
                </div>
                <div class="col-lg-4 col-md-6">
                    <h5 class="text-uppercase border-start border-5 border-primary ps-3 mb-4">Quick Links</h5>
                    <div class="d-flex flex-column justify-content-start">
                        <a class="text-body mb-2" href="index.php"><i class="bi bi-arrow-right text-primary me-2"></i>Home</a>
                        <a class="text-body mb-2" href="clinics.php"><i class="bi bi-arrow-right text-primary me-2"></i>Vet Clinics</a>
                        <a class="text-body mb-2" href="index.php#services"><i class="bi bi-arrow-right text-primary me-2"></i>Our Services</a>
                        <a class="text-body mb-2" href="pricing.php"><i class="bi bi-arrow-right text-primary me-2"></i>Pricing</a>
                        <a class="text-body mb-2" href="about.php"><i class="bi bi-arrow-right text-primary me-2"></i>About Us</a>
                        <a class="text-body mb-2" href="about.php#faqs"><i class="bi bi-arrow-right text-primary me-2"></i>FAQs</a>
                        <a class="text-body" href="contact.php"><i class="bi bi-arrow-right text-primary me-2"></i>Contact Us</a>
                    </div>
                </div>

                <div class="col-lg-4 col-md-6">
                    <h6 class="text-uppercase mt-4 mb-3">Follow Us</h6>
                    <div class="d-flex">
                        <a class="btn btn-outline-primary btn-square me-2" href="#"><i class="bi bi-twitter"></i></a>
                        <a class="btn btn-outline-primary btn-square me-2" href="#"><i class="bi bi-facebook"></i></a>
                        <a class="btn btn-outline-primary btn-square me-2" href="#"><i class="bi bi-linkedin"></i></a>
                        <a class="btn btn-outline-primary btn-square" href="#"><i class="bi bi-instagram"></i></a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="container-fluid bg-dark text-white-50 py-4">
        <div class="container">
            <div class="row g-5">
                <div class="col-md-6 text-center text-md-start">
                    <p class="mb-md-0">&copy; <a class="text-white" href="#">2023 Paws n Pages</a></p>
                </div>
            </div>
        </div>
    </div>
    <!-- FINAL Footer End -->

    <!-- Back to Top -->
    <a href="#" class="btn btn-primary py-3 fs-4 back-to-top"><i class="bi bi-arrow-up"></i></a>


    <!-- JavaScript Libraries -->
    <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="lib/easing/easing.min.js"></script>
    <script src="lib/waypoints/waypoints.min.js"></script>
    <script src="lib/owlcarousel/owl.carousel.min.js"></script>

    <!-- Template Javascript -->
    <script src="js/main.js"></script>

    <script>
        const searchInput = document.getElementById('searchInput');
        const faqItems = document.getElementsByClassName('faq-item');

        searchInput.addEventListener('input', () => {
            const searchValue = searchInput.value.toLowerCase();

            for (const item of faqItems) {
                const question = item.querySelector('.faq-question').textContent.toLowerCase();
                const answer = item.querySelector('.faq-answer').textContent.toLowerCase();

                if (question.includes(searchValue) || answer.includes(searchValue)) {
                    item.style.display = 'block';
                } else {
                    item.style.display = 'none';
                }
            }
        });

        document.addEventListener('click', (event) => {
            if (event.target.classList.contains('faq-question')) {
                event.target.parentNode.classList.toggle('show-answer');
            }
        });
    </script>
    <script src="script.js"></script>
</body>

</html>