
<?php 
session_start();
include('../include/db.php');


if(isset($_POST['update-pass'])) {

        echo $newPassword=$_POST['new-password'];

    $sql="UPDATE user SET password='$newPassword' WHERE role='admin'";
    $run=mysqli_query($conn,$sql);
    if($run) {
        echo 'done';
        echo $_SESSION['password']=$newPassword;  
        header('location:../dashboard.php?msg=password_updated_successfully');
      
    } else {
        echo 'some technical error';
    }

}

?>



