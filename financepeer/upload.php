<?php
session_start();

$message = ''; 
if (isset($_POST['uploadBtn']) && $_POST['uploadBtn'] == 'Upload')
{
  if (isset($_FILES['uploadedFile']) && $_FILES['uploadedFile']['error'] === UPLOAD_ERR_OK)
  {
    // get details of the uploaded file
    $conn = mysqli_connect("localhost","root","","login");
    $fileTmpPath = $_FILES['uploadedFile']['tmp_name'];
    $fileName = $_FILES['uploadedFile']['name'];
    $fileSize = $_FILES['uploadedFile']['size'];
    $fileType = $_FILES['uploadedFile']['type'];
    $fileNameCmps = explode(".", $fileName);
    $fileExtension = strtolower(end($fileNameCmps));
    $data = file_get_contents($fileName);
    $array = json_decode($data,true);
    foreach($array as $row){
        $sql = "INSERT INTO json(userId,id,title,body) VALUES('".$row["userId"]."','".$row["id"]."','".$row["title"]."','".$row["body"]."')";
        mysqli_query($conn,$sql);
    }
    $message ='File is successfully uploaded.';

  }
}
$_SESSION['message'] = $message;
header("Location: welcome.php");