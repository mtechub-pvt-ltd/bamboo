
<?php 
session_start();

include('../include/db.php');

        
        $sql="DELETE FROM links WHERE id='$_GET[id]'";
        $run=mysqli_query($conn,$sql);
        $sql_u="DELETE FROM seen_link WHERE link_id	='$_GET[id]'";
        $run_u=mysqli_query($conn,$sql_u);
        if($run) {
            echo 'done';
            header('location:../dashboard.php?msg=deleted');
          
        } else {
            echo 'some technical error';
        }
   

?>



