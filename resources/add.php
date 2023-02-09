
<?php 
session_start();

include('../include/db.php');



        
        $sql="INSERT INTO resources(source,linked_content,description) VALUES
        ('$_POST[source]','0','$_POST[description]')";
        $run=mysqli_query($conn,$sql);
        if($run) {
            echo json_encode(
                array(
                    "message"=>'data_added'
                )
            );
        } else {
            echo 'some technical error';
        }
   

?>



