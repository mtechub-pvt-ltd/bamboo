
<?php 
session_start();

$server = 'localhost';
$username ='bambooUser';
$password ='mtechub123';
$db='bamboo';
$conn =mysqli_connect($server,$username,$password,$db);
 if(!$conn) {
     echo 'error';
 }
 else {
        // echo 'connected';
 }

	 $EncodeData=file_get_contents('php://input');
	 $DecodeData=json_decode($EncodeData,true);
 	header('Content-Type: application/json');
	if(isset($_GET['uniq_id']) && !empty($_GET['uniq_id'])) {
	 $p=0;
	 $sql="SELECT * FROM links WHERE id NOT IN (SELECT link_id FROM seen_link WHERE uniq_id='".$_GET['uniq_id']."') AND pushed=1 LIMIT 1";
	 $run=mysqli_query($conn,$sql);
	 $uniq_id=$_GET['uniq_id'];
	 if(mysqli_num_rows($run)>0) {
		while($row=mysqli_fetch_assoc($run)) {
			$id=$row['id'];
			$link=$row['link'];
			$response[]=array(
			"id"=>$id,
			"link"=>$link,
			);
			$p=1;
		$sql_seen="INSERT INTO seen_link (uniq_id,link_id) VALUES ('".$uniq_id."','".$id."')";
		$run_seen=mysqli_query($conn,$sql_seen);
		
		$sql_count="UPDATE links SET seen_count=seen_count+1 WHERE id='$id'";
		$run_count=mysqli_query($conn,$sql_count);
		
			break;
		}
	 } else{	
		$sql="SELECT * FROM links WHERE id NOT IN (SELECT link_id FROM seen_link WHERE uniq_id='".$_GET['uniq_id']."') AND pushed=0 ORDER BY RAND() DESC LIMIT 1";
		$run=mysqli_query($conn,$sql);
		while($row=mysqli_fetch_assoc($run)) {
			$id=$row['id'];
			$link=$row['link'];
			$response[]=array(
			"id"=>$id,
			"link"=>$link,
			);
			$p=0;
			$sql_seen="INSERT INTO seen_link (uniq_id,link_id) VALUES ('".$uniq_id."','".$id."')";
		$run_seen=mysqli_query($conn,$sql_seen);
		$sql_count="UPDATE links SET seen_count=seen_count+1 WHERE id='$id'";
		$run_count=mysqli_query($conn,$sql_count);
			break;
		}
	 }
	 

	 if($response==null) {
		$sql="SELECT * FROM links WHERE pushed=0 ORDER BY RAND() LIMIT 1";
		$run=mysqli_query($conn,$sql);
		while($row=mysqli_fetch_assoc($run)) {
			$id=$row['id'];
			$link=$row['link'];
			$response[]=array(
			"id"=>$id,
			"link"=>$link,
			);
			$sql_count="UPDATE links SET seen_count=seen_count+1 WHERE id='$id'";
		$run_count=mysqli_query($conn,$sql_count);
			break;
			
		}
	 }
        // echo $id.' '.$link;
       
        header('location:'.$link.'');
// 			echo json_encode($response);
			} else {
	echo 'uniq_id is not set';		
}
	
 ?>
 
 
 