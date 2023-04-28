<?php
 $servername="localhost";
 $username="root";
 $password="";
 $database="notes";

 $conn=mysqli_connect($servername,$username,$password,$database);
 if(!$conn){
   die("Sorry we failed to connect: ". mysqli_connect_error());
 }
    ?>

<?php
 if(ISSET($_GET['DeleteId'])){
$Id=$_GET['DeleteId'];
$sql="DELETE  FROM `notes` WHERE `Id`='$Id' ";
$result=mysqli_query($conn,$sql);
if($result){
header('location:index.php');
// echo '<div class="alert alert-success" role="alert">
//   Record has been Successfully Deleted!
// </div>';
  }
  else{
  echo "Record has not been Deleted"; 
  }
  
}  
?>
