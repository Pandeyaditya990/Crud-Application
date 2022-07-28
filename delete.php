<?php
include '_dbconnect.php';
$id=$_GET['id'];
$sql_delete="DELETE FROM `notes` WHERE `Serialno` =$id";
$delete=mysqli_query($conn,$sql_delete);
if ($delete) {
    header('location:\crudapp\notes.php');
}
?>