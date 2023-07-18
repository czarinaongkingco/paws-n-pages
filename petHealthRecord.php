<?php

//database connection  file
include('connection.php');

$petID = $_GET['petid'];

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>Paws N Pages | Pet Health Record</title>
    <link rel="icon" href="https://media.discordapp.net/attachments/1112075552669581332/1113455947420024832/icon.png" type="image/x-icon">

    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <meta content="Free HTML Templates" name="keywords">
    <meta content="Free HTML Templates" name="description">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto|Varela+Round">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>

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
        /* Style the tab */
        .tab {
            overflow: auto;
            border: 1px solid #ccc;
            background-color: #f1f1f1;
            border-radius: 15px 15px 0px 0px;
        }

        /* Style the buttons inside the tab */
        .tab button {
            background-color: inherit;
            float: left;
            border: none;
            outline: none;
            cursor: pointer;
            padding: 14px 16px;
            transition: 0.3s;
            font-size: 17px;
        }

        /* Change background color of buttons on hover */
        .tab button:hover {
            background-color: #ddd;
        }

        /* Create an active/current tablink class */
        .tab button.active {
            background-color: #80b434;
            color: white;
        }

        /* Style the tab content */
        .tabcontent {
            display: none;
            padding: 6px 12px;
            border: 1px solid #ccc;
            border-top: none;
        }

        .card-body {
            display: none;
        }
    </style>

    <script type="text/javascript">
        function preview() {
            image.src = URL.createObjectURL(event.target.files[0]);
        }

        function previewFile(input) {
            var file = $("input[type=file]").get(0).files[0];

            if (file) {
                var reader = new FileReader();

                reader.onload = function() {
                    $("#image").attr("src", reader.result);
                }

                reader.readAsDataURL(file);
            }
        }
    </script>
    <script>
        $(document).ready(function() {
            var table = $('#vaccine').DataTable({
                order: [
                    [6, 'asc']
                ],
            });
        });

        $(document).ready(function() {
            var table = $('#assessment').DataTable({
                order: [
                    [1, 'desc']
                ],
            });
        });
    </script>
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
                <a href="about.php" class="nav-item nav-link">About Us</a>

                <?php if ($_SESSION["id"] > 0) { ?>
                    <a href="userProfile.php" class="nav-item nav-link active">Profile</a>
                    <a href="logout.php" class="nav-item nav-link">Logout
                        <i class="bi bi-arrow-right"></i>
                        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                    </a>


                <?php } else { ?>

                    <a href="login.php" class="nav-item nav-link">Login</a>
                    <a href="vet-or-pet.php" class="nav-item nav-link nav-contact bg-primary text-white px-5 ms-lg-5">JOIN
                        US
                        <i class="bi bi-arrow-right"></i>
                    </a>

                <?php } ?>


            </div>
        </div>
    </nav>
    <!-- Navbar End -->

    <!-- START OF PET HEALTH RECORD -->
    <br>
    <div class="border-start border-5 border-primary ps-5 mb-5">
        <h2 class="text-primary text-uppercase"><b>⚕️Pet Health Record</b></h2>
    </div>
    <div style="padding-right:30px; padding-left:30px;">
        <div class="row">
            <div class="col-xl-12">
                <div class="card mb-4 mb-xl-0" style="border-radius: 15px;" id="vaccine_tab" name="tab">
                    <div class="tab">
                        <button id="v_tab" class="tablinks active" onclick="showContent('content1', this)">Vaccine</button>
                        <button id="ha_tab" class="tablinks" onclick="showContent('content2', this)">Health
                            Assessment</button>
                    </div>
                    <!-- START OF VACCINE RECORD -->
                    <div class="card-body " id="content1">
                        <table class="table table-striped table-hover" style="border:0px;" id="vaccine">
                            <thead style="border:0px;">
                                <tr class="table100-head">
                                    <th class="column1" style="border:0px; color:#80b434;">Name</th>
                                    <th class="column1" style="border:0px; color:#80b434;">Brand</th>
                                    <th class="column1" style="border:0px; color:#80b434;">Description</th>
                                    <th class="column1" style="border:0px; color:#80b434;">Dosage</th>
                                    <th class="column1" style="border:0px; color:#80b434;">Lot #</th>
                                    <th class="column1" style="border:0px; color:#80b434;">Date Vaccinated</th>
                                    <th class="column1" style="border:0px; color:#80b434;">Expiration Date</th>
                                    <th class="column1" style="border:0px; color:#80b434;">Vaccinator</th>
                                    <th class="column1" style="border:0px; color:#80b434;">Clinic</th>
                                    <!-- <th class="column1">Edit/Delete</th> -->
                                </tr>
                            </thead>
                            <tbody style="border:0px;">
                                <?php
                                $ret = mysqli_query($con, "SELECT * FROM petvaccine WHERE PetID='$petID'");
                                $cnt = 1;
                                $row = mysqli_num_rows($ret);
                                if ($row > 0) {
                                    while ($row = mysqli_fetch_array($ret)) {

                                ?>
                                        <!--Fetch the Records -->
                                        <tr style="border:0px;">
                                            <td style="border:0px;">
                                                <?php echo $row['VaccineName'] ?>
                                            </td>
                                            <td style="border:0px;">
                                                <?php echo $row['Brand']; ?>
                                            </td>
                                            <td style="border:0px;">
                                                <?php echo $row['Description']; ?>
                                            </td>
                                            <td style="border:0px;">
                                                <?php echo $row['Dosage']; ?>
                                            </td>
                                            <td style="border:0px;">
                                                <?php echo $row['LotNo']; ?>
                                            </td>
                                            <td style="border:0px;">
                                                <?php echo $row['DateVaccinated']; ?>
                                            </td>
                                            <td style="border:0px;">
                                                <?php echo $row['ExpirationDate']; ?>
                                            </td>
                                            <td style="border:0px;">
                                                <?php echo $row['Vaccinator']; ?>
                                            </td>


                                            <?php
                                            $clinic = $row['ClinicID'];
                                            $ret1 = mysqli_query($con, "SELECT * FROM clinics WHERE ClinicID='$clinic'");
                                            $cnt1 = 1;
                                            $row1 = mysqli_num_rows($ret1);
                                            if ($row1 > 0) {
                                                while ($row1 = mysqli_fetch_array($ret1)) {

                                            ?>

                                                    <td style="border:0px;">
                                                        <?php echo $row1['ClinicName']; ?>
                                                    </td>


                                            <?php }
                                            } ?>

                                            <!-- <td style="text-align: center;">
                                        <a href="inventory_management_edit.php?editid=<?php echo htmlentities($row['SupplyID']); ?>" class="edit" title="Edit" data-toggle="tooltip"><i class="material-icons" style="color:dodgerblue;">&#xE254;</i></a>
                                        <a href="inventory_management.php?delid=<?php echo ($row['SupplyID']); ?>" class="delete" title="Delete" data-toggle="tooltip" onclick="return confirm('Delete item?');"><i class="material-icons" style="color:firebrick;">&#xE872;</i></a>
                                    </td> -->
                                        </tr>
                                    <?php
                                        $cnt = $cnt + 1;
                                    }
                                } else { ?>
                                    <tr>
                                        <th style="text-align:center; color:red; border:0px;" colspan="9">No Record Found
                                        </th>
                                        <th style="text-align:center; color:red; border:0px; display:none;">No Record Found
                                        </th>
                                        <th style="text-align:center; color:red; border:0px; display:none;">No Record Found
                                        </th>
                                        <th style="text-align:center; color:red; border:0px; display:none;">No Record Found
                                        </th>
                                        <th style="text-align:center; color:red; border:0px; display:none;">No Record Found
                                        </th>
                                        <th style="text-align:center; color:red; border:0px; display:none;">No Record Found
                                        </th>
                                        <th style="text-align:center; color:red; border:0px; display:none;">No Record Found
                                        </th>
                                        <th style="text-align:center; color:red; border:0px; display:none;">No Record Found
                                        </th>
                                        <th style="text-align:center; color:red; border:0px; display:none;">No Record Found
                                        </th>
                                    </tr>
                                <?php } ?>

                            </tbody>
                        </table>
                    </div>
                    <!-- END OF VACCINE RECORD -->

                    <!-- START OF HEALTH ASSESSMENT RECORD -->
                    <div class="card-body" id="content2">
                        <table class="table table-striped table-hover" style="border:0px;" id="assessment">
                            <thead>
                                <tr class="table100-head">
                                    <th class="column1" style="border:0px; color:#80b434;">Remarks</th>
                                    <th class="column1" style="border:0px; color:#80b434;">Date Assessed</th>
                                    <th class="column1" style="border:0px; color:#80b434;">Assessed By</th>
                                    <th class="column1" style="border:0px; color:#80b434;">Prescription</th>
                                    <th class="column1" style="border:0px; color:#80b434;">Clinic</th>
                                    <!-- <th class="column1">Edit/Delete</th> -->
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                $ret = mysqli_query($con, "SELECT * FROM petassessment WHERE PetID='$petID'");
                                $cnt = 1;
                                $row = mysqli_num_rows($ret);
                                if ($row > 0) {
                                    while ($row = mysqli_fetch_array($ret)) {

                                ?>
                                        <!--Fetch the Records -->
                                        <tr>
                                            <td style="border:0px;">
                                                <?php echo $row['Remarks'] ?>
                                            </td>
                                            <td style="border:0px;">
                                                <?php echo $row['DateAssessed']; ?>
                                            </td>
                                            <td style="border:0px;">
                                                <?php echo $row['AssessedBy']; ?>
                                            </td>
                                            <td style="border:0px;">
                                                <a href="image_upload/<?php echo $row['Prescription']; ?>" target="_blank" download><?php echo $row['Prescription']; ?></a>
                                            </td>

                                            <?php
                                            $clinic = $row['ClinicID'];
                                            $ret1 = mysqli_query($con, "SELECT * FROM clinics WHERE ClinicID='$clinic'");
                                            $cnt1 = 1;
                                            $row1 = mysqli_num_rows($ret1);
                                            if ($row1 > 0) {
                                                while ($row1 = mysqli_fetch_array($ret1)) {

                                            ?>

                                                    <td style="border:0px;">
                                                        <?php echo $row1['ClinicName']; ?>
                                                    </td>


                                            <?php }
                                            } ?>

                                            <!-- <td style="text-align: center;">
                                        <a href="inventory_management_edit.php?editid=<?php echo htmlentities($row['SupplyID']); ?>" class="edit" title="Edit" data-toggle="tooltip"><i class="material-icons" style="color:dodgerblue;">&#xE254;</i></a>
                                        <a href="inventory_management.php?delid=<?php echo ($row['SupplyID']); ?>" class="delete" title="Delete" data-toggle="tooltip" onclick="return confirm('Delete item?');"><i class="material-icons" style="color:firebrick;">&#xE872;</i></a>
                                    </td> -->
                                        </tr>
                                    <?php
                                        $cnt = $cnt + 1;
                                    }
                                } else { ?>
                                    <tr>
                                        <th style="text-align:center; color:red; border:0px;" colspan="5">No Record Found
                                        </th>
                                        <th style="text-align:center; color:red; border:0px; display:none">No Record
                                            Found</th>
                                        <th style="text-align:center; color:red; border:0px; display:none">No Record
                                            Found</th>
                                        <th style="text-align:center; color:red; border:0px; display:none">No Record
                                            Found</th>
                                        <th style="text-align:center; color:red; border:0px; display:none">No Record
                                            Found</th>
                                    </tr>
                                <?php } ?>

                            </tbody>
                        </table>
                    </div>
                </div>
                <!-- END OF VACCINE RECORD -->

            </div>
        </div>
        <br>
        <a class="btn btn-primary py-2" style="width:15%; border-radius: 15px;" href="userProfile.php">Go Back</a>
    </div>
    <!-- END OF PET HEALTH RECORD -->



<!-- FINAL Footer Start -->
    <div class="container-fluid bg-light mt-5 py-5">
        <div class="container pt-5">
            <div class="row g-5">
                <div class="col-lg-4 col-md-6">
                    <h5 class="text-uppercase border-start border-5 border-primary ps-3 mb-4">Get In Touch</h5>
                    <p class="mb-4">If you have inquiries feel free to contact us below<br>
                    <a href="contact.php">Contact Us </a></p>
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

    <!-- For Datatable -->
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.13.4/css/jquery.dataTables.min.css" />
    <script type="text/javascript" src="https://cdn.datatables.net/1.13.4/js/jquery.dataTables.min.js"></script>

    <!-- Template Javascript -->
    <script src="js/main.js"></script>
    <script>
        // FOR TAB LINKS
        function showContent(contentId) {
            // Hide all content elements
            var contentElements = document.getElementsByClassName('card-body');
            for (var i = 0; i < contentElements.length; i++) {
                contentElements[i].style.display = 'none';
            }
            // Show the selected content element
            var selectedContent = document.getElementById(contentId);
            if (selectedContent) {
                selectedContent.style.display = 'block';
                selectedContent.add('active');
            }
            // Add active class to the clicked tab
            tabElement.classList.add('active');
        }

        document.getElementById('content1').style.display = 'block';

        $(document).ready(function() {
            $('.tablinks').on('click', function() {
                $('.tablinks').removeClass('active');
                $(this).addClass('active');
            })
        });
    </script>
</body>

</html>