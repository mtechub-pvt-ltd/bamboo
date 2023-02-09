
<?php 
session_start();

include('../include/db.php');

        // echo $_POST['topic'];
        // echo $_POST['source'];
        // echo $_POST['link'];
         
        // echo $_POST['id']; 

        $sql="UPDATE links SET topic='$_POST[topic]',
        source='$_POST[source]',link='$_POST[link]'
         WHERE
         id='$_POST[id]'
        ";
        $run=mysqli_query($conn,$sql);
        if($run) {
            echo 'done';
            header('location:../dashboard.php?actions=updated');
          
        } else {
            echo 'some technical error';
        }
   

?>



