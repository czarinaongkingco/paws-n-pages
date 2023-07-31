<?php
session_start();
include('config.php');
include('connection.php');

$userID = $_SESSION["id"];
$usertype = $_SESSION['usertype'];

$ret_ca = mysqli_query($con, "SELECT * FROM users, clinics WHERE users.UserID = clinics.UserID AND clinics.UserID='$userID'");
$cnt_ca = 1;
$row_ca = mysqli_fetch_array($ret_ca);

$clinicID = $row_ca['ClinicID'];
$subStat = $row_ca['SubscriptionStatus'];
$subExp = $row_ca['ExpiryDateOfSub'];

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Paws N Pages | Dashboard</title>
    <link rel="icon" href="https://media.discordapp.net/attachments/1112075552669581332/1113455947420024832/icon.png"
        type="image/x-icon">

    <meta content="width=device-width, initial-scale=1.0" name="viewport">

    <meta content="Free HTML Templates" name="keywords">

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

    <!-- Chart JS -->
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <link rel="stylesheet" type="text/css" href="css/admin.css">
    <style>
        .expired {
            width: calc(100% - 250px);
            padding: 30px;
            height: 100vh;
            background-image: url("./img/expired.png");
            background-repeat: no-repeat;
        }

        .evaluated {
            width: calc(100% - 250px);
            padding: 30px;
            height: 100vh;
            background-image: url("./img/evaluated.png");
            background-repeat: no-repeat;
        }

        .inactive {
            width: calc(100% - 250px);
            padding: 30px;
            height: 100vh;
            background-image: url("./img/inactive.png");
            background-repeat: no-repeat;
        }
    </style>

    <!-- FOR DIGITAL TIME AND DATE -->
    <script type="text/javascript">
        function updateClock() {
            var now = new Date();
            var dname = now.getDay(),
                mo = now.getMonth(),
                dnum = now.getDate(),
                yr = now.getFullYear(),
                hou = now.getHours(),
                min = now.getMinutes(),
                sec = now.getSeconds(),
                pe = "AM";

            if (hou >= 12) {
                pe = "PM";
            }
            if (hou == 0) {
                hou = 12;
            }
            if (hou > 12) {
                hou = hou - 12;
            }

            Number.prototype.pad = function (digits) {
                for (var n = this.toString(); n.length < digits; n = 0 + n);
                return n;
            }

            var months = ["January", "February", "March", "April", "May", "June", "July", "Augest", "September", "October", "November", "December"];
            var week = ["Sunday", "Monday", "Tuesday", "Wednesday", "Thursday", "Friday", "Saturday"];
            var ids = ["dayname", "month", "daynum", "year", "hour", "minutes", "seconds", "period"];
            var values = [week[dname], months[mo], dnum.pad(2), yr, hou.pad(2), min.pad(2), sec.pad(2), pe];
            for (var i = 0; i < ids.length; i++)
                document.getElementById(ids[i]).firstChild.nodeValue = values[i];
        }

        function initClock() {
            updateClock();
            window.setInterval("updateClock()", 1);
        }
    </script>
    <script>
        $(document).ready(function () {
            var table = $('#orders').DataTable({
                order: [
                    [2, 'asc']
                ],

            });
        });
        $(".side_bar").css("min-height", $(".main_container").height());
    </script>
</head>

<body onload="initClock()">
    <div style="width:100%; height:50px;" class="aheader">
        <p style="color:white; font-size:23px; padding-left:10px;"><img src="img/logo_white.png"
                height="50px">&nbsp;PawsNPages
            <?php
            $ret = mysqli_query($con, "SELECT * FROM users WHERE UserID='$userID'");
            while ($row = mysqli_fetch_array($ret)) {
                ?>
                <a href="logout.php"
                    style="color:white; font-size:20px; padding-top:10px; float:right; padding-right:15px;"><i
                        class="fa fa-sign-out"></i></a><a
                    style="color:white; font-size:15px; padding-top:13px; float:right; padding-left:10px; padding-right:10px;">Logged
                    in as, <i>
                        <?php echo $row['Username'] ?>
                    </i></a>&nbsp;&nbsp;
            </p>
        <?php } ?>
    </div>
    <div class="wrapper">
        <div class="side_bar">
            <div class="side_bar_bottom">
                <ul>
                    <li class="active">
                        <span class="top_curve"></span>
                        <a href="dashboard.php"><span class="icon"><i class="fa fa-home"></i></span>
                            <span class="item">Dashboard</span></a>
                        <span class="bottom_curve"></span>
                    </li>

                    <?php if ($usertype == 'Clinic Administrator') { ?>
                        <?php if ($subStat != 'Expired' && $subStat != 'Inactive' && $subStat != 'Evaluated') { ?>
                            <li>
                                <span class="top_curve"></span>
                                <a href="clinicadmin.php"><span class="icon"><i class="fa fa-user"></i></span>
                                    <span class="item">Profile</span></a>
                                <span class="bottom_curve"></span>
                            </li>

                            <li>
                                <span class="top_curve"></span>
                                <a href="supplies.php"><span class="icon"><i class="fa fa-tags"></i></span>
                                    <span class="item">Products</span></a>
                                <span class="bottom_curve"></span>
                            </li>

                            <li>
                                <span class="top_curve"></span>
                                <a href="bookings.php"><span class="icon"><i class="fa fa-calendar"></i></span>
                                    <span class="item">Bookings</span></a>
                                <span class="bottom_curve"></span>
                            </li>

                            <li>
                                <span class="top_curve"></span>
                                <a href="orders_admin.php"><span class="icon"><i class="fa fa-truck"></i></span>
                                    <span class="item">Orders</span></a>
                                <span class="bottom_curve"></span>
                            </li>

                            <li>
                                <span class="top_curve"></span>
                                <a href="feedbacks_admin.php"><span class="icon"><i class="fa fa-envelope"></i></span>
                                    <span class="item">Feedback</span></a>
                                <span class="bottom_curve"></span>
                            </li>

                            <li>
                                <span class="top_curve"></span>
                                <a href="services.php"><span class="icon"><i class="fa fa-list"></i></span>
                                    <span class="item">Services</span></a>
                                <span class="bottom_curve"></span>
                            </li>

                            <li>
                                <span class="top_curve"></span>
                                <a href="petsearch.php"><span class="icon"><i class="fa fa-paw"></i></span>
                                    <span class="item">Pet Records</span></a>
                                <span class="bottom_curve"></span>
                            </li>

                        <?php }
                    } ?>

                    <?php if ($usertype == 'Administrator') { ?>

                        <li>
                            <span class="top_curve"></span>
                            <a href="clinicadmin.php"><span class="icon"><i class="fa fa-user"></i></span>
                                <span class="item">Profile</span></a>
                            <span class="bottom_curve"></span>
                        </li>

                        <li>
                            <span class="top_curve"></span>
                            <a href="supplies.php"><span class="icon"><i class="fa fa-tags"></i></span>
                                <span class="item">Products</span></a>
                            <span class="bottom_curve"></span>
                        </li>

                        <li>
                            <span class="top_curve"></span>
                            <a href="bookings.php"><span class="icon"><i class="fa fa-calendar"></i></span>
                                <span class="item">Bookings</span></a>
                            <span class="bottom_curve"></span>
                        </li>

                        <li>
                            <span class="top_curve"></span>
                            <a href="orders_admin.php"><span class="icon"><i class="fa fa-truck"></i></span>
                                <span class="item">Orders</span></a>
                            <span class="bottom_curve"></span>
                        </li>

                        <li>
                            <span class="top_curve"></span>
                            <a href="feedbacks_admin.php"><span class="icon"><i class="fa fa-envelope"></i></span>
                                <span class="item">Feedback</span></a>
                            <span class="bottom_curve"></span>
                        </li>

                        <li>
                            <span class="top_curve"></span>
                            <a href="services.php"><span class="icon"><i class="fa fa-list"></i></span>
                                <span class="item">Services</span></a>
                            <span class="bottom_curve"></span>
                        </li>

                        <li>
                            <span class="top_curve"></span>
                            <a href="petsearch.php"><span class="icon"><i class="fa fa-paw"></i></span>
                                <span class="item">Pet Records</span></a>
                            <span class="bottom_curve"></span>
                        </li>

                        <li>
                            <span class="top_curve"></span>
                            <a href="users.php"><span class="icon"><i class="fa fa-users"></i></span>
                                <span class="item">Users</span></a>
                            <span class="bottom_curve"></span>
                        </li>

                        <li>
                            <span class="top_curve"></span>
                            <a href="clinics_admin.php"><span class="icon"><i class="fa fa-building"></i></span>
                                <span class="item">Clinics</span></a>
                            <span class="bottom_curve"></span>
                        </li>

                        <li>
                            <span class="top_curve"></span>
                            <a href="petbooklet.php"><span class="icon"><i class="fa fa-book"></i></span>
                                <span class="item">Pet Booklet</span></a>
                            <span class="bottom_curve"></span>
                        </li>

                        <li>
                            <span class="top_curve"></span>
                            <a href="reports.php"><span class="icon"><i class="fa fa-exclamation-triangle"></i></span>
                                <span class="item">Reports</span></a>
                            <span class="bottom_curve"></span>
                        </li>
                    <?php } ?>
                </ul>
                <!--digital clock start-->
                <div class="datetime" style="color:white;  text-align:center;">
                    <div class="date">
                        <span id="dayname">Day</span>,
                        <span id="month">Month</span>
                        <span id="daynum">00</span>,
                        <span id="year">Year</span>
                    </div>
                    <div class="time">
                        <span id="hour">00</span>:
                        <span id="minutes">00</span>:
                        <span id="seconds">00</span>
                        <span id="period">AM</span>
                    </div>
                </div>
                <!--digital clock end-->
            </div>
        </div>
        <!-- START OF ADMINISTRATOR -->
        <?php if ($usertype == 'Administrator') { ?>
            <div class="main_container">
                <div class="home-content">
                    <div class="overview-boxes">
                        <div class="box" style=" border-left: solid 5px #B2A4FF; ">
                            <div class="right-side">
                                <div class="box-topic">Users</div>
                                <?php
                                $ret = mysqli_query($con, "SELECT COUNT(*) as NoUsers FROM users");
                                $row = mysqli_num_rows($ret);
                                if ($row > 0) {
                                    while ($row = mysqli_fetch_array($ret)) {
                                        ?>
                                        <div class="number">
                                            <?php echo $row['NoUsers']; ?>
                                        </div>
                                    <?php }
                                } ?>
                            </div>
                            <i class='bx bx-cart-alt cart' style="background-color:#B2A4FF;"><i class="fa fa-user"
                                    style="color:white;"></i></i>
                        </div>
                        <div class="box" style=" border-left: solid 5px #C0F2D8;">
                            <div class="right-side">
                                <div class="box-topic">Clinics</div>
                                <?php
                                $ret = mysqli_query($con, "SELECT COUNT(*) as NoClinics FROM clinics WHERE SubscriptionStatus = 'Active'");
                                $row = mysqli_num_rows($ret);
                                if ($row > 0) {
                                    while ($row = mysqli_fetch_array($ret)) {
                                        ?>
                                        <div class="number">
                                            <?php echo $row['NoClinics']; ?>
                                        </div>
                                    <?php }
                                } ?>
                            </div>
                            <i class='bx bxs-cart-add cart two'><i class="fa fa-building" style="color:white;"
                                    style="color:white;"></i></i>
                        </div>
                        <div class="box" style=" border-left: solid 5px #ffe8b3;">
                            <div class="right-side">
                                <div class="box-topic">Orders</div>
                                <?php
                                $ret = mysqli_query($con, "SELECT COUNT(*) as NoOrders FROM orders WHERE OrderStatus = 'Completed'");
                                $row = mysqli_num_rows($ret);
                                if ($row > 0) {
                                    while ($row = mysqli_fetch_array($ret)) {
                                        ?>
                                        <div class="number">
                                            <?php echo $row['NoOrders']; ?>
                                        </div>
                                    <?php }
                                } ?>
                            </div>
                            <i class='bx bx-cart cart three'><i class="fa fa-truck" style="color:white;"
                                    style="color:white;"></i></i>
                        </div>
                        <div class="box" style=" border-left: solid 5px #f7d4d7;">
                            <div class="right-side">
                                <div class="box-topic">Bookings</div>
                                <?php
                                $ret = mysqli_query($con, "SELECT COUNT(*) as NoBookings FROM appointments WHERE AppointmentStatus = 'Completed'");
                                $row = mysqli_num_rows($ret);
                                if ($row > 0) {
                                    while ($row = mysqli_fetch_array($ret)) {
                                        ?>
                                        <div class="number">
                                            <?php echo $row['NoBookings']; ?>
                                        </div>
                                    <?php }
                                } ?>
                            </div>
                            <i class='bx bxs-cart-download cart four'><i class="fa fa-calendar" style="color:white;"
                                    style="color:white;"></i></i>
                        </div>
                    </div>
                    <div class="row" style="padding-top:20px;">
                        <div class="col-md-8">
                            <div class="card mb-4 mb-xl-0" style="border-radius: 15px;">
                                <div class="card-header userProfile-font"><b>💰 Sales per Clinic</b></div>
                                <div class="card-body text-center">
                                    <canvas id="salesChart" style=" width:100%;"></canvas>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="card mb-4 mb-xl-0" style="border-radius: 15px;">
                                <div class="card-header userProfile-font"><b>👤 Users </b></div>
                                <div class="card-body text-center">
                                    <table class="table table-bordered"
                                        style=" display: block; height: 360px; overflow-y: scroll; width:100%;">
                                        <tbody>
                                            <tr>
                                                <td><b>Name</b></td>
                                            </tr>
                                            <?php
                                            $ret = mysqli_query($con, "SELECT * FROM users");
                                            $cnt = 1;
                                            $row = mysqli_num_rows($ret);
                                            if ($row > 0) {
                                                while ($row = mysqli_fetch_array($ret)) {
                                                    ?>
                                                    <tr>
                                                        <td>
                                                            <?php echo $row['FirstName'] . ' ' . $row['MiddleName'] . ' ' . $row['LastName'] ?>
                                                        </td>
                                                    </tr>
                                                    <?php
                                                    $cnt = $cnt + 1;
                                                }
                                            } else { ?>
                                            <tr style="border:0px;">
                                                <td style="text-align:center; color:red;">No Record Found</td>
                                            </tr>
                                        <?php } ?>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        <?php } ?>
        <!-- END OF ADMINISTRATOR -->

        <!-- For Admin -->
        <?php
        $ret = mysqli_query($con, "SELECT  SUM(orders.TotalPrice) AS TotalSales, clinics.ClinicName FROM orders, clinics WHERE orders.ClinicID = clinics.ClinicID AND orders.OrderStatus='Completed' GROUP BY clinics.ClinicName");
        $row = mysqli_num_rows($ret);
        if ($row > 0) {

            $clinicname = array();
            $sales = array();
            while ($row = mysqli_fetch_array($ret)) {
                $clinicname[] = $row['ClinicName'];
                $sales[] = $row['TotalSales'];
            }
        }

        ?>

        <script type="text/javascript">
            var chartLabels = <?php echo json_encode($clinicname); ?>;
            var chartData = <?php echo json_encode($sales); ?>;

            var ctx = document.getElementById('salesChart').getContext('2d');
            var salesChart = new Chart(ctx, {
                type: 'line',
                data: {
                    labels: chartLabels,
                    datasets: [{
                        data: chartData,
                        borderColor: '#80B434',
                        tension: 0.1,
                        fill: false,
                        borderWidth: 3
                    }]
                },
                options: {
                    plugins: {
                        legend: {
                            display: false
                        },
                    },
                    scales: {
                        y: {
                            ticks: {
                                // Include a dollar sign in the ticks
                                callback: function (value, index, ticks) {
                                    return '₱ ' + Chart.Ticks.formatters.numeric.apply(this, [value, index, ticks]);
                                }
                            }
                        }
                    }
                }
            });
        </script>


        <!-- START OF CLINIC ADMINISTRATOR -->
        <?php if ($usertype == 'Clinic Administrator') { ?>

            <?php if ($subStat == 'Expired') { ?>
                <div class="expired">
                    <div class="row">
                        <div class="col-5 text-center" style="padding-top:220px;">
                            <h1 class="text-uppercase text-primary">Subscription Expired</h1>
                            <p style="color:gray;">Your subscription has expired on <b>
                                    <?php echo date('F j, Y', strtotime($subExp)) ?>
                                </b>. <br>To regain access to the system's functionalities, please renew your subscription by
                                clicking the button below.</p><br>
                            <button class="btn btn-primary" data-toggle="modal" data-target="#renew_modal"
                                style="height:60px; width:300px; font-size: 20px; border-radius:15px;">RENEW SUBSCRIPTION
                            </button>
                        </div>
                        <div class="col-7"></div>
                    </div>
                </div>
            <?php } ?>

            <?php if ($subStat == 'Evaluated') { ?>
                <div class="evaluated">
                    <div class="row">
                        <div class="col-5 text-center" style="padding-top:220px;">
                            <h1 class="text-uppercase" style="color: #074814;">account have been evaluated</h1>
                            <p style="color:gray; padding-top:15px;">Your business requirements have been evaluated. Please
                                click the
                                button below to proceed with the payment.</p> <br>
                            <button class="btn btn-primary" data-toggle="modal" data-target="#payment_modal"
                                style="height:60px; width:300px; font-size: 20px; border-radius:15px; background-color:#245e1c;">PAY
                                NOW
                            </button>
                        </div>
                        <div class="col-7"></div>
                    </div>
                </div>
            <?php } ?>

            <?php if ($subStat == 'Inactive') { ?>
                <div class="inactive">
                    <div class="row">
                        <div class="col-5 text-center" style="padding-top:220px;">
                            <h1 class="text-uppercase" style="color: #FF914D;">account is inactive</h1>
                            <p style="color:gray; padding-top:15px;">Your account is still inactive. Please reach out to <b>
                                    pawsnpages.site@gmail.com </b> to process your subscription.</p><br>
                        </div>
                        <div class="col-7"></div>
                    </div>
                </div>
            <?php } ?>

            <?php if ($subStat == 'Active') { ?>
                <div class="main_container">
                    <div class="home-content">
                        <div class="overview-boxes">
                            <div class="box" style=" border-left: solid 5px #C0F2D8;">
                                <div class="right-side">
                                    <div class="box-topic">Products</div>
                                    <?php
                                    $ret = mysqli_query($con, "SELECT COUNT(*) as NoSupplies FROM clinics, petsupplies WHERE petsupplies.ClinicID = clinics.ClinicID AND petsupplies.ClinicID = '$clinicID'");
                                    $row = mysqli_num_rows($ret);
                                    if ($row > 0) {
                                        while ($row = mysqli_fetch_array($ret)) {
                                            ?>
                                            <div class="number">
                                                <?php echo $row['NoSupplies']; ?>
                                            </div>
                                        <?php }
                                    } ?>
                                </div>
                                <i class='bx bxs-cart-add cart two'><i class="fa fa-tag" style="color:white;"
                                        style="color:white;"></i></i>
                            </div>
                            <div class="box" style=" border-left: solid 5px #B2A4FF;">
                                <div class="right-side">
                                    <div class="box-topic">Services</div>
                                    <?php
                                    $ret = mysqli_query($con, "SELECT COUNT(*) as  NoServices FROM clinics, services WHERE services.ClinicID = clinics.ClinicID AND services.ClinicID = '$clinicID'");
                                    $row = mysqli_num_rows($ret);
                                    if ($row > 0) {
                                        while ($row = mysqli_fetch_array($ret)) {
                                            ?>
                                            <div class="number">
                                                <?php echo $row['NoServices']; ?>
                                            </div>
                                        <?php }
                                    } ?>
                                </div>
                                <i class='bx bx-cart-alt cart' style="background-color:#B2A4FF;"><i class="fa fa-list"
                                        style="color:white;"></i></i>
                            </div>
                            <div class="box" style=" border-left: solid 5px #ffe8b3;">
                                <div class="right-side">
                                    <div class="box-topic">Orders</div>
                                    <?php
                                    $ret = mysqli_query($con, "SELECT COUNT(*) as NoOrders FROM orders, clinics WHERE orders.ClinicID = clinics.ClinicID AND orders.ClinicID = '$clinicID' AND OrderStatus = 'Completed'");
                                    $row = mysqli_num_rows($ret);
                                    if ($row > 0) {
                                        while ($row = mysqli_fetch_array($ret)) {
                                            ?>
                                            <div class="number">
                                                <?php echo $row['NoOrders']; ?>
                                            </div>
                                        <?php }
                                    } ?>
                                </div>
                                <i class='bx bx-cart cart three'><i class="fa fa-truck" style="color:white;"
                                        style="color:white;"></i></i>
                            </div>
                            <div class="box" style=" border-left: solid 5px #f7d4d7;">
                                <div class="right-side">
                                    <div class="box-topic">Bookings</div>
                                    <?php
                                    $ret = mysqli_query($con, "SELECT COUNT(*) as NoBookings FROM appointments, clinics WHERE appointments.ClinicID = clinics.ClinicID AND appointments.ClinicID = '$clinicID' AND AppointmentStatus = 'Completed'");
                                    $row = mysqli_num_rows($ret);
                                    if ($row > 0) {
                                        while ($row = mysqli_fetch_array($ret)) {
                                            ?>
                                            <div class="number">
                                                <?php echo $row['NoBookings']; ?>
                                            </div>
                                        <?php }
                                    } ?>
                                </div>
                                <i class='bx bxs-cart-download cart four'><i class="fa fa-calendar" style="color:white;"
                                        style="color:white;"></i></i>
                            </div>
                        </div>
                        <div class="row" style="padding-top:20px;">
                            <div class="col-md-10">
                                <div class="card mb-4 mb-xl-0" style="border-radius: 15px;">
                                    <div class="card-header userProfile-font"><b>💰 Monthly Sales</b></div>
                                    <div class="card-body text-center">
                                        <canvas id="MSales" style=" width:100%;"></canvas>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-2">
                                <div class="card mb-4 mb-xl-0" style="border-radius: 15px;">
                                    <div class="card-header userProfile-font"><b>🔔 Subscription</b></div>
                                    <div class="card-body text-center">
                                        <table class="table table-bordered" style=" display: block; height: 319px;">
                                            <tbody>
                                                <?php
                                                $ret = mysqli_query($con, "SELECT * FROM clinics WHERE clinicID = '$clinicID'");
                                                $cnt = 1;
                                                $row = mysqli_num_rows($ret);
                                                if ($row > 0) {
                                                    while ($row = mysqli_fetch_array($ret)) {
                                                        ?>

                                                        <tr>
                                                            <td><b>Subscription Type</b></td>
                                                        </tr>
                                                        <tr>
                                                            <td>
                                                                <?php echo $row['SubscriptionType'] ?>
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td><b>Subsctiption Status</b></td>
                                                        </tr>
                                                        <tr>
                                                            <td>
                                                                <?php $status = $row['SubscriptionStatus'];
                                                                if ($status === 'Inactive') { ?><a
                                                                    style="color:white; font-size:12px; padding: 5px 10px;  border-radius:10px; background-color:#A52A2A;">
                                                                    <?php echo $row['SubscriptionStatus']; ?>
                                                                </a>
                                                            <?php }
                                                                if ($status === 'Active') { ?><a
                                                                style="color:white; font-size:12px; padding: 5px 15px;  border-radius:10px; background-color:#228B22;">
                                                                <?php echo $row['SubscriptionStatus']; ?>
                                                            </a>
                                                        <?php } ?>
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td><b>Date of Expiration</b></td>
                                                        </tr>
                                                        <tr>
                                                            <td>
                                                                <?php echo $row['ExpiryDateOfSub'] ?>
                                                            </td>
                                                        </tr>
                                                    <?php }
                                                } ?>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            <?php }
        } ?>
        <!-- END OF CLINIC ADMINISTRATOR -->

        <!-- START OF MODAL FOR RENEWING SUBSCRIPTION -->
        <div class="modal fade" id="renew_modal" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content" style="border-radius: 15px;">
                    <form method="POST" enctype="multipart/form-data">
                        <div class="modal-header modal-header-success" runat="server">
                            <h3 class="modal-title">Renew Subscription</h3>
                        </div>
                        <div class="modal-body">
                            <div class="col-md-2"></div>
                            <div class="col-md-12">

                                <div class="form-group">
                                    <label>Upload DTI Certificate of Registration</label>
                                    <input type="file" name="CertReg" style="border-radius:15px;" class="form-control"
                                        required />
                                </div>
                                <div class="form-group">
                                    <label>Upload Business Permit</label>
                                    <input type="file" name="BPermit" style="border-radius:15px;" class="form-control"
                                        required />
                                </div>
                                <div class="form-group">
                                    <label>Upload DTI Registered Business Name</label>
                                    <input type="file" name="RegName" style="border-radius:15px;" class="form-control"
                                        required />
                                </div>
                                <div class="form-group">
                                    <label>Subscription Type</label>
                                    <select name="subtype" id="subtype" class="bg-light border-3 px-4 py-3"
                                        style="border-radius:15px; border-color:#ced4da; height:40%; width: 100%;"
                                        required>
                                        <option disabled selected>-- Select an option --</option>
                                        <option value="Monthly">Monthly</option>
                                        <option value="Annually">Annually</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div style="clear:both;"></div>
                        <div class="modal-footer">
                            <button name="update" type="submit" class="btn btn-primary"
                                style="border-radius: 15px;"><span class="glyphicon glyphicon-edit"></span>
                                Submit</button>
                            <button class="btn btn-danger" type="button" data-dismiss="modal"
                                style="border-radius: 15px;"><span class="glyphicon glyphicon-remove"></span>
                                Close</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <!-- END OF MODAL FOR RENEWING SUBSCRIPTION-->

        <!-- START OF MODAL FOR PAYMENT OF SUSBCRIPTION -->
        <div class="modal fade" id="payment_modal" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content" style="border-radius: 15px;">
                    <form method="POST" enctype="multipart/form-data" runat="server">
                        <div class="modal-header">
                            <h3 class="modal-title">Payment</h3>
                        </div>
                        <div class="modal-body">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label>Amount to Pay</label>
                                    <input type="text" id="amount" name="amount" style="border-radius: 15px;"
                                        class="form-control" readonly />
                                </div>
                                <div class="form-group">
                                    <label>Paws N Pages QR Code</label><br />
                                    <center>
                                        <img id="image"
                                            src="https://media.discordapp.net/attachments/1112075552669581332/1123236171829481552/4F28300A-EFF2-4FF4-B119-6A751AC8261B.jpg?width=630&height=630"
                                            width="100%" />
                                    </center>
                                </div>
                                <br>
                                <div class="form-group">
                                    <label>Proof of Payment</label><br />
                                    <input type="file" name="proof_payment" style="border-radius: 15px;"
                                        class="form-control" accept="image/*,.doc, .docx,.pdf" required>
                                </div>
                                <br>
                                <div class="form-group">
                                    <label>Reference Number of Payment</label>
                                    <input type="text" name="ref_no" style="border-radius: 15px;" class="form-control"
                                        required />
                                </div>

                                <br>
                                <div class="form-group">
                                    <label style="font-style: italic; font-size: 18px;">*Please wait for the approval of
                                        your payment after submitting the form.</label>
                                </div>

                            </div>
                        </div>
                        <div style="clear:both;"></div>
                        <div class="modal-footer">
                            <button name="add_booklet" class="btn btn-primary" style="border-radius: 15px;"><span
                                    class="glyphicon glyphicon-save"></span>
                                Submit</button>
                            <button class="btn btn-danger" type="button" data-dismiss="modal"
                                style="border-radius: 15px;"><span class="glyphicon glyphicon-remove"></span>
                                Cancel</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <!-- END OF MODAL FOR PAYMENT OF SUSBCRIPTION -->

        <!-- FOR SUBMISSION OF SUBSCRIPTION RENEWAL-->
        <?php
        if (isset($_POST['update'])) {
            // DTI Certificate of Registration
            $file2 = $_FILES['CertReg']['name'];
            $tempfile2 = $_FILES['CertReg']['tmp_name'];
            $folder2 = "clinic_verification/" . $file2;

            move_uploaded_file($tempfile2, $folder2);

            // Business Permit
            $file3 = $_FILES['BPermit']['name'];
            $tempfile3 = $_FILES['BPermit']['tmp_name'];
            $folder3 = "clinic_verification/" . $file3;

            move_uploaded_file($tempfile3, $folder3);

            // DTI Registered Business Name
            $file4 = $_FILES['RegName']['name'];
            $tempfile4 = $_FILES['RegName']['tmp_name'];
            $folder4 = "clinic_verification/" . $file4;

            move_uploaded_file($tempfile4, $folder4);

            // For Subscription No
            $code = 'PNPSUB';
            $sequence = rand(00000, 99999);
            $sub_no = $code . $sequence;

            $subType = $_POST['subtype'];
            $subStatus = 'Inactive';

            $query = mysqli_query($con, "UPDATE clinics SET BusinessPermit='$file3', BusinessNameReg='$file4', CertificateOFReg='$file2', SubscriptionType='$subType', SubscriptionNo='$sub_no', SubscriptionStatus='$subStatus' WHERE ClinicID='$clinicID'");

            if ($query) {
                echo '<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>';
                echo '<script>';
                echo 'swal({
                                                title: "Success",
                                                text: "You have successfully applied for a renewal of your subscription",
                                                icon: "success",
                                                html: true,
                                                showCancelButton: true,
                                                })
                                                    .then((willDelete) => {
                                                        if (willDelete) {
                                                        
                                                            document.location ="dashboard.php";
                                                        }
                                                    })';
                echo '</script>';
            } else {
                echo "<script>alert('Something Went Wrong. Please try again');</script>";
            }
        }
        ?>

        <!-- For Clinic Admin -->
        <?php
        $ret = mysqli_query($con, "SELECT MONTHNAME(orders.DateTimeCheckedOut) AS Month, SUM(orders.TotalPrice) AS Sales, clinics.ClinicName AS Clinic FROM orders, clinics WHERE orders.ClinicID = clinics.ClinicID AND orders.ClinicID = '$clinicID' AND orders.OrderStatus = 'Completed' GROUP BY Month, orders.ClinicID, clinics.ClinicID ORDER BY MONTH(orders.DateTimeCheckedOut) ASC");
        $row = mysqli_num_rows($ret);
        if ($row > 0) {

            $month = array();
            $tsales = array();
            while ($row = mysqli_fetch_array($ret)) {
                $month[] = $row['Month'];
                $tsales[] = $row['Sales'];
            }
        }

        ?>

        <script type="text/javascript">
            var Month = <?php echo json_encode($month); ?>;
            var MSale = <?php echo json_encode($tsales); ?>;

            var ctx = document.getElementById('MSales').getContext('2d');
            var salesChart = new Chart(ctx, {
                type: 'line',
                data: {
                    labels: Month,
                    datasets: [{
                        data: MSale,
                        borderColor: '#80B434',
                        tension: 0.1,
                        fill: false,
                        borderWidth: 3
                    }]
                },
                options: {
                    plugins: {
                        legend: {
                            display: false
                        },
                    },
                    scales: {
                        y: {
                            ticks: {
                                // Include a dollar sign in the ticks
                                callback: function (value, index, ticks) {
                                    return '₱ ' + Chart.Ticks.formatters.numeric.apply(this, [value, index, ticks]);
                                }
                            }
                        }
                    }
                }
            });
        </script>


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

        <!-- Latest compiled and minified JavaScript (needed for editing details on a tabled list of data) -->
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"
            integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa"
            crossorigin="anonymous"></script>

        <!-- To show details when editing -->
        <script>
            $('#edit_service').on('show.bs.modal', function (e) {
                var opener = e.relatedTarget;

                var serviceid = $(opener).attr('serviceid');
                var servicename = $(opener).attr('servicename');
                var servicedescription = $(opener).attr('servicedescription');
                var serviceprice = $(opener).attr('serviceprice');

                $('#edit_service').find('[name="ServiceID"]').val(serviceid);
                $('#edit_service').find('[name="ServiceName"]').val(servicename);
                $('#edit_service').find('[name="ServiceDescription"]').val(servicedescription);
                $('#edit_service').find('[name="Price"]').val(serviceprice);

                endResize();
            });

            function endResize() {
                $(window).off("resize", resizer);
            }
        </script>

</body>

</html>