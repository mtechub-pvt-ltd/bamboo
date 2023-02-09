<header class="page-header d-md-block d-none sticky-top  ">
    <div class="container-fluid">
        <nav class="navbar">

            <a href="dashboard.php" class="d-flex">
                 <img src="assets/images/logo.png" alt="logo" class="col-5 me-2"> 
            </a>


            <div class="">
                <ul class="header-right  justify-content-end d-flex align-items-center mb-0 p-3 me-3">
                    <li
                    class="me-3"
                    >
                        <a class="nav-link dropdown-toggle after-none" href="include/logout.php">
                        <img src="assets/images/logout.png"
                        width="25.7px" height="25.7px"
                        alt="logo" class="img-fluid mt-1">
                        </a>
                    </li>
                    <li
                    class="me-3"
                    >
                        <a class="nav-link dropdown-toggle after-none" href="dashboard.php?setting">
                        <img src="assets/images/settings.png"
                        width="25.7px" height="25.7px"
                        alt="logo" class="img-fluid mt-1">
                        </a>
                    </li>
                    <li
                    class="me-3"
                    >
                        <a class="nav-link dropdown-toggle after-none" href="dashboard.php?search">
                        <img src="assets/images/search.png"
                        width="25.7px" height="25.7px"
                        alt="logo" class="img-fluid mt-1">
                        </a>
                    </li>
                    <li
                    class="me-3"
                    >
                        <a class="nav-link dropdown-toggle after-none" href="dashboard.php?add">
                        <img src="assets/images/add.png"
                        width="25.7px" height="25.7px"
                        alt="logo" class="img-fluid mt-1">
                        </a>
                    </li>
                    <li
                    class="me-3"
                    >
                        <a class="nav-link dropdown-toggle pt-2 after-none"
                        style="font-size: 23px;"
                        >
                       <?php
                       $sql0="SELECT * FROM links";
                          $run0=mysqli_query($conn,$sql0);
                          $count0=0;
                           while ($row0=mysqli_fetch_assoc($run0)) {
                            
                            $count0=(int)$row0['seen_count'] +$count0;
                           }
                            echo $count0;
                       ?>
                        </a>
                    </li>
                </ul>
            </div>
          
        </nav>
    </div>
</header>
<header class="page-header d-md-none d-block shadow-0 mb-0" style="box-shadow:0 0 0 0 black;">
    <div class="container-fluid shadow-0" style="box-shadow:0 0 0 0 black;">
        <nav class="navbar shadow-0" style="box-shadow:0 0 0 0 black;">
            <div class="row p-3">
                <div class="col text-left mt-2">
    
                <a href="dashboard.php" class="text-left">
                 <img src="assets/images/logo.png" alt="logo" class="col-11 "> 
            </a>
            </div>
                <div class="col header-right">
                <li class="me-3">
                        <a class="nav-link dropdown-toggle pt-2 after-none"
                        style="font-size: 23px;"
                        >
                        <?php
                       $sql1="SELECT * FROM links";
                          $run1=mysqli_query($conn,$sql1);
                          $count1=0;
                           while ($row1=mysqli_fetch_assoc($run1)) {
                            $count1=(int)$row1['seen_count']+$count1;
                           }
                            echo $count1;
                       ?>
                        </a>
                    </li>
                </div>
            </div>
            

                <ul class="header-right p-0 row w-100 mt-3">
                    <li
                    class="col"
                    >
                        <a class="nav-link dropdown-toggle after-none" href="include/logout.php">
                        <img src="assets/images/logout.png"
                        width="25.7px" height="25.7px"
                        alt="logo" class="img-fluid mt-1">
                        </a>
                    </li>
                    <li
                    class="col"
                    >
                        <a class="nav-link dropdown-toggle after-none" href="dashboard.php?setting">
                        <img src="assets/images/settings.png"
                        width="25.7px" height="25.7px"
                        alt="logo" class="img-fluid mt-1">
                        </a>
                    </li>
                    <li
                    class="col"
                    >
                        <a class="nav-link dropdown-toggle after-none" href="dashboard.php?search">
                        <img src="assets/images/search.png"
                        width="25.7px" height="25.7px"
                        alt="logo" class="img-fluid mt-1">
                        </a>
                    </li>
                    <li
                    class="col"
                    >
                        <a class="nav-link dropdown-toggle after-none" href="dashboard.php?add">
                        <img src="assets/images/add.png"
                        width="25.7px" height="25.7px"
                        alt="logo" class="img-fluid mt-1">
                        </a>
                    </li>
                    <!-- <li
                    class="me-3"
                    >
                        <a class="nav-link dropdown-toggle pt-2 after-none"
                        style="font-size: 23px;"
                        >
                       23456
                        </a>
                    </li> -->
                </ul>
         
          
        </nav>
    </div>
</header>