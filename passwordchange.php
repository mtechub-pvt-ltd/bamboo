<?php
include('include/db.php');
$action = '';
if (isset($_POST['check_credentials'])) {
    if ($_POST['email'] == $_SESSION['email'] && $_POST['password'] == $_SESSION['password']) {
        $action = 'passed';
    } else {
        $action = 'error';
    }
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <?php
    include('include/scripts.php');
    ?>
</head>

<body class="layout-1">



    <div class="wrapper" style="background-color:#F5F5F5;">


        <?php
        include('include/header.php');
        ?>


        <div class="page-body px-xl-4 px-sm-2 px-0 py-lg-2 py-1 mt-3 mt-lg-5">
            <div class="container-fluid container-90">

                <?php
                if ($action == 'passed') {
                ?>
                    <div class="row g-3 row-deck">
                        <div class="col-md-12">
                            <div class="modal-content ">

                                <div class="modal-body p-60 mt-5">
                                    <form class="row" method="POST" action="sdf.php" id="update_form" onsubmit="validate()">
                                        <div class="col-12 mt-2  mb-50 text-center">
                                            <img src="assets/images/delete.png" width="40px" />
                                            <h3 class="mt-2 ">Update ID</h3>
                                            <p id="password_error" class="mt-3 text-danger2">Password not Matched</p>
                                            <p id="email_error" class="mt-3 text-danger2">Email not Matched</p>
                                        </div>

                                        <div class="col-md-6 col-12">
                                            <div class="">

                                                <input id="changeColorDemo" onkeyup="changeTheColorOfButtonDemo()" type="email" class="form-control form-control-lg border-0 placeholder-sora" name="n_email" id="n_email" placeholder="Current ID" required>
                                            </div>
                                            <div class="mt-4">

                                                <input type="email" class="form-control form-control-lg border-0 placeholder-sora" name="c_email" id="c_email" placeholder="Confirm new email" required>

                                            </div>
                                        </div>
                                        <div class="col-md-6 mt-4 mt-md-0 col-12">
                                            <div class="">

                                                <input type="email" class="form-control form-control-lg border-0 placeholder-sora" name="n_password" id="n_email" placeholder="New ID" required>
                                            </div>
                                            <div class="mt-4">

                                                <input type="email" class="form-control form-control-lg border-0 placeholder-sora" name="c_password" id="c_email" placeholder="Confirm new ID" required>

                                            </div>
                                        </div>

                                        <div class="col-12 mt-50 mb-4">
                                            <div class="row mt-3">
                                                <div class="col">
                                                    <button type="submit" name="confirm_credentials" style="font-family:Sora-SemiBold;" class="col-12 btn btn-lg p-4 pe-md-5 ps-md-5 btn-dark">Update
                                                    </button>
                                                </div>

                                            </div>



                                    </form>


                                </div>
                            </div>
                        </div>

                    </div>

                <?php
                } else {
                ?>
                    <div class="row g-3 row-deck">
                        <div class="col-md-6 offset-md-3" style="margin-top:20px;">

                            <div class="modal-content modal-dialog modal-dialog-centered modal-md" style="margin-top:20px;background-color:#fff; border-radius:80px;">

                                <div class="modal-body p-60">
                                    <form class="row" method="POST" action="settings.php">
                                        <div class="col-12 mt-2  mb-50 text-center">
                                            <i style="color:#D89459; font-size:28px;" class="fa-solid fa-lock"></i>
                                            <h3 class="mt-2 ">Update Password</h3>

                                            <?php

                                            if (isset($_GET['actions'])) {
                                                echo '<p id="updated" class="mt-3 text-success2">Credentials Updated</p>';
                                            }

                                            ?>
                                        </div>

                                        <div class="col-12">
                                            <div class="">

                                                <input type="text" id="changeColorDemo" onkeyup="changeTheColorOfButtonDemo()" class=" form-control form-control-lg  placeholder-sora py-4 " style="border-radius:35px;" name="email" placeholder="Current Password" required>
                                            </div>
                                        </div>
                                        <div class="col-12">
                                            <div class="mt-4">

                                                <input id="changeColorDemo1" onkeyup="changeTheColorOfButtonDemo()" class="mandatoryfields form-control form-control-lg  placeholder-sora py-4" style="border-radius:35px;  " type="password" name="password" placeholder="New Password" required>
                                                <?php

                                                if ($action == 'error') {
                                                    echo '<p id="action_error" class="mt-3 text-danger2">Email or Password is Wrong</p>';
                                                }

                                                ?>
                                            </div>
                                        </div>
                                        <div class="col-12">
                                            <div class="mt-4">

                                                <input id="changeColorDemo2" onkeyup="changeTheColorOfButtonDemo()" class="mandatoryfields form-control form-control-lg  placeholder-sora py-4" style="border-radius:35px; " type="password" name="password" placeholder="Confirm new Password" required>
                                                <?php

                                                if ($action == 'error') {
                                                    echo '<p id="action_error" class="mt-3 text-danger2">Email or Password is Wrong</p>';
                                                }

                                                ?>
                                            </div>
                                        </div>
                                        <div class="col-12 mt-50 mb-4">
                                            <div class="row mt-3">
                                                <div class="col">
                                                    <button type="submit" id="buttonDemo" name="check_credentials" style="font-family:Sora-SemiBold;border-radius:35px;background-color:#BDBDBD; color:white;" class="btn col-12 btn btn-lg p-4 pe-md-5 ps-md-5 ">Update
                                                    </button>
                                                </div>

                                            </div>



                                    </form>


                                </div>
                            </div>
                        </div>
                    </div>
            </div>
        <?php
                }
        ?>
        </div>
    </div>


    </div>

    </div>


    <?php
    include('include/footer_script.php');
    ?>
    <script>
        <?php
        if ($action == 'error') {
        ?>
            setTimeout(function() {
                $('#action_error').hide()
                $('#updated').hide()
            }, 2000)
        <?php
        }
        ?>
        $('#email_error').hide()
        $('#password_error').hide()
        setTimeout(function() {
            $('#updated').hide()
        }, 2000)

        function validate() {
            event.preventDefault()
            var n_email = $('#n_email').val();
            var c_email = $('#c_email').val();
            var n_password = $('#n_password').val();
            var c_password = $('#c_password').val();
            if (n_email != c_email) {
                $('#email_error').show()

                setTimeout(function() {
                    $('#email_error').hide()
                    return false;
                }, 2000)

            } else if (n_password != c_password) {
                $('#password_error').show()

                setTimeout(function() {
                    $('#password_error').hide()
                    return false;
                }, 2000)
            } else {

                window.location.href = "user/update_cerdentials.php?action=update&email=" + n_email + "&password=" + n_password

            }

        }

        function changeTheColorOfButtonDemo() {
            if (document.getElementById("changeColorDemo").value !== "" && document.getElementById("changeColorDemo1").value !== "" && document.getElementById("changeColorDemo2").value !== "") {

                document.getElementById("buttonDemo").style.background = "#D89459";
            } else {
                document.getElementById("buttonDemo").style.background = "#f5f5f5";

            }
        }
    </script>
</body>

</html>