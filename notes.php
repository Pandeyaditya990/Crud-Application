<?php
include '_dbconnect.php';
?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Notes</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-gH2yIJqKdNHPEq0n4Mqa/HGKIhSkIHeL5AyhkYV8i59U5AR6csBvApHHNl/vI1Bx" crossorigin="anonymous">
</head>
<body>
    <nav class="navbar navbar-expand-lg bg-dark">
        <div class="container-fluid">
            <a class="navbar-brand text-light" href="index.php">Crud Application</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavDropdown"
                aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNavDropdown">
                <ul class="navbar-nav">
                    <li class="nav-item">
                        <a class="nav-link active text-light" aria-current="page" href="index.php">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link text-light" href="notes.php">Your Notes</a>
                    </li>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
    <div class="container col-6">
        <h3 class="text-center my-4">your notes</h3>
    </div>
    <div class="container my-4 col-10">
        <table class="table">
            <thead>
                <tr>
                    <th scope="col">Sr no</th>
                    <th scope="col">Title</th>
                    <th scope="col">Description</th>
                    <th scope="col">Action</th>
                </tr>
            </thead>
            <tbody>

                <?php
    $sql="SELECT * FROM `notes`";
    $fetch=mysqli_query($conn,$sql);

    $srno=1;

    while ($rows=mysqli_fetch_assoc($fetch)) {
        $serialno=$srno++;
        $serialno2=$rows['Serialno'];
        $title=$rows['Title'];
        $desc=$rows['description'];

        echo '<tr>
        <th scope="row">'.$serialno.'</th>
        <td>'.$title.'</td>
        <td>'.$desc.'</td>
        <td><button type="button" class="btn btn-danger"><a style="color:white; text-decoration:none;" href="delete.php?id='.$serialno2.'">Delete</a></button>
        <button type="button" class="btn btn-success"><a style="color:white; text-decoration:none;" href="update.php?update='.$serialno2.'">Update</a></button>
        </td>
    </tr>';
    }
    ?>
            </tbody>
        </table>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-A3rJD856KowSb7dwlZdYEkO39Gagi7vIsF0jrRAoQmDKKtQBHUuLZ9AsSv4jD4Xa"
        crossorigin="anonymous"></script>
</body>

</html>