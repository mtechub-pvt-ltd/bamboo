
<?php 
session_start();

include('db.php');





	$email=$_POST['email'];
	$password=$_POST['password'];
	$login=0;
	$message=0;
	$added_by='';
	$role='';

    
    $sql="SELECT * FROM user";
    $run=mysqli_query($conn,$sql);
    while($row=mysqli_fetch_assoc($run)) {
        if($row['email']==$email 
        && $row['password']==$password 
        && $row['role']=='admin' 
        ) {
            $message='User exsist';
            $id=$row['id'];
            $role=$row['role'];
            $added_by=$row['added_by'];
            $login=1;
            break;
        }
        else {
            $message='email Not exsist';
        }
    }

    
    
    
   
    if($login==1) {
        echo $_SESSION['user_id']=$id;
        echo $_SESSION['email']=$_POST['email'];
        echo $_SESSION['password']=$_POST['password'];
        echo $_SESSION['role']=$role;
        echo $_SESSION['added_by']=$added_by;
        echo $_SESSION['login']='true';
        echo $message;
        header('location:../dashboard.php');

    }
    else {
        echo $message;
   header('location:../index.php?action=email_or_pass_wrong');         
    }


?>



