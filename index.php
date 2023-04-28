<?php
$insert=false;
      $servername="localhost";
      $username="root";
      $password="";
      $database="notes";

      $conn=mysqli_connect($servername,$username,$password,$database);
      if(!$conn){
        die("Sorry we failed to connect: ". mysqli_connect_error());
      }
         ?>
        

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-aFq/bzH65dt+w6FI2ooMVUpc+21e0SRygnTpmBvdBgSdnuTN7QbdgL+OapgHtvPp" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha2/dist/js/bootstrap.bundle.min.js" integrity="sha384-qKXV1j0HvMUeCBQ+QVp7JcfGl760yU08IQ+GpUo5hlbpg51QRiuqHAJz8+BrxE/N" crossorigin="anonymous"></script>
    <title>Project-1</title>
</head>
<body>
<nav class="navbar navbar-expand-lg bg-dark navbar-dark">
        <div class="container-fluid">
          <a class="navbar-brand" href="#">iNotes</a>
          <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
          </button>
          <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
              <li class="nav-item">
                <a class="nav-link active" aria-current="page" href="/CRUD/index.php">Home</a>
              </li>

              <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                  Dropdown
                </a>
                <ul class="dropdown-menu">
                  <li><a class="dropdown-item" href="#">Action</a></li>
                  <li><a class="dropdown-item" href="#">Another action</a></li>
                  <li><hr class="dropdown-divider"></li>
                  <li><a class="dropdown-item" href="#">Something else here</a></li>
                </ul>
              </li>
              <li class="nav-item">
                <a class="nav-link disabled">Disabled</a>
              </li>
            </ul>
      <form class="d-flex" role="search">
        <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
        <button class="btn btn-outline-success" type="submit">Search</button>
      </form>
    </div>
  </div>
</nav>
<?php
if($_SERVER["REQUEST_METHOD"]=="POST"){
        $Title=$_POST["Title"];
        $Discription=$_POST["Discription"];
       
    
      $sql="INSERT INTO `notes` (`Title`,`Discription`) VALUES  ('$Title','$Discription')";
      $result=mysqli_query($conn,$sql);
      if($result){
  $insert=true;
        }
        else{
        echo "Record has not been Inserted"; 
        }
      }
         ?>
<?php
if($insert){
 echo'<div class="alert alert-success" role="alert">
 Record has been successfully Inserted!
</div>';
}
?>
      <div class="container mt-5">
        <form action="/CRUD/index.php" METHOD="POST">
            <div class="mb-3">
                <h1>Add a Note</h1>
              <label for="exampleInputEmail1" class="form-label">Title</label>
              <input type="Title" class="form-control" placeholder="Title" name="Title" aria-describedby="emailHelp" required>
              <div id="emailHelp" class="form-text">We'll never share your email with anyone else.</div>
            </div>
            <div class="mb-3">
              <label for="exampleInputDiscription" class="form-label">Discription</label>
              <textarea type="text"class="form-control" maxlength='200'  placeholder="Discription"name="Discription" rows="5" required ></textarea>
            </div>
            <button type="submit" class="btn btn-primary">Add  Note</button>
          </form>
          <table class="table">
  <thead> 
    <tr>
      <th scope="col">S.No</th>
      <th scope="col">Title</th>
      <th scope="col">Discription</th>
      <th scope="col">Actions</th>
    </tr>
  </thead>
  <tbody>
  <?php
  
        $sql="SELECT * FROM `notes`";
        $result=mysqli_query($conn,$sql);
        $Id=0;
        while($row=mysqli_fetch_assoc($result)){
        $Id=$Id +1;
          echo "<tr>
    
          <th scope='row'>" .$Id. "</th>
          <td>".$row['Title']."</td>
          <td>".$row['Discription']."</td>
          <td> <button type='button' class='btn btn-danger'><a href='/CRUD/Delete.php?DeleteId=" .$row['Id']. " 'class='text-light'>Delete</a></button></td>
        </tr>";
          
        }

        ?>
  </tbody>
</table>
      </div>

</body>
</html> 