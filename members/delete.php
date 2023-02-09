
<?php 
session_start();

include('../include/db.php');

        
        $sql="DELETE FROM user WHERE id='$_GET[id]'";
        $run=mysqli_query($conn,$sql);
        if($run) {
            echo 'done';
             header('location:../members.php?actions=deleted');
          
        } else {
            echo 'some technical error';
        }
   

?>



