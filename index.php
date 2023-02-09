<!DOCTYPE html>
<html lang="en">

<head>
  <style>
    .sup {
      font-size: smaller;
    }

    .icon-div {
      position: relative;

    }

    .input {}

    i {
      right: 10px;
      top: 20px;
      display: none;
    }
    h1 {
      font-size:48px;
    }
    .pass {
      top: -5%!important;
      width: 20px!important;
      height: 20px!important;
      right:2%!important;
      border:0px!important;
      border-radius:100%!important;
      bottom: 20px!important;
    }


  @media only screen and (max-width: 600px) {
    h1 {
      font-size: 30px!important;
    }
    .pass {
      right:8%!important;
    }
  }
 
  </style>
  </script><?php
include 'include/scripts.php';
?>
</head>

<body id="layout-1"
onload="hideLoader()"
style="
background: white!important;
"
class="contaier-fluid"
>

  <div class="wrapper">
    <div class="loader" id="loaders">
      <div class="spinner-border" role="status"><span class="sr-only">Loading...</span></div>
    </div>
    <nav class="navbar p-3 pt-4 navbar-expand-lg bg-white bg-body-tertiary">
  <div class="container-fluid">
    <a class="navbar-brand" href="#">
    <img src="assets/images/login.png" width="120" alt="logo" class="img-fluid me-2">
    </a>
  </div>
</nav>
    
    <div class="page-body ">
      <div class="row ">
        <div class="col-md-6 col-12  order-2 order-md-1 bg-white ">
      
          <div class="p-5">
            <form class="row" method="POST" action="include/login.php">
              <div class="col-12 d-md-block d-none mt-60  mb-60">
                <h1 class="text-dark">Welcome back! Enter</h1>
                <h1 class="text-dark">your login credentials</h1>
              </div>
              <div class="col-12 d-md-none d-block mb-4">
                <h1 class="text-dark">Welcome back! Enter</h1>
                <h1 class="text-dark">your login credentials</h1>
              </div>
              <div class="col-md-10 col-12">
                <div class="input-group" id="email-group">
                <span class="input-group-text border-0 bg-white" id="basic-addon1">
                <img src="assets/images/logins.png" width="35px" class="" />
                </span>
                <input type="email" id="email" class="form-control form-control-sm  p-4"  name=" email" placeholder="Enter Login" required>
                
              </div>
              
              </div>
              <div class="col-md-10 col-12 form-group icon-div">
                <div class="mt-4  icon-div input-group"
                id="password-group"
                >
                <span class="input-group-text border-0 bg-white" id="basic-addon1">
                <img src="assets/images/pass.png" width="30px" class="r" />
                </span>
                  <input id="password" class="form-control form-control-sm p-4"  type="password" name="password" placeholder="Password" required />
                  <!-- <i class="far fa-eye" style="display:none;" id="togglePassword" onclick="testcall()"></i> -->
                  <button type="submit" id="togglePassword" class="btn pass btn-lg p-4 pe-md-5 ps-md-5 col-12" style="position: absolute; display:none;">
                      <img src="assets/images/load.png" width="35px" class="mb-4" />
                      </button>
                 
                      

                </div>
              </div>
              <?php
                        if (isset($_GET['action'])) {
                            if ($_GET['action'] == 'email_or_pass_wrong') {
                                echo '<p id="action_error" class="mt-3 col-12 text-danger2 text-leftc">Email or Password is Wrong</p>';
                            }
                        }
                      ?>


            </form>
          </div>
      
        </div>
        <div class="col-md-6  col-12  mt-md-0 mt-5 order-1 order-md-2 bg-white text-end">
          <div class="d-md-block d-none">
            <img src="assets/images/loginIllustration.png"
            alt="logo"
            class=" mt-60 p-5 pe-0 mb-60 col-8"
            >
          </div>
          <div class="d-md-none d-block
          "
          style="margin-top:0px;"
          >
            <img src="assets/images/loginIllustration.png"
            alt="logo"
            class="img-fluid col-11"
            >
          </div>
        </div>
        <div class="col-12 bg-white 
        mt-60
        mb-60
        d-md-block d-none
        order-3
        ">
            <div class="row">
            <div class="col-6 p-5">
            Accessible by Hopeful Bamboo®  |  
            <a 
            style="color:#E39C5F;text-decoration:underline"
            href="https://hopefulbamboo.app/" target="_blank">
            Visit Homepage
            </a>
            </div>
            <div class="col-6  p-5 bg-white text-end">
            Copyright © Hopeful Bamboo Inc. All rights reserved.
            </div>
            </div>
        </div>
        <div class="col-12 bg-white order-3 d-md-none d-block
        ">
            <div class="row text-center">
            <div class="col-12 text-muted">
            Accessible by Hopeful Bamboo®  |  
            <a 
            style="color:#E39C5F;text-decoration:underline"
            href="https://hopefulbamboo.app/" target="_blank">
            Visit Homepage
            </a>
            </div>
            <div class="col-12 bg-white text-muted">
            Copyright © Hopeful Bamboo Inc. All rights reserved.
            </div>
            </div>
        </div>
     
   
    
    </div>
  </div>
  </div>
  </div><?php
include 'include/footer_script.php';
?>
  <script src="assets/js/theme.js"></script>
  <script>
    // function testcall(){
    //   console.log('test function.')
    // }
    $(document).ready(function() {
      $("#password").keyup(function() {
        let value = $(this).val();
        if (value.length > 0) {
          console.log('value: ', value)
          $("#togglePassword").css("display", "inline-block");
        }
      });
      $("#email").keyup(function() {
        let value = $(this).val();
        if (value.length > 0) {
          $("#email-group").css("border", " #E39C5F 1px solid");
          $("#email").css("background-color", "white");
        }
        else {
          $("#email-group").css("border", " #E39C5F 0px solid");
          $("#email").css("background-color", "white");
        }
      });
      $("#email").focus(function() {
          $("#email-group").css("border", " #E39C5F 1px solid");
          $("#email").css("background-color", "white");

      });
      $("#email").focusout(function() {
        if (value.length > 0) {
          $("#email-group").css("border", " #E39C5F 1px solid");
          $("#email").css("background-color", "white");
        }
        else {
          $("#email-group").css("border", " #E39C5F 0px solid");
          $("#email").css("background-color", "white");
        }
      });
      $("#password").keyup(function() {
        let value = $(this).val();
        if (value.length > 0) {
          $("#password-group").css("border", " #E39C5F 1px solid");
          $("#password").css("background-color", "white");
        }
        else {
          $("#password-group").css("border", " #E39C5F 0px solid");
          $("#password").css("background-color", "white");
        }
      });
      $("#password").focus(function() {
        
        $("#password-group").css("border", " #E39C5F 1px solid");
        $("#password").css("background-color", "white");
      });
      $("#password").focusout(function() {
        let value = $(this).val();
        if (value.length > 0) {
          $("#password-group").css("border", " #E39C5F 1px solid");
          $("#password").css("background-color", "white");
        }
        else {
          $("#password-group").css("border", " #E39C5F 0px solid");
          $("#password").css("background-color", "white");
        }
      });
     

    });

    function hideLoader() {
      setTimeout(() => {
          $("#loaders").hide();
        }

        , 1000);
    }

    <?php
if (isset($_GET['action'])) {
    ?>setTimeout(function() {
        $('#action_error').hide()
      }

      , 4000) <?php
}
?>
  </script>
</body>

</html>