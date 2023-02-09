<?php

include('include/db.php');
if(isset($_SESSION['login'])) {

}
else {
  header('location:index.php');
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



    <div class="wrapper" style="background-coloir:#fcf2e7;">


        <?php
    include('include/header.php');
    ?>



        <div class="page-body px-xl-4 px-sm-2 px-0 py-lg-2 py-1 mt-3 mt-lg-5">
            <div class="container-fluid container-90">
                <div class="row g-3 row-deck">
                    <div class="col-12 w-100">
                        <div class="card border-0 p-40 radius-25">

                            <div class="row">
                                <div class="col-6">
                                    <div class="mt-md-4 mt-2">
                                        <h4>3 Members</h4>
                                    </div>

                                </div>

                                <div class="col-6 text-end">

                                    <button style="font-family:Sora-SemiBold;" class="btn btn-lg p-md-4 p-2  btn-dark"
                                        data-bs-toggle="modal" data-bs-target="#exampleModal">Add a member</button>

                                </div>
                                <div class="col-12 text-center">
                                    <p class="text-danger2" id="delete_msg">
                                        <?php
                                            if(isset($_GET['actions'])) {
                                            if($_GET['actions']=='deleted') {
                                                echo 'Member Deleted Successfully';
                                            }
                                            }
                                            ?>
                                    </p>
                                    <p class="text-success" id="update_msg">
                                        <?php
                                            if(isset($_GET['actions'])) {
                                            if($_GET['actions']=='updated') {
                                                echo 'Member Updated Successfully';
                                            }
                                            }
                                            ?>
                                    </p>
                                </div>
                            </div>

                            <div class="col-12 mt-5 mb-3 table-responsive">

                                <table class="table table-borderless">
                                    <thead>
                                        <tr class="border border-0">

                                            <th>Name</th>
                                            <th>Email</th>
                                            <th>Password</th>
                                            <th>Added By</th>
                                            <th class="text-center">Action</th>

                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                        $sql_u="SELECT * FROM user WHERE role='member' ORDER BY id DESC";
                                        $run_u=mysqli_query($conn,$sql_u);
                                        while($row_u=mysqli_fetch_assoc($run_u)) {
                                            echo '<tr
                                            class="border-bottom"
                                            style="border-bottom-color:#edd3b8!important;"
                                            >
                                              
                                              <td class="pt-4">'.$row_u['name'].'</td>
                                              <td class="pt-4">'.$row_u['email'].'</td>
                                              <td class="pt-4">'.$row_u['password'].' </td>
                                              <td class="pt-4">'.$row_u['added_by'].' </td>
                                              <td class="text-center d-flex  justify-content-center">
                                                <img class="me-2 pointer" ';?>

                                        onclick="editData('<?php echo $row_u['id'];?>','<?php echo $row_u['name'];?>','<?php echo $row_u['email'];?>','<?php echo $row_u['password'];?>')"

                                        <?php echo 'src="assets/images/edit.png" width="40px"/>
                                                <a href="members/delete.php?id='.$row_u['id'].'"><img src="assets/images/delete.png" width="40px"/></a>
                                                
                                              </td>
                                            </tr>';
                                        
                                        }
    
    ?>


                                    </tbody>
                                </table>


                            </div>




                        </div>
                    </div>

                </div>
            </div>
        </div>


    </div>


    <div class="modal" id="exampleModal2" tabindex="999" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-lg">
            <div class="modal-content radius-25" style="background-color:#fae7d4;">

                <div class="modal-body p-60">
                    <form class="row"  method="POST" action="members/update.php">
                        <div class="col-12 mt-2  mb-50 text-center">
                            <h3 class="mt-2 ">Edit a member</h3>
                            <p class="mt-2">If it Promotes good mental health, edit their info.</p>
                         
                        </div>

                        
                        <div class="col-12">
                            <div class="">

                                <input type="hidden" class="form-control form-control-lg border-0 placeholder-sora"
                                    name="id"
                                    id="id_update"
                                     placeholder="" required>
                                <input type="name" class="form-control form-control-lg border-0 placeholder-sora"
                                    name="name"
                                    id="name_update"
                                     placeholder="What's their name?" required>
                            </div>
                        </div>
                        <div class="col-12">
                            <div class="mt-4">

                                <input class="form-control form-control-lg  border-0  placeholder-sora" type="email"
                                    name="email"
                                    id="email_update"
                                    placeholder="What about email?" required>
                               
                            </div>
                        </div>
                        <div class="col-12">
                            <div class="mt-4">

                                <input class="form-control form-control-lg  border-0  placeholder-sora" type="password"
                                    name="password"
                                    id="password_update"
                                    placeholder="And password?" required>
                            </div>
                        </div>

                        <div class="col-12 mt-50 mb-4">
                            <div class="row mt-3">
                                <div class="col">

                                    <button style="font-family:Sora-SemiBold;"
                                        class="col-12 btn btn-lg p-4 pe-md-5 ps-md-5 btn-dark" type="submit"
                                        name="edit_member"
                                        id="edit_member"
                                        >Save </button>
                                </div>

                            </div>



                    </form>


                </div>
            </div>

        </div>
    </div>
    </div>
    <!-- aadd modal -->
    <div class="modal" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-lg">
            <div class="modal-content radius-25" style="background-color:#fae7d4;">

                <div class="modal-body p-60">
                    <form class="row" id="addform" method="POST" action="members/add.php">
                        <div class="col-12 mt-2  mb-50 text-center">

                            <h3 class="mt-2 ">Add a member</h3>
                            <p class="mt-2">If it Promotes good mental health, add them as a member.</p>
                            <p id="success_msg" class="mt-3 text-success"></p>
                        </div>

                        <div class="col-12">
                            <div class="">

                                <input type="name" class="form-control form-control-lg border-0 placeholder-sora"
                                    name="name" placeholder="What's their name?" required>
                            </div>
                        </div>
                        <div class="col-12">
                            <div class="mt-4">

                                <input class="form-control form-control-lg  border-0  placeholder-sora" type="email"
                                    name="email" placeholder="What about email?" required>
                                <p id="email_error" class="mt-3 text-danger2"></p>
                            </div>
                        </div>
                        <div class="col-12">
                            <div class="mt-4">

                                <input class="form-control form-control-lg  border-0  placeholder-sora" type="password"
                                    name="password" placeholder="And password?" required>
                            </div>
                        </div>

                        <div class="col-12 mt-50 mb-4">
                            <div class="row mt-3">
                                <div class="col">

                                    <button style="font-family:Sora-SemiBold;"
                                        class="col-12 btn btn-lg p-4 pe-md-5 ps-md-5 btn-dark" type="submit"
                                        id="add_member">Add </button>
                                </div>

                            </div>



                    </form>


                </div>
            </div>

        </div>
    </div>
    
    <!-- edit modal  -->
    





    <?php
    include('include/footer_script.php');
    ?>
    <script type="text/javascript">
    var loader = `<div class="spinner-border" role="status">
                    <span class="sr-only">Loading...</span>
                    </div>`;
    $(document).ready(function() {
        // delte msg 

        setTimeout(function() {
            $('#delete_msg').hide()
            $('#update_msg').hide()
        }, 1500)

        $('#addform').submit(function(e) {
            e.preventDefault();
            $('#add_member').prop('disabled', true);
            $('#add_member').html(loader)

            $.ajax({
                type: "POST",
                url: 'members/add.php',
                data: $(this).serialize(),
                success: function(response) {
                    x = JSON.parse(response)
                    setTimeout(function() {
                        $('#add_member').html('Add')
                        $('#add_member').prop('disabled', false);
                    }, 1500)
                    if (x.message == 'exsist_true') {
                        // alert(x.message)
                        $('#email_error').html('Email already Registered')
                        setTimeout(function() {
                            $('#email_error').html('')
                        }, 1500)
                    } else if (x.message == 'data_added') {
                        // alert(x.message)
                        $('#success_msg').html('Member Added Successfully')
                        setTimeout(function() {
                            $('#success_msg').html('')
                            $('#addform').trigger("reset");
                            $('#exampleModal').modal('hide')
                            window.location.reload()
                        }, 1500)
                    }

                }
            });
        });
    });
    // edit 
    function editData(id, name, email, password) {
        
            $('#edit_member').html(loader)
            $('#edit_member').prop('disabled', true);
        $('#exampleModal2').modal('show')
        setTimeout(function() {
                        $('#edit_member').html('Save')
                        $('#edit_member').prop('disabled', false);
                        $('#id_update').val(id)
                        $('#name_update').val(name)
                        $('#email_update').val(email)
                        $('#password_update').val(password)
                    }, 1000)
        
        
    }
    </script>
</body>

</html>