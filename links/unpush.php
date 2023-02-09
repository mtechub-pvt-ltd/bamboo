
<?php 
session_start();

include('../include/db.php');

        
        $sql="UPDATE links set pushed='0' WHERE id='$_GET[id]'";
        $run=mysqli_query($conn,$sql);
        if($run) {
            echo 'done';
            header('location:../dashboard.php?msg=link_unpushed');
          
        } else {
            echo 'some technical error';
        }
   

?>



