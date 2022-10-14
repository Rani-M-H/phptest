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
    echo "Success connecting to the db";
   $projectname = $_POST['projectName'];
   $projectdesc = $_POST['projectDesc'];

   
   $sql = "INSERT INTO `test`.`projectdata` (`projectName`, `projectDesc`) VALUES ( '$projectname', '$projectdesc');";
   echo $sql;
   
   if($con->query($sql) == true){
    echo " successfully";
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
    <title>project</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
</head>

<body>

    <div class="container ">
        <h3>Project</h3>
        <form action="project.php" method="post" onSubmit="event.preventDefault(); onFormSubmit();" onFormSubmit(); autocomplete="off">
            <div class="form-group">
                <label class="validation-error hide" id="projectNameValidationError">This field is required.</label>
                <input type="name" class="form-control" id="projectName" placeholder="Project Name" name="name">
            </div>
            <div class="form-group">
                <input type="Desc" class="form-control" id="projectDesc" placeholder="Description of the project"
                    name="desc">
            </div>
            <button type="submit" class="btn btn-default">Add</button>
        </form>
    </div><br><br>

    <div class="container">
        <table class="list table table-striped" id="projectList">
            <thead>
                <tr>
                    <th>Project Name</th>
                    <th>Project Description</th>
                    <th>Status</th>
                    <!-- <div class="dropdown">
                        <button type="button" class="btn  dropdown-toggle" data-bs-toggle="dropdown">
                          Status
                        </button>
                        <ul class="dropdown-menu">
                          <li><a class="dropdown-item" href="#">Link 1</a></li>
                          <li><a class="dropdown-item" href="#">Link 2</a></li>
                          <li><a class="dropdown-item" href="#">Link 3</a></li>
                        </ul>
                      </div> -->
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>

            </tbody>
        </table>
    </div>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
    <script src="./pscript.js"></script>
    <!-- INSERT INTO `projectdata` (`id`, `projectName`, `projectDesc`) VALUES ('1', 'Bird view', 'This is a tool.'); -->

</body>

</html>