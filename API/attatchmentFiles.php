<?php
require_once 'DbConnect.php';
$response = array();

$target_dir = "../files_photos/";
$target_file1 = $target_dir . basename($_FILES["idcard"]["name"]);
$target_file2 = $target_dir . basename($_FILES["highschool-transcript"]["name"]);
$target_file3 = $target_dir . basename($_FILES["tertiary-transcript"]["name"]);
$target_file4 = $target_dir . basename($_FILES["passport-photo"]["name"]);
$uploadOk = 1;
$imageFileType1 = strtolower(pathinfo($target_file1,PATHINFO_EXTENSION));
$imageFileType2 = strtolower(pathinfo($target_file2,PATHINFO_EXTENSION));
$imageFileType3 = strtolower(pathinfo($target_file3,PATHINFO_EXTENSION));
$imageFileType4 = strtolower(pathinfo($target_file4,PATHINFO_EXTENSION));
// Check if image file is a actual image or fake image

// Check if file already exists
if (file_exists($target_file1) || file_exists($target_file2) || file_exists($target_file3) ||file_exists($target_file4)) {
   $response['error'] = true; 
    $response['message'] = "Sorry, file already exists.";
    $uploadOk = 0;
}


// Check if $uploadOk is set to 0 by an error
if ($uploadOk == 0) {
    $response['error'] = true; 
     $response['message'] ="Sorry, your file was not uploaded.";
// if everything is ok, try to upload file
} else {
    if (move_uploaded_file($_FILES["idcard"]["tmp_name"], $target_file1) &&
        move_uploaded_file($_FILES["highschool-transcript"]["tmp_name"], $target_file2) &&
        move_uploaded_file($_FILES["passport-photo"]["tmp_name"], $target_file4)  &&
        move_uploaded_file($_FILES["tertiary-transcript"]["tmp_name"], $target_file3)
    ) {
        $a_id = $_POST['user'];
        $idurl = basename( $_FILES["idcard"]["name"]);
        $highschoolurl = basename($_FILES["highschool-transcript"]["name"]);
         $tertiaryurl = basename( $_FILES["tertiary-transcript"]["name"]);
         $passporturl = basename( $_FILES["passport-photo"]["name"]);
          
          //INSERT INTO `attatchments`(`file_id`, `a_id`, `idcard_url`, `highschool_file_url`, `tertiary_file_url`, `passport_file_url`) VALUES ('[value-1]','[value-2]','[value-3]','[value-4]','[value-5]','[value-6]')
          $sql ="INSERT INTO `attatchments`( `a_id`, `idcard_url`, `highschool_file_url`, `tertiary_file_url`, `passport_file_url`) VALUES (?,?,?,?,?)";
          $stmt= $conn->prepare($sql);
          $stmt->bind_param("sssss",$a_id, $idurl,$highschoolurl,$tertiaryurl,$passporturl);
            
            $stmt->execute();
            $res=$stmt->store_result();
            
            
            if( $res > 0){
                $response['error'] = false; 
                $response['message'] = 'New User registered Successfully!'; 
                $response['access'] = 'applicant'; 

            }else{
                
                $response['error'] = true; 
                $response['message'] = 'New user could not be registered!'; 

            }
            $stmt->close();
          


    } else {
      $response['error'] = true; 
       $response['message'] = "Sorry, there was an error uploading your file.";
    }
}
echo json_encode($response);
