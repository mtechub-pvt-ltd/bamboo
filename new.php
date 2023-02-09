<div class="modal fade" id="exampleModal2" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-lg">
            <div class="modal-content " style="background-color:#ffffff; border-radius:50px;">
                <div class="modal-body p-60">
                    <form class="row" id="addForm2" method="POST" action="links/update.php">
                        <div class="col-12 mt-2  mb-50 text-center"><i style="color:#D89459; font-size:26px;" class="fa-solid fa-pencil "></i>
                            <h3 class="mt-3 ">What do you want to edit?</h3>
                            <p id="success_msg2" class="mt-3 text-success"></p>
                        </div>
                        <div class="col-12">
                            <div class=""><input type="hidden" class="form-control form-control-lg  placeholder-sora" style="border-radius:30px; border:1px grey solid;" name="id" id="id2" required><input type="text" class="form-control form-control-lg   placeholder-sora" style="border-radius:30px; border:1px grey solid;" name="source" onkeyup="changeTheColorOfButtonDemo1()" id="source2" placeholder="What's the source?" required></div>
                        </div>
                        <div class="col-12">
                            <div class="mt-4"><input class="form-control form-control-lg   placeholder-sora" style="border-radius:30px; border:1px grey solid;" type="text" name="topic" onkeyup="changeTheColorOfButtonDemo1()" id="topic2" placeholder="What's it about?" required></div>
                        </div>
                        <div class="col-12 mb-4">
                            <div class="mt-4"><input class="form-control form-control-lg  placeholder-sora" style="border-radius:30px; border:1px grey solid;" stype="text" name="link" onkeyup="changeTheColorOfButtonDemo1()" id="link2" placeholder="Paste the link" required><input class="form-control form-control-lg mt-3 border-0  placeholder-sora" type="hidden" name="push" id="push2" value="0" required>
                                <p id="error_msg2" class="mt-3 text-danger2"></p>
                            </div>
                        </div>
                        <div class="col-12  mb-4">
                            <div class="row text-center d-flex justify-content-center " id="submits2">
                                <div class="col"><button class="col-12 btn btn-lg p-4 pe-md-5 ps-md-5 btn-dark" style="font-family:Sora-SemiBold; border-radius:30px; " name="add_link" id="add_link" type="submit">Update </button></div>
                            </div>
                    </form>
                </div>
            </div>
        </div>
    </div>