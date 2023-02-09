
<?php 
session_start();

include('../include/db.php');
        $sql="UPDATE resources SET 
        star='$_GET[star]' WHERE 
        id='$_GET[id]'
        ";
        $run=mysqli_query($conn,$sql);
        if($run) {
            header('location:../resources.php?actions=star_updated');
        } else {
            echo 'some technical error';
        }
   

?>



