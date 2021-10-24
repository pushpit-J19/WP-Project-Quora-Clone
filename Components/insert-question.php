<?php
    $dbhost = 'localhost';
    $dbUsername = 'root';
    $dbpassword = '';
    $dbname = "Project_DB";
    $conn = mysqli_connect($dbhost,$dbUsername,$dbpassword, $dbname);
    
    $new_question = "";
    $new_qname = "";
    $new_qcat = [];
    $cat_vals = "";
    $folder = "";
    $filename = "";
    $tempname = "";
    $dst = "";
    $new_img_name = "";

    $target_dir = "../Images/userdata/";
    $target_file = $target_dir;
    $uploadOk = 1;
    $imageFileType = strtolower(pathinfo(basename( $_FILES["q_name"]["name"]),PATHINFO_EXTENSION));

    if (!$conn){
        die('Connection Failed: '.mysqli_connect_error());
    }

    if(isset($_POST["submit"])){
        $new_question = $_POST["quesfield"];
        $new_qcat = [];
        if(!empty($_POST['cat_check']))  
            { 
                $i=0; 
                foreach($_POST['cat_check'] as $s) 
                { 
                    $new_qcat[$i]=$s; 
                    $i++; 
                } 
            } 
        $cat_vals = implode(',',$new_qcat); 
         

        $cid = 1; //$_SESSION["cid"] 
        $sql = 'INSERT INTO QUESTION (Cid, Ques_desc, Asked_date, Q_name, Q_cat) VALUES("'.$cid.'", "'.$new_question.'", "'.date('Y-m-d').'","'.$target_file.'", "'.$cat_vals.'")';    
        if(mysqli_query($conn, $sql))
        {
           /* header("location:index.php");*/
        }  
        else 
        { 
            echo "<br>ERROR: Could not insert values " . mysqli_error($conn); 
        }

        $sql2 = 'select Qid from QUESTION where Cid="'.$cid.'" AND Ques_desc="'.$new_question.'"';
        if(mysqli_query($conn, $sql2))
        {
            $image_cid = mysqli_query($conn, $sql2);
            $row = mysqli_fetch_array($image_cid);
            $new_img_name = $row['Qid'];
        }         

        $target_file = $target_file.$new_img_name.".".$imageFileType;
        // for images
        if (isset($_POST['q_name'])) {
            $check = getimagesize($_FILES["q_name"]["tmp_name"]);
            if($check !== false) {
              echo "File is an image - " . $check["mime"] . ".";
              $uploadOk = 1;
            } else {
              echo "File is not an image.";
              $uploadOk = 0;
            }
        }
        if ($uploadOk == 0) {
            echo "Sorry, your file was not uploaded.";

          } else {
            if (move_uploaded_file($_FILES["q_name"]["tmp_name"], $target_file)) {
              echo "The file ". htmlspecialchars( basename( $_FILES["q_name"]["name"])). " has been uploaded.";
            } else {
              echo "Sorry, there was an error uploading your file.";
            }
        }
    }
?>

