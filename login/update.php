
<?php 
session_start();
include('../include/db.php');


if(isset($_POST['update-email'])) {

        echo $newLogin=$_POST['new-login'];

    $sql="UPDATE user SET email='$newLogin' WHERE role='admin'";
    $run=mysqli_query($conn,$sql);
    if($run) {
        echo 'done';
        echo $_SESSION['email']=$newLogin;
        
        header('location:../dashboard.php?msg=email_updated_successfully');
      
    } else {
        echo 'some technical error';
    }

}

?>



