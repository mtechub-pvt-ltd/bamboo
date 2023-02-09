<?php

include 'include/db.php';
if (isset($_SESSION['login'])) {
} else {
    header('location:index.php');
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.9.4/Chart.js"></script>
    <?php
include 'include/scripts.php';
?>
</head>

<body id="body" class="layout-1"
onload="hidePush()"
>



    <div class="wrapper" style="background-color:#ffffff;">


        <?php
include 'include/header.php';
?>



        <div class="page-body px-xl-4 px-sm-2 px-0 py-lg-2 py-1">
            <div class="container-fluid">
                <div class="row g-3 row-deck  bg-white">
                <div id="msg"   style="width: 98.5%;">
    
    </div>
                <?php

if (isset($_GET['add'])) {?>

    <form
    onsubmit="return checkLink()"
      action="links/insert.php"
        method="POST"
        >
        
                      <div
                        style="width: 98.5%;"
                        class="mb-3"
                        >
                        <div class="input-group" id="description-group">
                        <span class="input-group-text border-0 bg-white ps-4" id="basic-addon1">
                        <img src="assets/images/description.png" width="30px" class="" />
                        </span>
                        <input type="text" id="description" class="form-control form-control-sm  p-4"  name="description" placeholder="Write a description" required>
                      </div>
                      </div>
                      <div
                        style="width: 98.5%;"
                            class="mb-0 pb-0"
                        >
                        <div class="input-group p-0" id="link-group">
                        <span class="input-group-text border-0 bg-white ps-4" id="basic-addon1">
                        <img src="assets/images/links.png" width="30px" class="" />
                        </span>
                        <input type="text" id="link" class="form-control form-control-sm  p-4"  name="link" placeholder="Paste a link" required>
                      </div>
                      </div>
                      <div
                      class="d-flex mt-1 ms-1
                      justify-content-between
                      pushs
                      " style="width:98%;"

                        >
                      <button
                        class="data mt-3 p-4"
                        style="width:49.5%;border: 0px;"
                        id="push-btn"
                        type="submit"
                        name="push"
                        >
                                        <img src="assets/images/push2.png" alt="logo" width="25.7px" height="auto">
                                    </button>
                        <button
                        class="data mt-3 ms-md-2 p-4"
                        id="add-btn"
                        style="width:49%;border: 0px;"
                        type="submit"
                        name="add"
                        >
                                        <img src="assets/images/add.png" alt="logo" width="25.7px" height="auto">
                                    </button>
                      </div>
    </form>

                    <?php }
if (isset($_GET['search'])) {
    ?>
                       <div
                        style="width: 98.5%;"
                        >
                        <div class="input-group" id="email-group">
                        <span class="input-group-text border-0 bg-white ps-4" id="basic-addon1">
                        <img src="assets/images/search.png" width="30px" class="" />
                        </span>
                        <input type="text" id="search" class="form-control form-control-sm  p-4"  name=" email" placeholder="Search <?php 
                        $sql_x="SELECT * FROM links";
                        $run_x=mysqli_query($conn,$sql_x);
                        echo mysqli_num_rows($run_x);
                        ?> inspirations..." required>
                        <span
                        style="cursor: pointer;"
                        class="input-group-text border-0 bg-white" id="close-search">
                        <i class="fa fa-close me-4 ms-3" style="font-size:25px;color: #E39C5F;"></i>
                        </span>
                      </div>
                      </div>

                     <?php }
if (isset($_GET['setting'])) { ?>
<div class=" text-dark mb-0" 
style="width: 98.7%;">
    
  <div class="accordion-item bg-white text-dark" 
  style="border:0px solid white!important;border-radius:50px;background-color:red;"
  >
    <h2 class="accordion-header d-flex custom-accordion-item p-3 text-dark"
    style="border:0px solid white!important;border-radius:10px;"
    id="headingOne"
   onclick="headingOneClick()"
    >
      <button class="accordion-button  text-dark bg-white" 
      style="border:0px solid white!important;background-color:red;"
       >
      <img src="assets/images/logins.png" width="35px" class="" />
        <span class="ms-3 Sora-SemiBold" style="color:#2A2A2A;">Update Login</span>
      </button>
      <div
      id="item1"
      >
      
      </div>
      
    </h2>
    <div id="collapseOne" class="accordion-collapse" 
    style="border:0px solid white!important;">
      <form
      onsubmit="return updateLogin()"
      action="login/update.php"
        method="POST"
      class="accordion-body p-0">
      <div class="input-group mb-3 mt-3" id="current-login-group">
        <input type="email"
         id="current-login" 
         class="form-control form-control-sm  p-4"
          name="current-login"
          placeholder="Current login" 
          required>    
      </div>
      <div class="input-group mb-3" id="new-login-group">
        <input type="email" 
        name="new-login"
        id="new-login"
         class="form-control form-control-sm  p-4"  name="new-login" placeholder="Enter new login" required>    
      </div>
      <div class="input-group mb-3" id="confirm-new-login-group">
        <input type="email"
         name="confirm-new-login"
         id="confirm-new-login"
         class="form-control form-control-sm  p-4"  name="confirm-new-login" placeholder="Confirm new login" required>    
      </div>
      <button 
      style="width: 100%;border: 0px;"
      type="submit" 
      name="update-email"
      id="update-email" class="data Sora-SemiBold p-4">
        Update
      </button>
    </form>
  </div>
  <div class="accordion-item mt-3 border-0 mb-0 text-dark ">
    <h2 class="accordion-header d-flex  custom-accordion-item text-dark p-3 "
    style="border:0px solid white!important;border-radius:10px;"
    id="headingTwo"
    onclick="headingTwoClick()"
    >
      <button class="accordion-button  text-dark bg-white" 
      
      type="button" >
      <img src="assets/images/pass.png" width="35px" class="" />
        <span class="ms-3 Sora-SemiBold" style="color:#2A2A2A;">Update Password</span>
      </button>
      <div
      id="item2"
      >
      
      </div>
    </h2>
    <div id="collapseTwo" class="accordion-collapse ">
      <form  onsubmit="return updatePassword()"
      action="password/update.php"
        method="POST" class="accordion-body p-0">
      <div class="input-group mt-3 mb-3" id="current-password-group">
        <input type="password" id="current-password" class="form-control form-control-sm  p-4"  name="current-password" placeholder="Current Password" required>    
      </div>
      <div class="input-group mb-3" id="new-password-group">
        <input type="password" id="new-password" class="form-control form-control-sm  p-4"  name="new-password" placeholder="Enter new Password" required>    
      </div>
      <div class="input-group" id="confirm-new-password-group">
        <input type="password" id="confirm-new-password" class="form-control form-control-sm  p-4"  name="confirm-new-password" placeholder="Confirm new Password" required>    
      </div>
      <button 
      style="width: 100%;border: 0px;"
      type="submit" 
      name="update-pass"
        
      id="update-pass" class="data Sora-SemiBold p-4">
        Update
      </button>
      </form>
    </div>
  </div>

</div>
</div>
 <?php  
}
?>
                    
                    
                    <?php
                        $sql="SELECT * FROM links ORDER BY id DESC";
                        $run=mysqli_query($conn,$sql);
                        while ($row=mysqli_fetch_assoc($run))   {

                            if(filter_var($row['link'], FILTER_VALIDATE_URL)== false)
                            {
                                echo '
                                <div class="col-12 myDiv w-100">
                                <div class="row w-100">
                                <div class="col-md-10 col-12"
                                data-bs-toggle="collapse" data-bs-target="#collapseExample'.$row['id'].'" aria-expanded="false" aria-controls="collapseExample'.$row['id'].'"
                                >
                                <div class="card ps-3 d-flex align-items-center justify-content-start">

                                <i class="fa fa-circle text-danger"></i>
                                <p class="mt-3 ms-3 Sora-Regular">'.$row['topic'].'</p>
                                <p class="mt-3 ms-3 me-3 Sora-SemiBold">'.$row['seen_count'].'</p>

                                </div>
                                </div>
                                <div class="collapse d-lg-none mb-3" id="collapseExample'.$row['id'].'">
                                <a
                                href="links/delete.php?id='.$row['id'].'"
                                class="data h-100 mt-3  pt-3 pb-3">
                                    <img src="assets/images/trash.png" alt="logo" width="25.7px" height="auto">
                                </a>
                                </div>
                                <div class="col-2 d-lg-block d-none">
                                <a
                                href="links/delete.php?id='.$row['id'].'"
                                class="data h-100">
                                    <img src="assets/images/trash.png" alt="logo" width="25.7px" height="auto">
                                </a>

                                </div>
                                </div>
                                </div>';
                            }
                    }
                    ?>
                   <?php
                   $sql="SELECT * FROM links  WHERE pushed='1' ORDER BY id DESC";
                        $run=mysqli_query($conn,$sql);
                        while ($row=mysqli_fetch_assoc($run))  {
                            echo '<div class="myDiv col-12 w-100">
                            <div class="row w-100">
                            <div class="col-md-10 col-12"
                            data-bs-toggle="collapse" data-bs-target="#collapseExample'.$row['id'].'" aria-expanded="false" aria-controls="collapseExample'.$row['id'].'"
                            >
                                <div class="card ps-3 d-flex align-items-center justify-content-start">
                                <img src="assets/images/push2.png" alt="logo" width="20.7px" height="auto">
                                <p class="mt-3 ms-3 Sora-Regular">'.$row['topic'].'
                                <p class="mt-3 ms-md-3 me-md-3  me-4 Sora-SemiBold">'.$row['seen_count'].'</p></p>
                                </div>
                            </div>
                            <div class="collapse d-lg-none mb-3" id="collapseExample'.$row['id'].'">
                            <div class="col-12 h-100 mt-3">
                                <div class="row h-100">
                                    <div class="col">
                                        <a href="links/push.php?id='.$row['id'].'" class="data1
                                        pt-3 pb-3
                                        h-100">
                                            <img src="assets/images/push.png" alt="logo" width="25.7px" height="auto">
                                        </a>
                                    </div>
                                    <div class="col">
                                        <a href="'.$row['link'].'" target="_blank"
                                        class="data h-100">
                                            <img src="assets/images/preview.png" alt="logo" width="35.7px" height="auto">
                                        </a>
                                    </div>
                                    <div class="col">
                                        <a href="links/delete.php?id='.$row['id'].'" class="data h-100">
                                            <img src="assets/images/trash.png" alt="logo" width="25.7px" height="auto">
                                        </a>
                                    </div>
                                </div>
                            </div>
                            </div>
                            <div class="col-md-2 col-12 d-lg-block d-none h-100">
                                <div class="row h-100">
                                <div class="col">
                                    <a href="links/unpush.php?id='.$row['id'].'" class="data1 h-100">
                                        <img src="assets/images/push.png" alt="logo" width="25.7px" height="auto">
                                    </a>
                                </div>
                                <div class="col">
                                    <a href="'.$row['link'].'" target="_blank"
                                     class="data h-100">
                                        <img src="assets/images/preview.png" alt="logo" width="35.7px" height="auto">
                                    </a>
                                </div>
                                <div class="col">
                                    <a href="links/delete.php?id='.$row['id'].'" class="data deleteAction h-100">
                                        <img src="assets/images/trash.png" alt="logo" width="25.7px" height="auto">
                                    </a>
                                </div>
                                </div>



                            </div>
                            </div>



                        </div>';
                        }
                    ?>
                    <?php
                        $sql="SELECT * FROM links  WHERE pushed='0' ORDER BY id DESC";
                        $run=mysqli_query($conn,$sql);
                        while ($row=mysqli_fetch_assoc($run))   {

                            if(filter_var($row['link'], FILTER_VALIDATE_URL))
                            {
                                echo '<div class="myDiv col-12 w-100">
                                <div class="row w-100">
                                <div class="col-md-10 col-12"
                                data-bs-toggle="collapse" data-bs-target="#collapseExample'.$row['id'].'" aria-expanded="false" aria-controls="collapseExample'.$row['id'].'"
                                >
                                    <div class="card ps-3 d-flex align-items-center justify-content-start">
                                    <i class="fa fa-circle text-success2"></i>
                                    <p class="mt-3 ms-3 Sora-Regular">'.$row['topic'].' <p class="mt-3 ms-md-3 me-md-3  me-4 Sora-SemiBold">'.$row['seen_count'].'</p></p>
                                    </div>
                                </div>
                                <div class="collapse d-lg-none mb-3" id="collapseExample'.$row['id'].'">
                                <div class="col-12 h-100 mt-3">
                                    <div class="row h-100">
                                        <div class="col">
                                            <a href="links/push.php?id='.$row['id'].'" class="data
                                            pt-3 pb-3
                                            h-100">
                                                <img src="assets/images/push2.png" alt="logo" width="25.7px" height="auto">
                                            </a>
                                        </div>
                                        <div class="col">
                                            <a href="'.$row['link'].'" target="_blank"
                                            class="data h-100">
                                                <img src="assets/images/preview.png" alt="logo" width="35.7px" height="auto">
                                            </a>
                                        </div>
                                        <div class="col">
                                            <a href="links/delete.php?id='.$row['id'].'" class="data h-100">
                                                <img src="assets/images/trash.png" alt="logo" width="25.7px" height="auto">
                                            </a>
                                        </div>
                                    </div>
                                </div>
                                </div>
                                <div class="col-md-2 col-12 d-lg-block d-none h-100">
                                    <div class="row h-100">
                                        <div class="col">
                                            <a href="links/push.php?id='.$row['id'].'" class="data h-100">
                                                <img src="assets/images/push2.png" alt="logo" width="25.7px" height="auto">
                                            </a>
                                        </div>
                                        <div class="col">
                                            <a href="'.$row['link'].'" target="_blank"
                                            class="data h-100">
                                                <img src="assets/images/preview.png" alt="logo" width="35.7px" height="auto">
                                            </a>
                                        </div>
                                        <div class="col">
                                            <a href="links/delete.php?id='.$row['id'].'" class="data h-100">
                                                <img src="assets/images/trash.png" alt="logo" width="25.7px" height="auto">
                                            </a>
                                        </div>
                                    </div>
                                </div>
                                </div>
                                </div>';
                            }
                    }
                    ?>

                </div>
            </div>


        </div>

        <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered modal-lg"
            style="width:1900px!important;"
            >
                <div class="modal-content radius-30"

                style="border-radius:50px;background-color:#ffff;">

                    <div class="modal-body p-60">
                        <form class="row" id="addForm" method="POST">
                            <div class="col-12 mt-2  mb-50 text-center">
                                <div class="col-12 mt-2  mb-50 text-center"><i style="color:#D89459; font-size:26px;" class="fa-solid fa-plus "></i>
                                    <h3 class="mt-2 mb-2 ">What's the next inspiration</h3>
                                    <p id="error_msg" class="mt-3 text-danger2"></p>
                                    <p id="success_msg" class="mt-3 text-success"></p>
                                </div>

                                <div class="col-12">
                                    <div class=""><input
                                    style="border-radius:30px; border:1px grey solid;"
                                    type="text"
                                     class="form-control form-control-lg placeholder-sora"
                                      name="title" id="title" onkeyup="changeTheColorOfButtonDemo()" placeholder="Title" required></div>
                                </div>
                                <div class="col-12">
                                    <div class="mt-4"><input
                                    style="border-radius:30px;border:1px grey solid;"
                                     class="form-control form-control-lg
                                      placeholder-sora" type="text"
                                       name="source" id="source"
                                       onkeyup="changeTheColorOfButtonDemo()"
                                        placeholder="Source" required></div>
                                </div>
                                <div class="col-12 mb-4">
                                    <div class="mt-4"><input
                                    style="border-radius:30px;
                                    border:1px grey solid;"
                                    class="form-control
                                    form-control-lg
                                    placeholder-sora"
                                    type="text"
                                    name="link"
                                    id="link" onkeyup="changeTheColorOfButtonDemo()" placeholder="Link" required><input class="form-control form-control-lg mt-3 border-0  placeholder-sora" type="hidden" name="push" id="push" value="0" required>

                                    </div>
                                </div>
                                <div class="col-12 mt-50 mb-4">
                                    <div class="row text-center d-flex justify-content-center " id="submits">
                                        <div class="col-10" style="border-radius:30px;">
                                        <button
                                        style="outline-style:none;border-radius:30px;
                                        font-family:Sora-SemiBold; background-color:#e7e7e7;"
                                        class="col-12 btn btn-lg p-4 pe-md-5 ps-md-5
                                        btn-dark text-white"
                                         name="add_link"
                                          id="add_link"
                                           onclick="unactivePush()">Add inspiration</button></div>
                                        <div class="col-2">
                                            <img id="disable" src="assets/images/upload1.png" alt="" style="width:70px;">
                                            <img id="enable" src="assets/images/link.png" alt="" style="width:70px;">
                                        </div>
                                    </div>
                                </div>

                        </form>


                    </div>
                </div>

            </div>
        </div>
    </div>


        <div class="text-center d-md-block d-none text-muted w-100 p-2 pt-4 bg-white">
            <p>Copyright © Hopeful Bamboo Inc. All rights reserved.</p>
        </div>
        <div class="text-center d-md-none d-block text-muted w-100 p-2 pt-4 bg-white">
            <p>Copyright © Hopeful Bamboo Inc. All rights reserved.</p>
        </div>

    <?php
include 'include/footer_script.php';
?>
    <script type="text/javascript">

                    function headingOneClick(){
                    /// jquery detect css display property
                    if($('#collapseOne').css('display') == 'none'){
                        // hide heading one
                        $("#item1").html('<img src="assets/images/before.png"width="20.45px"height="10px"class="mt-2 me-2"/>');
                        $('#collapseOne').css('display', 'block');
                    }else{
                        // show heading one
                        $("#item1").html('<img src="assets/images/after.png"width="20.45px"height="10px"class="mt-2 me-2"/>');
                        $('#collapseOne').css('display', 'none');

                    }
                }
                    function headingTwoClick(){
                    /// jquery detect css display property
                    if($('#collapseTwo').css('display') == 'none'){
                        // hide heading one
                        $("#item2").html('<img src="assets/images/before.png"width="20.45px"height="10px"class="mt-2 me-2"/>');
                        $('#collapseTwo').css('display', 'block');
                    }else{
                        // show heading one
                        $("#item2").html('<img src="assets/images/after.png"width="20.45px"height="10px"class="mt-2 me-2"/>');
                        $('#collapseTwo').css('display', 'none');

                    }
                   
                }


                        

                
  

        $(document).ready(function() {
            // hide heading one
    $("#item1").html('<img src="assets/images/after.png"width="20.45px"height="10px"class="mt-2 me-2"/>');
    $("#item2").html('<img src="assets/images/after.png"width="20.45px"height="10px"class="mt-2 me-2"/>');
    $('#collapseOne').css('display', 'none');
    $('#collapseTwo').css('display', 'none');

    $("#search").on("keyup", function() {
    var value = $(this).val().toLowerCase();
    $(".myDiv").filter(function() {
      $(this).toggle($(this).text().toLowerCase().indexOf(value) > 0)
    });
  });

        // search logic
            $('#close-search').hide()

            // $('#push-btn').hide()
            // $('#add-btn').hide()
            // show close saech btn
            $('#search').keyup(function() {
                if($('#search').val() == ''){
                    $('#close-search').hide()
                } else {

                    $('#close-search').show()
                $('#search').css('border-radius', '30px 0px 0px 30px')
                $('#close-search').css('border-radius', '0px 30px 30px 0px')
                }
            });
            // set value of search to null
            $('#close-search').click(function() {
                $('#close-search').hide()
                $('#search').val('')
            });
        // search logic end
        // add inspiration
        $('#description').keyup(function() {
            viewDes()
            });
            
        $('#link').keyup(function() {
            viewDes()
            });
            function  viewDes() {
            var description=$('#description').val()
            var link=$('#link').val()
            if(description.length >0 && link.length >0 ) {
            $('#push-btn').css('display', 'flex')
            $('#add-btn').css('display', 'flex')
            }
            else {
                $('#push-btn').css('display', 'none')
            $('#add-btn').css('display', 'none')
            }
        }
        // add inspiration end
        // login update
        $('#current-login').keyup(function() {
            viewLogin()
            });
        $('#new-login').keyup(function() {
            viewLogin()
            });
        $('#confirm-new-login').keyup(function() {
            viewLogin()
            });
       
        function  viewLogin() {
            var currentLogin=$('#current-login').val()
            var newLogin=$('#new-login').val()
            var confirmNewLogin=$('#confirm-new-login').val()
            if(currentLogin.length >0 && newLogin.length >0 && confirmNewLogin.length >0 ) {
            $('#update-email').css('display', 'flex')
            }
            else {
                $('#update-email').css('display', 'none')
            }
        }  
        // login update end
        // password update
        $('#current-password').keyup(function() {
            viewPassword()
            });
        $('#new-password').keyup(function() {
            viewPassword()
            });
        $('#confirm-new-password').keyup(function() {
            viewPassword()
            });
       
        function  viewPassword() {
            var currentPassword=$('#current-password').val()
            var newPassword=$('#new-password').val()
            var confirmNewPassword=$('#confirm-new-password').val()
            if(currentPassword.length >0 && newPassword.length >0 && confirmNewPassword.length >0 ) {
            $('#update-pass').css('display', 'flex')
            }
            else {
                $('#update-pass').css('display', 'none')
            }
        }  
        // password update end
      
        
        });   
          // onlaod 
        function  hidePush() {
            $('#push-btn').css('display', 'none')
            $('#update-email').css('display', 'none')
            $('#add-btn').css('display', 'none')
            $('#update-pass').css('display', 'none')
            }
        function  updateLogin() {
            var currentLogin=$('#current-login').val()
            var newLogin=$('#new-login').val()
            var confirmNewLogin=$('#confirm-new-login').val()
            if(currentLogin!='<?php echo $_SESSION['email']?>') {
                var x=`<div class="alert alert-warning alert-dismissible fade show border-0"
                style="color:white;background-color:#E39C5F;"
                role="alert">
                    <i class="fa fa-exclamation-circle me-2" style="font-size:20px;color:white;background-color:#E39C5F!important;"></i>
                Current login doesn’t match
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>`;
                $('#msg').html(x)
                setTimeout(() => {
                    $('#msg').html('');
                }, 1500);
                return false;
            } 
            else if(newLogin==confirmNewLogin) {
                return true;
            } 
            else if(newLogin!=confirmNewLogin) {
                var x=`<div class="alert alert-warning alert-dismissible fade show border-0"
                style="color:white;background-color:#E39C5F;"
                role="alert">
                    <i class="fa fa-exclamation-circle me-2" style="font-size:20px;color:white;background-color:#E39C5F!important;"></i>
                New login doesn’t match
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>`;
                $('#msg').html(x)
                setTimeout(() => {
                    $('#msg').html('');
                }, 1500);
                return false;
            } 

        }
        function  updatePassword() {
            var currentPassword=$('#current-password').val()
            var newPassword=$('#new-password').val()
            var confirmNewPassword=$('#confirm-new-password').val()
            if(currentPassword!='<?php echo $_SESSION['password']?>') {
                var x=`<div class="d-flex justify-content-between
                    align-items-center
                    w-100 alert alert-warning alert-dismissible fade show border-0"
                            style="color:white;background-color:#E39C5F;"
                            role="alert">
                            <div
                            class="d-flex align-items-center"
                            >
                                <i class="fa fa-exclamation-circle me-2" style="font-size:20px;color:white;background-color:#E39C5F!important;"></i>
                            Current Password is incorrect
                            </div>
                            <div
                    data-bs-dismiss="alert"
                    class="btn border-0"
                    >
                    <i 
                    class="fa fa-close " style="font-size:15px;color:white!important;"></i>
                    </div>
                </div>`;
                $('#msg').html(x)
                setTimeout(() => {
                    $('#msg').html('');
                }, 1500);
                return false;
            } 
            else if(newPassword==confirmNewPassword) {
                return true;
            } 
            else if(newPassword!=confirmNewPassword) {
                var x=`<div class="d-flex justify-content-between
                    align-items-center
                    w-100 alert alert-warning alert-dismissible fade show border-0"
                            style="color:white;background-color:#E39C5F;"
                            role="alert">
                            <div
                            class="d-flex align-items-center"
                            >
                                <i class="fa fa-exclamation-circle me-2" style="font-size:20px;color:white;background-color:#E39C5F!important;"></i>
                            New Password doesn’t match
                            </div>
                            <div
                    data-bs-dismiss="alert"
                    class="btn border-0"
                    >
                    <i 
                    class="fa fa-close " style="font-size:15px;color:white!important;"></i>
                    </div>
                </div>`;
                $('#msg').html(x)
                setTimeout(() => {
                    $('#msg').html('');
                }, 1500);
                return false;
            } 

        }
        const isValidUrl = urlString=> {
            try { 
                return Boolean(new URL(urlString)); 
            }
            catch(e){ 
                return false; 
            }
        }
        function  checkLink() {
            var link=$('#link').val()
            var x= isValidUrl(link);
            if(x==true) {
                return true;
            } else {
                var x=`<div class="d-flex justify-content-between
                    align-items-center
                    w-100 alert alert-warning alert-dismissible fade show border-0"
                            style="color:white;background-color:#E39C5F;"
                            role="alert">
                            <div
                            class="d-flex align-items-center"
                            >
                                <i class="fa fa-exclamation-circle me-2" style="font-size:20px;color:white;background-color:#E39C5F!important;"></i>
                                Inspiration link is not valid
                            </div>
                            <div
                    data-bs-dismiss="alert"
                    class="btn border-0"
                    >
                    <i 
                    class="fa fa-close " style="font-size:15px;color:white!important;"></i>
                    </div>
                </div>`;
                $('#msg').html(x)
                setTimeout(() => {
                    $('#msg').html('');
                }, 1500);
            }
            return false;

        }
    </script>
   
   
        
    <?php 
        if(isset($_GET['msg'])) { if ($_GET['msg']=='email_updated_successfully') {
           ?>
           <script>
           var x=`<div class="alert d-flex justify-content-between
        align-items-center
        w-100
                alert-white alert-dismissible fade show"
            style="color:#E39C5F;border:1px solid #E39C5F;"
            role="alert">
        <div
        class="d-flex align-items-center"
        >
        <i class="fa fa-check-circle me-2" style="font-size:20px;color:#E39C5F!important;"></i>
        Login updated
        </div>
        <div
        data-bs-dismiss="alert"
        class="btn border-0"
        onclick="javascript:window.location.href='dashboard.php';"
        >
        <i 
        class="fa fa-close " style="font-size:15px;color:#E39C5F!important;"></i>
        </div>
    </div>`;
    $('#msg').html(x)
                setTimeout(() => {
                    $('#msg').html('');
                }, 3000);
           </script>
        <?php   }} ?>
    <?php 
        if(isset($_GET['msg'])) { if ($_GET['msg']=='password_updated_successfully') {
           ?>
           <script>
           var x=`<div class="alert d-flex justify-content-between
        align-items-center
        w-100
                alert-white alert-dismissible fade show"
            style="color:#E39C5F;border:1px solid #E39C5F;"
            role="alert">
        <div
        class="d-flex align-items-center"
        >
        <i class="fa fa-check-circle me-2" style="font-size:20px;color:#E39C5F!important;"></i>
        Password updated
        </div>
        <div
        data-bs-dismiss="alert"
        class="btn border-0"
        onclick="javascript:window.location.href='dashboard.php';"
        >
        <i 
        class="fa fa-close " style="font-size:15px;color:#E39C5F!important;"></i>
        </div>
    </div>`;
    $('#msg').html(x)
                setTimeout(() => {
                    $('#msg').html('');
                }, 3000);
           </script>
        <?php   }} ?>
    <?php 
        if(isset($_GET['msg'])) { if ($_GET['msg']=='link_already_exist') {
           ?>
           <script>
           var x=`<div class="d-flex justify-content-between
                    align-items-center
                    w-100 alert alert-warning alert-dismissible fade show border-0"
                            style="color:white;background-color:#E39C5F;"
                            role="alert">
                            <div
                            class="d-flex align-items-center"
                            >
                                <i class="fa fa-exclamation-circle me-2" style="font-size:20px;color:white;background-color:#E39C5F!important;"></i>
                                Inspiration link Already Exist
                            </div>
                            <div
                    data-bs-dismiss="alert"
                    class="btn border-0"
                    >
                    <i 
                    class="fa fa-close " style="font-size:15px;color:white!important;"></i>
                    </div>
                </div>`;
    $('#msg').html(x)
                setTimeout(() => {
                    $('#msg').html('');
                }, 5000);
           </script>
        <?php   }} ?>
    <?php 
        if(isset($_GET['msg'])) { if ($_GET['msg']=='can_not_push_more_than_3_links') {
           ?>
           <script>
           var x=`<div class="d-flex justify-content-between
                    align-items-center
                    w-100 alert alert-warning alert-dismissible fade show border-0"
                            style="color:white;background-color:#E39C5F;"
                            role="alert">
                            <div
                            class="d-flex align-items-center"
                            >
                                <i class="fa fa-exclamation-circle me-2" style="font-size:20px;color:white;background-color:#E39C5F!important;"></i>
                                Inspiration Push Limit Exceeded
                            </div>
                            <div
                    data-bs-dismiss="alert"
                    class="btn border-0"
                    >
                    <i 
                    class="fa fa-close " style="font-size:15px;color:white!important;"></i>
                    </div>
                </div>`;
    $('#msg').html(x)
                setTimeout(() => {
                    $('#msg').html('');
                }, 5000);
           </script>
        <?php   }} ?>

        <?php 
        if(isset($_GET['msg'])) { if ($_GET['msg']=='link_added_successfully') {
           ?>
           <script>
           var x=`<div class="alert d-flex justify-content-between
        align-items-center
        w-100
                alert-white alert-dismissible fade show"
            style="color:#E39C5F;border:1px solid #E39C5F;"
            role="alert">
        <div
        class="d-flex align-items-center"
        >
        <i class="fa fa-check-circle me-2" style="font-size:20px;color:#E39C5F!important;"></i>
        Inspiration added
        </div>
        <div
        data-bs-dismiss="alert"
        class="btn border-0"
        onclick="javascript:window.location.href='dashboard.php';"
        >
        <i 
        class="fa fa-close " style="font-size:15px;color:#E39C5F!important;"></i>
        </div>
    </div>`;
    $('#msg').html(x)
                setTimeout(() => {
                    $('#msg').html('');
                }, 3000);
           </script>
        <?php   }} ?>
        <?php 
        if(isset($_GET['msg'])) { if ($_GET['msg']=='link_added_successfully_and_pushed') {
           ?>
           <script>
           var x=`<div class="alert d-flex justify-content-between
        align-items-center
        w-100
                alert-white alert-dismissible fade show"
            style="color:#E39C5F;border:1px solid #E39C5F;"
            role="alert">
        <div
        class="d-flex align-items-center"
        >
        <i class="fa fa-check-circle me-2" style="font-size:20px;color:#E39C5F!important;"></i>
        Inspiration added and pushed
        </div>
        <div
        data-bs-dismiss="alert"
        class="btn border-0"
        onclick="javascript:window.location.href='dashboard.php';"
        >
        <i 
        class="fa fa-close " style="font-size:15px;color:#E39C5F!important;"></i>
        </div>
    </div>`;
    $('#msg').html(x)
                setTimeout(() => {
                    $('#msg').html('');
                }, 3000);
           </script>
        <?php   }} ?>
        <?php 
        if(isset($_GET['msg'])) { if ($_GET['msg']=='deleted') {
           ?>
           <script>
           var x=`<div class="alert d-flex justify-content-between
        align-items-center
        w-100
                alert-white alert-dismissible fade show"
            style="color:#E39C5F;border:1px solid #E39C5F;"
            role="alert">
        <div
        class="d-flex align-items-center"
        >
        <i class="fa fa-check-circle me-2" style="font-size:20px;color:#E39C5F!important;"></i>
        Inspiration deleted
        </div>
        <div
        data-bs-dismiss="alert"
        class="btn border-0"
        onclick="javascript:window.location.href='dashboard.php';"
        >
        <i 
        class="fa fa-close " style="font-size:15px;color:#E39C5F!important;"></i>
        </div>
    </div>`;
    $('#msg').html(x)
                setTimeout(() => {
                    $('#msg').html('');
                }, 3000);
           </script>
        <?php   }} ?>
        <?php 
        if(isset($_GET['msg'])) { if ($_GET['msg']=='link_unpushed') {
           ?>
           <script>
           var x=`<div class="alert d-flex justify-content-between
        align-items-center
        w-100
                alert-white alert-dismissible fade show"
            style="color:#E39C5F;border:1px solid #E39C5F;"
            role="alert">
        <div
        class="d-flex align-items-center"
        >
        <i class="fa fa-check-circle me-2" style="font-size:20px;color:#E39C5F!important;"></i>
        Inspiration unpushed
        </div>
        <div
        data-bs-dismiss="alert"
        class="btn border-0"
        onclick="javascript:window.location.href='dashboard.php';"
        >
        <i 
        class="fa fa-close " style="font-size:15px;color:#E39C5F!important;"></i>
        </div>
    </div>`;
    $('#msg').html(x)
                setTimeout(() => {
                    $('#msg').html('');
                }, 3000);
           </script>
        <?php   }} ?>
        <?php 
        if(isset($_GET['msg'])) { if ($_GET['msg']=='link_pushed') {
           ?>
           <script>
           var x=`<div class="alert d-flex justify-content-between
        align-items-center
        w-100
                alert-white alert-dismissible fade show"
            style="color:#E39C5F;border:1px solid #E39C5F;"
            role="alert">
        <div
        class="d-flex align-items-center"
        >
        <i class="fa fa-check-circle me-2" style="font-size:20px;color:#E39C5F!important;"></i>
        Inspiration pushed
        </div>
        <div
        data-bs-dismiss="alert"
        class="btn border-0"
        onclick="javascript:window.location.href='dashboard.php';"
        >
        <i 
        class="fa fa-close " style="font-size:15px;color:#E39C5F!important;"></i>
        </div>
    </div>`;
    $('#msg').html(x)
                setTimeout(() => {
                    $('#msg').html('');
                }, 3000);
           </script>
        <?php   }} ?>
   


</body>

</html>