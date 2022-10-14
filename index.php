<?php
if(isset($_POST['projectName'])){
  $servername = "localhost";
  $username = "root";
  $password = "";

  $con = mysqli_connect( $servername, $username, $password); 
  // $sql = mysql_select_db ('test',$conn) or die("unable to connect to database");

  if(!$con){
    die("connection to this database failed due to" . mysqli_connect_error());
  }
   //echo "Success connecting to the db";
   
   
    // $sql = "INSERT INTO `test`.`projectdata` (`projectName`, `projectDesc`) VALUES ( '$projectName', '$projectDesc');";
  //  echo $sql;
   $username = $_POST['username'];
   $email = $_POST['email'];
   $password = $_POST['password'];
    $projectName = $_POST['projectName'];
    $projectDesc = $_POST['projectDesc'];

   $sql = "INSERT INTO  `test`.`details` ( `username`,`password`,`projectName`,`projectDesc`) VALUES ('$username',  '$password','$projectName','$projectDesc');";
  
  echo $sql;

  if($con->query($sql) == true){
    echo "Successfully inserted";
 }
  else{
    echo "ERROR: $sql <br> $con->error";
  }

  $con->close();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <title>Form</title>
</head>
<body>
    <div class="container">
        <form action="index.php" method="post">
         <div class="form-group">
          <label for="email">UserName:</label>
           <input type="text"  class="form-control"  name="username" id="username" placeholder="Enter your name">
           <label for="email">Email:</label>
           <input type="email" class="form-control" id="email" placeholder="Enter email" name="email">
         </div>
         <div class="form-group">
           <label for="pwd">Password:</label>
           <input type="password" class="form-control" name="password" value="1" id="pwd" placeholder="Enter password" name="pwd">
         </div>

         <div class="form-group">
          <label class="validation-error hide" id="projectNameValidationError">This field is required.</label>
          <input type="text" class="form-control" id="projectName" placeholder="Project Name" name="projectname">
      </div>
      <div class="form-group">
          <input type="text" class="form-control" id="projectDesc" placeholder="Description of the project"
              name="projectdesc">
      </div>
         <div class="checkbox">
           <label><input type="checkbox" name="remember"> Remember me</label>
         </div>
         <button type="submit" class="btn btn-default">Submit</button>
       </form>
     </div>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
  <!-- INSERT INTO `datatesting` (`id`, `username`, `email`, `password`) VALUES ('1', 'Rani', 'ranimhasilkar@gmail.com', '*********'); -->

</body>
</html>

