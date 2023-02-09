
<?php 
session_start();

include('../include/db.php');


        $exsist=0;
        $date=date('d-m-Y');
        if($_POST['push']==0) {
            $status='active';
        }
        else {
            $status='pushed';
        }
        

        
            $sql="INSERT INTO links (topic,source,link,seen_count,added_by,status) VALUES
            ('$_POST[topic]','$_POST[source]','$_POST[link]','0','$date','$status')";
            $run=mysqli_query($conn,$sql);
            if($run) {
                echo json_encode(
                    array(
                        "message"=>'1'
                    )
                );
            } else {
                echo json_encode(
                    array(
                        "message"=>'all_not_ok'
                    )
                );
            }
      

        
   

?>



