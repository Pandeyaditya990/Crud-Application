<?php
include '_dbconnect.php';
$id=$_GET['update'];
if ($_SERVER['REQUEST_METHOD']=='POST') {
    $title=$_POST['title'];
    $description=$_POST['description'];
    
    $sql_update="UPDATE `notes` SET `Serialno`='$id', `Title`='$title', `description` = '$description' WHERE `Serialno` = '$id'";
    $update=mysqli_query($conn,$sql_update);

    if ($update) {
        header('location:\crudapp\notes.php');
    }
    else {
        echo "Error".mysqli_error($conn);
    }

}
?>
<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Update</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-gH2yIJqKdNHPEq0n4Mqa/HGKIhSkIHeL5AyhkYV8i59U5AR6csBvApHHNl/vI1Bx" crossorigin="anonymous">
  </head>
  <body>
  <nav class="navbar navbar-expand-lg bg-dark">
        <div class="container-fluid">
            <a class="navbar-brand text-light" href="#">Crud Application</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavDropdown"
                aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNavDropdown">
                <ul class="navbar-nav">
                    <li class="nav-item">
                        <a class="nav-link active text-light" aria-current="page" href="#">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link text-light" href="notes.php">Your Notes</a>
                    </li>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
<?php

//Here I am fetching data beacuse when we click on update we want the last data
$id=$_GET['update'];
$sql="SELECT * FROM `notes` WHERE Serialno='$id'";
$result=mysqli_query($conn,$sql);
$rows=mysqli_fetch_assoc($result);
$title=$rows['Title'];
$desc=$rows['description'];


?>
    <div class="container my-4 col-8">
        <form class="form-control" action="<?php echo $_SERVER['REQUEST_URI'] ?>" method="post">
            <div class="mb-3">
                <label for="title" class="form-label">Title</label>
                <input type="text" class="form-control" id="title" name="title" aria-describedby="title" value="<?php echo $title;?>" required>
            </div>
            <div class="mb-3">
                <label for="Description" class="form-label">Description</label>
                <input type="text" class="form-control" name="description" id="description" value="<?php echo $desc; ?>" required>
            </div>
            <button type="submit" class="btn btn-primary" name="submit">Update Note</button>
        </form>
    </div>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-A3rJD856KowSb7dwlZdYEkO39Gagi7vIsF0jrRAoQmDKKtQBHUuLZ9AsSv4jD4Xa" crossorigin="anonymous"></script>
  </body>
</html>