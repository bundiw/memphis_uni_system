<?php
require_once 'DbConnect.php';
$response = array();

if(isset($_POST["email"])){
    //insert into table applicant
    //access-- applicant
    //id
    //email
    //password
    $email= $_POST['email'];
    $password= md5($_POST['psw']);
    $access = "applicant";
  
    //INSERT INTO `applicants`(`app_id`, `app_email`, `appl_password`, `access`) VALUES ('[value-1]','[value-2]','[value-3]','[value-4]')
    //$sql ="INSERT INTO `applicants`( `app_email`, `app_password`, `access`) VALUES (?,?,?)";
    try {
        //code... 
        $stmt= $conn->prepare("INSERT INTO `applicants`( `app_email`, `app_password`) VALUES (?,?)");
       $stmt->bind_param("ss",$email,$password);
        
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
    
    } catch (\Throwable $th) {
       echo $th->getMessage();
    }
   
 

}
echo json_encode($response);
