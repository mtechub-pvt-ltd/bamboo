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



    <div class="wrapper" style="background-color:#fcf2e7;">


        <?php
    include('include/header.php');
    ?>



        <div class="page-body px-xl-4 px-sm-2 px-0 py-lg-2 py-1 mt-3 mt-lg-5">
            <div class="container-fluid container-90">
                <div class="row g-3 row-deck">
                    <div class="col-12 w-100">
                        <div class="card border-0 p-40 radius-25">

                            <div class="row">
                                <div class="col-md-4 col-6">
                                    <div>
                                        <h4>2321 Resources</h4>

                                        <p 
                                        class="col-md-4 col-12 pointer"
                                        data-bs-toggle="dropdown" aria-expanded="false">
                                            Recently Added <i class="fa-solid fa-angle-down pt-2"></i>
                                        </p>
                                        <ul class="dropdown-menu border-0" style="background-color:#fcf2e7;">
                                            <li><a class="dropdown-item items" href="#">Old to new</a></li>
                                            <li><a class="dropdown-item items" href="#">Least seen</a></li>
                                            <li><a class="dropdown-item items" href="#">Most seen</a></li>
                                            <li><a class="dropdown-item items" href="#">Inactive</a></li>
                                            <li><a class="dropdown-item items" href="#">Pushed</a></li>
                                        </ul>

                                    </div>

                                </div>
                                <div class="col-md-4 col-6 d-md-none  d-block text-end">

                                    <button type="submit" style="font-family:Sora-SemiBold;"
                                        class="btn btn-lg p-2 pe-md-5 ps-md-5 btn-dark" data-bs-toggle="modal"
                                        data-bs-target="#exampleModal">Add a resource</button>

                                </div>
                                <div class="col-md-4 col-12 mt-md-0 mt-2">
                                    <div class="input-group">
                                        <span class="input-group-text border-0 ps-3"
                                            style="background-color:#fcf2e7;border-radius:15px 0px 0px 15px;"><i
                                                class="fa-solid fa-magnifying-glass "
                                                style="color:#d1a577;font-size:20px;"></i></span>
                                        <input type="text" style="border-radius:0px 15px 15px 0px;"
                                            class="form-control col-4 form-control-lg p-4 ps-0 border-0" 
                                            id="search"
                                            
                                            placeholder="Search Resources ...">
                                    </div>
                                </div>
                                <div class="col-md-4 col-6 d-md-block  d-none text-end">

                                    <button style="font-family:Sora-SemiBold;"
                                        class="btn btn-lg p-4 pe-md-4 ps-md-4 btn-dark" data-bs-toggle="modal"
                                        data-bs-target="#exampleModal">Add a resource</button>

                                </div>
                                <div class="col-12 mt-3 text-center">
                                
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
                                            if($_GET['actions']=='star_updated') {
                                                echo 'Star Updated Successfully';
                                            }
                                            }
                                            ?>
                                    </p>
                                </div>
                            </div>

                            <div class="col-12 mt-4 mb-3 table-responsive">

                                <table class="table table-borderless">
                                    <thead>
                                        <tr class="border border-0">

                                            <th>Source</th>
                                            <th>Link Content</th>
                                            <th>Description</th>
                                            <th class="text-center">Action</th>

                                        </tr>
                                    </thead>
                                    <tbody id="table">
                                        <?php
                                          
                                          $sql='SELECT * FROM resources ORDER BY id DESC';
                                          $run=mysqli_query($conn,$sql);
                                          while($row=mysqli_fetch_assoc($run)) {
                                            if($row['star']==0) {
                                                echo '<tr
                                                class="border-bottom"
                                                style="border-bottom-color:#edd3b8!important;"
                                                >
                                                  <td class="pt-4" >'.$row['source'].'</td>
                                                  <td class="pt-4">'.$row['linked_content'].' Linked Content</td>
                                                  <td class="pt-4 ">'.$row['description'].'</td>
                                                  <td class="text-center d-flex  justify-content-center">
                                                    
                                                  <a href="resources/update_star.php?id='.$row['id'].'&star=1">  
                                                  <img class="me-2 pointer"
                                                  src="assets/images/star-outline.png" width="40px"/>
                                                  </a>
                                                    <img class="me-2 pointer" ';?>
                                        onclick="editData('<?php echo $row['id'];?>','<?php echo $row['source'];?>','<?php echo $row['description'];?>')"
                                        <?php echo 'src="assets/images/edit.png" width="40px"/>
                                                    <a href="resources/delete.php?id='.$row['id'].'">
                                                    <img src="assets/images/delete.png" width="40px"/>
                                                    </a>
                                                    
                                                  </td>
                                                </tr>';
                                            } else {
                                                echo '<tr
                                                class="border-bottom"
                                                
                                                style="border-bottom-color:#edd3b8!important;"
                                                >
                                                  <td
                                                  style="border-top-left-radius:15px;
                                                    border-bottom-left-radius:15px;
                                                    background-color:#fbeedf;
                                                    "
                                                  class="pt-4 bg-new2">'.$row['source'].'</td>
                                                  <td 
                                                  style="
                                                    background-color:#fbeedf;
                                                    "
                                                  class="pt-4">'.$row['linked_content'].' Linked Content</td>
                                                  <td
                                                  style="
                                                    background-color:#fbeedf;
                                                    "
                                                  class="pt-4">'.$row['description'].'</td>
                                                  <td
                                                  style="
                                                    background-color:#fbeedf;
                                                    border-top-right-radius:15px;
                                                    border-bottom-right-radius:15px;
                                                    "
                                                  class="text-center d-flex  justify-content-center">
                                                    
                                                    <a href="resources/update_star.php?id='.$row['id'].'&star=0">  
                                                    <img class="me-2 pointer"
                                                    src="assets/images/star.png" width="40px"/>
                                                    </a>
                                                    <img class="me-2 pointer" ';?>
                                        onclick="editData('<?php echo $row['id'];?>','<?php echo $row['source'];?>','<?php echo $row['description'];?>')"
                                        <?php echo 'src="assets/images/edit.png" width="40px"/>
                                                    <a href="resources/delete.php?id='.$row['id'].'">
                                                    <img src="assets/images/delete.png" width="40px"/>
                                                    </a>
                                                    
                                                  </td>
                                                </tr>';
                                            }
                                            
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
        <div class="modal fade" id="exampleModal2" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered modal-lg">
                <div class="modal-content radius-25" style="background-color:#fae7d4;">

                    <div class="modal-body p-60">
                        <form class="row" id="editForm" method="POST">
                            <div class="col-12 mt-2  mb-50 text-center">
                                <h3 class="mt-2 ">Edit a resource</h3>
                                <p class="mt-2">If it Promotes good mental health, edit it.</p>
                                <p id="success_msg2" class="mt-3 text-success"></p>


                            </div>

                            <div class="col-12">
                                <div class="">

                                    <input type="hidden" class="form-control 
                                form-control-lg border-0 placeholder-sora" name="update_id" id="update_id"
                                        placeholder="" style="" required>
                                    <input type="text" class="form-control 
                                form-control-lg border-0 placeholder-sora" name="update_source" id="update_source"
                                        placeholder="What's the source?" style="" required>
                                </div>
                                <p id="error_msg2" class="mt-3  text-danger2"></p>
                            </div>

                            <div class="col-12">
                                <div class="mt-4">

                                    <input class="form-control form-control-lg  border-0  placeholder-sora" type="text"
                                        maxlength="1000" name="update_description" id="update_description"
                                        placeholder="What's it about?" required>
                                </div>
                            </div>

                            <div class="col-12 mt-50 mb-4">
                                <div class="row">
                                    <div class="col">
                                        <button style="font-family:Sora-SemiBold;"
                                            class="col-12 btn btn-lg p-4 pe-md-5 ps-md-5 btn-dark" id="edit_member">Save
                                        </button>
                                    </div>

                                </div>



                        </form>


                    </div>
                </div>

            </div>
        </div>



    </div>

    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-lg">
            <div class="modal-content radius-25" style="background-color:#fae7d4;">

                <div class="modal-body p-60">
                    <form class="row" id="addform" method="POST">
                        <div class="col-12 mt-2  mb-50 text-center">
                            <h3 class="mt-2 ">Add a resource</h3>
                            <p class="mt-2">If it Promotes good mental health, add it as a resource.</p>
                            <p id="success_msg" class="mt-3 text-success"></p>

                        </div>

                        <div class="col-12">
                            <div class="">

                                <input type="text" class="form-control 
                                form-control-lg border-0 placeholder-sora" name="source" id="source"
                                    placeholder="What's the source?" style="" required>
                            </div>
                            <p id="error_msg" class="mt-3 text-danger2"></p>
                        </div>

                        <div class="col-12">
                            <div class="mt-4">

                                <input class="form-control form-control-lg  border-0  placeholder-sora" type="text"
                                    maxlength="1000" name="description" placeholder="What's it about?" required>
                            </div>
                        </div>

                        <div class="col-12 mt-50 mb-4">
                            <div class="row">
                                <div class="col">
                                    <button style="font-family:Sora-SemiBold;"
                                        class="col-12 btn btn-lg p-4 pe-md-5 ps-md-5 btn-dark" id="add_resource">Add
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
    include('include/footer_script.php');
    ?>
    <script type="text/javascript">
    var loader = `<div class="spinner-border" role="status">
                    <span class="sr-only">Loading...</span>
                    </div>`;
    const isValidUrl = urlString => {
        var urlPattern = new RegExp('^(https?:\\/\\/)?' + // validate protocol
            '((([a-z\\d]([a-z\\d-]*[a-z\\d])*)\\.)+[a-z]{2,}|' + // validate domain name
            '((\\d{1,3}\\.){3}\\d{1,3}))' + // validate OR ip (v4) address
            '(\\:\\d+)?(\\/[-a-z\\d%_.~+]*)*' + // validate port and path
            '(\\?[;&a-z\\d%_.~+=-]*)?' + // validate query string
            '(\\#[-a-z\\d_]*)?$', 'i'); // validate fragment locator
        return !!urlPattern.test(urlString);
    }
    // change color : 

    $(document).ready(function() {
        // delte msg 

        setTimeout(function() {
            $('#delete_msg').hide()
            $('#update_msg').hide()
            $('#error_msg').hide()
            $('#error_msg2').hide();
        }, 1500)
        // add form 
        $('#addform').submit(function(e) {
            e.preventDefault();
            $('#add_resource').prop('disabled', true);
            $('#add_resource').html(loader)

            var valid = (isValidUrl($('#source').val()));
            if (valid == true) {
                $.ajax({
                    type: "POST",
                    url: 'resources/add.php',
                    data: $(this).serialize(),
                    success: function(response) {
                        x = JSON.parse(response)
                        if (x.message == 'data_added') {
                            // alert(x.message)
                            $('#success_msg').html('Resource Added Successfully')
                            setTimeout(function() {
                                // $('#success_msg').html('')
                                $('#addform').trigger("reset");
                                $('#exampleModal').modal('hide')
                                window.location.href='resources.php'
                            }, 1500)
                        } else {
                            alert(x)

                        }

                    }
                });
            } else {
                e.preventDefault();
                $('#source').css({
                    'color': 'red'
                });

                $('#error_msg').html('Ops ,Looks like Link is wrong')
                $('#error_msg').show();
                $('#add_resource').prop('disabled', false);
                $('#add_resource').html('Save')
                setTimeout(function() {

                    $('#error_msg').hide();
                }, 1500)
            }


        });
        $("#source").on({
            keyup: function() {
                $(this).css("color", "black");
                $('#error_msg').hide();
            }
        });
        $("#update_source").on({
            keyup: function() {
                $(this).css("color", "black");
                $('#error_msg2').hide();
            }
        });

        //edit form
        $('#editForm').submit(function(e) {
            e.preventDefault();
            $('#edit_member').prop('disabled', true);
            $('#edit_member').html(loader)

            var valid = (isValidUrl($('#update_source').val()));
            if (valid == true) {
                //   alert('form ok')
                $('#edit_member').prop('disabled', true);
                $('#edit_member').html(loader)
                $.ajax({
                    type: "POST",
                    url: 'resources/update.php',
                    data: $(this).serialize(),
                    success: function(response) {
                        // alert(response)
                        $('#edit_member').prop('disabled', false);
                        $('#edit_member').html('Save')
                        x = JSON.parse(response)
                        if (x.message == 'data_updated') {
                            // alert(x.message)
                            $('#success_msg2').html('Resource Updated Successfully')
                            setTimeout(function() {
                                // $('#success_msg').html('')
                                $('#editForm').trigger("reset");
                                $('#exampleModal2').modal('hide')
                                window.location.reload()
                            }, 1500)
                        } else {
                            alert(x)

                        }
                    }
                });
            } else {

                e.preventDefault();
                $('#update_source').css({
                    'color': 'red'
                });

                $('#error_msg2').html('Ops ,Looks like Link is wrong')
                $('#error_msg2').show();
                $('#edit_member').prop('disabled', false);
                $('#edit_member').html('Save')
                setTimeout(function() {

                    $('#error_msg2').hide();
                }, 1500)
            }


        });

    });


    // edit 
    function editData(id, source, description) {

        $('#edit_member').html(loader)
        $('#edit_member').prop('disabled', true);
        $('#exampleModal2').modal('show')
        setTimeout(function() {
            $('#edit_member').html('Save')
            $('#edit_member').prop('disabled', false);
            $('#update_id').val(id)
            $('#update_source').val(source)
            $('#update_description').val(description)
        }, 1000)


    }
    </script>
    <script>
var $rows = $('#table tr');
$('#search').keyup(function() {
    var val = $.trim($(this).val()).replace(/ +/g, ' ').toLowerCase();
    
    $rows.show().filter(function() {
        var text = $(this).text().replace(/\s+/g, ' ').toLowerCase();
        return !~text.indexOf(val);
    }).hide();
});
</script>
</body>

</html>