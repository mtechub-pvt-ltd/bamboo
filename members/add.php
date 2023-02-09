
<?php 
session_start();

include('../include/db.php');



    
    $exsist=0;
    $sql_u="SELECT * FROM user";
    $run_u=mysqli_query($conn,$sql_u);
    while($row_u=mysqli_fetch_assoc($run_u)) {
        if($row_u['email']==$_POST['email']) {
                $exsist=1;
                break;
        }
    }

    if($exsist==1) {
        echo json_encode(
            array(
                "message"=>'exsist_true'
            )
        );
    } else {
        $date=date('m-d-Y');
        $sql="INSERT INTO user(name,email,password,added_by,role) VALUES 
        ('$_POST[name]','$_POST[email]','$_POST[password]','$date','member')";
        $run=mysqli_query($conn,$sql);
        if($run) {
            echo json_encode(
                array(
                    "message"=>'data_added'
                )
            );
            // echo $_SESSION['email']=$_POST['email'];
            // echo $_SESSION['password']=$_POST['password'];
            // header('location:../settings.php?actions=success');
          
        } else {
            echo 'some technical error';
        }
    }

?>



