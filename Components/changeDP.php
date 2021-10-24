<?php

session_start();

$target_dir = "../Images/DPs/";
$target_file = $target_dir . basename($_FILES["profilepicfield"]["name"]);     // $_SESSION['cid'];
$uploadOk = 1;
$imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));

// Check if image file is a actual image or fake image
if(isset($_POST["submit"])) {
  $check = getimagesize($_FILES["profilepicfield"]["tmp_name"]);
  if($check !== false) {
    echo "File is an image - " . $check["mime"] . ".";
    $uploadOk = 1;
  } else {
    echo "File is not an image.";
    $uploadOk = 0;
  }
}




// Check if $uploadOk is set to 0 by an error
if ($uploadOk == 0) {
  echo "Sorry, your file was not uploaded.";
// if everything is ok, try to upload file
} else {
    $cid = 1; // $_SESSION['cid'];
    $localfilename = $target_dir.$cid.".".$imageFileType;
  if (move_uploaded_file($_FILES["profilepicfield"]["tmp_name"], $localfilename)) {
    echo "The file ". htmlspecialchars( basename( $_FILES["profilepicfield"]["name"])). " has been uploaded.";
  } else {
    echo "Sorry, there was an error uploading your file.";
  }
}


$dbhost = 'localhost';
$dbUsername = 'root';
$dbpassword = '';
$dbname = "Project_DB";
$conn = mysqli_connect($dbhost,$dbUsername,$dbpassword, $dbname);

$updateQuery = "UPDATE CUSTOMER SET DP_name = '$localfilename' WHERE Cid= '$cid' ;";   

if(mysqli_query($conn, $updateQuery)){ 
    echo "<br>Records were updated successfully."; 
    show_entries($conn);
} 
else { 
    echo "<br>ERROR: Could not able to execute $updateQuery. " . mysqli_error($conn); 
} 

mysqli_close($conn);


?>