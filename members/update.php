
<?php 
session_start();

include('../include/db.php');

        $sql="UPDATE user SET
        name='$_POST[name]',
        email='$_POST[email]',
        password='$_POST[password]' 
        WHERE id='$_POST[id]'";
        $run=mysqli_query($conn,$sql);
        if($run) {
            echo 'done';
            header('location:../members.php?actions=updated');
          
        } else {
            echo 'some technical error';
        }
   

?>



