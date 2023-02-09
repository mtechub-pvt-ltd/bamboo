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
<style>
    .trial {
        position: relative;
    }

    .trial a {
        cursor: pointer;
        display: inline-block;
        width: 200px;
        position: relative;
        line-height: 95px;
        margin-top: -20px;
        margin-left: 200px;
        text-align-last: right;
    }

    .trial input {
        position: absolute;



    }

    .try {
        position: relative;
    }

    .try a {
        cursor: pointer;
        display: inline-block;
        width: 200px;
        position: relative;
        line-height: 95px;
        margin-top: -20px;
        margin-left: 200px;
        text-align-last: right;
    }

    .try input {
        position: absolute;


    }
</style>
<!DOCTYPE html>
<html lang="en">

<head>
    <?php
    include('include/scripts.php');
    ?>
</head>

<body class="layout-1">



    <div class="wrapper" style="background-color:#FFFFFF;">


        <?php
        include('include/header.php');
        ?>


        <div class="page-body px-xl-4 px-sm-2 px-0 py-lg-2 py-1 mt-3 mt-lg-5">
            <div class="container-fluid container-90">

                <?php

                ?>
                <div class="row g-3 row-deck">
                    <div class="col-md-6 offset-md-3" style="margin-top:20px;">

                        <div class="modal-content modal-dialog modal-dialog-centered modal-md" style="margin-top:20px;background-color:#fff; border-radius:80px;">

                            <div class="modal-body p-60">
                                <form class="row" method="POST" action="settings.php">
                                    <div class="col-12 mt-2  mb-50 text-center">

                                        <h3 class="mt-2 ">Account Credentials</h3>
                                    </div>

                                    <div class="col-12">
                                        <div class="input-group mb-3 ">
                                            
                                            <input type="text" 
                                            class=" form-control form-control-lg p-4"
                                            style="
                                            border-radius:50px 0px 0px 50px; 
                                              border:1px  solid #d6d0cc!important;
                                              border-right:0px!important;"
                                            value="<?php echo $_SESSION['email']; ?>">
                                            <a class="input-group-text" href="emailupdate.php"
                                             style="background-color:#fff;
                                              border-radius:0px 50px 50px 0px; color:#D89459; 
                                              border:1px  solid #d6d0cc!important;
                                              border-left:0px!important;
                                              padding: 0 2.25rem;
                                              font-weight:bold;"
                                              >Update</a>
                                            
                                        </div>
                                    </div>
                                    <div class="col-12">
                                        <div class="input-group mb-3 ">
                                            <input type="password"
                                            style="
                                            border-radius:50px 0px 0px 50px; 
                                              border:1px  solid #d6d0cc!important;
                                              border-right:0px!important;"
                                             class=" form-control form-control-lg p-4 " value="<?php echo $_SESSION['password']; ?>"
                                             >
                                             <a class="input-group-text"
                                             href="passwordchange.php"
                                             style="background-color:#fff;
                                              border-radius:0px 50px 50px 0px; color:#D89459; 
                                              border:1px  solid #d6d0cc!important;
                                              border-left:0px!important;
                                              padding: 0 2.25rem;
                                              font-weight:bold;"
                                              >Update</a>
                                            
                                            <?php


                                            ?>
                                        </div>
                                    </div>




                                </form>


                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <?php

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
                document.getElementById("changeColorDemo").style.border = "#D89459";
                document.getElementById("changeColorDemo1").style.border = "#D89459";
                document.getElementById("changeColorDemo2").style.border = "#D89459";
                document.getElementById("buttonDemo").style.background = "#D89459";
            } else {
                document.getElementById("buttonDemo").style.background = "#e7e7e7";
                document.getElementById("changeColorDemo").style.border = "#e7e7e7";
                document.getElementById("changeColorDemo1").style.border = "#e7e7e7";
                document.getElementById("changeColorDemo2").style.border = "#e7e7e7";
            }
        }
    </script>
</body>

</html>