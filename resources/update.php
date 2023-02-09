
<?php 
session_start();

include('../include/db.php');

    // echo $_POST['update_id'];
    // echo $_POST['update_source'];
    // echo $_POST['update_description'];

        $sql="UPDATE resources SET 
        source='$_POST[update_source]',
        description='$_POST[update_description]' WHERE 
        id='$_POST[update_id]'
        ";
        $run=mysqli_query($conn,$sql);
        if($run) {
            echo json_encode(
                array(
                    "message"=>'data_updated'
                )
            );
          
        } else {
            echo 'some technical error';
        }
   

?>



