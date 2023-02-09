<?php
include ('db.php');


function checkemailexist($email){
    global $conn;
$sql = "SELECT COUNT(*) AS tot FROM user WHERE email = '$email' ";

    $result =mysqli_query($conn,$sql);
    if ( $row = mysqli_fetch_assoc( $result) ){
return $row['tot'];
 
    }
}
function checkphonenoexist($phone_no){
    global $conn;
    $sql = "SELECT COUNT(*) AS tot FROM user WHERE phone_no = '$phone_no' ";

    $result =mysqli_query($conn,$sql);
    if ( $row = mysqli_fetch_assoc( $result) ){
   return $row['tot'];
    
    }
}


?>