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
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <title>Paws N Pages | Products</title>
    <meta charset="UTF-8">
    <link rel="icon" href="https://media.discordapp.net/attachments/1112075552669581332/1113455947420024832/icon.png" type="image/x-icon">
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
    <link rel="stylesheet" type="text/css" href="css/admin.css">

    <style>
        a {
            color: #245e1c;
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

            Number.prototype.pad = function(digits) {
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
        $(document).ready(function() {
            var table = $('#supplies').DataTable({
                order: [
                    [3, 'asc']
                ],
            });
        });
        $(".side_bar").css("min-height", $(".main_container").height());
    </script>

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

    <script type="text/javascript">
        function isNumberKey(txt, evt) {
            var charCode = (evt.which) ? evt.which : evt.keyCode;
            if (charCode == 46) {
                //Check if the text already contains the . character
                if (txt.value.indexOf('.') === -1) {
                    return true;
                } else {
                    return false;
                }
            } else {
                if (charCode > 31 &&
                    (charCode < 48 || charCode > 57))
                    return false;
            }
            return true;
        }
    </script>

    <script>
        $(document).ready(function() {

            $('.edit').on('click', function() {

                $('#edit_modal').modal('show');

                $tr = $(this).closest('tr');

                var data = $tr.children("td").map(function() {
                    return $(this).text();
                }).get();

                console.log(data);

                $('#update_id').val(data[1]);
                $('#SupplyName').val(data[2]);
                $('#SupplyDescription').val(data[3]);
                $('#SupplyPrice').val(data[4]);
                $('#Stocks').val(data[5]);
                $('#NeedPrescription').val(data[6]);
            });
        });
    </script>
</head>

<body onload="initClock()">
    <div style="width:100%; height:50px;" class="aheader">
        <p style="color:white; font-size:23px; padding-left:10px;"><img src="img/logo_white.png" height="50px">&nbsp;PawsNPages
            <?php
            $ret = mysqli_query($con, "SELECT * FROM users WHERE UserID='$userID'");
            while ($row = mysqli_fetch_array($ret)) {
            ?>
                <a href="logout.php" style="color:white; font-size:20px; padding-top:10px; float:right; padding-right:15px;"><i class="fa fa-sign-out"></i></a><a style="color:white; font-size:15px; padding-top:13px; float:right; padding-left:10px; padding-right:10px;">Logged in as, <i><?php echo $row['Username'] ?></i></a>&nbsp;&nbsp;
        </p>
    <?php } ?>
    </div>
    <div class="wrapper">
        <div class="side_bar">

            <div class="side_bar_bottom">
                <ul>
                    <li>
                        <span class="top_curve"></span>
                        <a href="dashboard.php"><span class="icon"><i class="fa fa-home"></i></span>
                            <span class="item">Dashboard</span></a>
                        <span class="bottom_curve"></span>
                    </li>

                    <li>
                        <span class="top_curve"></span>
                        <a href="clinicadmin.php"><span class="icon"><i class="fa fa-user"></i></span>
                            <span class="item">Profile</span></a>
                        <span class="bottom_curve"></span>
                    </li>

                    <li class="active">
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

                    <?php if ($usertype == 'Administrator') { ?>
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

        <?php if ($usertype == 'Administrator') { ?>

            <div class="main_container">
                <div style="padding-right:30px; padding-left:30px; padding-top:10px;">
                    <div class="card mb-4 mb-xl-0" style="border-radius: 15px;">
                        <div class="card-header userProfile-font">
                            <b style="padding-top:10px;">🏷️ Products</b>
                        </div>
                        <div class="card-body text-center">
                            <table class="table table-striped table-hover" style="border: 0px; text-align: left;" id="supplies">
                                <thead>
                                    <tr class="table100-head">
                                        <th class="column1" style="border:0px; color:#245e1c;">Product Name</th>
                                        <th class="column1" style="border:0px; color:#245e1c;">Clinic Name</th>
                                        <th class="column1" style="border:0px; color:#245e1c;">Price</th>
                                        <th class="column1" style="border:0px; color:#245e1c;">Stocks</th>
                                        <th class="column1" style="border:0px; color:#245e1c;">Needs Prescription</th>
                                        <th class="column1" style="border:0px; color:#245e1c; text-align: center;">View</th>
                                    </tr>
                                </thead>

                                <tbody style="border:0px;">
                                    <?php
                                    $ret = mysqli_query($con, "SELECT * FROM petsupplies, clinics WHERE petsupplies.clinicID = clinics.ClinicID");
                                    $cnt = 1;
                                    $row = mysqli_num_rows($ret);
                                    if ($row > 0) {
                                        while ($row = mysqli_fetch_array($ret)) {

                                    ?>
                                            <!--Fetch the Records -->
                                            <tr border:0px;>
                                                <td style="border:0px; width: 30%;"><a href="" asupply-id="<?php echo $row['SupplyID'] ?>" asupply-clinic="<?php echo $row['ClinicName'] ?>" asupply-image="<?php echo $row['SupplyImage'] ?>" asupply-name="<?php echo $row['SupplyName'] ?>" asupply-desc="<?php echo $row['SupplyDescription'] ?>" asupply-price="<?php echo $row['SupplyPrice'] ?>" astocks="<?php echo $row['Stocks'] ?>" aneed-presc="<?php echo $row['NeedPrescription'] ?>" class="edit" data-toggle="modal" data-target="#view_modal"><?php echo $row['SupplyName']; ?></a></td>
                                                <td style="border:0px;"><?php echo $row['ClinicName']; ?></td>
                                                <td style="border:0px; width: 20%;">₱ <?php echo $row['SupplyPrice']; ?></td>
                                                <td style="border:0px;"><?php echo $row['Stocks']; ?></td>
                                                <td style="border:0px;"><?php echo $row['NeedPrescription']; ?></td>
                                                <td style="border:0px; text-align: center;">
                                                    <a href="" asupply-id="<?php echo $row['SupplyID'] ?>" asupply-clinic="<?php echo $row['ClinicName'] ?>" asupply-image="<?php echo $row['SupplyImage'] ?>" asupply-name="<?php echo $row['SupplyName'] ?>" asupply-desc="<?php echo $row['SupplyDescription'] ?>" asupply-price="<?php echo $row['SupplyPrice'] ?>" astocks="<?php echo $row['Stocks'] ?>" aneed-presc="<?php echo $row['NeedPrescription'] ?>" class="edit" data-toggle="modal" data-target="#view_modal">
                                                        <i class="fa fa-eye"></i>
                                                    </a>
                                                </td>
                                            </tr>
                                        <?php
                                            $cnt = $cnt + 1;
                                        }
                                    } else { ?>
                                        <tr style="border:0px;">
                                            <td style="text-align:center; color:red; border:0px;" colspan="5">No Record Found</td>
                                            <td style="text-align:center; color:red; border:0px; display:none;" colspan="0"></td>
                                            <td style="text-align:center; color:red; border:0px; display:none;" colspan="0"></td>
                                            <td style="text-align:center; color:red; border:0px; display:none;" colspan="0"></td>
                                            <td style="text-align:center; color:red; border:0px; display:none;" colspan="0"></td>
                                        </tr>
                                    <?php } ?>

                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>

        <?php } ?>

        <?php if ($usertype == 'Clinic Administrator') { ?>

            <div class="main_container">
                <div style="padding-right:30px; padding-left:30px; padding-top:10px;">
                    <div class="card mb-4 mb-xl-0" style="border-radius: 15px;">
                        <div class="card-header userProfile-font">
                            <b style="padding-top:10px;">🏷️ Products</b>
                            <button class="btn btn-primary" type="button" data-toggle="modal" data-target="#form_modal" style="float:right; width:5%; height: 35px; border-radius: 15px; padding: 0;">ADD</button>
                        </div>
                        <div class="card-body text-center">
                            <table class="table table-striped table-hover" style="border: 0px; text-align: left;" id="supplies">
                                <thead>
                                    <tr class="table100-head">
                                        <th class="column1" style="border:0px; display:none;">SupplyID</th>
                                        <th class="column1" style="border:0px; ">Product Name</th>
                                        <th class="column1" style="border:0px;">Price</th>
                                        <th class="column1" style="border:0px;">Stocks</th>
                                        <th class="column1" style="border:0px;">Needs Prescription</th>
                                        <th class="column1" style="border:0px; text-align: center;">Action</th>
                                    </tr>
                                </thead>

                                <tbody style="border:0px;">
                                    <?php
                                    $ret = mysqli_query($con, "SELECT * FROM petsupplies WHERE ClinicID='$clinicID'");
                                    $cnt = 1;
                                    $row = mysqli_num_rows($ret);
                                    if ($row > 0) {
                                        while ($row = mysqli_fetch_array($ret)) {

                                    ?>
                                            <!--Fetch the Records -->
                                            <tr border:0px;>
                                                <td style="border:0px; display:none;" name="SupplyID" id="SupplyID"><?php echo $row['SupplyID']; ?></td>
                                                <td style="border:0px; width: 40%;"><?php echo $row['SupplyName']; ?></td>
                                                <td style="border:0px; width: 20%">₱ <?php echo $row['SupplyPrice']; ?></td>
                                                <td style="border:0px;"><?php echo $row['Stocks']; ?></td>
                                                <td style="border:0px;"><?php echo $row['NeedPrescription']; ?></td>
                                                <td style="text-align: center; border:0px;">
                                                    <a href="" supply-id="<?php echo $row['SupplyID'] ?>" supply-image="<?php echo $row['SupplyImage'] ?>" supply-name="<?php echo $row['SupplyName'] ?>" supply-desc="<?php echo $row['SupplyDescription'] ?>" supply-price="<?php echo $row['SupplyPrice'] ?>" stocks="<?php echo $row['Stocks'] ?>" need-presc="<?php echo $row['NeedPrescription'] ?>" class="edit" data-toggle="modal" data-target="#edit_modal"><i class="fa fa-edit"></i></a>
                                                    <button class="delete_product" name="delete_product" value="<?php echo $row['SupplyID'] ?>" style="border:0px; background-color:inherit; display: none;"><i class="fa fa-trash" style="color:red;"></i></button>
                                                </td>
                                            </tr>
                                        <?php
                                            $cnt = $cnt + 1;
                                        }
                                    } else { ?>
                                        <tr style="border:0px;">
                                            <td style="text-align:center; color:red; border:0px;" colspan="6">No Record Found</td>
                                            <td style="text-align:center; color:red; border:0px; display:none;" colspan="0"></td>
                                            <td style="text-align:center; color:red; border:0px; display:none;" colspan="0"></td>
                                            <td style="text-align:center; color:red; border:0px; display:none;" colspan="0"></td>
                                            <td style="text-align:center; color:red; border:0px; display:none;" colspan="0"></td>
                                            <td style="text-align:center; color:red; border:0px; display:none;" colspan="0"></td>
                                        </tr>
                                    <?php } ?>

                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>

        <?php } ?>



    </div>


    <!-- START OF MODAL FOR ADDING NEW PRODUCT -->
    <div class="modal fade" id="form_modal" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content" style="border-radius: 15px;">
                <form method="POST" enctype="multipart/form-data" runat="server">
                    <div class="modal-header">
                        <h3 class="modal-title">Add New Product</h3>
                        <button type="button" class="btn-close" data-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <div class="col-md-12">

                            <div class="form-group">
                                <label>Product Image</label>
                                <input type="file" class="form-control" name="image" onchange="previewFile(this);" accept="image/*" required="required" />
                            </div>

                            <div class="form-group">
                                <label>Name</label>
                                <input type="text" name="name" class="form-control" required="required" maxlength="500" />
                                <div id="name-counter"></div>
                            </div>
                            <div class="form-group">
                                <label>Description</label>
                                <textarea name="description" class="form-control" style="width: 100%; height: 150px;" required="required" maxlength="5000" oninput="updateCharacterCount(this)"></textarea>
                                <div id="description-counter"></div>
                            </div>
                            <div class="form-group">
                                <label>Price</label>
                                <input type="text" name="price" class="form-control" onkeypress="return isNumberKey(this, event);" required="required" />
                            </div>
                            <div class="form-group">
                                <label>Stocks</label>
                                <input type="number" name="stocks" class="form-control" required="required" />
                            </div>
                            <div class="form-group">
                                <label>Prescription</label><br>
                                <input type="radio" id="Yes" name="prescription" value="Yes">&nbsp; Yes &nbsp;&nbsp;
                                <input type="radio" id="No" name="prescription" value="No">&nbsp; No
                                <input type="hidden" name="clinicID" value="<?php echo $clinicID ?>" />
                            </div>
                        </div>
                    </div>
                    <div style="clear:both;"></div>
                    <div class="modal-footer">
                        <button name="save_product" class="btn btn-primary" style="border-radius: 15px;"><span class="glyphicon glyphicon-save"></span>
                            Add</button>

                    </div>
                </form>
            </div>
        </div>
    </div>
    <!-- END OF MODAL FOR ADDING NEW PRODUCT -->

    <!-- START OF MODAL FOR EDIT PRODUCT -->
    <div class="modal fade" id="edit_modal" aria-hidden="true" role="dialog">
        <div class="modal-dialog modal-xl">
            <div class="modal-content" style="border-radius: 15px;">
                <form method="POST" enctype="multipart/form-data" runat="server" id="form_edit_supply">
                    <div class="modal-header modal-header-success">
                        <h3 class="modal-title">Edit Product</h3>
                        <button type="button" class="btn-close" data-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <div class="col-md-12">

                            <div class="form-group" style="display: none;">
                                <label>ID</label>
                                <input type="text" name="SupplyID" id="SupplyID" class="form-control" />
                            </div>

                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Product Image (Current)</label>
                                        <!-- <input type="text" name="SupplyImage_c" id="SupplyImage_c" class="form-control" readonly /> -->
                                        <img src="" name="SupplyImage_c" id="SupplyImage_c" width="100%">
                                    </div>
                                    <div class="form-group">
                                        <label>Update Image</label>
                                        <input type="file" name="SupplyImage" id="SupplyImage" class="form-control" accept="image/*" />
                                    </div>
                                    <div class="form-group">
                                        <label>Product Name</label>
                                        <input type="text" name="SupplyName" id="SupplyName" class="form-control" maxlength="500" />
                                        <div id="name-counter"></div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Description</label>
                                        <textarea name="SupplyDescription" id="SupplyDescription" class="form-control" style=" width: 100%;" rows="8" maxlength="5000" oninput="updateCharacterCount(this)"></textarea>
                                        <div id="description-counter"></div>
                                    </div>
                                    <div class="form-group">
                                        <label>Price</label>
                                        <input type="text" name="SupplyPrice" id="SupplyPrice" onkeypress="return isNumberKey(this, event);" class="form-control" />
                                    </div>
                                    <div class="form-group">
                                        <label>Stocks</label>
                                        <input type="number" name="Stocks" id="Stocks" class="form-control" />
                                    </div>
                                    <div class="form-group">
                                        <label>Needs Prescription</label>
                                        <select name="NeedPrescription" id="NeedPrescription" style="border-radius: 5px; width: 100%;" class="bg-light border-0 px-4 py-3">
                                            <option value="Yes">Yes</option>
                                            <option value="No">No</option>
                                        </select>
                                    </div>
                                </div>


                            </div>


                        </div>
                    </div>

                    <div class="modal-footer">
                        <button name="update" class="btn btn-primary" style="border-radius: 15px;"><span class="glyphicon glyphicon-edit"></span>
                            Update</button>
                        <button class="btn btn-danger" type="button" data-dismiss="modal" style="border-radius: 15px;"><span class="glyphicon glyphicon-remove"></span> Cancel</button>

                    </div>
                </form>
            </div>

        </div>
    </div>
    <!-- END OF MODAL FOR EDIT PRODUCT -->



    <script>
        function updateCharacterCount(textarea) {
            const counter = textarea.parentElement.querySelector("#description-counter");
            const maxLength = textarea.maxLength;
            const currentLength = textarea.value.length;

            counter.textContent = `${currentLength}/${maxLength}`;

            if (currentLength > maxLength) {
                counter.style.color = 'red';
                textarea.setCustomValidity('Description exceeds the maximum character limit.');
            } else {
                counter.style.color = '';
                textarea.setCustomValidity('');
            }
        }

        // Function to check the length of the name inputs
        function checkNameLength(input) {
            const maxLength = input.getAttribute('maxlength');
            const currentLength = input.value.length;
            const counter = input.parentElement.querySelector("#name-counter");

            counter.textContent = `${currentLength}/${maxLength}`;
        }

        // Add event listeners to the name inputs
        const nameInputs = document.querySelectorAll("input[name='name']");
        nameInputs.forEach((input) => {
            input.addEventListener('input', () => {
                checkNameLength(input);
            });
        });

        const nameInputs2 = document.querySelectorAll("input[name='SupplyName']");
        nameInputs2.forEach((input) => {
            input.addEventListener('input', () => {
                checkNameLength(input);
            });
        });
    </script>



    <!-- START OF MODAL FOR VIEWING PRODUCT -->
    <div class="modal fade" id="view_modal" aria-hidden="true" role="dialog">
        <div class="modal-dialog modal-xl">
            <div class="modal-content" style="border-radius: 15px;">
                <form method="POST" enctype="multipart/form-data" runat="server" id="form_view_supply">
                    <div class="modal-header modal-header-success">
                        <h3 class="modal-title">Product</h3>
                        <button type="button" class="btn-close" data-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <div class="col-md-12">

                            <div class="form-group" style="display: none;">
                                <label>ID</label>
                                <input type="text" name="aSupplyID" id="aSupplyID" class="form-control" />
                            </div>

                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Product Image</label>
                                        <!-- <input type="text" name="SupplyImage_c" id="SupplyImage_c" class="form-control" readonly /> -->
                                        <img src="" name="aSupplyImage_c" id="aSupplyImage_c" width="100%">
                                    </div>
                                    <div class="form-group">
                                        <label>Product Name</label>
                                        <input type="text" name="aClinicName" id="aClinicName" class="form-control" readonly />
                                    </div>
                                    <div class="form-group">
                                        <label>Product Name</label>
                                        <input type="text" name="aSupplyName" id="aSupplyName" class="form-control" readonly />
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Description</label>
                                        <textarea name="aSupplyDescription" id="aSupplyDescription" class="form-control" style=" width: 100%;" rows="8" readonly></textarea>
                                    </div>
                                    <div class="form-group">
                                        <label>Price</label>
                                        <input type="text" name="aSupplyPrice" id="aSupplyPrice" class="form-control" readonly />
                                    </div>
                                    <div class="form-group">
                                        <label>Stocks</label>
                                        <input type="number" name="aStocks" id="aStocks" class="form-control" readonly />
                                    </div>
                                    <div class="form-group">
                                        <label>Needs Prescription</label>
                                        <input type="text" name="aNeedPrescription" id="aNeedPrescription" class="form-control" readonly />
                                    </div>
                                </div>


                            </div>


                        </div>
                    </div>

                    <div class="modal-footer">
                        <button class="btn btn-danger" type="button" data-dismiss="modal" style="border-radius: 15px;"><span class="glyphicon glyphicon-remove"></span> Close</button>

                    </div>
                </form>
            </div>

        </div>
    </div>
    <!-- END OF MODAL FOR VIEWING PRODUCT -->

    <?php
    if (isset($_POST['save_product'])) {

        $file = $_FILES['image']['name'];
        $tempfile = $_FILES['image']['tmp_name'];
        $folder = "image_upload/" . $file;

        move_uploaded_file($tempfile, $folder);

        $_allowedTypes = ['jpeg', 'png', 'jpg'];
        $_fileType = pathinfo($file, PATHINFO_EXTENSION);

        $name = $_POST['name'];
        $description = mysqli_real_escape_string($con, $_POST['description']);
        $price = $_POST['price'];
        $stocks = $_POST['stocks'];
        $prescription = $_POST['prescription'];

        if (in_array($_fileType, $_allowedTypes)) {
            $query = mysqli_query($con, "INSERT INTO petsupplies (SupplyImage, SupplyName, SupplyDescription, SupplyPrice, Stocks, NeedPrescription, ClinicID) VALUES ('$file', '$name', '$description', '$price', '$stocks', '$prescription', '$clinicID')");

            if ($query) {
                echo '<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>';
                echo '<script>';
                echo 'swal({
                                                title: "Success",
                                                text: "You have successfully added a new product",
                                                icon: "success",
                                                html: true,
                                                showCancelButton: true,
                                                })
                                                    .then((willDelete) => {
                                                        if (willDelete) {
                                                        
                                                            document.location ="supplies.php";
                                                        }
                                                    })';
                echo '</script>';
            } else {
                echo "<script>alert('Error adding new product.');</script>";
            }
        } else {
            echo '<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>';
            echo '<script>';
            echo 'swal({
                                            title: "Error",
                                            text: "Invalid file type. Please upload .jpg or .png file only.",
                                            icon: "error",
                                            html: true,
                                            showCancelButton: true,
                                            })
                                                .then((willDelete) => {
                                                    if (willDelete) {
                                                    
                                                        document.location ="supplies.php";
                                                    }
                                                })';
            echo '</script>';
        }
    }

    if (isset($_POST['update'])) {

        $eid = $_POST['SupplyID'];

        $file1 = $_FILES['SupplyImage']['name'];
        $tempfile1 = $_FILES['SupplyImage']['tmp_name'];
        $folder1 = "image_upload/" . $file1;

        move_uploaded_file($tempfile1, $folder1);

        $_allowedTypes1 = ['jpeg', 'png', 'jpg'];
        $_fileType1 = pathinfo($file1, PATHINFO_EXTENSION);

        $Uname = $_POST['SupplyName'];
        $Udescription = mysqli_real_escape_string($con, $_POST['SupplyDescription']);
        $Uprice = $_POST['SupplyPrice'];
        $Ustocks = $_POST['Stocks'];
        $Uprescription = $_POST['NeedPrescription'];

        if ($file1 != "") {

            if (in_array($_fileType1, $_allowedTypes1)) {
                $query = mysqli_query($con, "UPDATE petsupplies SET SupplyImage='$file1', SupplyName='$Uname', SupplyDescription='$Udescription', SupplyPrice='$Uprice', Stocks='$Ustocks', NeedPrescription='$Uprescription' WHERE SupplyID='$eid'");

                if ($query) {
                    echo '<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>';
                    echo '<script>';
                    echo 'swal({
                                            title: "Success",
                                            text: "You have successfully updated a product",
                                            icon: "success",
                                            html: true,
                                            showCancelButton: true,
                                            })
                                                .then((willDelete) => {
                                                    if (willDelete) {
                                                    
                                                        document.location ="supplies.php";
                                                    }
                                                })';
                    echo '</script>';
                } else {
                    echo "<script>alert('Error updating data.');</script>";
                }
            } else {
                echo '<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>';
                echo '<script>';
                echo 'swal({
                                            title: "Error",
                                            text: "Invalid file type. Please upload .jpg or .png file only.",
                                            icon: "error",
                                            html: true,
                                            showCancelButton: true,
                                            })
                                                .then((willDelete) => {
                                                    if (willDelete) {
                                                    
                                                        document.location ="supplies.php";
                                                    }
                                                })';
                echo '</script>';
            }
        } else {

            $e_query = mysqli_query($con, "UPDATE petsupplies SET SupplyName='$Uname', SupplyDescription='$Udescription', SupplyPrice='$Uprice', Stocks='$Ustocks', NeedPrescription='$Uprescription' WHERE SupplyID='$eid'");

            if ($e_query) {
                echo '<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>';
                echo '<script>';
                echo 'swal({
                                            title: "Success",
                                            text: "You have successfully updated a product",
                                            icon: "success",
                                            html: true,
                                            showCancelButton: true,
                                            })
                                                .then((willDelete) => {
                                                    if (willDelete) {
                                                    
                                                        document.location ="supplies.php";
                                                    }
                                                })';
                echo '</script>';
            } else {
                echo "<script>alert('Error updating data.');</script>";
            }
        }
    }
    ?>
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
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>

    <!-- To show details when editing -->
    <script>
        $('#edit_modal').on('show.bs.modal', function(e) {
            var opener = e.relatedTarget;

            var supply_id = $(opener).attr('supply-id');
            var supply_image = $(opener).attr('supply-image');
            var supply_name = $(opener).attr('supply-name');
            var supply_desc = $(opener).attr('supply-desc');
            var supply_price = $(opener).attr('supply-price');
            var stocks = $(opener).attr('stocks');
            var need_presc = $(opener).attr('need-presc');

            $('#form_edit_supply').find('[name="SupplyID"]').val(supply_id);
            $('#form_edit_supply').find('[name="SupplyImage_c"]').prop('src', 'image_upload/' + supply_image);
            $('#form_edit_supply').find('[name="SupplyName"]').val(supply_name);
            $('#form_edit_supply').find('[name="SupplyDescription"]').val(supply_desc);
            $('#form_edit_supply').find('[name="SupplyPrice"]').val(supply_price);
            $('#form_edit_supply').find('[name="Stocks"]').val(stocks);
            $('#form_edit_supply').find('[name="NeedPrescription"]').val(need_presc);

            endResize();
        });

        $('#view_modal').on('show.bs.modal', function(e) {
            var opener = e.relatedTarget;

            var asupply_id = $(opener).attr('asupply-id');
            var asupply_image = $(opener).attr('asupply-image');
            var asupply_clinic = $(opener).attr('asupply-clinic');
            var asupply_name = $(opener).attr('asupply-name');
            var asupply_desc = $(opener).attr('asupply-desc');
            var asupply_price = $(opener).attr('asupply-price');
            var astocks = $(opener).attr('astocks');
            var aneed_presc = $(opener).attr('aneed-presc');

            $('#form_view_supply').find('[name="aSupplyID"]').val(asupply_id);
            $('#form_view_supply').find('[name="aSupplyImage_c"]').prop('src', 'image_upload/' + asupply_image);
            $('#form_view_supply').find('[name="aClinicName"]').val(asupply_clinic);
            $('#form_view_supply').find('[name="aSupplyName"]').val(asupply_name);
            $('#form_view_supply').find('[name="aSupplyDescription"]').val(asupply_desc);
            $('#form_view_supply').find('[name="aSupplyPrice"]').val(asupply_price);
            $('#form_view_supply').find('[name="aStocks"]').val(astocks);
            $('#form_view_supply').find('[name="aNeedPrescription"]').val(aneed_presc);

            endResize();
        });

        $('#form_modal').on('show.bs.modal', function(e) {
            endResize();
        });

        function endResize() {
            $(window).off("resize", resizer);
        }
    </script>

    <!-- SWAL -->
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
    <script>
        $(document).ready(function() {
            $('.delete_product').click(function(e) {
                var id = $(this).val();
                e.preventDefault();
                swal({
                        title: "Warning",
                        text: "Are you sure you want to delete this item?",
                        icon: "warning",
                        buttons: true,
                        dangerMode: true,
                    })
                    .then((willDelete) => {
                        if (willDelete) {
                            $.ajax({
                                method: "POST",
                                url: "action.php",
                                data: {
                                    'Supply_ID': id,
                                    'delete_product': true
                                },
                                success: function(response) {
                                    console.log(response);
                                    if (response == 200) {
                                        swal("Success", "You have successfully deleted a product", "success").then(function() {
                                            location.reload();
                                        });
                                    }
                                }
                            })
                        }
                    });
            })
        })
    </script>

</body>

</html>