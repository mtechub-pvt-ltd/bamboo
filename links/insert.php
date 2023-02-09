
<?php 
session_start();

include('../include/db.php');
$date = date('d-m-Y');
$exist=0;
$description=htmlspecialchars($_POST['description']);
$link=htmlspecialchars($_POST['link']);
$sql="SELECT * FROM links";
$run=mysqli_query($conn,$sql);
while ($row=mysqli_fetch_assoc($run)) {
    if($row['link']==$_POST['link']) {
     echo   $exist=1;
        break;
    }
}
if($exist==1) {
    header('location:../dashboard.php?add&msg=link_already_exist');
} else {
  if(isset($_POST['push'])) {
    $sql="SELECT * FROM links WHERE pushed='1'";
    $run=mysqli_query($conn,$sql);
     $count=mysqli_num_rows($run);
    if($count>=3) {
        header('location:../dashboard.php?add&msg=can_not_push_more_than_3_links');
    } else {
        $sql="INSERT INTO links (topic,source,link,seen_count,added_by,status,pushed) VALUES
        ('$description','0','$link',0,'$date','active','1')";
        $run=mysqli_query($conn,$sql);  
        if($run) {
            header('location:../dashboard.php?msg=link_added_successfully_and_pushed');
        } else {
            header('location:../dashboard.php?add&msg=some_technical_error');
        } 
    } 
} 
else if(isset($_POST['add'])) {
    $sql="INSERT INTO links (topic,source,link,seen_count,added_by,status,pushed) VALUES
    ('$description','0','$link',0,'$date','active','0')";
    $run=mysqli_query($conn,$sql);  
    if($run) {
        header('location:../dashboard.php?msg=link_added_successfully');
    } else {
        header('location:../dashboard.php?add&msg=some_technical_error');
    } 
}
}




?>



