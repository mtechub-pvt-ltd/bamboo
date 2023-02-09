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

<body id="body" class="layout-1">



    <div class="wrapper" style="background-color:#ffffff;">


        <?php
include 'include/header.php';
?>



        <div class="page-body px-xl-4 px-sm-2 px-0 py-lg-2 py-1 mt-3 mt-lg-5">
            <div class="container-fluid container-90">
                <div class="row g-3 row-deck">

                    <div class="col-12 w-100">
                        <div class="card border-0 p-40 radius-25" style="background-color:#f5f5f7;border:1px solid lightgray!important;">

                            <div class="row">
                                
                               
                         
                                
                                <div class="">
                                    <div class="col-12 text-center">

                                        <p class="text-danger2" id="delete_msg">
                                            <?php
                                        if (isset($_GET['actions'])) {
                                            if ($_GET['actions'] == 'deleted') {
                                                echo 'Link Deleted Successfully';
                                            }
                                        }
                                        ?>
                                        </p>
                                        <p class="text-success" id="update_msg">
                                            <?php
                                            if (isset($_GET['actions'])) {
                                                if ($_GET['actions'] == 'updated') {
                                                    echo 'Link Updated Successfully';
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
                                                <th>Status</th>
                                                <th class="d-none">Link</th>
                                                <th>Title</th>
                                                <th>Source</th>
                                                <th>Seen Count</th>
                                                <th>Added By</th>
                                                <th class="text-center">Action</th>

                                            </tr>
                                        </thead>
                                        <tbody id="table">
                                            <?php
                $sql = 'SELECT * FROM links ORDER BY id DESC';
                $run = mysqli_query($conn, $sql);
                while ($row = mysqli_fetch_assoc($run)) {
                    echo '<tr
                        class="border-bottom"
                        style="border-bottom-color:#d6d0cc!important;
                        "
                        >';
                    if ($row['status'] == 'active') {
                        echo '<td class="pt-4"><i class="fa fa-circle ms-3 text-success2"></i></td>';
                    } else if ($row['status'] == 'expire') {
                        echo '<td class="pt-4"><i class="fa fa-circle ms-3 text-danger2"></i></td>';
                    } else if ($row['status'] == 'pushed') {
                        echo '<td class="pt-4  bg-new2">Pushed</td>';
                    }

                    echo '
                        <td class="pt-4 d-none">' . $row['link'] . '</td>
                        <td class="pt-4">' . $row['topic'] . '</td>
                            <td class="pt-4">' . $row['source'] . '</td>
                            <td class="pt-4">0 times</td>
                            <td class="pt-4">' . $row['added_by'] . '</td>
                            <td class="text-center d-flex justify-content
                            <a href="' . $row['link'] . '" target="_blank"> <img class="me-2 pointer" src="assets/images/view.png" width="40px"/></a>
                            <a href=""><img class="me-2 pointer" src="assets/images/link.png" width="40px"/></a>
                            <a
                            data-bs-toggle="modal"
                            data-bs-target="#exampleModal2"';
                    ?>

                                                onclick="editData('<?php echo $row['id']; ?>','<?php echo $row['source']; ?>','<?php echo $row['topic']; ?>','<?php echo $row['link']; ?>')"
                                            <?php echo '><img class="me-2 pointer" src="assets/images/edit.png" width="40px"/></a>

                                                    <a href="links/delete.php?id=' . $row['id'] . '"><img src="assets/images/delete.png" width="40px"/></a>

                                                    </td>
                                                </tr>';
                } ?>
                                            <div class="modal fade" id="exampleModal2" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                <div class="modal-dialog modal-dialog-centered modal-lg">
                                                    <div class="modal-content radius-25" style="background-color:#ffffff;">

                                                        <div class="modal-body p-60">
                                                            <form class="row" id="addForm2" method="POST" action="links/update.php">
                                                                <div class="col-12 mt-2  mb-50 text-center"><i style="color:#D89459; font-size:26px;" class="fa-solid fa-pencil "></i>
                                                                    <div class="col-12 mt-2  mb-50 text-center">
                                                                        <h3 class="mt-2 ">What do you want to edit?</h3>

                                                                        <p id="success_msg2" class="mt-3 text-success"></p>
                                                                    </div>

                                                                    <div class="col-12">
                                                                        <div class="">
                                                                            <input type="hidden" class="form-control form-control-lg placeholder-sora" name="id" id="id2" required>
                                                                            <input type="text" class="form-control form-control-lg placeholder-sora" style="border-radius:30px; border:1px grey solid" onkeyup="changeTheColorOfButtonDemo1()" name="source" id="source2" placeholder="What's the source?" required>
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-12">
                                                                        <div class="mt-4">

                                                                            <input class="form-control form-control-lg   placeholder-sora" style="border-radius:30px; border:1px grey solid" type="text" onkeyup="changeTheColorOfButtonDemo1()" name="topic" id="topic2" placeholder="What's it about?" required>
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-12 mb-4">
                                                                        <div class="mt-4">

                                                                            <input class="form-control form-control-lg   placeholder-sora" style="border-radius:30px; border:1px grey solid" type="text" onkeyup="changeTheColorOfButtonDemo1()" name="link" id="link2" placeholder="Paste the link" required>
                                                                            <input class="form-control form-control-lg mt-3   placeholder-sora" type="hidden" name="push" id="push2" value="0" required>
                                                                            <p id="error_msg2" class="mt-3 text-danger2"></p>
                                                                        </div>
                                                                    </div>

                                                                    <div class="col-12 mt-50 mb-4">
                                                                        <div class="row text-center d-flex justify-content-center " id="submits2">
                                                                            <div class="col">
                                                                                <button style="font-family:Sora-light; border-radius:50px; " class="col-12 btn btn-lg p-4 pe-md-5 ps-md-5 " name=" add_link" id="add_link2" type="submit">Update </button>
                                                                            </div>
                                                                        </div>




                                                            </form>


                                                        </div>
                                                    </div>

                                                </div>
                                            </div>
                                        </tbody>
                                    </table>


                                </div>




                            </div>
                        </div>

                    </div>
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


        <div class="fixed-bottom text-center d-md-block d-none text-muted w-100 p-2 pt-4 bg-white">
            <p>Copyright © Hopeful Bamboo Inc. All rights reserved.</p>
        </div>
        <div class="text-center d-md-none d-block text-muted w-100 p-2 pt-4 bg-white">
            <p>Copyright © Hopeful Bamboo Inc. All rights reserved.</p>
        </div>
        
    <?php
include 'include/footer_script.php';
?>
    <script type="text/javascript">
        var loader = `<div class="spinner-border" role="status">
                    <span class="sr-only">Loading...</span>
                    </div>`;

        var addfields = `<div class="col-10" style="border-radius:30px;">
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
        function activePush() {
            $('#push').val('1')
            submitData()
        }

        function changeColor() {

            alert('hi');
            $("#body").css("backdrop-filter", blur("5 px"));

        }

        function unactivePush() {
            $('#push').val('0')
            submitData()
        }
        // edit moddal data
        function editData(id, source, topic, link) {
            $('#id2').val(id);
            $('#source2').val(source);
            $('#topic2').val(topic);
            $('#link2').val(link);
        }
        // doc ready

        $(document).ready(function() {



            $('#enable').hide()
            $('#error_msg').hide()
            $('#error_msg2').hide();
            // }, 1500)
            // add form
            $('#addForm').submit(function(e) {
                e.preventDefault();
                $('#submits').prop('disabled', true);
                $('#submits').html(loader)

                var valid = (isValidUrl($('#link').val()));
                if (valid == true) {
                    // check link is already exsist or not
                    $.ajax({
                        url: 'links/check_link.php',
                        type: 'POST',
                        data: {
                            link: $('#link').val()
                        },
                        success: function(data) {
                            var x = JSON.parse(data);
                            $('#submits').prop('disabled', false);
                            $('#submits').html(addfields)
                            if (x.message == 1) {
                                $('#enable').hide()
                                $('#error_msg').html('This link already exists. Paste it in the search bar to find and check it.')
                                $('#error_msg').show()

                                setTimeout(function() {
                                    $('#error_msg').hide()
                                }, 1500)

                            }
                            if (x.message == 'all_ok') {
                                // alert(x.message)
                                // submit data
                                $('#enable').hide()
                                $.ajax({
                                    url: 'links/add.php',
                                    type: 'POST',
                                    data: {
                                        link: $('#link').val(),
                                        topic: $('#title').val(),
                                        source: $('#source').val(),
                                        push: $('#push').val()
                                    },
                                    success: function(data) {
                                        var x2 = JSON.parse(data);
                                        if (x2.message == '1') {
                                            $('#enable').hide()

                                            $('#success_msg').html(
                                                'Links Added Successfully')

                                            $('w#success_msg').show()
                                            setTimeout(function() {
                                                $('#success_msg').hide()
                                                window.location.href =
                                                    'dashboard.php'
                                            }, 1500)


                                        }
                                    }
                                })
                            }

                        }
                    })

                } else {

                    $('#link').css({
                        'color': 'red'
                    });
                    $('#error_msg').html('Please enter a valid link')
                    $('#error_msg').show()
                    setTimeout(function() {
                        $('#error_msg').hide()
                        $("#link").css("color", "black");
                    }, 1500)

                    $('#submits').prop('disabled', false);
                    $('#submits').html(addfields)
                    $('#enable').hide()
                }


            });

            // $("#link").on({
            //     keyup: function() {
            //         $(this).css("color", "black");
            //     }
            // })



        });

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
    <script>
        function changeTheColorOfButtonDemo1() {
            var title=$('#title').val()
            var source=$('#source').val()
            var link=$('#link').val()
           if(
            title.length==0 ||
            source.length==0 ||
            link.length==0
           ) {
            $('#enable').hide()
            $('#disable').show()
           } else {
            $('#enable').show()
            $('#disable').hide()
           }


            if (document.getElementById("link2").value !== "" && document.getElementById("topic2").value !== "" && document.getElementById("source2").value !== "") {

                document.getElementById("add_link2").style.background = "#D89459";

            } else {

                document.getElementById("add_link2").style.background = "#e7e7e7";

            }
        }
    </script>
    <script>
        function changeTheColorOfButtonDemo() {
            var title=$('#title').val()
            var source=$('#source').val()
            var link=$('#link').val()
           if(
            title.length==0 ||
            source.length==0 ||
            link.length==0
           ) {
            $('#enable').hide()
            $('#disable').show()
           } else {
            $('#enable').show()
            $('#disable').hide()
           }
            if (document.getElementById("title").value !== "" && document.getElementById("source").value !== "" && document.getElementById("link").value !== "") {
                document.getElementById("add_link").style.background = "#D89459";
                document.getElementById("push_link").style.background = "#D89459";
            } else {
                document.getElementById("add_link").style.background = "#e7e7e7";
                document.getElementById("push_link").style.background = "#e7e7e7";
            }
        }
    </script>
    <?php
if (isset($_GET['actions'])) {
    if ($_GET['actions'] == 'deleted') {
        echo '<script>
     setTimeout(function() {
        $("#delete_msg").hide()
    }, 1500)
     </script>';
    }
}
?>
    <?php
if (isset($_GET['actions'])) {
    if ($_GET['actions'] == 'updated') {
        echo '<script>
     setTimeout(function() {
        $("#update_msg").hide()
    }, 1500)
     </script>';
    }
}
?>
</body>

</html>