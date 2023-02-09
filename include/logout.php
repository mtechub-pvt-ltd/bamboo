
<?php 
session_start();

include('db.php');


session_unset();


    
    
   
    if(session_destroy()) {
        header('location:../index.php');
    }
  
    

?>



