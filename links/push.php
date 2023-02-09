
<?php 
session_start();

include('../include/db.php');

$sql="SELECT * FROM links WHERE pushed='1'";
    $run=mysqli_query($conn,$sql);
     $count=mysqli_num_rows($run);
    if($count>=3) {
        header('location:../dashboard.php?msg=can_not_push_more_than_3_links');
    } else {
        $sql="UPDATE links set pushed='1' WHERE id='$_GET[id]'";
        $run=mysqli_query($conn,$sql);
        if($run) {
            echo 'done';
            header('location:../dashboard.php?msg=link_pushed');
          
        } else {
            echo 'some technical error';
        }
    }        


        
   

?>



