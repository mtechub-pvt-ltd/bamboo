
<?php 
session_start();

include('../include/db.php');


if(isset($_GET['action'])) {
    $sql="UPDATE user SET email='$_GET[email]',password='$_GET[password]' WHERE role='admin'";
    $run=mysqli_query($conn,$sql);
    if($run) {
        echo 'done';
        echo $_SESSION['email']=$_GET['email'];
        echo $_SESSION['password']=$_GET['password'];
        header('location:../settings.php?actions=success');
      
    } else {
        echo 'some technical error';
    }

}

?>



